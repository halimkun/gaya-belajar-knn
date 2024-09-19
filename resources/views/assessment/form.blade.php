<div class="space-y-6">

    <div>
        {{-- <x-input-label for="user_id" :value="__('User Id')"/> --}}
        <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" :value="old('user_id', Auth::user()->id)" readonly autocomplete="user_id" placeholder="User Id" />
        {{-- <x-input-error class="mt-2" :messages="$errors->get('user_id')"/> --}}
    </div>

    <div class="mb space-y-3">
        @foreach ($questions as $k => $i)
            <div class="w-full p-5 text-gray-200 dark:text-white">
                {{ $i->question }}

                @php $name = $i->type.'_'.($i->id + 8); @endphp

                <div class="mt-2">
                    @if ($i->type == 'number')
                        @php
                            $randomValue = rand(0, 70);
                        @endphp
                        <input min="0" max="100" type="number" name="{{ $name }}" id="{{ $i->id }}" class="mt-1 block w-full max-w-xl rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white" value="{{ old($i->id, $randomValue) }}" placeholder="{{ $i->question }}" />
                        <x-input-error class="mt-2" :messages="$errors->get($name)" />
                    @elseif ($i->type == 'text')
                        <input type="text" name="{{ $name }}" id="{{ $i->id }}" class="mt-1 block w-full max-w-xl rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white" value="{{ old($i->id) }}" placeholder="{{ $i->question }}" />
                        <x-input-error class="mt-2" :messages="$errors->get($name)" />
                    @elseif($i->type == 'choice' || $i->type == 'multiple_choice')
                        @php
                            $checkedId = rand(0, count($i->answers) - 1);
                        @endphp
                        <div class="ml-1">
                            @foreach ($i->answers as $k => $answers)
                                <div class="flex flex-col gap-3">
                                    <label class="flex gap-1">
                                        <div>
                                            @if ($i->type == 'choice')
                                                <input type="radio" name="{{ $name }}" value="{{ $answers->id }}" class="mr-2" {{ $k == $checkedId ? 'checked' : '' }}>
                                            @elseif ($i->type == 'multiple_choice')
                                                <input type="checkbox" name="{{ $name }}[]" value="{{ $answers->id }}" class="mr-2">
                                            @endif
                                        </div>

                                        <div>
                                            {{ $answers->answer }}
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get($name)" />
                    @else
                        <div class="text-red-500">Error: Unknown question type</div>
                    @endif
                </div>
            </div>

            @if ($k < count($questions) - 1)
                <div class="border-b border-gray-200 dark:border-gray-600"></div>
            @endif
        @endforeach
    </div>

    <div class="fixed bottom-0 left-0 w-full bg-white p-3 shadow-md dark:bg-gray-800">
        <div class="flex w-full items-center justify-between gap-4">
            <a href="{{ route('assessments.index') }}" class="text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300">Back</a>
            <x-primary-button>Submit</x-primary-button>
        </div>
    </div>
</div>
