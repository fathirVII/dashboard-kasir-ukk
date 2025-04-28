            <label class="block mb-1 font-semibold">Pelanggan</label>
            <div class="flex w-full justify-between gap-2">
                <select name="id_pelanggan" required id="select-pelanggan"
                    oninvalid="this.setCustomValidity('Isi dulu siapa pelanggan.')" oninput="this.setCustomValidity('')"
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400 uppercase select2">
                    <option value="">Pilih Pelanggan</option>
                    @foreach ($pelanggan as $item)
                        <option value="{{ $item->id_pelanggan }}"
                            {{ (request('namaPelanggan') ?? '') == $item->nama ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>


                <button onclick="document.getElementById('pelangganModal').style.display = 'block'" type="button"
                    class="w-40 content-center px-2 bg-indigo-500 text-gray-200 rounded-md hover:bg-indigo-600 transition cursor-pointer">
                    Daftarkan</button>
            </div>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


            <script>
                $(document).ready(function() {
                    $('#select-pelanggan').select2({
                        placeholder: 'Cari Pelanggan',
                        allowClear: true
                    });
                });
            </script>
