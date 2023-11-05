<div class="mb-4">
    @if (session('success'))
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Sukces
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Błąd
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    @if (session('warning'))
        <div class="bg-orange-500 text-white font-bold rounded-t px-4 py-2">
            Ostrzeżenie
        </div>
        <div class="border border-t-0 border-orange-400 rounded-b bg-orange-100 px-4 py-3 text-orange-700">
            <p>{{ session('warning') }}</p>
        </div>
    @endif

    @if (session('info'))
        <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2">
            Informacja
        </div>
        <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
            <p>{{ session('info') }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Wystąpiły błędy
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
