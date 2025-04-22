<x-app>
    <x-slot:title>
        Edit Data Produk
    </x-slot:title>

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
                    <option value="handphone & aksesoris"
                        {{ $produk->kategori == 'handphone & aksesoris' ? 'selected' : '' }}>Handphone & Aksesoris
                    </option>
                    <option value="komputer & aksesoris"
                        {{ $produk->kategori == 'komputer & aksesoris' ? 'selected' : '' }}>Komputer & Aksesoris
                    </option>
                    <option value="audio visual" {{ $produk->kategori == 'audio visual' ? 'selected' : '' }}>Audio
                        Visual</option>
                    <option value="peralatan rumah tangga elektronik"
                        {{ $produk->kategori == 'peralatan rumah tangga elektronik' ? 'selected' : '' }}>Peralatan Rumah
                        Tangga Elektronik</option>
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

            <div class="text-right">
                <form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">Hapus</button>
                </form>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Update</button>
            </div>
        </form>

    </div>

</x-app>
