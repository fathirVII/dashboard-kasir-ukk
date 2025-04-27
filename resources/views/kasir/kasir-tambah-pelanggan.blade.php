<div class="fixed  justify-center items-center z-30  backdrop-blur-sm inset-0" id="pelangganModal">
    <button id="toggleModal" type="button" class="absolute inset-0 z-40 cursor-pointer"></button>
      <div class="fixed w-[30rem] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-xl z-50 px-6 py-4 bg-[#262537] rounded-2xl shadow-md">

          <h1 class="text-lg font-bold uppercase mb-4">From Tambah Data Pelanggan</h1>
          <form action="{{ route('pelanggan.store') }}" method="POST" class="space-y-4">
              @csrf

              <div>
                  <label class="block mb-1 font-semibold">Nama</label>
                  <input type="text" name="username" required
                      class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
              </div>

              <div>
                  <label class="block mb-1 font-semibold">Alamat</label>
                  <input type="text" name="alamat" required
                      class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
              </div>

              <div>
                  <label class="block mb-1 font-semibold">No Telepon</label>
                  <input type="text" name="no_telepon" required
                      class="w-full p-2 rounded bg-[#35374E] border border-gray-600 text-white focus:outline-none focus:ring focus:ring-blue-400">
              </div>

              <div class="text-right">
                  <button type="submit"
                      class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Simpan</button>
              </div>
          </form>
      </div>
  </div>
