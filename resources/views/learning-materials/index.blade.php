<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Materi Pembelajaran
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow dark:bg-gray-800 dark:text-white sm:rounded-lg sm:p-8">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white"><span class="text-xl">📚</span> Material Pembelaajaran <span class="text-indigo-500 underline">{{ $assessment->dataset->label }}</span></h1>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">Material Pembelajaran yang disesuaikan dengan gaya belajar Anda oleh sistem. <br>detail materi dibuat oleh guru yang berpengalaman.</p>
                        </div>
                    </div>

                    <div class="flow-root">
                        {{-- article grid from $educationalContents --}}
                        <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($educationalContents as $educationalContent)
                                <div class="rounded-lg bg-white p-4 shadow transition duration-300 ease-in-out hover:bg-gray-200 hover:shadow-md dark:bg-gray-700 dark:text-white dark:hover:bg-gray-900">
                                    <a href="">
                                        <div class="w-full">
                                            <h2 class="text-lg font-semibold leading-6 text-gray-900 dark:text-white">{{ $educationalContent->title }}</h2>
                                            <span class="text-sm font-light text-gray-500 dark:text-gray-400">{{ $educationalContent->created_at->translatedFormat('l, F j, Y') }}</span>

                                            <div class="mt-3">
                                                <p class="text-sm text-gray-700 dark:text-gray-300">{{ Str::limit($educationalContent->content, 120) }}</p>
                                            </div>

                                            {{-- button read more --}}
                                            <div class="mt-4">
                                                <a href="{{ route('educational-contents.show', $educationalContent->id) }}" class="block rounded-md bg-teal-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Read more</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 px-4">
                            {!! $educationalContents->withQueryString()->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
