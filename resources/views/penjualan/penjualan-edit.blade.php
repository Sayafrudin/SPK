<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Obat / Penjualan / Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-input-error class="mb-4" :errors="$errors" />
                    <form action="{{ route('penjualan.update', $penjualans->id_penjualan) }}" method="POST">
                        @csrf  
                        @method('PUT')
                        <div class="grid grid-row-3 gap-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label class="mb-1" for="id_obat" :value="__('Nama Obat')" />
                                    <form class="max-w-sm mx-auto">

                                        <select name="id_obat" id="id_obat" 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="updatePrice()"">
                                            <option selected disabled>Pilih Tipe Obat</option>
                                            @foreach ($obats as $obat)
                                                <option value="{{ $obat->id_obat }}" {{ $obat->id_obat == $penjualans->id_obat ? 'selected' : '' }} data-harga="{{ $obat->harga }}">
                                                    {{ $obat->nama_obat }} | Stok : {{ $obat->stok }} | Rp.{{ $obat->harga }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                                <div>
                                    <x-input-label for="jumlah" :value="__('Jumlah Obat Terjual')" />
                                    <x-text-input id="jumlah" class="mt-1 w-full" type="number" name="jumlah" value="{{ $penjualans->jumlah }}" oninput="calculateTotal()"/>
                                </div>

                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="total_harga" :value="__('Total Harga')" />
                                    <x-text-input id="total_harga" class="mt-1 w-full" type="number" name="total_harga" value="{{ $penjualans->total_harga }}" readonly />
                                </div>

                                <div>
                                    <x-input-label for="tanggal_penjualan" :value="__('Tanggal Penjualan')" />
                                    <x-text-input id="tanggal_penjualan" class="block mt-1 w-full" type="date"
                                        name="tanggal_penjualan" value="{{ $penjualans->tanggal_penjualan }}"/>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>  
        function calculateTotal() {  
            const jumlah = document.getElementById('jumlah').value;  
            const selectedObat = document.getElementById('id_obat').options[document.getElementById('id_obat').selectedIndex];  
            const harga = selectedObat ? selectedObat.getAttribute('data-harga') : 0;  
            const totalHarga = jumlah * harga;  
            document.getElementById('total_harga').value = totalHarga;  
        }  
  
        function updatePrice() {  
            calculateTotal(); // Update total harga saat obat dipilih  
        }  
    </script>  
</x-app-layout>
