<div class="space-y-6">

    <div class="flex flex-col xl:flex-row gap-3 w-full">
        <div class="w-full">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user?->name)" autocomplete="name" placeholder="Name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div class="w-full">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $user?->email)" autocomplete="email" placeholder="Email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
    </div>

    <div class="flex flex-col xl:flex-row gap-3 w-full">
        <div class="w-full">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" placeholder="Password" />
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        {{-- select $roles --}}
        <div class="w-full">
            <x-input-label for="role" :value="__('Role')" class="mb-1"/>
            <select id="role" name="role" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">Select Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" {{ old('role', $user?->hasRole($role->name)) ? 'selected' : '' }}>[+] {{ $role->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('role')" />
        </div>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
