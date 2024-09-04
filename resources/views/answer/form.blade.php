<div class="space-y-6">
    
    <div>
        <x-input-label for="question_id" :value="__('Question Id')"/>
        <x-text-input id="question_id" name="question_id" type="text" class="mt-1 block w-full" :value="old('question_id', $answer?->question_id)" autocomplete="question_id" placeholder="Question Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('question_id')"/>
    </div>
    <div>
        <x-input-label for="learning_style_id" :value="__('Learning Style Id')"/>
        <x-text-input id="learning_style_id" name="learning_style_id" type="text" class="mt-1 block w-full" :value="old('learning_style_id', $answer?->learning_style_id)" autocomplete="learning_style_id" placeholder="Learning Style Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('learning_style_id')"/>
    </div>
    <div>
        <x-input-label for="answer" :value="__('Answer')"/>
        <x-text-input id="answer" name="answer" type="text" class="mt-1 block w-full" :value="old('answer', $answer?->answer)" autocomplete="answer" placeholder="Answer"/>
        <x-input-error class="mt-2" :messages="$errors->get('answer')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>