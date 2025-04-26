<x-app>
    <x-slot:title>
        Edit Data Produk
    </x-slot:title>
    <div class="bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <a href="{{route('produk.index')}}">
            <div class="bg-[#4363D0] py-1 px-4 rounded-md w-fit">&laquo; Kembali</div>
        </a>
    </div>
    <div class="bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <h1 class="text-lg font-bold uppercase mb-4">Form Edit Data Produk</h1>

        <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-semibold">Nama Produk</label>
                <input type="text" name="nama" value="{{ old('nama', $produk->nama) }}" required
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label class="block mb-1 font-semibold">Kategori</label>
                <select name="kategori" required
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
                    <option value="coffe lokal"
                        {{ $produk->kategori == 'coffe lokal' ? 'selected' : '' }}>
                        coffe lokal</option>
                    <option value="coffe luar"
                        {{ $produk->kategori == 'coffe luar' ? 'selected' : '' }}>
                        coffe luar</option>
                    <option value="roti & pestri" {{ $produk->kategori == 'roti & pestri' ? 'selected' : '' }}>
                        roti & pestri
                    </option>
                    <option value="lain-lain"
                        {{ $produk->kategori == 'lain-lain' ? 'selected' : '' }}>
                        lain-lain</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}" required min="0"
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label class="block mb-1 font-semibold">Stok</label>
                <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}" required min="0"
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
            </div>

            <div class="text-right flex justify-between">
                <!-- Tombol Hapus di luar form update -->
                
                <button type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Update</button>
            </div>
        </form>
        <form class="ml-30 -translate-y-10 flex justify-end " action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST"
            onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">Hapus</button>
        </form>


    </div>

</x-app>
