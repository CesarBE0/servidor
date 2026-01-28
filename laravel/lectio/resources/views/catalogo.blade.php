<x-layouts.layout title="Catálogo - Lectio">
    <div class="bg-white min-h-screen">
        <main class="container mx-auto px-6 py-12">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-serif text-brand-red font-bold mb-2">Nuestro Catálogo</h1>
                <p class="text-gray-500">Explora nuestra colección completa.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($books as $book)
                    <a href="{{ route('books.show', $book->id) }}" class="block h-full group">
                        <div class="card bg-white shadow-sm hover:shadow-2xl transition-all duration-300 border border-gray-200 h-full">
                            <figure class="h-[350px] w-full bg-gray-50 p-6 border-b border-gray-100">
                                <img src="{{ asset($book->image_url) }}" alt="{{ $book->title }}" class="h-full w-auto object-contain drop-shadow-md transform group-hover:scale-105 transition duration-500" />
                            </figure>
                            <div class="card-body p-6 text-center items-center">
                                <h2 class="card-title font-serif font-bold text-lg text-gray-900 leading-tight mb-1 line-clamp-2 min-h-[3.5rem]">{{ $book->title }}</h2>
                                <p class="text-gray-800 font-medium text-sm flex-grow-0">{{ $book->author }}</p>
                                <div class="badge badge-ghost text-xs text-gray-400 mt-2 mb-4 p-3">{{ $book->category }} • {{ $book->pages }} págs</div>
                                <div class="card-actions w-full mt-auto border-t border-gray-100 pt-4 justify-center"><span class="text-brand-red font-bold text-xl">${{ number_format($book->price, 2) }}€</span></div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </main>
    </div>
</x-layouts.layout>
