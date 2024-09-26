<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::user()->isDetailComplete())
                        <h1 class="text-lg font-bold">Selamat Datang, <span class="text-indigo-500 dark:text-indigo-400">{{ Auth::user()->name }}</span></h1>
                        <p class="text-sm text-gray-400">Anda telah berhasil login.</p>
                    @else
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-lg font-bold">Lengkapi Data Diri Anda</h1>
                                <p class="text-sm text-gray-400">Silahkan lengkapi data diri anda terlebih dahulu sebelum melanjutkan.</p>
                            </div>
                            <a href="{{ route('profile.edit', ['ref' => route('dashboard')]) }}" class="rounded-lg bg-indigo-500 px-4 py-2 text-sm text-white hover:bg-indigo-700">Lengkapi Data Diri</a>
                        </div>
                    @endif
                    <div class="my-4 border-b border-gray-300 dark:border-gray-700"></div>

                    @if (Auth::user()->isDetailComplete())
                        @if (Auth::user()->assessments->count() == 0)
                            {{-- anda belum mengisi assesment, silahkan mengisi terlibih dahulu --}}
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-lg font-bold">Isi Asesmen Gaya Belajar Anda</h1>
                                    <p class="text-sm text-gray-400">Silahkan isi asesmen karakter anda terlebih dahulu sebelum melanjutkan.</p>
                                </div>
                                <a href="{{ route('assessments.create') }}" class="rounded-lg bg-indigo-500 px-4 py-2 text-sm text-white hover:bg-indigo-700">Isi Asesmen</a>
                            </div>

                            <div class="mt-4 max-w-2xl text-sm text-gray-400">
                                <p>Asesmen ini bertujuan untuk mengetahui <span class="font-bold text-indigo-500 dark:text-indigo-200">gaya belajar anda</span>. Dengan memahami gaya belajar anda, guru dapat menyesuaikan metode pembelajaran yang paling sesuai, sehingga diharapkan anda dapat belajar dengan lebih efektif dan efisien. Selain itu, dengan mengisi asesmen ini, anda juga akan <span class="font-semibold text-orange-400 dark:text-orange-200">mendapatkan konten rekomendasi dari guru untuk belajar tambahan</span> .</p>
                            </div>
                        @else
                            {{-- anda sudah mengisi assesment, silahkan melihat hasil assesment --}}
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-lg font-bold">Hasil Asesmen Gaya Belajar Anda</h1>
                                    <p class="text-sm text-gray-400">Anda telah mengisi asesmen karakter anda.</p>
                                </div>
                                {{-- add order by created_at --}}
                                <a href="{{ route('assessments.show', Auth::user()->assessments->sortByDesc('created_at')->first()) }}" class="rounded-lg bg-indigo-500 px-4 py-2 text-sm text-white hover:bg-indigo-700">Lihat Hasil Asesmen</a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
