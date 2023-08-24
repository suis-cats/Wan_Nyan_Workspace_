<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'adress' => ['required', 'string', 'max:500'],  // 住所
            'tel' => ['required', 'string', 'max:20'],  // 電話番号
            'age' => ['required', 'integer', 'min:0', 'max:150'],  // 年齢
            'image_path' => ['nullable', 'string', 'max:1000'],  // 画像のパス
            'post_number' => ['required', 'string', 'max:20'],  // 郵便番号
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        session()->flash('success', '新規登録しました!');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'adress' => $data['adress'],  // 住所
            'tel' => $data['tel'],  // 電話番号
            'age' => $data['age'],  // 年齢
            'image_path' => $data['image_path'] ?? null,  // 画像のパス (nullableなので存在しない場合はnullをセット)
            'post_number' => $data['post_number'],  // 郵便番号
        ]);
    }
}
