<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Obat / Upload File Excel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-center">
                        <!-- Author: FormBold Team -->
                        <div class="mx-auto w-full max-w-[550px] bg-white">
                            <form action="" method="POST" class="pb-4 pt-0 px-9" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="mb-6 pt-4">
                                    <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                                        Upload File
                                    </label>

                                    <div
                                        class="flex-1 items-center max-w-screen-sm mx-auto mb-3 space-y-4 sm:flex sm:space-y-0">
                                        <div class="relative w-full">
                                            <div class="items-center justify-center max-w-xl mx-auto">
                                                <label
                                                    class="flex justify-center w-full h-32 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none"
                                                    for="file">
                                                    <span class="flex items-center space-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-6 h-6 text-gray-600" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                            </path>
                                                        </svg>
                                                        <span class="font-medium text-gray-600">Drop files to
                                                            Attach, or
                                                            <span class="text-blue-600 underline ml-[4px]">browse</span>
                                                        </span>
                                                    </span>
                                                    <input type="file" name="excel_file" class="hidden"
                                                        id="file"></label>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- <div class="mb-8">
                                        <input type="file" name="excel_file" id="file" class="sr-only" />
                                        <label for="file"
                                            class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center">
                                            <div>
                                                <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                                                    Drop files here
                                                </span>
                                                <span class="mb-2 block text-base font-medium text-[#6B7280]">
                                                    Or
                                                </span>
                                                <span
                                                    class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]">
                                                    Browse
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                </div> --}}
                                    <div>
                                        <button type="submit"
                                            class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                            Send File
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
