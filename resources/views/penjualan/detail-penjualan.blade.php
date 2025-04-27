<x-app>
    <x-slot:title>
        Dashboard Detail Penjualan
    </x-slot:title>
    <div class="bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        @include('components.card-modal-success')

    </div>
    <div class="bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <a href="{{ !$urlBack ? route('penjualan.index') : route('kasir.create') }}">
             <div class="bg-[#4363D0] py-1 px-4 rounded-md w-fit">&laquo; Kembali</div>
        </a>
        
    </div>
    <div class=" w-full flex justify-center mt-5 ">
        <div
            class="w-[30rem] font-serif bg-slate-100 px-6 py-4 mt-4 rounded-2xl shadow-md text-gray-800 text-[clamp(1rem,1vw,1rem)]">

            <div class="text-center mb-4 flex flex-col justify-center">
                <img src="{{ asset('image/LOGO-400px.png') }}" class="w-60 h-30 mx-auto mix-blend-darken" alt="">
                <p class="text-sm text-gray-2">
                    KAFE MAHARANA BRAGA
                </p>
                <p class="text-sm text-gray-2">
                    Jl. ABC No.44-46, Braga, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40111
                </p>
            </div>
            {{-- <p class="text-sm text-gray-2">
                    {{ \Carbon\Carbon::parse($penjualan->tanggal_penjualan)->format('d M Y, H:i') }}</p> --}}


            <table class="mb-4">
                <tr>
                    <td><span class="font-semibold">ID Penjualan</span></td>
                    <td>
                        <p>: {{ $penjualan->id_penjualan }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span class="font-semibold">Pelanggan</span></td>
                    <td>
                        <p>
                            : {{ $penjualan->pembeli->nama ?? 'Umum' }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span class="font-semibold">Alamat</span></td>
                    <td>
                        <p>
                            : {{ $penjualan->pembeli->alamat }}</p>
                    </td>
                </tr>
            </table>

            @php
                $totalPembayaran = 0;
            @endphp
            <table class="w-full border-t border-b my-2 text-sm">
                <thead>
                    <tr class=" text-left font-semibold">
                        <th class="w-1/4 py-2">Produk</th>
                        <th class="w-1/4 py-2 text-center">Qty x Harga</th>
                        <th class="w-1/4 py-2 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan->detail as $detail)
                        <tr class="border-t align-top">
                            <td class="w-1/4 py-2 whitespace-normal break-words">
                                {{ $detail->produk->nama }}
                            </td>
                            <td class="w-1/4 text-center py-2 whitespace-normal break-words">
                                {{ $detail->jumlah_barang }} x {{ number_format($detail->produk->harga) }}
                            </td>
                            <td class="w-1/4 text-right py-2 whitespace-normal break-words">
                                {{ number_format($detail->sub_total) }}
                            </td>
                        </tr>
                        @php $totalPembayaran += $detail->sub_total; @endphp
                    @endforeach
                </tbody>
            </table>




            <div class="flex justify-between text-lg font-semibold mt-4">
                <span>Total</span>
                <span>Rp {{ number_format($totalPembayaran) }}</span>
            </div>




        </div>
    </div>
</x-app>
