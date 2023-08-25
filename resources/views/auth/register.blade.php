<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- post_number -->
        <div class="mt-4">
            <x-input-label for="post_number" :value="__('郵便番号')" />
            <x-text-input id="post_number" class="block mt-1 w-full" type="text" name="post_number" :value="old('post_number')" required autocomplete="post_number" />
            <x-input-error :messages="$errors->get('post_number')" class="mt-2" />
        </div>

        
        <!-- adress -->
        <div class="mt-4">
        <x-input-label for="adress" :value="__('住所')" />
        <x-text-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required autocomplete="adress" />
        <x-input-error :messages="$errors->get('adress')" class="mt-2" />
        </div>

    <!-- tel -->
        <div class="mt-4">
        <x-input-label for="tel" :value="__('電話番号')" />
        <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required autocomplete="tel" />
        <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

    <!-- age -->
        <div class="mt-4">
        <x-input-label for="age" :value="__('年齢')" />
        <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autocomplete="age" />
        <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

    <!-- image_path -->
        <div>
        <!-- <x-input-label for="image_path" :value="__('画像のパス')" /> -->
        <x-text-input id="image_path" class="block mt-1 w-full" type="hidden" name="image_path" :value="old('image_path')" autocomplete="image_path" />
        <x-input-error :messages="$errors->get('image_path')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

