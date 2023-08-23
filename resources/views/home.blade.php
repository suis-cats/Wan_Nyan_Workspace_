<x-app-layout>
    <link href="css/firstpage.css" rel="stylesheet" type="text/css">
    @vite(['resources/css/firstpage.css'])
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            トップページ
        </h2>
    </x-slot>
    <style>
      .bg-image {
        background-image: url({{ asset('images/workspace1.jpg') }});
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-color: rgba(255, 255, 255, 0.5); /* 50% transparency */
      }
    </style>
    <div class="bg-image">
      <div class="row">
        <div class="col-md-6 d-flex">
          <div class="content ml-5">
            <p class="hello font-weight-bold display-4">ようこそ</p>
            <p class="hello font-weight-bold display-4">
              ワンニャンワークスペースへ！
            </p>
            <p class="hello font-weight-bold display-4">
              世界一のレンタルワークスペースサイト
            </p>
          </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
          <img src="{{ asset('images/inu.jpeg') }}">
        </div>
      </div>

      <div class="text-center mt-10">
        <!-- mt-5 applies a top margin of 10vh (assuming 1vh ≈ 1rem) -->
        <button type="button" class="btn btn-dark btn-lg px-5 py-3">
          <a href="{{ route('post.index') }}" class="text-white text-decoration-none">
                  今すぐレンタル！！
          </a>
        </button>
      </div>
    </div>
</x-app-layout>
