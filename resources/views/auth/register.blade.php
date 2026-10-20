<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-teal-100 text-3xl">
            🏘️
        </div>

        <h1 class="text-2xl font-extrabold text-slate-900">
            Daftar Akun SuaraWarga
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-600">
            Buat akun untuk menyampaikan pengaduan dan memantau
            perkembangan laporanmu.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Nama Lengkap --}}
        <div>
            <x-input-label for="name" value="Nama Lengkap" />

            <x-text-input
                id="name"
                class="mt-1 block w-full rounded-xl"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                placeholder="Masukkan nama lengkap"
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Email --}}
        <div class="mt-4">
            <x-input-label for="email" value="Alamat Email" />

            <x-text-input
                id="email"
                class="mt-1 block w-full rounded-xl"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
                placeholder="contoh@email.com"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Kata Sandi --}}
        <div class="mt-4">
            <x-input-label for="password" value="Kata Sandi" />

            <x-text-input
                id="password"
                class="mt-1 block w-full rounded-xl"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="Buat kata sandi"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <p class="mt-1 text-xs text-slate-500">
                Gunakan kata sandi yang kuat dan mudah kamu ingat.
            </p>
        </div>

        {{-- Konfirmasi Kata Sandi --}}
        <div class="mt-4">
            <x-input-label
                for="password_confirmation"
                value="Konfirmasi Kata Sandi"
            />

            <x-text-input
                id="password_confirmation"
                class="mt-1 block w-full rounded-xl"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Masukkan kembali kata sandi"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        {{-- Tombol Daftar --}}
        <div class="mt-6">
            <x-primary-button class="w-full justify-center rounded-xl bg-teal-600 py-3 hover:bg-teal-700">
                Daftar Sekarang
            </x-primary-button>
        </div>

        {{-- Konfirmasi akun --}}
        <div class="mt-6 border-t border-slate-200 pt-5 text-center">
            <p class="text-sm text-slate-600">
                Sudah punya akun?
                <a
                    href="{{ route('login') }}"
                    class="font-bold text-teal-700 underline hover:text-teal-900"
                >
                    Masuk di sini
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>