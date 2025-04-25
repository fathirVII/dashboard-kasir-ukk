<x-app>
    <x-slot:title>
        Menu Kasir
    </x-slot:title>

    <div class="bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <h1 class="text-lg font-bold uppercase mb-4">Form Pembelian</h1>

        @include('components.card-modal-success')
        @include('components.card-modal-warning')

        <form action="{{ route('kasir.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Pilih Pelanggan -->
            <label class="block mb-1 font-semibold">Pelanggan</label>
            <div class="flex w-full justify-between gap-2">
                <select name="id_pelanggan" required id="select-pelanggan"
                    class="w-full my-2 rounded bg-[#35374E] border border-gray-600 text-white select2">
                    <option value="">Pilih Pelanggan</option>
                    @foreach ($pelanggan as $item)
                        <option value="{{ $item->id_pelanggan }}">{{ $item->nama }}</option>
                    @endforeach
                </select>

                <a href="{{ route('pelanggan.create') }}"
                    class="w-40 content-center my-2 px-2 bg-indigo-500 text-gray-200 rounded-md hover:bg-indigo-600 transition">
                    Daftar Pelanggan</a>
            </div>


            <!-- Pilih Produk Card -->

            <div class="flex gap-4">
                <div class="w-4/6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 px-10 mt-6">
                    @foreach ($produk as $item)
                        <label for="produk-{{ $item->id_produk }}"
                            class="product-card group relative p-4 border border-gray-600 rounded-lg bg-[#35374E] hover:bg-[#4B4D66] transition cursor-pointer"
                            tabindex="0">
                            <input type="checkbox" name="produk[]" value="{{ $item->id_produk }}"
                                data-harga="{{ $item->harga }}" id="produk-{{ $item->id_produk }}"
                                onchange="toggleJumlah(this)"
                                class="absolute bottom-2 right-2 w-6 h-6 text-blue-500 border-none focus:ring-0">

                            <img src="https://cdn.thewirecutter.com/wp-content/media/2024/07/laptopstopicpage-2048px-3685-2x1-1.jpg"
                                alt="Product image"
                                class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75">

                            <p class="mt-2 text-lg font-medium text-gray-200">Nama: {{ $item->nama }}</p>
                            <p class="text-sm text-gray-200">Kategori: {{ $item->kategori }}</p>
                            <p class="text-sm text-gray-200">Harga: Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </p>
                            <p class="text-sm text-gray-200">Stok: {{ $item->stok }}</p>
                        </label>
                    @endforeach
                </div>

                {{-- jumlah & total --}}


                <div class="w-2/6 bg-[#35374E] p-4 rounded-2xl shadow-md mt-6 flex flex-col justify-between">
                    <div>
                        <h2 class="text-white text-lg font-semibold mb-4">Jumlah Barang</h2>

                        @foreach ($produk as $item)
                            <div class="mb-4" id="jumlah_{{ $item->id_produk }}" style="display: none;">
                                <label for="jumlah_{{ $item->id_produk }}_input" class="block text-sm text-white mb-1">
                                    {{ $item->nama }}
                                </label>
                                <input type="number" name="jumlah[{{ $item->id_produk }}]"
                                    id="jumlah_{{ $item->id_produk }}_input" min="1" value="1"
                                    class="w-full p-2 rounded bg-[#262537] border border-gray-600 text-white jumlah-input"
                                    data-id="{{ $item->id_produk }}" data-harga="{{ $item->harga }}" disabled>
                            </div>
                        @endforeach
                    </div>

                    <div>
                        <div class="border-t border-gray-500 pt-4">
                            <p class="text-white text-sm">Total Tagihan:</p>
                            <p id="totalTagihan" class="text-white text-xl font-bold">Rp</p>
                        </div>

                        <button type="submit"
                            class="w-full mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                            Simpan Transaksi
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        function toggleJumlah(checkbox) {
            const id = checkbox.value;
            const jumlahContainer = document.getElementById('jumlah_' + id);
            const inputJumlah = document.getElementById('jumlah_' + id + '_input');

            if (checkbox.checked) {
                jumlahContainer.style.display = 'block';
                inputJumlah.disabled = false;
            } else {
                jumlahContainer.style.display = 'none';
                inputJumlah.disabled = true;
            }

            hitungTotal();
        }

        document.querySelectorAll('.jumlah-input').forEach(input => {
            input.addEventListener('input', hitungTotal);
        });

        function hitungTotal() {
            let total = 0;

            document.querySelectorAll('.jumlah-input').forEach(input => {
                if (!input.disabled) {
                    const harga = parseInt(input.dataset.harga);
                    const jumlah = parseInt(input.value) || 0;
                    total += harga * jumlah;
                }
            });

            document.getElementById('totalTagihan').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }
        $(document).ready(function() {
            $('#select-pelanggan').select2({
                placeholder: "Cari atau pilih pelanggan",
                width: '100%',
                theme: 'classic',
            });
        });
    </script>

</x-app>
