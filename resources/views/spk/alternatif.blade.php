<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SPK / Alternatif') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <div class="flex flex-col">
                                        <div class=" overflow-x-auto">
                                            <div class="min-w-full inline-block align-middle">
                                                <x-success-message />
                                                <div
                                                    class="flex justify-between text-gray-500 focus-within:text-gray-900 mb-4">
                                                    <div
                                                        class="relative  text-gray-500 focus-within:text-gray-900 mb-4">
                                                        <form method="" action="">
                                                            <div class="relative max-w-sm mx-auto">
                                                                <input
                                                                    class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-100 focus:border-gray-100"
                                                                    type="search" name="search"
                                                                    placeholder="Search...">
                                                                <button type="submit"
                                                                    class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-700 bg-gray-100 border border-gray-300 rounded-r-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 focus:border-gray-100">
                                                                    <svg class="h-5 w-5" fill="currentColor"
                                                                        viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M14.795 13.408l5.204 5.204a1 1 0 01-1.414 1.414l-5.204-5.204a7.5 7.5 0 111.414-1.414zM8.5 14A5.5 5.5 0 103 8.5 5.506 5.506 0 008.5 14z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="mt-3 sm:mt-0 sm:ml-3">
                                                        <a class="w-full flex items-center justify-center px-8 py-3 text-base leading-6 font-small rounded-md text-purple-700 dark:text-purple-700 bg-purple-100 hover:bg-purple-50 hover:text-purple-600 focus:ring ring-offset-2 ring-purple-100 focus:outline-none transition duration-150 ease-in-out md:py-2 md:text-lg md:px-5"
                                                            href="{{ route('spk.alternatif-create') }}">
                                                            Tambah Data
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="overflow-hidden ">
                                                    <table class="min-w-full rounded-xl">
                                                        <thead>
                                                            <tr class="bg-gray-50">
                                                                <th scope="col"
                                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                                    No </th>
                                                                <th scope="col"
                                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                                    Kode Alternatif </th>
                                                                <th scope="col"
                                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                                    Nama Obat</th>
                                                                <th scope="col"
                                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                                    C1 (Penjualan Obat Sebulan)</th>
                                                                <th scope="col"
                                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                                    C2 (Kadaluwarsa Obat)</th>
                                                                <th scope="col"
                                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                                    C3 (Obat Khusus)</th>
                                                                <th scope="col"
                                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                                    C4 (Banyak Persediaan)</th>
                                                                <th scope="col"
                                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                                    Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-gray-300 ">
                                                            @foreach ($alternatifs as $alternatif)
                                                                <!-- Modal -->
                                                                <div id="deleteModal{{ $alternatif->id_alternatif }}"
                                                                    tabindex="-1" aria-hidden="true"
                                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                                                    <div
                                                                        class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                                        <!-- Modal content -->
                                                                        <div
                                                                            class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                                            <button type="button"
                                                                                class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                                data-modal-toggle="deleteModal{{ $alternatif->id_alternatif }}">
                                                                                <svg aria-hidden="true" class="w-5 h-5"
                                                                                    fill="currentColor"
                                                                                    viewBox="0 0 20 20"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                                        clip-rule="evenodd"></path>
                                                                                </svg>
                                                                                <span class="sr-only">Close modal</span>
                                                                            </button>
                                                                            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                                                aria-hidden="true" fill="currentColor"
                                                                                viewBox="0 0 20 20"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                                    clip-rule="evenodd"></path>
                                                                            </svg>

                                                                            <p
                                                                                class="mb-4 text-gray-500 dark:text-gray-300">
                                                                                Are you
                                                                                sure you want to delete
                                                                                <strong class="text-red-500">Kode
                                                                                    Alternatif :
                                                                                    {{ $alternatif->kode_alternatif }}
                                                                                </strong>?
                                                                            </p>
                                                                            <div
                                                                                class="flex justify-center items-center space-x-4">
                                                                                <form
                                                                                    action="{{ route('spk.alternatif-destroy', $alternatif->id_alternatif) }}"
                                                                                    method="POST"
                                                                                    style="display:inline;"">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                                        Yes, I'm sure
                                                                                    </button>
                                                                                </form>
                                                                                <button
                                                                                    data-modal-toggle="deleteModal{{ $alternatif->id_alternatif }}"
                                                                                    type="button"
                                                                                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                                    No, cancel
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal -->
                                                                <tr
                                                                    class="bg-white transition-all duration-500 hover:bg-gray-50">
                                                                    <td
                                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                        {{ $alternatifs->firstItem() + $loop->index }}
                                                                    </td>
                                                                    <td
                                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                        {{ $alternatif->kode_alternatif }}</td>
                                                                    <td
                                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                        {{ $alternatif->nama_obat ?? 'Tidak Ditemukan' }}
                                                                    <td
                                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                        {{ $alternatif->c1 }}
                                                                    <td
                                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                        {{ $alternatif->c2 }}
                                                                    <td
                                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                        {{ $alternatif->c3 }}
                                                                    <td
                                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                        {{ $alternatif->c4 }}
                                                                    </td>
                                                                    <td class=" p-5 ">
                                                                        <div class="flex items-center gap-1">
                                                                            <button
                                                                                class="p-2 rounded-full  group transition-all duration-500  flex item-center"
                                                                                id="deleteButton"
                                                                                data-modal-target="deleteModal{{ $alternatif->id_alternatif }}"
                                                                                data-modal-toggle="deleteModal{{ $alternatif->id_alternatif }}">
                                                                                <svg class="" width="20"
                                                                                    height="20" viewBox="0 0 20 20"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path class="fill-red-600"
                                                                                        d="M4.00031 5.49999V4.69999H3.20031V5.49999H4.00031ZM16.0003 5.49999H16.8003V4.69999H16.0003V5.49999ZM17.5003 5.49999L17.5003 6.29999C17.9421 6.29999 18.3003 5.94183 18.3003 5.5C18.3003 5.05817 17.9421 4.7 17.5003 4.69999L17.5003 5.49999ZM9.30029 9.24997C9.30029 8.80814 8.94212 8.44997 8.50029 8.44997C8.05847 8.44997 7.70029 8.80814 7.70029 9.24997H9.30029ZM7.70029 13.75C7.70029 14.1918 8.05847 14.55 8.50029 14.55C8.94212 14.55 9.30029 14.1918 9.30029 13.75H7.70029ZM12.3004 9.24997C12.3004 8.80814 11.9422 8.44997 11.5004 8.44997C11.0585 8.44997 10.7004 8.80814 10.7004 9.24997H12.3004ZM10.7004 13.75C10.7004 14.1918 11.0585 14.55 11.5004 14.55C11.9422 14.55 12.3004 14.1918 12.3004 13.75H10.7004ZM4.00031 6.29999H16.0003V4.69999H4.00031V6.29999ZM15.2003 5.49999V12.5H16.8003V5.49999H15.2003ZM11.0003 16.7H9.00031V18.3H11.0003V16.7ZM4.80031 12.5V5.49999H3.20031V12.5H4.80031ZM9.00031 16.7C7.79918 16.7 6.97882 16.6983 6.36373 16.6156C5.77165 16.536 5.49093 16.3948 5.29823 16.2021L4.16686 17.3334C4.70639 17.873 5.38104 18.0979 6.15053 18.2013C6.89702 18.3017 7.84442 18.3 9.00031 18.3V16.7ZM3.20031 12.5C3.20031 13.6559 3.19861 14.6033 3.29897 15.3498C3.40243 16.1193 3.62733 16.7939 4.16686 17.3334L5.29823 16.2021C5.10553 16.0094 4.96431 15.7286 4.88471 15.1366C4.80201 14.5215 4.80031 13.7011 4.80031 12.5H3.20031ZM15.2003 12.5C15.2003 13.7011 15.1986 14.5215 15.1159 15.1366C15.0363 15.7286 14.8951 16.0094 14.7024 16.2021L15.8338 17.3334C16.3733 16.7939 16.5982 16.1193 16.7016 15.3498C16.802 14.6033 16.8003 13.6559 16.8003 12.5H15.2003ZM11.0003 18.3C12.1562 18.3 13.1036 18.3017 13.8501 18.2013C14.6196 18.0979 15.2942 17.873 15.8338 17.3334L14.7024 16.2021C14.5097 16.3948 14.229 16.536 13.6369 16.6156C13.0218 16.6983 12.2014 16.7 11.0003 16.7V18.3ZM2.50031 4.69999C2.22572 4.7 2.04405 4.7 1.94475 4.7C1.89511 4.7 1.86604 4.7 1.85624 4.7C1.85471 4.7 1.85206 4.7 1.851 4.7C1.05253 5.50059 1.85233 6.3 1.85256 6.3C1.85273 6.3 1.85297 6.3 1.85327 6.3C1.85385 6.3 1.85472 6.3 1.85587 6.3C1.86047 6.3 1.86972 6.3 1.88345 6.3C1.99328 6.3 2.39045 6.3 2.9906 6.3C4.19091 6.3 6.2032 6.3 8.35279 6.3C10.5024 6.3 12.7893 6.3 14.5387 6.3C15.4135 6.3 16.1539 6.3 16.6756 6.3C16.9364 6.3 17.1426 6.29999 17.2836 6.29999C17.3541 6.29999 17.4083 6.29999 17.4448 6.29999C17.4631 6.29999 17.477 6.29999 17.4863 6.29999C17.4909 6.29999 17.4944 6.29999 17.4968 6.29999C17.498 6.29999 17.4988 6.29999 17.4994 6.29999C17.4997 6.29999 17.4999 6.29999 17.5001 6.29999C17.5002 6.29999 17.5003 6.29999 17.5003 5.49999C17.5003 4.69999 17.5002 4.69999 17.5001 4.69999C17.4999 4.69999 17.4997 4.69999 17.4994 4.69999C17.4988 4.69999 17.498 4.69999 17.4968 4.69999C17.4944 4.69999 17.4909 4.69999 17.4863 4.69999C17.477 4.69999 17.4631 4.69999 17.4448 4.69999C17.4083 4.69999 17.3541 4.69999 17.2836 4.69999C17.1426 4.7 16.9364 4.7 16.6756 4.7C16.1539 4.7 15.4135 4.7 14.5387 4.7C12.7893 4.7 10.5024 4.7 8.35279 4.7C6.2032 4.7 4.19091 4.7 2.9906 4.7C2.39044 4.7 1.99329 4.7 1.88347 4.7C1.86974 4.7 1.86051 4.7 1.85594 4.7C1.8548 4.7 1.85396 4.7 1.85342 4.7C1.85315 4.7 1.85298 4.7 1.85288 4.7C1.85284 4.7 2.65253 5.49941 1.85408 6.3C1.85314 6.3 1.85296 6.3 1.85632 6.3C1.86608 6.3 1.89511 6.3 1.94477 6.3C2.04406 6.3 2.22573 6.3 2.50031 6.29999L2.50031 4.69999ZM7.05028 5.49994V4.16661H5.45028V5.49994H7.05028ZM7.91695 3.29994H12.0836V1.69994H7.91695V3.29994ZM12.9503 4.16661V5.49994H14.5503V4.16661H12.9503ZM12.0836 3.29994C12.5623 3.29994 12.9503 3.68796 12.9503 4.16661H14.5503C14.5503 2.8043 13.4459 1.69994 12.0836 1.69994V3.29994ZM7.05028 4.16661C7.05028 3.68796 7.4383 3.29994 7.91695 3.29994V1.69994C6.55465 1.69994 5.45028 2.8043 5.45028 4.16661H7.05028ZM2.50031 6.29999C4.70481 6.29998 6.40335 6.29998 8.1253 6.29997C9.84725 6.29996 11.5458 6.29995 13.7503 6.29994L13.7503 4.69994C11.5458 4.69995 9.84724 4.69996 8.12529 4.69997C6.40335 4.69998 4.7048 4.69998 2.50031 4.69999L2.50031 6.29999ZM13.7503 6.29994L17.5003 6.29999L17.5003 4.69999L13.7503 4.69994L13.7503 6.29994ZM7.70029 9.24997V13.75H9.30029V9.24997H7.70029ZM10.7004 9.24997V13.75H12.3004V9.24997H10.7004Z"
                                                                                        fill="#F87171"></path>
                                                                                </svg>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    {{ $alternatifs->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
