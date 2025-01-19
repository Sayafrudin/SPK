<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SPK / Kriteria / Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-input-error class="mb-4" :errors="$errors" />
                    <form action="{{ route('spk.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-row-3 gap-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="kode_kriteria" :value="__('Kode Kriteria')" />
                                    <x-text-input id="kode_kriteria" class="mt-1 w-full" type="text"
                                        name="kode_kriteria" />
                                </div>
                                <div>
                                    <x-input-label for="nama_kriteria" :value="__('Nama Kriteria')" />
                                    <x-text-input id="nama_kriteria" class=" mt-1 w-full" type="text"
                                        name="nama_kriteria" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label class="mb-1" for="tipe_kriteria" :value="__('Bobot')" />
                                    <form class="max-w-sm mx-auto">

                                        <select name="tipe_kriteria" id="tipe_kriteria"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected disabled>Pilih Kriteria</option>
                                            <option value="Benefit">Benefit</option>
                                            <option value="Cost">Cost</option>
                                        </select>
                                    </form>
                                </div>

                                <div>
                                    <x-input-label for="bobot" :value="__('Bobot')" />
                                    <x-text-input id="bobot" class="block mt-1 w-full" type="text"
                                        name="bobot" />
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
</x-app-layout>
