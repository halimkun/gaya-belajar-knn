<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $assessment->name ?? __('Show') . ' ' . __('Assessment') }}
        </h2>
    </x-slot>

    <div class="flex flex-col gap-4 py-12" x-data="{ detailOpen: false }">
        <div class="mx-auto w-full max-w-7xl sm:px-6 lg:px-8">
            <div class="rounded-lg border border-sky-200 bg-sky-50 p-4 text-sky-800 dark:border-sky-700 dark:bg-sky-900 dark:text-sky-200" role="alert">
                <p><strong class="text-lg font-bold">Selamat! <span class="text-2xl">🎉</span></strong></p>
                <p class="mt-2"><span class="block sm:inline">Anda telah menyelesaikan penilaian gaya belajar Anda. Anda dapat mengakses materi pembelajaran untuk meningkatkan keterampilan Anda. Materi pembalajaran ini sudah disesuaikan dengan gaya belajar Anda. Jika Anda memerlukan bantuan lebih lanjut, jangan ragu untuk menghubungi kami.</span></p>
            </div>
        </div>

        <div class="mx-auto flex h-full w-full max-w-7xl flex-col items-stretch gap-4 sm:px-6 lg:flex-row lg:px-8">
            <div class="w-full lg:w-1/3">
                <div class="bg-white p-4 shadow dark:bg-gray-800 dark:text-white sm:rounded-lg sm:p-8">
                    <div class="w-full">
                        <div class="w-full sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Persentase Gaya Belajar</h1>
                                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">Persentase gaya belajar Anda berdasarkan hasil penilaian.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 flow-root">
                        <canvas id="doughnutPercentage" class="h-64 w-full"></canvas>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-2/3">
                <div class="flex flex-col gap-4">
                    <div class="bg-white p-4 shadow dark:bg-gray-800 dark:text-white sm:rounded-lg sm:p-8">
                        <div class="w-full">
                            <div class="w-full sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Hasil Penilaian</h1>
                                    <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">Hasil akhir penilaian gaya belajar Anda.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 flow-root">
                            <table class="table w-full table-auto">
                                <thead class="rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white">
                                    <tr class="text-left">
                                        <th class="px-4 py-2">Nama Siswa</th>
                                        <th class="px-4 py-2">Tanggal Penilaian</th>
                                        <th class="px-4 py-2">Gaya Belajar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white dark:bg-gray-800 dark:text-white">
                                        <td class="px-4 py-2">{{ $assessment->user->name }}</td>
                                        <td class="px-4 py-2">{{ $assessment->created_at->translatedFormat('l, F j, Y') }}</td>
                                        <td class="px-4 py-2">{{ $assessment->dataset->label }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="shadow sm:rounded-lg sm:p-8 border-emerald-200 bg-emerald-50 text-emerald-800 dark:border-emerald-700 dark:bg-emerald-900 dark:text-emerald-200">
                        <div class="w-full">
                            <div class="w-full sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h1 class="text-base font-semibold leading-6">Rekomendasi</h1>
                                    <p class="text-sm">Hasil rekomendasi ini dibuat secara otomatis oleh AI.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 flow-root">
                            {{-- TODO : buat rekomendasi berdasarkan hasil penilaian yang terhubung ke AI (cari referensi) --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto w-full max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow dark:bg-gray-800 dark:text-white sm:rounded-lg sm:p-8">
                <div class="w-full" x-data="{ selected: null }">
                    <div class="flex flex-row items-center justify-between gap-4 lg:flex-row" x-on:click="selected !== 1 ? selected = 1 : selected = null;">
                        <div class="w-full sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Detail Penilaian</h1>
                                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">Detail penilaian gaya belajar anda</p>
                            </div>
                            {{-- <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a type="button" href="{{ route('assessments.index') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                            </div> --}}
                        </div>

                        <!-- Expand/Collapse Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'transform rotate-180': detailOpen }" class="h-6 w-6 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>


                    <div class="relative flow-root max-h-0 overflow-hidden transition-all duration-700" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="mt-6 border-t border-gray-100 dark:border-gray-700">

                                    @foreach ($answers as $k => $v)
                                        <div class="w-full p-5 text-gray-200 dark:text-white">
                                            {{ $v->question->question }}

                                            @php $name = $v->question->type.'_'.($v->id + 8); @endphp

                                            <div class="mt-2">
                                                @if ($v->question->type == 'number')
                                                    <input readonly min="0" max="100" type="number" name="{{ $name }}" id="{{ $v->id }}" class="mt-1 block w-full max-w-xl rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white" value="{{ $v->answer }}" placeholder="{{ $v->question->question }}" />
                                                    <x-input-error class="mt-2" :messages="$errors->get($name)" />
                                                @elseif ($v->question->type == 'text')
                                                    <input readonly type="text" name="{{ $name }}" id="{{ $v->id }}" class="mt-1 block w-full max-w-xl rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white" value="{{ old($v->id) }}" placeholder="{{ $v->question }}" />
                                                    <x-input-error class="mt-2" :messages="$errors->get($name)" />
                                                @elseif($v->question->type == 'choice' || $v->question->type == 'multiple_choice')
                                                    <div class="ml-1">
                                                        @if ($v->question->answers)
                                                            @foreach ($v->question->answers as $sk => $si)
                                                                <div class="flex flex-col gap-3">
                                                                    <label class="flex gap-1">
                                                                        <div>
                                                                            @if ($v->question->type == 'choice')
                                                                                <input disabled type="radio" name="{{ $name }}" value="{{ $si->id }}" class="mr-2" {{ $v->answer_id == $si->id ? 'checked' : '' }}>
                                                                            @elseif ($v->question->type == 'multiple_choice')
                                                                                <input disabled type="checkbox" name="{{ $name }}[]" value="{{ $si->id }}" class="mr-2">
                                                                            @endif
                                                                        </div>

                                                                        <div>
                                                                            {{ $si->answer }}
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <x-input-error class="mt-2" :messages="$errors->get($name)" />
                                                @else
                                                    <div class="text-red-500">Error: Unknown question type</div>
                                                @endif
                                            </div>
                                        </div>

                                        @if ($k < count($answers) - 1)
                                            <div class="border-b border-gray-200 dark:border-gray-600"></div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const percentage = @json(array_values($percentage));
            const label = @json(array_keys($percentage));

            const darkModeColors = ['#ff6e6e', '#8b80f9', '#68f392', '#ff9f43', '#6ceefc', '#68f392', '#ff2c6d', '#ffe96a', '#7b88b1', '#303447', '#ffb4dc', '#90eeff', '#7dffb3'];
            const lightModeColors = ['#ff9999', '#b8b0ff', '#ffbc80', '#a3f7ff', '#a4f7b2', '#ff7b9e', '#fff4a3', '#a9b0cc', '#d1d3db', '#ffd1eb', '#c2f8ff', '#b0ffda'];

            const ctx = document.getElementById('doughnutPercentage').getContext('2d');
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
                            borderRadius: 8
                        }]
                    },
                    plugins: [ChartDataLabels],
                    options: {
                        ...options,
                    }
                });
            }

            createDoughnutChart('doughnutPercentage', label, percentage, {
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            color: isDark ? '#ADBABD' : '#2D3748',
                            font: {
                                size: 14
                            }
                        }
                    },
                    datalabels: {
                        formatter: (value, ctx) => {
                            // get only 2 decimal places
                            return value.toFixed(2) + '%';
                        },
                        color: isDark ? '#FFF' : '#2D3748',
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                    },
                }
            });
        </script>
    @endpush
</x-app-layout>
