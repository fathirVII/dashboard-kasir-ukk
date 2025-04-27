<x-app>
    <x-slot:title>
        Menu Kasir
    </x-slot:title>

    <div class="bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <h1 class="text-lg font-bold uppercase mb-4">Form Pembelian</h1>
        @include('components.card-modal-success')
        @include('components.card-modal-warning')
    </div>

    @include('kasir.kasir-tambah-pelanggan')

    {{-- List Produk --}}
    <div class=" bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">

        <div class=" flex gap-4">
            <div class="w-4/6 max-lg:w-full">
                <div class="bg-[#35374E] p-2 mb-3 rounded-2xl min-lg:hidden">
                    @include('kasir.search-pelanggan')
                </div>
                <div class="bg-[#35374E] p-2 rounded-2xl">
                    @include('kasir.search-kategori')
                </div>

                <!-- Pilih Produk Card -->
                <form action="{{ route('kasir.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div
                        class="h-[40rem] p-5 overflow-y-auto max-md:w-full grid grid-cols-1 gap-3 max-md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 max-md:px-2 mt-3">
                        @foreach ($produk as $item)
                            <label
                                class="max-md:h-full h-fit group relative p-4 border border-gray-600 rounded-2xl bg-[#35374E] text-[clamp(0.7rem,0.8vw,1.3rem)] transition cursor-pointer {{ $item->stok > 0 ? 'hover:bg-[#4363D0]' : 'hover:bg-red-500' }}"
                                tabindex="0">
                                <input type="checkbox" name="produk[]" value="{{ $item->id_produk }}"
                                    data-harga="{{ $item->harga }}" id="produk-{{ $item->id_produk }}"
                                    onchange="toggleJumlah(this)"
                                    class="absolute bottom-2 right-2 w-6 h-6 text-blue-500 border-none focus:ring-0"
                                    @if ($item->stok == 0) disabled @endif>
                                <p
                                    class=" absolute left-1 top-1 z-20  font-medium rounded-lg px-2 capitalize {{ $item->stok > 0 ? 'text-green-400 bg-green-800' : 'text-orange-400 bg-red-800' }}">
                                    Stok {{ $item->stok > 0 ? $item->stok : 'habis' }}</p>
                                <img src="{{ asset('image/defult-image.png') }}" alt="Product image"
                                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75">

                                <p class="mt-2  font-medium text-gray-200 capitalize">{{ $item->nama }}</p>

                                <p class=" font-semibold text-gray-200">Harga: Rp
                                    {{ number_format($item->harga, 0, ',', '.') }}
                                </p>
                                <p class="text-sm text-gray-200">Kategori: {{ $item->kategori }}</p>
                            </label>
                        @endforeach
                    </div>
            </div>

            {{-- jumlah & total --}}
            <div class="w-2/6 max-lg:w-0">
                <div class="bg-[#35374E] p-2 rounded-2xl max-lg:hidden">
                    @include('kasir.search-pelanggan')
                </div>
                <div class=" fixed right-2 top-15  min-lg:hidden">
                    <button id="modalCardToggle2"><i
                            class="ri-arrow-left-box-fill text-[2rem] text-white cursor-pointer"></i></button>
                </div>
                <div id="modalCardJumlah"
                    class="min-h-[40rem] max-lg:w-screen max-lg:fixed max-lg:bottom-2 max-lg:left-0
                    bg-[#35374E] z-30 p-4 mt-3 rounded-2xl flex flex-col justify-between transition-transform duration-700 transform">
                    <div class="flex justify-between">
                        <h2 class="text-white text-lg font-semibold mb-4 ml-2">Jumlah Barang</h2>
                        <button class="min-lg:hidden" id="modalCardToggle"><i
                                class="ri-arrow-right-box-fill text-[2rem] text-white cursor-pointer"></i></button>
                    </div>
                    <div class="h-[15rem] bg-[#4b4e69] overflow-y-auto rounded-md p-2">

                        @foreach ($produk as $item)
                            <div class="mb-4" id="jumlah_{{ $item->id_produk }}" style="display: none;">
                                <label for="jumlah_{{ $item->id_produk }}_input"
                                    class="block text-lg text-white mb-1 uppercase font-bold">
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
                            <p id="totalTagihan" class="text-white text-xl font-bold">Rp 0</p>
                        </div>
                        <div class="border-t border-gray-500 pt-4 mt-4">
                            <div class="flex justify-between items-center">
                                <p class="text-white text-sm mb-2">Bayar Cash:</p>
                                <button onclick="tambahBayar(5000)" type="button"
                                    class="bg-orange-400 font-bold px-2 rounded-md">5.000</button>
                                <button onclick="tambahBayar(10000)" type="button"
                                    class="bg-purple-500 font-bold px-2 rounded-md">10.000</button>
                                <button onclick="tambahBayar(20000)" type="button"
                                    class="bg-green-600 font-bold px-2 rounded-md">20.000</button>
                                <button onclick="tambahBayar(50000)" type="button"
                                    class="bg-blue-600 font-bold px-2 rounded-md">50.000</button>
                            </div>
                            <input type="number" required oninvalid="this.setCustomValidity('Jumlah pembayaran.')"
                                oninput="this.setCustomValidity('')" id="bayar" placeholder="Masukkan nominal bayar"
                                class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
                        </div>
                        <div class="border-t border-gray-500 pt-4 mt-4 flex justify-between">
                            <div class="">
                                <p class="text-white text-sm">Total Kembalian:</p>
                                <p id="kembalian" class="text-white text-xl font-bold">Rp 0</p>
                            </div>
                            <input type="checkbox" class="w-8 h-8 text-blue-500 border-none focus:ring-0 mt-4" required
                                oninvalid="this.setCustomValidity('Konfirmasi Transaksi.')"
                                oninput="this.setCustomValidity('')">

                        </div>
                        <button type="submit"
                            class="w-full mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                            Simpan Transaksi
                        </button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @include('kasir.kasir-script')

</x-app>
