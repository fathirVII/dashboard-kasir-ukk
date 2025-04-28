 <aside id="sidebar"
     class="bg-[#262537] w-[14.5rem] h-screen fixed top-0 left-0 shadow-md transition-transform duration-700 z-50 transform">
     <div class="font-medium text-lg py-4">

         <h2
             class="text-xl font-bold p-4 mt-2 mr-3 text-center bg-[#4363D0] text-[#F7F8FF] shadow-2xl rounded-r-3xl mb-6">
             AppKasir</h2>

         <nav class=" h-[37rem] flex flex-col justify-between space-y-2">
             <div class="flex flex-col space-y-2">
                 <a href="{{ route('dashboard') }}"
                     class="relative rounded-r-2xl hover:bg-[#4363D0] mr-2 px-4 py-2 text-[#F7F8FF] bg-[#1E1C29] transition 
                 {{ request()->is('/') || request()->is('dashboard') ? 'bg-[#4363D0]' : '' }}
                 ">
                     Dashboard
                 </a>
                 <a href="{{ route('penjualan.index') }}"
                     class="relative rounded-r-2xl hover:bg-[#4363D0] mr-2 px-4 py-2 text-[#F7F8FF] bg-[#1E1C29] transition 
                 {{ request()->is('penjualan') ? 'bg-[#4363D0]' : ' ' }}
                 ">
                     Data Penjualan
                 </a>
                 <a href="{{ route('pelanggan.index') }}"
                     class="relative rounded-r-2xl hover:bg-[#4363D0] mr-2 px-4 py-2 text-[#F7F8FF] bg-[#1E1C29] transition 
                 {{ request()->is('pelanggan') ? 'bg-[#4363D0]' : ' ' }}
                 ">
                     Data Pelanggan
                 </a>
                 <a href="{{ route('produk.index') }}"
                     class="relative rounded-r-2xl hover:bg-[#4363D0] mr-2 px-4 py-2 text-[#F7F8FF] bg-[#1E1C29] transition 
                 {{ request()->is('produk') ? 'bg-[#4363D0]' : ' ' }}
                 ">
                     Data Produk
                 </a>
                 <a href="{{ route('kasir.create') }}"
                     class="relative rounded-r-2xl hover:bg-[#4363D0] mr-2 px-4 py-2 text-[#F7F8FF] bg-[#1E1C29] transition 
                {{ request()->is('kasir/create') ? 'bg-[#4363D0]' : ' ' }}
                 ">
                     Manu Kasir
                 </a>
             </div>

             <form method="POST" action="{{ route('logout') }}" >
                 @csrf

                 <a href="{{route('logout')}}"
                     class="relative rounded-r-2xl hover:bg-[#4363D0] mr-2 px-4 py-2 text-[#F7F8FF] bg-red-700  transition space-y-2"
                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                     {{ __('Log Out') }}
                 </a>
             </form>
         </nav>
     </div>
 </aside>
