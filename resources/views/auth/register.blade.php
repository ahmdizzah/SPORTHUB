<div>
    <x-guest-layout>
        <div class="mb-4">
            <h1 class="text-2xl font-bold">Hello, Friend!</h1>
            <p class="text-gray-600">Register with your personal details to use all of site features</p>
        </div>
        {{-- menampilkan pesan error jika gagal register --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>

            <div class="mt-4">
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="confirm_password" :value="__('Confirm Password')" />
                <x-text-input id="confirm_password" class="block mt-1 w-full" type="password" name="confirm_password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
            </div>
            {{-- Tanggal lahir --}}
            <div class="mt-4">
                <x-input-label for="tgl_lahir" :value="__('Birthdate')" />
                <x-text-input id="tgl_lahir" class="block mt-1 w-full" type="date" name="tgl_lahir" :value="old('tgl_lahir')" required autocomplete="tgl_lahir" />
                <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2" />
            </div>

            {{-- Berat badan --}}
            <div class="mt-4">
                <x-input-label for="berat_badan" :value="__('Weight')" />
                <x-text-input id="berat_badan" class="block mt-1 w-full" type="number" name="berat_badan" :value="old('berat_badan')" required autocomplete="berat_badan" />
                <x-input-error :messages="$errors->get('berat_badan')" class="mt-2" />
            </div>

            {{-- Tinggi badan --}}
            <div class="mt-4">
                <x-input-label for="tinggi_badan" :value="__('Height')" />
                <x-text-input id="tinggi_badan" class="block mt-1 w-full" type="number" name="tinggi_badan" :value="old('tinggi_badan')" required autocomplete="tinggi_badan" />
                <x-input-error :messages="$errors->get('tinggi_badan')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</div>
