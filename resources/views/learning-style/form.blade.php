<div class="space-y-6">
    
    <div>
        <x-input-label for="type" :value="__('Type')"/>
        <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" :value="old('type', $learningStyle?->type)" autocomplete="type" placeholder="Type"/>
        <x-input-error class="mt-2" :messages="$errors->get('type')"/>
    </div>
    <div>
        <x-input-label for="description" :value="__('Description')"/>
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $learningStyle?->description)" autocomplete="description" placeholder="Description"/>
        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>