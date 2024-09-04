<div class="space-y-6">
    
    <div>
        <x-input-label for="user_id" :value="__('User Id')"/>
        <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" :value="old('user_id', $userLearningStyle?->user_id)" autocomplete="user_id" placeholder="User Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('user_id')"/>
    </div>
    <div>
        <x-input-label for="learning_style_id" :value="__('Learning Style Id')"/>
        <x-text-input id="learning_style_id" name="learning_style_id" type="text" class="mt-1 block w-full" :value="old('learning_style_id', $userLearningStyle?->learning_style_id)" autocomplete="learning_style_id" placeholder="Learning Style Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('learning_style_id')"/>
    </div>
    <div>
        <x-input-label for="assessment_id" :value="__('Assessment Id')"/>
        <x-text-input id="assessment_id" name="assessment_id" type="text" class="mt-1 block w-full" :value="old('assessment_id', $userLearningStyle?->assessment_id)" autocomplete="assessment_id" placeholder="Assessment Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('assessment_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>