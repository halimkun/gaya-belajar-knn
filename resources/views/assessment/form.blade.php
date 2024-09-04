<div class="space-y-6">
    
    <div>
        <x-input-label for="user_id" :value="__('User Id')"/>
        <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" :value="old('user_id', $assessment?->user_id)" autocomplete="user_id" placeholder="User Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('user_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>