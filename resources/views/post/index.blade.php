<x-app-layout>
    @vite(['resources/css/indexpage.css'])
    <x-slot name="header">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left-aligned h2 -->
            <div class="col-md-5">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('わんにゃんレンタルワークスペース') }}
                </h2>
            </div>
            
            <!-- Right-aligned search bar with reduced width -->
            <div class="col-md-7 d-flex justify-content-end">
                <div class="input-group" style="max-width: 80vh;">
                    <input type="text" class="form-control" placeholder="キーワードを入力">
                    <button class="btn btn-outline-secondary px-5" type="button" id="button-addon2">
                        <i class="fas fa-search"></i> 検索
                    </button>
                </div>
            </div>
        </div>
    </div>
    



    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            <a href="{{ route('post.create') }}" class="inline-block py-2 px-4 btn  btn-success text-decoration-none">
                  {{ __('ワークスペースを貸す') }}
            </a>

            <a href="{{ route('myposts') }}" class="inline-block ml-4 py-2 px-4 btn btn-outline-secondary text-decoration-none">
                {{ __('自分の貸したワークスペースを確認する') }}
            </a>
        </div>

        <div class="font-semibold text-xl text-gray-800 leading-tight">
            <p class="">近くのワークスペース</p>
            @if (!empty($posts))
                <ul>
                    @foreach ($posts as $post)
                    <ul>
                        <li class="mb-6 bg-white border rounded-lg p-4">
                            <div class="row">
                                <div
                                    class="col-md-6 d-flex justify-content-center align-items-center"
                                >
                                    <img src="{{ asset('images/workspace1.jpg') }}" />
                                </div>
                                <div class="col-md-6 d-flex flex-column">
                                    <div>
                        
                                       

                                        <!-- 枠 -->
                                        <div>
                                            <!-- 追加した部分 -->
                                            <!-- <p>郵便番号: {{ $post->post_number }}</p> -->
                                            <!-- <p>住所</p> -->
                                            <p class="text-40px">{{ $post-> adress }}</p>
                                            <p class="text-26px">営業時間　 {{ date('m/d H:i', strtotime($post->start_time)) }}　〜　{{ date('m/d H:i', strtotime($post->start_time)) }}</p>
                                            
                                            <!-- <p>備考: {{ $post->notes }}</p> -->
                                            @if($post->image_path)
                                                <img src="{{ asset($post->image_path) }}" alt="ワークスペースの画像">
                                            @endif
                                            <p class="text-26px mb-1">利用料金</p>
                                            <p class="text-right text-60px"> {{ $post->price_per_minute * 15 }}円 / 15分</p>

                                            <div class="flex justify-between mt-8">
                                                <p class="text-gray-600">オーナー：{{ $post->user->name }}</p>
                                                <p class="text-gray-600">POST更新：{{ $post->updated_at }}</p>
                                            </div>
                                            <!-- ここまで -->

                                        </div>


                                    </div>


                                    <div class="mt-auto d-flex flex-column justify-content-end">
                                        <a
                                            
                                            href="{{ route('apply.reserve', ['id' => $post->id]) }} }}"
                                            class="inline-block py-2 px-4 btn btn-success text-decoration-none mb-2"
                                        >
                                            {{ __('予約する') }}
                                        </a>
                                    
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    @endforeach
                </ul>

            @else
            <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">近くにワークスペースはありません。</p>
            </div>
            @endif

            <p>自分の予約したワークスペース</p>
            
                @if (!$beforeAccepts->isEmpty())
                <ul>
                    @foreach ($beforeAccepts as $beforeAccept)
                    
                    <ul>
                        <li class="mb-6 bg-white border rounded-lg p-4">
                            <div class="row">
                                <div
                                    class="col-md-6 d-flex justify-content-center align-items-center"
                                >
                                    <img src="{{ asset('images/workspace1.jpg') }}" />
                                </div>
                                <div class="col-md-6 d-flex flex-column">
                                    
                                    <!-- 枠 -->
                                    <p class="text-40px">{{ $posts->find($beforeAccept->post_id)-> adress }}</p>
                                    

                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="text-26px mb-1">予約時間</p>
                                        <span class="badge faded-badge bg-info accept-status mb-3">予約済み</span>
                                    </div>

                                    
                                    <p class="text-60px">{{ date('m/d H:i', strtotime($beforeAccept->start_time)) }}</p>
                                    <p class="text-60px">　　〜{{ date('m/d H:i', strtotime($beforeAccept->end_time)) }}</p>

                                    <!-- <span class="badge faded-badge bg-danger accept-status">未承認</span> -->
                                    




                                    <div class="mt-auto d-flex flex-column justify-content-end">
                                        <a
                                            href=""
                                            class="inline-block py-2 px-4 btn btn-outline-success text-decoration-none mb-2"
                                        >
                                            {{ __('詳細を確認する') }}
                                        </a>
                                    
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    @endforeach
                </ul>

            @else
                <div class="flex justify-center items-center h-96">
                    <p class="text-lg text-gray-600">予約はありません。</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
