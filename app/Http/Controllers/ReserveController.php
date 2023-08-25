<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeforeAccept;
use App\Models\Post;

class ReserveController extends Controller
{
    // 他のメソッドもここにあります...
    public function reserve($id) 
{
    $post = Post::find($id);  // 仮定していますが、Postモデルを使用してIDベースでポストを取得
    return view('apply.reserve', ['posts' => $post]);
}
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s',
            'total_amount' => 'required|integer',
        ]);
    

        // before_acceptテーブルにデータを保存
        BeforeAccept::create($data);

        // 保存後のリダイレクトやその他のアクション
        return redirect()->route('apply.successfully')->with('success', '予約が完了しました。');
    }
}