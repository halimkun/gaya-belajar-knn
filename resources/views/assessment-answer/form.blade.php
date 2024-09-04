<div class="space-y-6">
    
    <div>
        <x-input-label for="assessment_id" :value="__('Assessment Id')"/>
        <x-text-input id="assessment_id" name="assessment_id" type="text" class="mt-1 block w-full" :value="old('assessment_id', $assessmentAnswer?->assessment_id)" autocomplete="assessment_id" placeholder="Assessment Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('assessment_id')"/>
    </div>
    <div>
        <x-input-label for="question_id" :value="__('Question Id')"/>
        <x-text-input id="question_id" name="question_id" type="text" class="mt-1 block w-full" :value="old('question_id', $assessmentAnswer?->question_id)" autocomplete="question_id" placeholder="Question Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('question_id')"/>
    </div>
    <div>
        <x-input-label for="answer_id" :value="__('Answer Id')"/>
        <x-text-input id="answer_id" name="answer_id" type="text" class="mt-1 block w-full" :value="old('answer_id', $assessmentAnswer?->answer_id)" autocomplete="answer_id" placeholder="Answer Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('answer_id')"/>
    </div>
    <div>
        <x-input-label for="answer" :value="__('Answer')"/>
        <x-text-input id="answer" name="answer" type="text" class="mt-1 block w-full" :value="old('answer', $assessmentAnswer?->answer)" autocomplete="answer" placeholder="Answer"/>
        <x-input-error class="mt-2" :messages="$errors->get('answer')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>