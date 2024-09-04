<div class="space-y-6">
    
    <div>
        <x-input-label for="question" :value="__('Question')"/>
        <x-text-input id="question" name="question" type="text" class="mt-1 block w-full" :value="old('question', $question?->question)" autocomplete="question" placeholder="Question"/>
        <x-input-error class="mt-2" :messages="$errors->get('question')"/>
    </div>
    <div>
        <x-input-label for="type" :value="__('Type')"/>
        <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" :value="old('type', $question?->type)" autocomplete="type" placeholder="Type"/>
        <x-input-error class="mt-2" :messages="$errors->get('type')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>