<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Learning Styles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow dark:bg-gray-800 dark:text-white sm:rounded-lg sm:p-8">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">{{ __('Learning Styles') }}</h1>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">A list of all the {{ __('Learning Styles') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('learning-styles.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-900">
                                        <tr>
                                            <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-white">No</th>

                                            <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-white">Type</th>
                                            <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-white">Description</th>

                                            <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-white"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800 dark:text-white">
                                        @foreach ($learningStyles as $learningStyle)
                                            <tr class="even:bg-gray-50 dark:bg-gray-800 dark:text-white dark:even:bg-gray-700">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 dark:text-white">{{ ++$i }}</td>

                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-white">{{ $learningStyle->type }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-white">{{ $learningStyle->description }}</td>

                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white">
                                                    <form action="{{ route('learning-styles.destroy', $learningStyle->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('learning-styles.show', $learningStyle->id) }}" class="mr-2 font-bold text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-gray-400">{{ __('Show') }}</a>

                                                        @if (!in_array(\Str::lower($learningStyle->type), ['visual', 'auditory', 'kinesthetic']))
                                                            <a href="{{ route('learning-styles.edit', $learningStyle->id) }}" class="mr-2 font-bold text-indigo-600 hover:text-indigo-900 dark:hover:text-indigo-400">{{ __('Edit') }}</a>
                                                            <a href="{{ route('learning-styles.destroy', $learningStyle->id) }}" class="font-bold text-red-600 hover:text-red-900 dark:hover:text-red-400" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $learningStyles->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
