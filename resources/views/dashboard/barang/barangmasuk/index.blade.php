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
                        <h3 class="text-lg font-semibold">Daftar Barang</h3>
                        <a href="{{ route('barangMasuk.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah</a>
                    </div>
                    <div x-data="modalData()">
                      
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
                                       <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Harga Modal</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Harga Jual</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Foto Barang</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Deskripsi</th>
                                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">aksi</th>
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
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">Rp {{ number_format($barang->harga_modal, 0, ',', '.') }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">
                                                <img src="{{ asset('storage/' . $barang->foto_barang) }}" alt="Foto {{ $barang->nama_barang }}" class="w-16 h-16 object-cover rounded">
                                             </td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $barang->deskripsi }}</td>
                                           
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('barangMasuk.edit', $barang->id) }}"
                                                    class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-700">
                                                    Edit
                                                </a>
                                                <button
                                                    @click="showData('{{ $barang->nama_barang }}', {{ $barang->id }})"
                                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-700 ml-2">
                                                    Hapus
                                                </button>
                                            </td>
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
    <script>
        function modalData() {
            return {
                showModal: false,
                idData: '',
                nameData: '',
                showData(name, id) {
                    this.nameData = name;
                    this.idData = id;
                    this.showModal = true;
                    console.log(this.nameData, this.idData);
                }
            }
        }
    </script>
    
</x-app-layout>