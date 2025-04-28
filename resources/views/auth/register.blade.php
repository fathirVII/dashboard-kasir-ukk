<x-app>
    <x-slot:title>
        Regis
    </x-slot:title>

         <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
         <div class="bg-[#4363D0] text-white p-6 rounded-2xl shadow-xl">
             <h2 class="text-md font-semibold">Total Keseluruhan Penjualan</h2>
             <p class="text-2xl font-bold mt-2"></p>
         </div>

         <div class="bg-[#4CAF50] text-white p-6 rounded-2xl shadow-xl">
             <h2 class="text-md font-semibold">Jumlah Pelanggan</h2>
             <p class="text-2xl font-bold mt-2"></p>
         </div>

         <div class="bg-[#9C27B0] text-white p-6 rounded-2xl shadow-xl">
             <h2 class="text-md font-semibold">Jumlah Produk</h2>
             <p class="text-2xl font-bold mt-2">>
         </div>

         <div class="bg-[#FFC107] text-black p-6 rounded-2xl shadow-xl">
             <h2 class="text-md font-semibold">Total Penjualan</h2>
             <p class="text-2xl font-bold mt-2"></p>
         </div>
     </div>

    <div class="fixed inset-0 z-50 backdrop-blur-sm min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 shadow-md shadow-gray-100">
        <div class="w-20 h-20 fill-current text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M12.4142 5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5ZM4 5V19H20V7H11.5858L9.58579 5H4ZM11 9H13V17H11V9ZM15 12H17V17H15V12ZM7 14H9V17H7V14Z">
                </path>
            </svg>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">


            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nama Petugas')" />
                    <x-text-input id="name" class="block p-2 font-semibold mt-1 w-full" type="text"
                        name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block p-2 font-semibold mt-1 w-full" type="email"
                        name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Kata Sandi')" />

                    <x-text-input id="password" class="block p-2 font-semibold mt-1 w-full" type="password"
                        name="password" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

                    <x-text-input id="password_confirmation" class="block p-2 font-semibold mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('login') }}">
                        {{ __('Sudah pernah login?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
