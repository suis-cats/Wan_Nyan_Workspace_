<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ReserveController extends Controller
{
    public function reserve($id)
    {
        // 予約ロジックをここに追加
        $posts = Post::findOrFail($id);
        return view('apply.reserve', compact('posts'));
    }

    

}
