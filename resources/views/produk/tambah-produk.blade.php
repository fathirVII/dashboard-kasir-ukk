<x-app>
    <x-slot:title>
        Tambah Data Produk
    </x-slot:title>

    <div class="bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <h1 class="text-lg font-bold uppercase mb-4">Form Tambah Data Produk</h1>

        <form action="{{ route('produk.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-semibold">Nama Produk</label>
                <input type="text" name="nama" required
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label class="block mb-1 font-semibold">Kategori</label>
                <select name="kategori" required
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
                    <option value="handphone & aksesoris">Handphone & Aksesoris</option>
                    <option value="komputer & aksesoris">Komputer & Aksesoris</option>
                    <option value="audio visual">Audio Visual</option>
                    <option value="peralatan rumah tangga elektronik">Peralatan Rumah Tangga Elektronik</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Harga</label>
                <input type="number" name="harga" required min="0"
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label class="block mb-1 font-semibold">Stok</label>
                <input type="number" name="stok" required min="0"
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
            </div>

            <div class="text-right">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Simpan</button>
            </div>
        </form>

    </div>

</x-app>
