<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barang Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">Daftar Kost</h3>
                        <a href="#"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah</a>
                    </div>
                    <div x-data="modalData()">
                        <div x-show="showModal" @click.away="showModal = false"
                            class="fixed z-10 inset-0 overflow-y-auto bg-gray-500 bg-opacity-75 transition-opacity">
                            <div
                                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div x-show="showModal"
                                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                    aria-hidden="true"></div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                    aria-hidden="true">&#8203;</span>
                                <div x-show="showModal"
                                    class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                    <div>
                                        <div
                                            class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-5">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100"
                                                id="modal-title">Konfirmasi Penghapusan</h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500 dark:text-gray-300">Apakah Anda
                                                    yakin ingin menghapus data <span
                                                        class="text-red-400">{{ $title }} <span
                                                            x-text="nameData">? <span id="idData"></span></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                                        <button @click="showModal = false" type="button"
                                            class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700">Batal</button>
                                        {{-- <form x-bind:action="`/kost/${idData}`" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 sm:text-sm"
                                                @click="showModal = false">Ya, Hapus</button>
                                        </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full border border-gray-300 divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">ID</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Nama Barang</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Merk</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Kategori</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Sub Kategori</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Ukuran</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Satuan</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Tanggal Masuk</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Tanggal Keluar</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Jumlah</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Harga Modal</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Harga Jual</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Foto Barang</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @forelse ($barangs as $barang)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $barang->id }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100 capitalize">{{ $barang->nama_barang }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $barang->merk }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $barang->kategori }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $barang->sub_kategori }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $barang->ukuran }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $barang->satuan }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $barang->tanggal_masuk }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $barang->tanggal_keluar }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $barang->jumlah }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">Rp {{ number_format($barang->harga_modal, 0, ',', '.') }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">
                                                <img src="{{ asset('storage/'.$barang->foto_barang) }}" alt="Foto {{ $barang->nama_barang }}" class="w-16 h-16 object-cover rounded">
                                            </td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $barang->deskripsi }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="14" class="px-6 py-4 text-center text-gray-900 dark:text-gray-100">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        {{-- {{ $kosts->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('barangMasuk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="merk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Merk</label>
                            <input type="text" name="merk" id="merk"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                            <input type="text" name="kategori" id="kategori"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="sub_kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sub Kategori</label>
                            <input type="text" name="sub_kategori" id="sub_kategori"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="ukuran" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ukuran</label>
                            <input type="text" name="ukuran" id="ukuran"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="satuan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Satuan</label>
                            <input type="text" name="satuan" id="satuan"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Keluar</label>
                            <input type="date" name="tanggal_keluar" id="tanggal_keluar" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="jumlah" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="harga_modal" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Modal</label>
                            <input type="number" step="0.01" name="harga_modal" id="harga_modal" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="harga_jual" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Jual</label>
                            <input type="number" step="0.01" name="harga_jual" id="harga_jual" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="foto_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Barang</label>
                            <input type="file" name="foto_barang" id="foto_barang"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <a href="" class="mt-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">Back</a>
                            </div>
                            <div class="text-right">
                                <button type="reset" class="bg-red-500 hover:bg-gray-700 font-bold py-2 px-4 rounded-lg text-sm">Reset</button>
                                <button type="submit" class="bg-blue-500 hover:bg-gray-700 font-bold py-2 px-4 rounded-lg text-sm">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
