<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿編集') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body mt-4">
                        <form method="POST" action="{{ route('post.update', $posts->id) }}">
                            @csrf
                            @method('PATCH')

                            <!-- post_number -->
                            <div class="form-group row">
                                <label for="post_number" class="col-md-4 col-form-label text-md-right">{{ __('郵便番号') }}</label>
                                <div class="col-md-6">
                                    <input id="post_number" type="text" class="form-control @error('post_number') is-invalid @enderror" name="post_number" value="{{ old('post_number', $posts->post_number) }}" required autofocus>
                                    @error('post_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- adress -->
                            <div class="form-group row">
                                <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('住所') }}</label>
                                <div class="col-md-6">
                                    <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress', $posts->adress) }}" required>
                                    @error('adress')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- buisiness_start_time -->
                            <div class="form-group row">
                                <label for="buisiness_start_time" class="col-md-4 col-form-label text-md-right">{{ __('営業開始時間') }}</label>
                                <div class="col-md-6">
                                    <input id="buisiness_start_time" type="text" class="form-control @error('buisiness_start_time') is-invalid @enderror" name="buisiness_start_time" value="{{ old('buisiness_start_time', $posts->buisiness_start_time) }}" required>
                                    @error('buisiness_start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- buisiness_end_time -->
                            <div class="form-group row">
                                <label for="buisiness_end_time" class="col-md-4 col-form-label text-md-right">{{ __('営業終了時間') }}</label>
                                <div class="col-md-6">
                                    <input id="buisiness_end_time" type="text" class="form-control @error('buisiness_end_time') is-invalid @enderror" name="buisiness_end_time" value="{{ old('buisiness_end_time', $posts->buisiness_end_time) }}" required>
                                    @error('buisiness_end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- price_per_minute -->
                            <div class="form-group row">
                                <label for="price_per_minute" class="col-md-4 col-form-label text-md-right">{{ __('料金(1分あたり)') }}</label>
                                <div class="col-md-6">
                                    <input id="price_per_minute" type="number" class="form-control @error('price_per_minute') is-invalid @enderror" name="price_per_minute" value="{{ old('price_per_minute', $posts->price_per_minute) }}" required>
                                    @error('price_per_minute')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- notes -->
                            <div class="form-group row">
                                <label for="notes" class="col-md-4 col-form-label text-md-right">{{ __('備考') }}</label>
                                <div class="col-md-6">
                                    <input id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes" value="{{ old('notes', $posts->notes) }}">
                                    @error('notes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- image_path -->
                            <div class="form-group row">
                                <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('画像のパス') }}</label>
                                <div class="col-md-6">
                                    <input id="image_path" type="text" class="form-control @error('image_path') is-invalid @enderror" name="image_path" value="{{ old('image_path', $posts->image_path) }}">
                                    @error('image_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('変更を保存する') }}
                                    </button>
                                    <a href="{{ route('myposts') }}" class="py-2 px-4 ml-4 btn btn-secondary">キャンセル</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
