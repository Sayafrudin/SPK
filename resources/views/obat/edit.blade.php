<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Obat / List Obat / Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-input-error class="mb-4" :errors="$errors" />
                    <form action="{{ route('obat.update', $obats->id_obat) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-row-3 gap-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div>
                                    <x-input-label for="nama_obat" :value="__('Nama Obat')" />
                                    <x-text-input id="nama_obat" class="mt-1 w-full" type="text" name="nama_obat"
                                        value="{{ $obats->nama_obat }}" />
                                </div>
                                <div>
                                    <x-input-label class="mb-1" for="id_parameter_obat_khusus" :value="__('Tipe Obat')" />
                                    <select name="id_parameter_obat_khusus" id="id_parameter_obat_khusus"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Pilih Kriteria</option>
                                        @foreach ($parameterObatKhusus as $parameter)
                                            <option value="{{ $parameter->id_parameter_obat_khusus }}"
                                                {{ $obats->id_parameter_obat_khusus == $parameter->id_parameter_obat_khusus ? 'selected' : '' }}>
                                                {{ $parameter->tipe_obat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <x-input-label class="mb-1" for="id_parameter_kadaluwarsa" :value="__('Tipe Obat')" />
                                    <select name="id_parameter_kadaluwarsa" id="id_parameter_kadaluwarsa"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Pilih Kriteria</option>
                                        @foreach ($parameterKadaluwarsa as $parameter)
                                            <option value="{{ $parameter->id_parameter_kadaluwarsa }}"
                                                {{ $obats->id_parameter_kadaluwarsa == $parameter->id_parameter_kadaluwarsa ? 'selected' : '' }}>
                                                {{ $parameter->tahun_kadaluwarsa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="harga" :value="__('Harga')" />
                                    <x-text-input id="harga" class="mt-1 w-full" type="number" name="harga"
                                        value="{{ $obats->harga }}" />
                                </div>

                                <div>
                                    <x-input-label for="stok" :value="__('Stok')" />
                                    <x-text-input id="stok" class="block mt-1 w-full" type="number" name="stok"
                                        value="{{ $obats->stok }}" />
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
</x-app-layout>
