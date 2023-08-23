<x-app-layout>
    @vite(['resources/css/indexpage.css'])
    <x-slot name="header">
        
    </x-slot>
    <style>
      
    </style>
        <div class="d-flex align-items-center justify-content-center" style="min-height: 90vh;">
            <div class="text-center">
                <p class="text-40px font-bold">予約が完了しました</p>
                <p class="font-bold">予約内容はマイページから確認できます。</p>

                <button type="button" class="btn btn-dark btn-lg px-5 py-3 m-5">
                    <a href="{{ route('post.index') }}" class="text-white text-decoration-none">
                            TOPへ戻る
                    </a>
                </button>
            </div>


            <!-- 他のコンテンツを追加する場合はここに追加できます -->
        </div>
</x-app-layout>
