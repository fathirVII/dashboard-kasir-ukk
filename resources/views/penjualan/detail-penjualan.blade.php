<x-app>
    <x-slot:title>
        Dashboard Detail Penjualan
    </x-slot:title>
    <div class=" bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <div class=" font-sans">

            <div class="text-center mb-4">
                <h1 class="text-xl font-bold">Detail Penjualan</h1>
                <p class="text-sm text-gray-2">
                   ID Penjualan {{$penjualan->id_penjualan}}</p>
                <p class="text-sm text-gray-2">
                    {{ \Carbon\Carbon::parse($penjualan->tanggal_penjualan)->format('d M Y, H:i') }}</p>
            </div>

            <div class="mb-4">
                <p><span class="font-semibold">ID Penjualan:</span> {{ $penjualan->id_penjualan }}</p>
                <p><span class="font-semibold">Pelanggan:</span>
                    {{ $penjualan->pembeli->nama ?? 'Umum' }}</p>
                <p><span class="font-semibold">Alamat:</span>
                    {{ $penjualan->pembeli->alamat}}</p>
            </div>

            <div class="border-t border-b py-2 my-2">
                <div class="flex justify-between font-semibold text-gray-200">
                    <span class="w-1/4 truncate">Produk</span>
                    <span class="w-1/4 truncate">Id Produk</span>
                    <span class="w-1/4 text-center">Qty x Harga</span>
                    <span class="w-1/4 text-right">Subtotal</span>
                </div>
                @php
                    $totalPembayaran = 0;
                @endphp

                @foreach ($penjualan->detail as $detail)
                    <div class="flex justify-between text-sm text-gray-200 mt-1">
                        <span class="w-1/4 truncate">{{ $detail->produk->nama }}</span>
                        <span class="w-1/4 truncate">{{ $detail->produk->id_produk }}</span>
                        <span class="w-1/4 text-center">{{ $detail->jumlah_barang }} x
                            {{ number_format($detail->produk->harga) }}</span>
                        <span class="w-1/4 text-right">{{ number_format($detail->sub_total) }}</span>
                    </div>
                    @php
                        $totalPembayaran += $detail->sub_total;
                    @endphp
                @endforeach
            </div>

            <div class="flex justify-between text-lg font-semibold mt-4">
                <span>Total</span>
                <span>Rp {{ number_format($totalPembayaran) }}</span>
            </div>

 


        </div>
    </div>
</x-app>
