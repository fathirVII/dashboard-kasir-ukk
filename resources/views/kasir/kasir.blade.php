<x-app>
    <x-slot:title>
        Menu Kasir
    </x-slot:title>

    <div class="bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <h1 class="text-lg font-bold uppercase mb-4">Form Pembelian</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded-md mb-4">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="bg-orange-500 text-white p-2 rounded-md mb-4">{{ session('error') }}</div>
        @endif

        <form action="{{ route('kasir.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Pilih Pelanggan -->
            <label class="block mb-1 font-semibold">Pelanggan</label>
            <div class="flex w-full justify-between gap-2">
                <select name="id_pelanggan" required
                    class="w-full my-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
                    <option value="">Pilih Pelanggan</option>
                    @foreach ($pelanggan as $item)
                        <option value="{{ $item->id_pelanggan }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                <a href="{{ route('pelanggan.create') }}"
                    class="w-40 content-center my-2 px-2 bg-indigo-500 text-gray-200 rounded-md hover:bg-indigo-600 transition">
                    Daftar Pelanggan</a>
            </div>

            <!-- Pilih Produk dengan Card -->
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 mt-6">
                @foreach ($produk as $item)
                    <label for="produk-{{ $item->id_produk }}"
                        class="product-card group relative p-4 border border-gray-600 rounded-lg bg-[#35374E] hover:bg-[#4B4D66] transition cursor-pointer"
                        tabindex="0">
                        <input type="checkbox" name="produk[]" value="{{ $item->id_produk }}"
                            id="produk-{{ $item->id_produk }}"
                            class="absolute top-2 right-2 w-6 h-6 text-blue-500 border-none focus:ring-0 opacity-0">

                        <img src="https://cdn.thewirecutter.com/wp-content/media/2024/07/laptopstopicpage-2048px-3685-2x1-1.jpg?width=2048&amp;quality=75&amp;crop=2:1&amp;auto=webp"
                            alt="Product image"
                            class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

                        <p class="mt-2 text-lg font-medium text-gray-200">Nama: {{ $item->nama }}</p>
                        <p class="text-sm text-gray-200">Kategori: {{ $item->kategori }}</p>
                        <p class="text-sm text-gray-200">Harga: Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-200">Stok: {{ $item->stok }}</p>
                    </label>
                @endforeach
            </div>


            <!-- Input Jumlah untuk Setiap Produk -->
            <div id="produk-section" class="mt-6">
                @foreach ($produk as $item)
                    <div class="mt-4" id="jumlah_{{ $item->id_produk }}" style="display: none;">
                        <label class="block mb-1 font-semibold">Jumlah {{ $item->nama }}</label>
                        <input type="number" name="jumlah[]" id="jumlah_{{ $item->id_produk }}_input" min="1"
                            value="1"
                            class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
                    </div>
                @endforeach
            </div>

            <div class="text-right mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Simpan
                    Transaksi</button>
            </div>
        </form>
    </div>

    <script>
        // Menambahkan interaksi checkbox untuk menampilkan input jumlah produk
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const produkId = this.value;
                const jumlahInput = document.getElementById(`jumlah_${produkId}`);
                if (this.checked) {
                    jumlahInput.style.display = 'block';
                } else {
                    jumlahInput.style.display = 'none';
                }
            });
        });
        document.querySelectorAll('.product-card').forEach(function(card) {
            card.addEventListener('click', function() {
                // Reset all card background colors
                document.querySelectorAll('.product-card').forEach(function(item) {
                    item.classList.remove('bg-[#4363D0]');
                });

                // Add the focus color to the clicked card
                card.classList.add('bg-[#4363D0]');
            });
        });
    </script>
</x-app>
