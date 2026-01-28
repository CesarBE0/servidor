<x-layouts.layout title="Inicio - Lectio">
    <div class="hero py-16 bg-brand-bg">
        <div class="hero-content text-center">
            <div class="max-w-2xl">
                <h1 class="text-3xl md:text-4xl font-serif text-gray-800 mb-6 leading-tight">Descubre cincuenta novelistas y los libros más vendidos del momento</h1>
                <a href="{{ route('catalogo') }}" class="btn bg-gray-900 text-white hover:bg-gray-700 border-none btn-lg px-8 min-h-[3rem] h-12">Ir al catálogo</a>
            </div>
        </div>
    </div>

    <section class="container mx-auto px-6 py-12">
        <h2 class="text-3xl text-brand-red font-serif font-bold mb-8 flex items-center gap-2"><span>🔥</span> Descuentos destacados</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($descuentos as $libro)
                <a href="{{ route('books.show', $libro->id) }}" class="block h-full group">
                    <div class="card bg-white shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 h-full">
                        <figure class="px-4 pt-4 h-72 bg-gray-50 relative">
                            <span class="badge badge-error text-white font-bold absolute top-2 right-2 z-10 p-3">{{ $libro->discount_percent }}</span>
                            <img src="{{ asset($libro->image_url) }}" alt="{{ $libro->title }}" class="h-full object-contain drop-shadow-lg transform group-hover:scale-105 transition duration-300" />
                        </figure>
                        <div class="card-body p-5 items-start text-left">
                            <h2 class="card-title text-lg leading-tight text-gray-900 font-bold line-clamp-2 min-h-[3.5rem]">{{ $libro->title }}</h2>
                            <p class="text-gray-500 text-sm flex-grow-0">{{ $libro->author }}</p>
                            <div class="card-actions justify-start items-center w-full mt-auto pt-3 border-t border-gray-50">
                                @if($libro->old_price) <span class="text-gray-400 line-through text-sm mr-2">${{ number_format($libro->old_price, 2) }}€</span> @endif
                                <span class="text-brand-red font-bold text-xl">${{ number_format($libro->price, 2) }}€</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section class="bg-white py-12">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl text-brand-red font-serif font-bold mb-8 flex items-center gap-2"><span>📚</span> Los más comprados</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($populares as $libro)
                    <a href="{{ route('books.show', $libro->id) }}" class="block h-full group">
                        <div class="card bg-white shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 h-full">
                            <figure class="px-4 pt-4 h-72 bg-gray-50"><img src="{{ asset($libro->image_url) }}" alt="{{ $libro->title }}" class="h-full object-contain drop-shadow-lg transform group-hover:scale-105 transition duration-300" /></figure>
                            <div class="card-body p-5">
                                <h2 class="card-title text-lg leading-tight font-bold line-clamp-2">{{ $libro->title }}</h2>
                                <p class="text-gray-500 text-sm">{{ $libro->author }}</p>
                                <div class="card-actions mt-2 pt-2 border-t border-gray-50 w-full"><span class="text-gray-900 font-bold text-lg">${{ number_format($libro->price, 2) }}€</span></div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="container mx-auto px-6 py-16">
        <h2 class="text-3xl text-brand-red font-serif font-bold mb-10 flex items-center gap-2"><span>❝</span> Opiniones de nuestros lectores</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($opiniones as $opinion)
                <div class="card bg-gray-50 border border-gray-100 shadow-sm">
                    <div class="card-body"><p class="italic text-gray-700 mb-4">"{{ $opinion['texto'] }}"</p><div class="flex items-center gap-2"><div class="w-8 h-1 bg-gray-300"></div><span class="font-bold text-sm text-gray-500">{{ $opinion['autor'] }}</span></div></div>
                </div>
            @endforeach
        </div>
    </section>
</x-layouts.layout>
