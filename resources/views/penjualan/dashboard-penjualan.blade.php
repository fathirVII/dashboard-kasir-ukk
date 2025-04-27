<x-app>
    <x-slot:title>
        Dashboard Detail Penjualan
    </x-slot:title>


    <div class=" bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <div class="">
            <h1 class="text-lg font-bold uppercase mb-4">Tabel Penjualan</h1>
            <table
                class="min-w-full text-[clamp(0.5rem,1vw,2rem)] border-collapse rounded-xl overflow-hidden shadow-lg">
                <thead class="bg-[#4363D0] text-white">
                    <tr>
                        <th class="px-3 py-2 text-left">No</th>
                        <th class="px-3 py-2 text-left">Nama</th>
                        <th class="px-3 py-2 text-left">Tanggal Penjualan</th>
                        <th class="px-3 py-2 text-left">Total Pembayaran</th>
                        <th class="px-3 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tfoot class="bg-[#262537] text-white">
                    <tr>
                        <th class="px-3 py-2 text-left">No</th>
                        <th class="px-3 py-2 text-left">Nama</th>
                        <th class="px-3 py-2 text-left">Tanggal Penjualan</th>
                        <th class="px-3 py-2 text-left">Total Pembayaran</th>
                        <th class="px-3 py-2 text-left">Action</th>
                    </tr>
                </tfoot>
                <tbody class="bg-[#35374E] text-[#cbd1ff]">
                    @foreach ($dataPenjualan as $item)
                        @php
                            $totalPembayaran = 0;
                        @endphp
                        <tr class="hover:bg-[#54577b] transition duration-300 border-b">
                            <td class="px-3 py-2">{{ $i++ }}</td>
                            <td class="px-3 py-2">{{ $item->pembeli->nama ?? 'Tidak Diketahui' }}</td>
                            <td class="px-3 py-2">
                                {{ \Carbon\Carbon::parse($item->tanggal_penjualan)->translatedFormat('d F') }}
                            </td>
                            @php
                                foreach ($item->detail as $data) {
                                    $totalPembayaran += $data->sub_total;
                                }
                            @endphp
                            <td class="px-3 py-2">Rp.{{ number_format($totalPembayaran, 0, ',', '.') }}</td>
                            <td class="px-3 py-2 space-x-2 flex">
                                <a href="{{ route('detail-penjualan.index', ['id_penjualan' => $item->id_penjualan]) }}"
                                    class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-700 transition">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dataPenjualan->links() }}

        </div>
    </div>
</x-app>
