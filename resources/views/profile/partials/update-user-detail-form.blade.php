<section>
    <header>
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Perbarui Detail Pengguna') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Perbarui detail pengguna akun Anda.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update.detail') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- kelas, jurusan, tempat lahir, tanggal lahir, no hp, alamat (textarea) --}}
        <div class="flex gap-3">
            <div class="w-full">
                <x-input-label for="kelas" :value="__('Kelas')" />
                <select id="kelas" name="kelas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600" required autofocus autocomplete="off">
                    <option value="">-- {{ __('Pilih Kelas') }} --</option>
                    <option value="X" {{ old('kelas', $detail?->kelas) === 'X' ? 'selected' : '' }}>X</option>
                    <option value="XI" {{ old('kelas', $detail?->kelas) === 'XI' ? 'selected' : '' }}>XI</option>
                    <option value="XII" {{ old('kelas', $detail?->kelas) === 'XII' ? 'selected' : '' }}>XII</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('kelas')" />
            </div>

            <div class="w-full">
                <?php 
                    $jurusan = ["ANIMASI", "PPLG", "RPL", "TKJ"];
                    sort($jurusan);
                ?>
                
                <x-input-label for="jurusan" :value="__('Jurusan')" />
                <select id="jurusan" name="jurusan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600" required autofocus autocomplete="off">
                    <option value="">-- {{ __('Pilih Jurusan') }} --</option>
                    @foreach ($jurusan as $item)
                        <option value="{{ $item }}" {{ old('jurusan', $detail?->jurusan) === $item ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('jurusan')" />
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-3">
            <div class="w-full">
                <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                <x-text-input id="tempat_lahir" name="tempat_lahir" type="text" class="mt-1 block w-full" :value="old('tempat_lahir', $detail?->tempat_lahir)" required autofocus autocomplete="off" />
                <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
            </div>

            <div class="w-full">
                <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                <x-text-input id="tanggal_lahir" name="tanggal_lahir" type="date" class="mt-1 block w-full" :value="old('tanggal_lahir', $detail?->tanggal_lahir->format('Y-m-d'))" required autofocus autocomplete="off" />
                <x-input-error class="mt-2" :messages="$errors->get('tanggal_lahir')" />
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-3">
            <div class="w-full">
                <x-input-label for="no_hp" :value="__('No HP')" />
                <x-text-input id="no_hp" name="no_hp" type="number" min="0" class="mt-1 block w-full" :value="old('no_hp', $detail?->no_hp)" required autofocus autocomplete="off" />
                <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
            </div>

            {{-- gender --}}
            <div class="w-full">
                <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600" required autofocus autocomplete="off">
                    <option value="">-- {{ __('Pilih Jenis Kelamin') }} --</option>
                    <option value="L" {{ old('jenis_kelamin', $detail?->jenis_kelamin) === 'L' ? 'selected' : '' }}>{{ __('Laki-laki') }}</option>
                    <option value="P" {{ old('jenis_kelamin', $detail?->jenis_kelamin) === 'P' ? 'selected' : '' }}>{{ __('Perempuan') }}</option>
                </select>

                <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
            </div>
        </div>


        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            {{-- <x-textarea id="alamat" name="alamat" class="mt-1 block w-full" :value="old('alamat', $detail?->alamat)" required autofocus autocomplete="off" /> --}}
            <textarea id="alamat" name="alamat" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600" required autofocus autocomplete="off">{{ old('alamat', $detail?->alamat) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'detail-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Detail Saved.') }}</p>
            @endif
        </div>

    </form>
</section>
