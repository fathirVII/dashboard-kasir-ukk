<x-app>
    <x-slot:title>
        Dashboard Detail Pelanggan
    </x-slot:title>

    <div class=" bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        @include('components.card-modal-alert')
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
    </div>
    <div class="  bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">
        <form method="GET" action="{{ route('pelanggan.index') }}" class="my-6 flex">
            <input type="text" name="search" placeholder="Cari nama pelanggan....alamat"
                class="w-full p-2 rounded-l bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-r hover:bg-blue-700 transition">Cari</button>
        </form>
    </div>
    <div class="bg-[#262537] px-6 py-4 mt-4 rounded-2xl shadow-md">

        <div class="flex justify-between">
            <h1 class=" font-bold uppercase mb-4">Tabel Pelanggan</h1>
            <a href="{{ route('pelanggan.create') }}"
                class="px-3 py-1 mb-2 bg-green-500 text-gray-200 rounded-md hover:bg-green-600 transition">Tambah Data
                Pelanggan</a>
        </div>
        <div class="overflow-x-auto ">
            <table
                class="w-full text-[clamp(0.9rem,0.9vw,1rem)] border-collapse rounded-xl shadow-lg">
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
                                {{ $dataPenjualan->where('id_pelanggan', $item->id_pelanggan)->count() }}

                            </td>
                            <td class="px-4 py-3 space-x-2 flex max-md:flex-col gap-1">
                                <a href="{{ route('pelanggan.edit', $item->id_pelanggan) }}"
                                    class="px-3 py-1 bg-yellow-500 text-black rounded-md hover:bg-yellow-600 transition">Edit</a>
                                <form action="{{ route('pelanggan.destroy', $item->id_pelanggan) }}" method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Jika pelanggan di hapus riwayat penjualan akan ikut dihapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                        Delete
                                    </button>
                                </form>
                                <a href="{{ route('pelanggan.index', ['idPelanggan' => $item->id_pelanggan]) }}"
                                    id="toggleModal2"
                                    class="h-fit bg-blue-500 px-3 py-1 text-white font-bold rounded-lg cursor-pointer">
                                    Detail</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $dataPelanggan->links() }}

    </div>

    @php
        $request = request('idPelanggan') ?? ' ';
    @endphp

    <div class="fixed inset-0  bg-black/20 backdrop-blur-sm hiddenModal" id="pelangganModal">
        <div class="inset-0 flex justify-center">
            <div
                class="bg-[#262537] w-[50rem] px-6 py-4 mt-10 rounded-2xl shadow-md text-[clamp(0.9rem,1.4vw,1rem)] text-white">
                <div class="flex mb-2 justify-between">
                    <div class="">
                        <span class=" font-semibold">Pelanggan</span>
                        <p class="text-[clamp(1.3rem,1.3vw,2rem)] font-bold">{{ $namaSelected }}</p>
                        <span>Riwayat pembelian :
                            {{ $totalPembelian }}</span>
                    </div>
                    <form action="{{ route('pelanggan.destroy', $request) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="h-fit bg-red-500 px-3 py-1 text-white/ font-bold rounded-lg cursor-pointer">Hapus
                            Pelanggan</button>
                    </form>
                </div>
                <div class="min-h-[17rem] max-h-[20rem] mb-3 border-t-2 border-slate-200 overflow-y-auto">
                    @foreach ($pelangganSelected as $item)
                        <div class="w-full p-3 mt-3 rounded flex justify-between bg-[#35374E]">
                            <span class="font-bold">
                                <p class="">{{ $item->tanggal_penjualan }}</p>
                            </span>
                            <span class="font-bold text-center">
                                <p>Total Pembayaran</p>
                                <p>{{ $item->total_pembayaran }}</p>
                            </span>
                            <div class="flex flex-col gap-1">
                                <button
                                    class="h-fit bg-red-500 px-3 py-1 text-white/ font-bold rounded-lg cursor-pointer">Hapus
                                    Penjualan</button>
                                <a href="{{ route('detail-penjualan.index', $item->id_penjualan) }}"
                                    class="bg-blue-500 px-3 py-1 text-white/ font-bold rounded-lg cursor-pointer">Detail
                                    Penjualan</a>

                            </div>
                        </div>
                    @endforeach

                </div>
                <a href="{{ route('pelanggan.index') }}"
                    class="h-fit bg-blue-500 px-3 py-1 text-white font-bold rounded-lg cursor-pointer">&laquo;
                    kembali</a>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("DOMContentLoaded", () => {

            const pelangganModal = document.getElementById("pelangganModal");

            const params = new URLSearchParams(window.location.search);
            const idPelanggan = params.get('idPelanggan');

            // Trigger
            if (idPelanggan) {
                pelangganModal.classList.remove("hiddenModal");
                pelangganModal.classList.add("displayModal");
            } else {
                pelangganModal.classList.remove("displayModal");
                pelangganModal.classList.add("hiddenModal");
            };

        });
    </script>


</x-app>
