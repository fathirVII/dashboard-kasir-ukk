  <label class="block mb-1 font-semibold">List Produk</label>
        <form action="{{ route('kasir.create') }}" method="get" class="space-y-4" id="searchForm">
            @csrf

            <!-- Pilih Produk -->
            <div class="flex w-full justify-between gap-2">
                <select name="kategori" id="kategori" required
                    class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400 uppercase">
                    <option value="_" {{ ($kategori ?? '') == '_' ? 'selected' : '' }}>Semua Produk</option>
                    <option value="coffe lokal" {{ ($kategori ?? '') == 'coffe lokal' ? 'selected' : '' }}>
                        coffe lokal
                    </option>
                    <option value="coffe luar" {{ ($kategori ?? '') == 'coffe luar' ? 'selected' : '' }}>
                        coffe luar
                    </option>
                    <option value="roti & pestri" {{ ($kategori ?? '') == 'roti & pestri' ? 'selected' : '' }}>
                        roti & pestri
                    </option>
                    <option value="lain-lain" {{ ($kategori ?? '') == 'lain-lain' ? 'selected' : '' }}>
                        lain-lain
                    </option>

                </select>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-r hover:bg-blue-700 transition">Cari</button>
            </div>
        </form>