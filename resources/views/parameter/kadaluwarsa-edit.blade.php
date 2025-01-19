<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Parameter / Kadaluwarsa / Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-input-error class="mb-4" :errors="$errors" />
                    <form action="{{ route('parameter.update', $ParamKadaluwarsa->id_parameter_kadaluwarsa) }}" method="POST">
                        @csrf
                        @method('PUT') 
                        <div class="grid grid-row-3 gap-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="tahun_kadaluwarsa" :value="__('Tahun Kadaluwarsa')" />
                                    <x-text-input id="tahun_kadaluwarsa" class="mt-1 w-full" type="text"
                                        name="tahun_kadaluwarsa" value="{{ $ParamKadaluwarsa->tahun_kadaluwarsa }}"/>
                                </div>
                                <div>
                                    <x-input-label for="keterangan" :value="__('Keterangan')" />
                                    <x-text-input id="keterangan" class=" mt-1 w-full" type="text"
                                        name="keterangan" value="{{ $ParamKadaluwarsa->keterangan }}"/>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="bobot" :value="__('Bobot')" />
                                    <x-text-input id="bobot" class="block mt-1 w-full" type="text"
                                        name="bobot" value="{{ $ParamKadaluwarsa->bobot }}"/>
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
