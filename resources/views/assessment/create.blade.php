<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create') }} Assessment
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-4 shadow sm:rounded-lg sm:p-8 mb-10">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">{{ __('Fill') }} Assessment</h1>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">Fill new {{ __('Assessment') }}.</p>
                        </div>
                        {{-- <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('assessments.index') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                        </div> --}}
                    </div>

                    <div class="flow-root">
                        <div class="overflow-x-auto">
                            <div class="py-2 align-middle">
                                <form method="POST" action="{{ route('assessments.store') }}" role="form" enctype="multipart/form-data">
                                    @csrf

                                    @include('assessment.form')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
