<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan / Perhitungan  &  Perankingan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="flex flex-col">
                                <div class=" overflow-x-auto">
                                    <div class="min-w-full inline-block align-middle">
                                        <x-success-message />
                                        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4 text-center">
                                            {{ __('Perhitungan') }}
                                        </h2>
                                        <div class="overflow-hidden ">
                                            <table class="min-w-full rounded-xl">
                                                <thead>
                                                    <tr class="bg-gray-50">
                                                        <th scope="col"
                                                            class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                            No.</th>
                                                        <th scope="col"
                                                            class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                            Kode Alternatif </th>
                                                        <th scope="col"
                                                            class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                            Nama Obat</th>
                                                        <th scope="col"
                                                            class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                            C1 </th>
                                                        <th scope="col"
                                                            class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                            C2 </th>
                                                        <th scope="col"
                                                            class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                            C3 </th>
                                                        <th scope="col"
                                                            class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                            C4 </th>
                                                        <th scope="col"
                                                            class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                            Utility C1 </th>
                                                        <th scope="col"
                                                            class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                            Utility C2 </th>
                                                        <th scope="col"
                                                            class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                            Utility C3 </th>
                                                        <th scope="col"
                                                            class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                            Utility C4 </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-300 ">
                                                    @foreach ($alternatifs as $alternatif)
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
                                                                {{ $alternatif->nama_obat }}</td>
                                                            <td
                                                                class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                {{ $alternatif->c1 }}</td>
                                                            <td
                                                                class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                {{ $alternatif->c2 }}</td>
                                                            <td
                                                                class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                {{ $alternatif->c3 }}</td>
                                                            <td
                                                                class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                                {{ $alternatif->c4 }} </td>
                                                            <td
                                                                class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                {{ number_format($alternatif->utility_c1, 3) }}</td>
                                                            <td
                                                                class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                {{ number_format($alternatif->utility_c2, 3) }}</td>
                                                            <td
                                                                class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                                {{ number_format($alternatif->utility_c3, 3) }}</td>
                                                            <td
                                                                class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                                {{ number_format($alternatif->utility_c4, 3) }}</td>
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

                        <div class="flex flex-col mt-5">
                            <div class=" overflow-x-auto">
                                <div class="min-w-full inline-block align-middle">
                                    <x-success-message />
                                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4 mt-5 text-center">
                                        {{ __('Perankingan') }}
                                    </h2>
                                    <div class="overflow-hidden ">
                                        <table class="min-w-full rounded-xl">
                                            <thead>
                                                <tr class="bg-gray-50">
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                        Ranking </th>
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                        Kode Alternatif </th>
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                        Nama Obat</th>
                                                    <th scope="col"
                                                        class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-t-xl">
                                                        ( U ) Nilai Akhir Utility </th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-300 ">
                                                @foreach ($alternatifRank as $alternatifR)
                                                    <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                                                        <td
                                                            class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                            {{ $alternatifRank->firstItem() + $loop->index }}
                                                        </td>
                                                        <td
                                                            class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                            {{ $alternatifR->kode_alternatif }}</td>
                                                        <td
                                                            class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                            {{ $alternatifR->nama_obat }}</td>
                                                        <td
                                                            class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                            {{ number_format($alternatifR->total_utility, 3) }}</td>
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
                        {{ $alternatifRank->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
