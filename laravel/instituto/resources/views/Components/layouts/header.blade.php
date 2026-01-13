<header class="h-header bg-header flex justify-between items-center px-8 shadow-md">

    {{-- Logo --}}
    <div class="flex items-center h-full">
        <img src="{{ asset("img/logo.png") }}" alt="logo" class="h-14 w-auto object-contain bg-white/20 rounded p-1">
    </div>

    {{-- Título --}}
    <h1 class="text-3xl font-bold text-white tracking-tight drop-shadow-md">
        GESTIÓN DEL INSTITUTO
    </h1>

    {{-- Botones --}}
    <div class="flex items-center gap-4">
        @auth
            <div class="flex items-center gap-2 bg-white px-3 py-1 rounded-full border border-blue-200 shadow-sm">
                <span class="text-sm text-gray-600">Hola,</span>
                <span class="font-semibold text-btn-marino">{{ auth()->user()->name }}</span>
            </div>
        @endauth

        @guest
            <div class="flex gap-3">
                {{-- Botón Login --}}
                <a href="#" class="bg-btn-marino hover:bg-black text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out shadow-lg">
                    Login
                </a>

                {{-- Botón Register --}}
                <a href="#" class="bg-btn-marino hover:bg-black text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out shadow-lg">
                    Register
                </a>
            </div>
        @endguest
    </div>
</header>
