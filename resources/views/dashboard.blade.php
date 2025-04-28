<x-app>
    <x-slot name="title">Dashboard</x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 p-6">
        <a href="{{ route('kasir.create') }}"
            class="bg-[#4363D0] text-white p-6 rounded-2xl shadow-xl flex cursor-pointer items-center hover:bg-[#4a43d0] hover:translate-x-2 transform duration-300">
            <div class="w-16 h-16 flex items-center justify-center">
                <i class="ri-calculator-fill w-full h-full text-[3rem]"></i>
            </div>
            <div class="">
                <h2 class="text-xl font-semibold">Mulai Transaksi</h2>
            </div>
        </a>


    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
        <div class="bg-[#4363D0] text-white p-6 rounded-2xl shadow-xl">
            <h2 class="text-md font-semibold">Total Keseluruhan Penjualan</h2>
            <p class="text-2xl font-bold mt-2">Rp {{ number_format($totalKeuntungan, 0, ',', '.') }}</p>
        </div>

        <div class="bg-[#4CAF50] text-white p-6 rounded-2xl shadow-xl">
            <h2 class="text-md font-semibold">Jumlah Pelanggan</h2>
            <p class="text-2xl font-bold mt-2">{{ $jumlahPelanggan }}</p>
        </div>

        <div class="bg-[#9C27B0] text-white p-6 rounded-2xl shadow-xl">
            <h2 class="text-md font-semibold">Jumlah Produk</h2>
            <p class="text-2xl font-bold mt-2">{{ $jumlahProduk }}</p>
        </div>

        <div class="bg-[#FFC107] text-black p-6 rounded-2xl shadow-xl">
            <h2 class="text-md font-semibold">Total Penjualan</h2>
            <p class="text-2xl font-bold mt-2">{{ $jumlahPenjualan }}</p>
        </div>
    </div>
</x-app>
