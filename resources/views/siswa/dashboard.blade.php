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
                            <a href="{{ route('profile.edit', ['ref' => route('dashboard')]) }}" class="rounded bg-indigo-500 px-4 py-2 text-sm text-white hover:bg-indigo-700">Lengkapi Data Diri</a>
                        </div>
                    @endif
                    <div class="my-4 border-b border-gray-300 dark:border-gray-700"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
