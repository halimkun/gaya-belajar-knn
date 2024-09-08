<div class="space-y-6">
    
    <div>
        <x-input-label for="title" :value="__('Title')"/>
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $educationalContent?->title)" autocomplete="title" placeholder="Title"/>
        <x-input-error class="mt-2" :messages="$errors->get('title')"/>
    </div>
    <div>
        <x-input-label for="learning_style_id" :value="__('Learning Style Type')"/>
        <select id="learning_style_id" name="learning_style_id" class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">Select Learning Style Type</option>
            @foreach ($learningStyles as $learningStyle)
                <option value="{{ $learningStyle->id }}" {{ old('learning_style_id', $educationalContent?->learning_style_id) == $learningStyle->id ? 'selected' : '' }}>{{ Str::title($learningStyle->type) }}</option>
            @endforeach
            </select>
        <x-input-error class="mt-2" :messages="$errors->get('learning_style_id')"/>
    </div>
    <div>
        <x-input-label for="content" :value="__('Content')"/>
        <textarea id="content" name="content" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="3" placeholder="Content">{{ old('content', $educationalContent?->content) }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('content')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>