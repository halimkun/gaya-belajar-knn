<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700 font-semibold">
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Permissions</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (["edit articles", "delete articles", "publish articles", "unpublish articles"] as $key => $permission)
                                <tr class="{{ $key % 2 === 0 ? 'bg-gray-100 dark:bg-gray-600' : 'bg-gray-200 dark:bg-gray-700' }} text-center font-light">
                                    <td class="px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="px-4 py-2">{{ $permission }}</td>
                                    <td class="px-4 py-2">
                                        @if (auth()->user()->can($permission))
                                            <span class="text-green-400">Granted</span>
                                        @else
                                            <span class="text-red-400">Denied</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
