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
        // リクエストからデータを受け取る
        $data = $request->all();

        // 必要な追加情報を取得・設定する
        $data['user_id'] = auth()->id();
        $data['home_id'] = ...;  // これはどのように取得するかによります
        $data['hostuser_id'] = ...;  // これはどのように取得するかによります

        // before_acceptテーブルにデータを保存
        BeforeAccept::create($data);

        // 保存後のリダイレクトやその他のアクション
        return redirect()->route('apply.successfully')->with('success', '予約が完了しました。');
    }
}