<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'adress' => ['required', 'string', 'max:500'],  // 住所
            'tel' => ['required', 'string', 'max:20'],  // 電話番号
            'age' => ['required', 'integer', 'min:0', 'max:150'],  // 年齢
            'image_path' => ['nullable', 'string', 'max:1000'],  // 画像のパス
            'post_number' => ['required', 'string', 'max:20'],  // 郵便番号
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'adress' => $request->adress,  // 住所
            'tel' => $request->tel,  // 電話番号
            'age' =>$request->age,  // 年齢
            'image_path' => $request->image_path ?? null,  // 画像のパス (nullableなので存在しない場合はnullをセット)
            'post_number' => $request->post_number,  // 郵便番号
        ]);

        event(new Registered($user));

        Auth::login($user);

        session()->flash('success', '会員登録に成功しました。');

        return redirect(RouteServiceProvider::HOME);
    }
}
