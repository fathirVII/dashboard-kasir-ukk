<x-app>
    <x-slot:title>
        Dashboard Detail Penjualan
    </x-slot:title>
    <div class=" bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <div class="">
            <h1 class="text-lg font-bold uppercase mb-4">Tabel Pelanggan</h1>
            <table
                class="min-w-full text-[clamp(0.9rem,0.9vw,1rem)] border-collapse rounded-xl overflow-hidden shadow-lg">
                <thead class="bg-[#4363D0] text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Tanggal Penjualan</th>
                        <th class="px-4 py-3 text-left">Total Pembayaran</th>
                        <th class="px-4 py-3 text-left">Action</th>
                    </tr>
                </thead>
                <tfoot class="bg-[#262537] text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Tanggal Penjualan</th>
                        <th class="px-4 py-2 text-left">Total Pembayaran</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </tfoot>
                <tbody class="bg-[#35374E] text-[#cbd1ff]">
                    @foreach ($dataPenjualan as $item)
                        <tr class="hover:bg-[#54577b] transition duration-300 border-b">
                            <td class="px-4 py-3">{{ $i++ }}</td>
                            <td class="px-4 py-3">{{ $item->pembeli->nama ?? 'Tidak Diketahui' }}</td>
                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($item->tanggal_penjualan)->translatedFormat('d F') }}
                            </td>
                            <td class="px-4 py-3">Rp.{{ number_format($item->total_pembayaran, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 space-x-2 flex">
                                <a href="#"
                                    class="px-3 py-1 bg-yellow-500 text-black rounded-md hover:bg-yellow-600 transition">Edit</a>
                                <a href="#"
                                    class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">Delete</a>
                                <a href="{{route('detail-penjualan.index',['id_penjualan' => $item->id_penjualan])}}" 
                                    class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-700 transition">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app>
