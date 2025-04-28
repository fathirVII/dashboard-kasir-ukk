 <x-app>
     <x-slot:title>
         Welcome
     </x-slot:title>

     <x-slot name="title">Dashboard</x-slot>

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

     <div class=" fixed inset-0 z-50 backdrop-blur-lg min-h-screen flex items-center justify-center bg-blue-100/5">
         <div class="  rounded-xl p-6 w-full max-w-xl">
            <div class="w-full flex justify-center mb-7 text-[clamp(2rem,1.6vw,4rem)] font-extrabold">
                <h1>AppKasir</h1>
            </div>

             <header class="w-full text-sm mb-6">
                 @if (Route::has('login'))
                     <nav class="flex flex-col items-center justify-center gap-7">
                         @auth
                             <a href="{{ url('/dashboard') }}"
                                 class="w-full text-center py-2 text-xl font-bold text-blue-100 bg-blue-900 rounded-md hover:text-blue-300 hover:-translate-y-1 transform duration-300 border-blue-800">
                                 Dashboard
                             </a>
                         @else
                             <a href="{{ route('login') }}"
                                 class=" w-full text-center py-2 text-xl font-bold text-blue-100 bg-blue-900 rounded-md hover:text-blue-300 hover:-translate-y-1 transform duration-300 border-blue-800 ">
                                 Log in
                             </a>

                             @if (Route::has('register'))
                                 <a href="{{ route('register') }}"
                                     class=" w-full text-center py-2 text-xl font-bold text-blue-100 bg-blue-900 rounded-md hover:text-blue-300 hover:-translate-y-1 transform duration-300 border-blue-800 ">
                                     Register
                                 </a>
                             @endif
                         @endauth
                     </nav>
                 @endif
             </header>

             @if (Route::has('login'))
                 <div class="h-14.5 hidden lg:block"></div>
             @endif
         </div>
     </div>

 </x-app>
