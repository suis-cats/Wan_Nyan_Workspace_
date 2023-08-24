<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('自分の投稿一覧') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        <div class="my-4">
            <a href="{{ route('post.create') }}" class="inline-block py-2 px-4 btn  btn-success text-decoration-none">
                    {{ __('新しくワークスペースを貸す') }}
            </a>
            
        </div>

        @if (!empty($posts))
            <div class="grid grid-cols-1 gap-8">
                @foreach ($posts as $post)
                    <div class="bg-white shadow p-6 rounded-lg">
                        <h4 class="text-lg font-bold">ワークスペースID　{{ $post->id }}</h4>
                        <div class="d-flex align-items-center">
                            <p class="font-bold mr-3">住所　　　　　</p>
                            <p class="text-gray-800 text-xl">〒{{ $post->post_number }}　{{ $post->adress }}</p>
                        </div>

                        <div class="d-flex align-items-center">
                            <p class="font-bold">営業設定時間　　</p>
                            <p class="text-gray-800 text-xl">{{ $post->buisiness_start_time }} 〜 {{ $post->buisiness_end_time }}</p>
                        </div>

                        <div class="d-flex align-items-center">
                            <p class="font-bold">料金設定　　　　</p>
                            <p class="text-gray-800 text-xl">{{ $post->price_per_minute * 15 }}円 / 15分</p>
                            
                        </div>

                       
                        
                        <div class="mt-4 d-flex">
                            <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-primary mr-2 d-inline-block text-center" style="width: 80px;" role="button">
                                {{ __('編集') }}
                            </a>
                            <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger d-inline-block" style="width: 80px; height: 41.99px;" onclick="return confirm('本当に削除しますか？')">
                                    {{ __('削除') }}
                                </button>
                            </form>
                            <p class="text-gray-800 text-right ml-auto align-self-end">POST更新　{{ $post->updated_at }}</p>
                        </div>


                        
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex justify-center items-center h-full">
                <p class="text-lg text-gray-600">投稿はありません。</p>
            </div>
        @endif
    </div>
</x-app-layout>
