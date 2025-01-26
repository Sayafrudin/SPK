<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SPK / Alternatif / Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-input-error class="mb-4" :errors="$errors" />
                    <form action="{{ route('spk.alternatif-store') }}" method="POST">
                        @csrf
                        <div class="grid grid-row-3 gap-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label class="mb-1" for="id_obat" :value="__('Nama Obat')" />
                                    <form class="max-w-sm mx-auto">
                                        <select name="id_obat" id="id_obat" 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="fetchData()">
                                            <option selected disabled>Pilih Obat</option>
                                            @foreach ($obats as $obat)
                                                <option value="{{ $obat->id_obat }}">
                                                    {{ $obat->nama_obat }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                                <div>
                                    <x-input-label for="kode_alternatif" :value="__('Kode Alternatif')" />
                                    <x-text-input id="kode_alternatif" class="mt-1 w-full" type="text" name="kode_alternatif" value="{{ $nextCode }}" readonly/>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="c1" :value="__('(C1) Penjualan Obat Sebulan')" />
                                    <x-text-input id="c1" class="mt-1 w-full" type="number" name="c1" readonly/>
                                </div>
                                <div>
                                    <x-input-label for="c2" :value="__('(C2) Kadaluwarsa Obat')" />
                                    <x-text-input id="c2" class="block mt-1 w-full" type="number"
                                        name="c2" readonly/>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="c3" :value="__('(C3) Obat Khusus')" />
                                    <x-text-input id="c3" class="mt-1 w-full" type="number" name="c3" readonly/>
                                </div>
                                <div>
                                    <x-input-label for="c4" :value="__('(C4) Banyak Persediaan')" />
                                    <x-text-input id="c4" class="block mt-1 w-full" type="number"
                                        name="c4" readonly/>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Create
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>  
        function fetchData() {  
            const idObat = document.getElementById('id_obat').value;  
  
            fetch(`/spk/alternatif/get-data/${idObat}`)  
                .then(response => response.json())  
                .then(data => {  
                    document.getElementById('c1').value = data.c1;  
                    document.getElementById('c2').value = data.c2;  
                    document.getElementById('c3').value = data.c3;  
                    document.getElementById('c4').value = data.c4;  
                })  
                .catch(error => console.error('Error fetching data:', error));  
        }  
    </script>  
</x-app-layout>
