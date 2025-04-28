<x-app>
    <x-slot:title>
        Tambah Data Pelanggan
    </x-slot:title>
    <div class="bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <a href="{{ route('pelanggan.index') }}">
            <div class="bg-[#4363D0] py-1 px-4 rounded-md w-fit">&laquo; Kembali</div>
        </a>
    </div>
    <div class=" bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <h1 class="text-lg font-bold uppercase mb-4">From Tambah Data Pelanggan</h1>


        <form action="{{ route('pelanggan.store') }}" method="POST" class="space-y-4"  >
            @csrf

            <div>
                <label class="block mb-1 font-semibold">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}"
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
                <x-input-error :messages="$errors->get('nama')" class="mt-2"></x-input-error>

            </div>

            <div>
                <label class="block mb-1 font-semibold">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat') }}"
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
                <x-input-error :messages="$errors->get('alamat')" class="mt-2"></x-input-error>

            </div>

            {{-- INPUT NO TEL --}}
            <div>
                <label class="block mb-1 font-semibold" for="no_telepon">No Telepon</label>
                <div class="flex items-center space-x-2">
                    <!-- Kode negara +62 -->
                    <span class="text-md font-bold bg-[#35374E] p-2 rounded">+62</span>

                    <!-- Input nomor telepon -->
                    <input type="tel" id="no_telepon" name="no_telepon" placeholder="0909-0909-0909"
                        value="{{ old('no_telepon') }}"
                        class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400"
                        aria-describedby="no_telepon_error">
                </div>

                <!-- Menampilkan error jika ada -->
                <x-input-error :messages="$errors->get('no_telepon')" class="mt-2"></x-input-error>
            </div>
            {{-- INPUT NO TEL --}}


            <div class="text-right">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Simpan</button>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.7/dist/inputmask.min.js"></script>


    <script>
        // Terapkan input mask pada elemen input
        var input = document.getElementById('no_telepon');
        var mask = new Inputmask({
            mask: '+62 9999-9999-9999', 
            showMaskOnHover: false, 
            clearMaskOnLostFocus: true 
        });
        mask.mask(input);


    </script>

</x-app>
