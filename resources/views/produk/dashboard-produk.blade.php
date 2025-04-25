<x-app>
    <x-slot:title>
        Dashboard Stok Produk
    </x-slot:title>

    
    @if (session('success'))
        <div class=" bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
            <div class="bg-green-400 text-black p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session('delete'))
        <div class=" bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
            <div class="bg-red-400 text-white p-4 rounded-md mb-4">
                {{ session('delete') }}
            </div>
        </div>
    @endif

    <div class=" bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">

        <div class="flex justify-between mb-5">
            <h1 class="text-lg font-bold uppercase mb-4">Tabel Produk</h1>
            <a href="{{ route('produk.create') }}"
                class="px-3 py-1 mb-2 bg-green-500 text-gray-200 rounded-md hover:bg-green-600 transition">Tambah Data
                Produk</a>
        </div>


        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

            @foreach ($dataProduk as $item)
                <a href="{{ route('produk.edit', $item->id_produk) }}" class="group">
                    <img src="https://cdn.thewirecutter.com/wp-content/media/2024/07/laptopstopicpage-2048px-3685-2x1-1.jpg?width=2048&amp;quality=75&amp;crop=2:1&amp;auto=webp"
                        alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                        class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

                    <p class="mt-1 text-lg font-medium text-gray-200">Nama : {{ $item->nama }}</p>
                    <h3 class="mt-1 text-sm text-gray-200">Kategori : {{ $item->kategori }}</h3>
                    <h3 class="mt-1 text-sm text-gray-200">Harga : {{ $item->harga }}</h3>
                    <h3 class="mt-1 text-sm text-gray-200">Stok : {{ $item->stok }}</h3>
                </a>
            @endforeach
        </div>
    </div>
</x-app>
