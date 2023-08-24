<x-app-layout>
    @vite(['resources/css/indexpage.css'])
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('レンタルワークスペース') }}
    </h2>
    <a href="" class="inline-block ml-4 py-2 px-4 btn btn-outline-secondary text-decoration-none">
        {{ __('　　検索する　　') }}
    </a>
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
                                        <h3 class="text-lg font-bold mb-2 border-bottom">{{ $post->title }}</h3>
                                        <p class="text-gray-1000 mt-4">{{ $post->body }}</p>
                                        <div class="flex justify-between mt-8">
                                            <p class="text-gray-600">{{ $post->user->name }}</p>
                                            <p class="text-gray-600">{{ $post->updated_at }}</p>
                                        </div>

                                        <!-- 枠 -->
                                        <div>
    <!-- 追加した部分 -->
    <p>郵便番号: {{ $post->post_number }}</p>
    <p>住所: {{ $post->adress }}</p>
    <p>営業開始時間: {{ $post->buisiness_start_time }}</p>
    <p>営業終了時間: {{ $post->buisiness_end_time }}</p>
    <p>備考: {{ $post->notes }}</p>
    @if($post->image_path)
        <img src="{{ asset($post->image_path) }}" alt="ワークスペースの画像">
    @endif
    <p>料金(1分あたり): {{ $post->price_per_minute }}円</p>
    <!-- ここまで -->

</div>


                                    </div>


                                    <div class="mt-auto d-flex flex-column justify-content-end">
                                        <a
                                            href="/reserve/{{ $post->id }}"
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

            <p class="">予約したワークスペース</p>
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
                                    
                                    <!-- 枠 -->
                                    <p class="text-40px">富山県新富町</p>
                                    <p>予約時間</p>
                                    <p class="text-60px">08:00~10:00</p>
                                    <!-- <span class="badge faded-badge bg-danger accept-status">未承認</span> -->
                                    <span class="badge faded-badge bg-info accept-status">承認済み</span>




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
            <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">予約はありません。</p>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
