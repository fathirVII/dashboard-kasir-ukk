<x-app>
    <x-slot:title>
        Tambah Edit Pelanggan
    </x-slot:title>

    <div class="bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <a href="{{ route('pelanggan.index') }}">
            <div class="bg-[#4363D0] py-1 px-4 rounded-md w-fit">&laquo; Kembali</div>
        </a>
    </div>
    <div class=" bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <h1 class="text-lg font-bold uppercase mb-4">From Edit Data Pelanggan</h1>


        <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')


            <div>
                <label class="block mb-1 font-semibold">Nama</label>
                <input type="text" name="nama" value="{{ $pelanggan->nama }}" required
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label class="block mb-1 font-semibold">Alamat</label>
                <input type="text" name="alamat" value="{{ $pelanggan->alamat }}" required
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label class="block mb-1 font-semibold">No Telepon</label>
                <input type="text" name="no_telepon" value="{{ $pelanggan->no_telepon }}" required
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
            </div>

            <div class="text-right">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Simpan</button>
            </div>
        </form>


    </div>

</x-app>
