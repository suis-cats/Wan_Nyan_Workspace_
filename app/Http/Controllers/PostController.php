<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }


    


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_number' => 'required|string',
            'adress' => 'required|string',
            'buisiness_start_time' => 'required|date_format:Y-m-d H:i:s',
            'buisiness_end_time' => 'required|date_format:Y-m-d H:i:s',
            'price_per_minute' => 'required|integer',
            'notes' => 'nullable|string',
            'image_path' => 'nullable|string',
        ]);

        $post = new Post();
        $post->post_number = $validatedData['post_number'];
        $post->adress = $validatedData['adress'];
        $post->buisiness_start_time = $validatedData['buisiness_start_time'];
        $post->buisiness_end_time = $validatedData['buisiness_end_time'];
        $post->price_per_minute = $validatedData['price_per_minute'];
        $post->notes = $validatedData['notes'];
        $post->image_path = $validatedData['image_path'];
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('post.index')->with('success', '投稿が作成されました');
    }

    public function myPosts()
    {
        $posts = Post::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('my-posts', compact('posts'));
    }

    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('post.edit', compact('posts'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'post_number' => 'required|string',
            'adress' => 'required|string',
            'business_start_time' => 'required|date',
            'business_end_time' => 'required|date',
            'price_per_minute' => 'required|integer',
            'notes' => 'nullable|string',
            'user_id' => 'required|exists:users,id', // Assuming the 'users' table exists
            'image_path' => 'nullable|string',
            // Add more validation rules as needed
        ]);

        $post = Post::findOrFail($id);
        $post->post_number = $validatedData['post_number'];
        $post->adress = $validatedData['adress'];
        $post->business_start_time = $validatedData['business_start_time'];
        $post->business_end_time = $validatedData['business_end_time'];
        $post->price_per_minute = $validatedData['price_per_minute'];
        $post->notes = $validatedData['notes'];
        $post->user_id = $validatedData['user_id'];
        $post->image_path = $validatedData['image_path'];
        // Update other columns as needed
        $post->save();

        return redirect()->route('myposts')->with('success', '投稿が更新されました');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('myposts')->with('success', '投稿が削除されました');
    }
}

