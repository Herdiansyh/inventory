<x-app-layout>

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
                            <label for="qty_in" class="block text-sm font-medium text-gray-700 dark:text-gray-300">jumlah masuk</label>
                            <input type="text" name="qty_in" id="qty_in"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div>
                     
                        {{-- <div class="mb-4">
                            <label for="jumlah" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah masuk</label>
                            <input type="number" name="jumlah" id="jumlah" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                        </div> --}}
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
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                            <select name="type" id="type" class="mt-1 p-2 w-full border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300">
                                <option value="in">In</option>
                                <option value="out">Out</option>
                            </select>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <a href="{{ route('barangMasuk.index') }}"
                           class="mt-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">Back</a>
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