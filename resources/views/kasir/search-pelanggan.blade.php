            <label class="block mb-1 font-semibold">Pelanggan</label>
            <div class="flex w-full justify-between gap-2">
                <select name="id_pelanggan" required id="select-pelanggan"
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400 select2 uppercase">
                    <option value="">Pilih Pelanggan</option>
                    @foreach ($pelanggan as $item)
                        <option
                            value="{{ $item->id_pelanggan }}"
                            {{ ($request = request('namaPelanggan') ?? '') == $item->nama ? 'selected' : '' }}>
                            {{ $item->nama }}</option>
                    @endforeach
                </select>

                <button id="toggleModal2" type="button"
                    class="w-40 content-center px-2 bg-indigo-500 text-gray-200 rounded-md hover:bg-indigo-600 transition cursor-pointer">
                    Daftarkan</button>
            </div>

