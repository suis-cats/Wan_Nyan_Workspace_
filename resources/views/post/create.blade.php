<x-app-layout>
    <!-- Scripts -->
    @vite(['resources/css/create.css'])
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規投稿') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        <div class="my-4">
            <div class="bg-white shadow p-6 rounded-lg">
                <form action="{{ route('post.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <h2 class="font-bold mb-4">貸す予定の物件情報</h2>
                        <label for="post_number" class="block text-gray-700 text-sm font-bold mb-2">郵便番号</label>
                        <input type="text" name="post_number" id="post_number" class="border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="adress" class="block text-gray-700 text-sm font-bold mb-2">住所</label>
                        <input type="text" name="adress" id="adress" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>

                    <div class="container">
                        <div class="col-md-3 py-4">
                        <label for="post_number" class="block text-gray-700 text-sm font-bold mb-2">ワークスペース営業時間</label>
                        <p>入力形式　例　2023-04-08 23:08:14</p>
                            <div class="input-group date mb-3" id="buisiness_start_time" data-target-input="nearest">
                                <label for="datetimepicker3" class="pt-2 pr-2">開始日時：</label>
                                <input
                                    type="text"
                                    name="buisiness_start_time" 
                                    class="form-control datetimepicker-input"
                                    data-target="#datetimepicker3"
                                    id="buisiness_start_time"
                                />
                                <div class="input-group-text" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                            </div>
                            <div class="input-group date mb-3" id="buisiness_end_time" data-target-input="nearest">
                                <label for="datetimepicker3" class="pt-2 pr-2">終了日時：</label>
                                <input
                                    type="text"
                                    name="buisiness_end_time" 
                                    class="form-control datetimepicker-input"
                                    data-target="#datetimepicker3"
                                    id="buisiness_end_time"
                                />
                                <div class="input-group-text" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        
                        <label for="price_per_minute" class="block text-gray-700 text-sm font-bold mb-2">料金設定</label>
                        <input type="text" name="price_per_minute" id="price_per_minute" class="border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>



                    
                    
                    <div class="mb-4">
                        <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">特記事項</label>
                        <textarea name="notes" id="notes" rows="6" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required></textarea>
                    </div>
                    <!-- image_path -->
                    <div class="mb-4">
                        <x-input-label for="image_path" :value="__('画像のパス')" />
                        <x-text-input id="image_path" class="block mt-1 w-full" type="text" name="image_path" :value="old('image_path')" autocomplete="image_path" />
                        <x-input-error :messages="$errors->get('image_path')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="py-2 px-4 btn btn-primary">投稿する</button>
                        <a href="{{ route('post.index') }}" class="py-2 px-4 ml-4 btn btn-secondary">キャンセル</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</x-app-layout>
