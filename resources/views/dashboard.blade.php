<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:grid-cols-2 lg:px-8 mb-4">
            <div class="overflow-hidden bg-white p-6 pb-8 shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="mb-6 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Jumlah Label</h1>
                    <p class="text-sm text-gray-700 dark:text-gray-400">Jumlah label pada datasets.</p>
                </div>
    
                <canvas id="jmlLabel" class="dark:text-white max-h-80"></canvas>
            </div>
        </div>

        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="overflow-hidden bg-white p-6 pb-8 shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="mb-6 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Jumlah Label By Gender</h1>
                    <p class="text-sm text-gray-700 dark:text-gray-400">Jumlah label berdasarkan gender siswa.</p>
                </div>

                <canvas class="dark:text-white" id="jmlLabelByGender"></canvas>
            </div>
            
            <div class="overflow-hidden bg-white p-6 pb-8 shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="mb-6 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Jumlah Label By Jurusan</h1>
                    <p class="text-sm text-gray-700 dark:text-gray-400">Jumlah label berdasarkan gender siswa.</p>
                </div>

                <canvas class="dark:text-white" id="jmlLabelByJurusan"></canvas>
            </div>

            <div class="overflow-hidden bg-white p-6 pb-8 shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="mb-6 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Jumlah Siswa Berdasarkan Gender</h1>
                    <p class="text-sm text-gray-700 dark:text-gray-400">Jumlah siswa berdasarkan gender.</p>
                </div>

                <canvas class="dark:text-white" id="jmlSiswaByGender"></canvas>
            </div>
            <div class="overflow-hidden bg-white p-6 pb-8 shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="mb-6 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Jumlah Siswa Berdasarkan Jurusan</h1>
                    <p class="text-sm text-gray-700 dark:text-gray-400">Jumlah siswa berdasarkan jurusan.</p>
                </div>

                <canvas class="dark:text-white" id="jmlSiswaByJurusan"></canvas>
            </div>
        </div>
    </div>

    @push('scripts')
        <script text="text/javascript">
            const darkModeColors = ['#ff6e6e', '#8b80f9', '#68f392', '#ff9f43', '#6ceefc', '#68f392', '#ff2c6d', '#ffe96a', '#7b88b1', '#303447', '#ffb4dc', '#90eeff', '#7dffb3'];
            const lightModeColors = ['#ff9999', '#b8b0ff', '#ffbc80', '#a3f7ff', '#a4f7b2', '#ff7b9e', '#fff4a3', '#a9b0cc', '#d1d3db', '#ffd1eb', '#c2f8ff', '#b0ffda'];

            var isDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
            if (isDark) {
                Chart.defaults.color = "#ADBABD";
                Chart.defaults.borderColor = "rgba(255,255,255,0.1)";
                Chart.defaults.backgroundColor = "rgba(255,255,0,0.1)";
                Chart.defaults.elements.line.borderColor = "rgba(255,255,0,0.4)";
            }

            function createDoughnutChart(elementId, labels, data, options = {}) {
                var ctx = document.getElementById(elementId).getContext('2d');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'My Dataset',
                            data: data,
                            backgroundColor: isDark ? darkModeColors : lightModeColors,
                            borderWidth: 0,
                            hoverOffset: 10,
                            borderRadius: 10
                        }]
                    },
                    options: options
                });
            }

            function createBarChart(elementId, labels, data, options = {}) {
                var ctx = document.getElementById(elementId).getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'My Dataset',
                            data: data,
                            backgroundColor: isDark ? darkModeColors : lightModeColors,
                            borderWidth: 1,
                            borderRadius: 10
                        }]
                    },
                    options: options
                });
            }

            var options = {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            createBarChart('jmlLabel', {!! json_encode($jmlLabel->pluck('label')) !!}, {!! json_encode($jmlLabel->pluck('jml')) !!}, {
                ...options.responsive,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Data Total'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Dataset Label'
                        }
                    }
                }
            });
            createDoughnutChart('jmlSiswaByGender', {!! json_encode($jmlSiswaByGender->pluck('jk')) !!}, {!! json_encode($jmlSiswaByGender->pluck('jml')) !!});
            createDoughnutChart('jmlSiswaByJurusan', {!! json_encode($jmlSiswaByJurusan->pluck('jurusan')) !!}, {!! json_encode($jmlSiswaByJurusan->pluck('jml')) !!});

            // Label By Gender
            var ctx = document.getElementById("jmlLabelByGender").getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataJmlLabelByGender['label']) !!}, // Label yang berasal dari server
                    datasets: [{
                            label: 'Perempuan',
                            data: {!! json_encode($dataJmlLabelByGender['perempuanData']) !!}, // Data jumlah dari perempuan
                            backgroundColor: isDark ? darkModeColors[0] : lightModeColors[0], // Warna untuk data perempuan
                            borderWidth: 1,
                            borderRadius: 10
                        },
                        {
                            label: 'Laki-Laki',
                            data: {!! json_encode($dataJmlLabelByGender['lakiData']) !!}, // Data jumlah dari laki-laki
                            backgroundColor: isDark ? darkModeColors[1] : lightModeColors[1], // Warna untuk data laki-laki
                            borderWidth: 1,
                            borderRadius: 10
                        },
                        {
                            label: 'Lainnya',
                            data: {!! json_encode($dataJmlLabelByGender['otherData']) !!}, // Data jumlah dari kategori lainnya
                            backgroundColor: isDark ? darkModeColors[2] : lightModeColors[2], // Warna untuk data lainnya
                            borderWidth: 1,
                            borderRadius: 10
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Gender Total'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: "Dataset label",
                            }
                        }
                    }
                }
            });

            // Label by Jurusan
            var ctx                   = document.getElementById("jmlLabelByJurusan").getContext('2d');
            var jmlLabelByJurusanData = [];
            var iLabelAndJurusan      = 0;
            
            @foreach($dataJmlLabelByJurusan['jurusanData'] as $key => $value)
                jmlLabelByJurusanData.push({
                    label: '{{ $key }}',
                    data: {!! json_encode($value) !!},
                    backgroundColor: isDark ? darkModeColors[iLabelAndJurusan] : lightModeColors[iLabelAndJurusan],
                    borderRadius: 10
                });

                iLabelAndJurusan++;
            @endforeach

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataJmlLabelByJurusan['label']->toArray()) !!},
                    datasets: jmlLabelByJurusanData,
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jurusan Total'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: "Dataset label",
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
