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

    public function detail()
    {
        return view('post.detail');
    }

    


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = new Post();
        $post->post_number = $validatedData['post_number'];
        $post->adress = $validatedData['adress'];
        $post->buisiness_start_time = $validatedData['buisiness_start_time'];
        $post->buisiness_end_time = $validatedData['buisiness_end_time'];
        $post->price/minute = $validatedData['price/minute'];
        $post->notes = $validatedData['notes'];
        $post->user_id = $validatedData['user_id'];
        $post->image_path = $validatedData['image_path'];
        $post->created_at = $validatedData['created_at'];
        $post->updated_at = $validatedData['updated_at'];
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
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'post_number' => 'required|string',
            'adress' => 'required|string',
            'business_start_time' => 'required|date',
            'business_end_time' => 'required|date',
            'price_per_minute' => 'required|integer',
            'notes' => 'string',
            'user_id' => 'required|exists:users,id', // Assuming the 'users' table exists
            'image_path' => 'nullable|string',
            // Add more validation rules as needed
        ]);

        $post = Post::findOrFail($id);
        $home->post_number = $validatedData['post_number'];
        $home->adress = $validatedData['adress'];
        $home->business_start_time = $validatedData['business_start_time'];
        $home->business_end_time = $validatedData['business_end_time'];
        $home->price_per_minute = $validatedData['price_per_minute'];
        $home->notes = $validatedData['notes'];
        $home->user_id = $validatedData['user_id'];
        $home->image_path = $validatedData['image_path'];
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

