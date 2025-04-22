<x-app>
    <x-slot:title>
        Dashboard Detail Pelanggan
    </x-slot:title>
    <div class=" bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        @if (session('success'))
            <div class="bg-green-400 text-black p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="bg-red-400 text-white p-4 rounded-md mb-4">
                {{ session('delete') }}
            </div>
        @endif
        <div class="flex justify-between">
            <h1 class="text-lg font-bold uppercase mb-4">Tabel Pelanggan</h1>
            <a href="{{ route('pelanggan.create') }}"
                class="px-3 py-1 mb-2 bg-green-500 text-gray-200 rounded-md hover:bg-green-600 transition">Tambah Data
                Pelanggan</a>
        </div>
        <table class="min-w-full text-[clamp(0.9rem,0.9vw,1rem)] border-collapse rounded-xl overflow-hidden shadow-lg">
            <thead class="bg-[#4363D0] text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left max-lg:hidden">Alamat</th>
                    <th class="px-4 py-3 text-left">No Telepon</th>
                    <th class="px-4 py-3 text-left">Jumlah Pembelian</th>
                    <th class="px-4 py-3 text-left">Action</th>
                </tr>
            </thead>
            <tfoot class="bg-[#262537] text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left max-lg:hidden">Alamat</th>
                    <th class="px-4 py-3 text-left">No Telepon</th>
                    <th class="px-4 py-3 text-left">Jumlah Pembelian</th>
                    <th class="px-4 py-3 text-left">Action</th>
                </tr>
            </tfoot>
            <tbody class="bg-[#35374E] text-[#cbd1ff]">
                @foreach ($dataPelanggan as $item)
                    <tr class="hover:bg-[#54577b] transition duration-300 border-b">
                        <td class="px-4 py-3">{{ $i++ }}</td>
                        <td class="px-4 py-3">{{ $item->nama ?? 'Tidak Diketahui' }}</td>
                        <td class="px-4 py-3 max-lg:hidden">{{ $item->alamat ?? 'Tidak Diketahui' }}</td>
                        <td class="px-4 py-3">
                            {{ $item->no_telepon }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $dataPenjualan->where('id_pelanggan', $item->id_pelanggan)->count() }}</td>
                        <td class="px-4 py-3 space-x-2 flex">
                            <a href="{{ route('pelanggan.edit', $item->id_pelanggan) }}"
                                class="px-3 py-1 bg-yellow-500 text-black rounded-md hover:bg-yellow-600 transition">Edit</a>
                            <form action="{{ route('pelanggan.destroy', $item->id_pelanggan) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</x-app>
