<div>
    @if (session('success'))
        {{-- <div class="dark:bg-green-900 dark:border-green-700 dark:text-green-300 bg-green-100 border-green-400 text-green-700 px-3 py-2 rounded-lg relative" role="alert"> --}}
        <div class="dark:text-green-300 text-green-700 rounded-lg" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        {{-- <div class="dark:bg-red-900 dark:border-red-700 dark:text-red-300 bg-red-100 border-red-400 text-red-700 px-3 py-2 rounded-lg relative" role="alert"> --}}
        <div class="dark:text-red-300 text-red-700 rounded-lg" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    @if ($errors->any())
        {{-- <div class="dark:bg-yellow-900 dark:border-yellow-700 dark:text-yellow-300 bg-yellow-100 border-yellow-400 text-yellow-700 px-3 py-2 rounded-lg relative" role="alert"> --}}
        <div class="dark:text-yellow-300 text-yellow-700 rounded-lg" role="alert">
            <strong class="font-bold">Errors!</strong>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>