<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                        {{ __('Stok Obat Chart') }}
                    </h2>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <div class="mx-auto px-4 py-6">
                        <canvas id="myChart"></canvas>
                    </div>

                    <script>
                        
                        var dataKeys = @json(array_keys($dashboard));
                        var dataValues = @json(array_values($dashboard));
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: dataKeys,
                                datasets: [{
                                    label: 'Stok',
                                    data: dataValues,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    x: {
                                        ticks: {
                                            display: true,
                                            autoSkip: false
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
