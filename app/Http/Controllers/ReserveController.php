<?php
namespace App\Http\Controllers;

use App\Models\BeforeAccept;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            'start_time' => '',
            // required|date_format:Y-m-d H:i:s
            'end_time' => '',
            // required|date_format:Y-m-d H:i:s
            'total_amount' => '',
            // required|integer
            'hostuser_id' => '',
            // required|integer
            'post_id' => '',
            // required|integer
        ]);
        $accept = new BeforeAccept();
        $accept->start_time = $validatedData['start_time'];
        $accept->end_time = $validatedData['end_time'];
        $accept->total_amount = $validatedData['total_amount'];
        $accept->post_id = $validatedData['post_id'];
        $accept->hostuser_id = $validatedData['hostuser_id'];
        $accept->user_id = Auth::id();
        $accept->save();

        // 保存後のリダイレクトやその他のアクション
        return redirect()->route('apply.successfully')->with('success', '予約が完了しました。');
    }
}