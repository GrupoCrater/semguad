<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <!-- Logo -->
    <div class="shrink-0 flex items-center" style="width:120px;">
        <a href="{{ route('boletos.index') }}">
            <img src="{{ asset('imagenes/boletoPDF/seminario.png') }}" alt="">
        </a>
    </div>
    {{-- End Logo --}}

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
