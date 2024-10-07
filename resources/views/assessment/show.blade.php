<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $assessment->name ?? __('Show') . ' ' . __('Assessment') }}
        </h2>
    </x-slot>

    <div class="space-y-4 py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
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

                    <div class="mt-5">
                        {{-- show conrats message and inform the user, they can access learning materials to improve their skills, make in bahasa --}}
                        <div class="rounded-lg border border-sky-200 bg-sky-50 p-4 text-sky-800 dark:border-sky-700 dark:bg-sky-900 dark:text-sky-200" role="alert">
                            <p><strong class="text-lg font-bold">Selamat! <span class="text-2xl">🎉</span></strong></p>
                            <p class="mt-2"><span class="block sm:inline">Anda telah menyelesaikan penilaian gaya belajar Anda. Anda dapat mengakses materi pembelajaran untuk meningkatkan keterampilan Anda. Materi pembalajaran ini sudah disesuaikan dengan gaya belajar Anda. Jika Anda memerlukan bantuan lebih lanjut, jangan ragu untuk menghubungi kami.</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow dark:bg-gray-800 dark:text-white sm:rounded-lg sm:p-8">
                <div class="w-full" x-data="{ selected: null }">
                    <div class="flex flex-row items-center justify-between gap-4 lg:flex-row" x-on:click="selected !== 1 ? selected = 1 : selected = null">
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
</x-app-layout>
