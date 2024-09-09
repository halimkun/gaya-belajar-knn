<div class="space-y-6">
    
    <div>
        <x-input-label for="question" :value="__('Question')"/>
        <x-text-input id="question" name="question" type="text" class="mt-1 block w-full" :value="old('question', $question?->question)" autocomplete="question" placeholder="Question"/>
        <x-input-error class="mt-2" :messages="$errors->get('question')"/>
    </div>
    {{-- <div>
        <x-input-label for="type" :value="__('Type')"/>
        <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" :value="old('type', $question?->type)" autocomplete="type" placeholder="Type"/>
        <x-input-error class="mt-2" :messages="$errors->get('type')"/>
    </div> --}}
    <div>
        <x-input-label for="type" :value="__('Type')"/>
        <select id="type" name="type" class="w-full mt-1.5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            @foreach (['choice', 'multiple_choice', 'boolean', 'text', 'number'] as $item)
                <option value="{{ $item }}" @if(old('type', $question?->type) == $item) selected @endif>
                    {{ Str::replace('_', ' ', Str::title($item)) }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('type')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>