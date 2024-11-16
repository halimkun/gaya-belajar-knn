<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $assessment->name ?? __('Show') . ' ' . __('Assessment') }}
        </h2>
    </x-slot>

    <div class="flex flex-col gap-4 py-12">
        <div class="mx-auto w-full max-w-7xl sm:px-6 lg:px-8">
            <div class="rounded-lg border border-sky-200 bg-sky-50 p-4 text-sky-800 dark:border-sky-700 dark:bg-sky-900 dark:text-sky-200" role="alert">
                <p><strong class="text-lg font-bold">Selamat! <span class="text-2xl">🎉</span></strong></p>
                <p class="mt-2"><span class="block sm:inline">Anda telah menyelesaikan penilaian gaya belajar Anda. Anda dapat mengakses materi pembelajaran untuk meningkatkan keterampilan Anda. Materi pembalajaran ini sudah disesuaikan dengan gaya belajar Anda. Jika Anda memerlukan bantuan lebih lanjut, jangan ragu untuk menghubungi kami.</span></p>
            </div>
        </div>

        <div class="mx-auto w-full max-w-7xl gap-4 sm:px-6 lg:flex-row lg:px-8">
            <div class="w-full bg-white p-4 shadow dark:bg-gray-800 dark:text-white sm:rounded-lg sm:p-8">
                <div class="w-full">
                    <div class="w-full sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Hasil Penilaian</h1>
                            <p class="text-sm text-gray-700 dark:text-gray-300">Hasil akhir penilaian gaya belajar Anda.</p>
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
        </div>

        <div class="mx-auto flex h-full w-full max-w-7xl flex-col items-stretch gap-4 sm:px-6 lg:flex-row lg:px-8">
            <div class="w-full lg:w-1/3">
                <div class="bg-white p-4 shadow dark:bg-gray-800 dark:text-white sm:rounded-lg sm:p-8">
                    <div class="w-full">
                        <div class="w-full sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Visualisasi Pemilihan Gaya Belajar</h1>
                                <p class="text-sm text-gray-700 dark:text-gray-300">Semakin kecil jarak, semakin mirip gaya belajar.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <canvas id="doughnutPercentage" class="m-0 h-full w-full p-0"></canvas>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-2/3" x-data="{ inverseLoading: false, modalData: '' }">
                <div class="flex flex-col gap-4">
                    <div class="bg-white p-4 shadow dark:bg-gray-800 dark:text-white sm:rounded-lg sm:p-8">
                        <div class="w-full">
                            <div class="w-full sm:flex sm:items-center sm:justify-between">
                                <div class="sm:flex-auto">
                                    <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Gaya Belajar</h1>
                                    <p class="text-sm text-gray-700 dark:text-gray-300">daftar gaya belajar dengan jarak terdekat.</p>
                                </div>

                                {{-- Button to fetch and show modal --}}
                                <button x-on:click="
                                        inverseLoading = true;
                                        $dispatch('open-modal', 'detail-inverse');
                                        fetch('{{ route('model.importance') }}', {
                                            method: 'GET',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Accept': 'application/json',
                                            },
                                        }).then(response => response.json()).then(data => {
                                            inverseLoading = false;
                                            modalData = data;
                                        }).catch(error => {
                                            inverseLoading = false;
                                            console.error('Error:', error);
                                        });
                                    " class="animate-bounce rounded-full bg-amber-300 px-1.5 py-1.5 text-sm font-semibold shadow-sm hover:bg-amber-400 dark:bg-amber-700 dark:text-white dark:hover:bg-amber-800 dark:hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M11 17h2v-6h-2zm1-8q.425 0 .713-.288T13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="mt-5 flow-root">
                            <table class="table w-full">
                                <thead class="rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white">
                                    <tr>
                                        <th class="px-4 py-2 text-left">No.</th>
                                        <th class="px-4 py-2 text-left">Gaya Belajar</th>
                                        <th class="px-4 py-2 text-right">Jarak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nearest_neighbors as $neighbor)
                                        <tr class="{{ $loop->first ? 'bg-indigo-50 dark:bg-indigo-900/50' : 'bg-white dark:bg-gray-800' }} dark:text-white">
                                            <td class="px-4 py-2">{{ $loop->iteration }}.</td>
                                            <td class="px-4 py-2">{{ $neighbor['label'] }}</td>
                                            <td class="px-4 py-2 text-right">{{ number_format($neighbor['distance'], 4) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <x-modal name="detail-inverse" focusable>
                    <div class="p-6">
                        <div class="flex flex-col">
                            {{-- Title --}}
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ __('Feature yang paling berpangaruh') }}
                            </h2>

                            {{-- Subtitle --}}
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Detail inversi ini adalah feature yang paling berpengaruh dalam menentukan gaya belajar,.
                            </p>
                        </div>

                        {{-- Display modalData --}}
                        <div class="mt-4">
                            <table class="table-auto border-collapse border border-gray-300 w-full">
                                <thead class="bg-gray-200 dark:bg-gray-700">
                                    <tr>
                                        <th class="border border-gray-300 text-left px-4 py-2">Feature</th>
                                        <th class="border border-gray-300 text-left px-4 py-2">Importance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through modalData -->
                                    <template x-for="[feature, importance] in Object.entries(modalData)" :key="feature">
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-300" x-text="feature"></td>
                                            <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-300" x-text="(importance * 100).toFixed(3) + ' %'"></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>                    
                        </div>
                    </div>
                </x-modal>
            </div>
        </div>

        <div class="mx-auto w-full max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="border-emerald-200 bg-emerald-50 text-emerald-800 shadow dark:border-emerald-700 dark:bg-emerald-900 dark:text-emerald-200 sm:rounded-lg sm:p-8">
                <div class="w-full">
                    <div class="w-full sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6">Rekomendasi</h1>
                            <p class="text-sm">Hasil rekomendasi ini dibuat secara otomatis oleh AI.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5 flow-root">
                    {!! Str::markdown($assessment->ai_recomendation) !!}
                </div>
            </div>
        </div>

        <div class="mx-auto w-full max-w-7xl space-y-6 sm:px-6 lg:px-8" x-data="{ detailOpen: false }">
            <div class="bg-white p-4 shadow dark:bg-gray-800 dark:text-white sm:rounded-lg sm:p-8">
                <div class="w-full" x-data="{ selected: null }">
                    <div class="flex flex-row items-center justify-between gap-4 lg:flex-row" x-on:click="selected !== 1 ? selected = 1 : selected = null;">
                        <div class="w-full sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Detail Penilaian</h1>
                                <p class="text-sm text-gray-700 dark:text-gray-300">Detail penilaian gaya belajar anda</p>
                            </div>
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
            const label = @json(array_column($nearest_neighbors, 'label'));
            const percentage = @json(array_column($nearest_neighbors, 'distance'));

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

            function createBarChart(elementId, labels, data, options = {}) {
                new Chart(ctx, {
                    type: 'bar',
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

            createBarChart('doughnutPercentage', label, percentage, {
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
                            return value.toFixed(3);
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
