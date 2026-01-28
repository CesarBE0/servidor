<x-layouts.layout title="{{ $book->title }} - Lectio">
    <div class="container mx-auto px-6 py-8">
        <a href="{{ route('catalogo') }}" class="inline-flex items-center text-gray-500 hover:text-brand-red mb-8 transition"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>Volver al catálogo</a>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="flex justify-center lg:justify-start">
                <div class="w-full max-w-md bg-gray-50 p-8 rounded-lg border border-gray-100"><img src="{{ asset($book->image_url) }}" alt="{{ $book->title }}" class="w-full h-auto object-contain shadow-xl rounded-sm"></div>
            </div>
            <div>
                <h1 class="text-4xl md:text-5xl font-serif font-bold text-gray-900 mb-2">{{ $book->title }}</h1>
                <p class="text-xl text-gray-500 mb-4">by <span class="text-gray-900 font-medium">{{ $book->author }}</span></p>
                <div class="flex items-center gap-2 mb-6">
                    <div class="rating rating-sm rating-half">@for($i=1; $i<=5; $i++) <input type="radio" class="mask mask-star-2 bg-brand-red" @if(round($book->rating) == $i) checked @endif disabled /> @endfor</div>
                    <span class="text-gray-500 text-sm font-medium">{{ $book->rating }} ({{ $book->reviews_count }} reviews)</span>
                </div>
                <div class="mb-8"><h3 class="font-bold text-lg mb-2">Sinopsis</h3><p class="text-gray-600 leading-relaxed text-justify">{{ $book->synopsis }}</p></div>
                <div class="mb-8">
                    <h3 class="font-bold text-lg mb-3">Elige formato</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="border-2 border-brand-red rounded-lg p-3 text-center cursor-pointer bg-red-50/10 relative"><div class="text-2xl mb-1">📕</div><div class="font-bold text-sm text-gray-900">Tapa dura</div><div class="text-xs text-gray-500 mb-2">Envío premium</div><div class="text-brand-red font-bold text-sm">${{ number_format($book->price, 2) }}€</div></div>
                        <div class="border border-gray-200 rounded-lg p-3 text-center cursor-pointer hover:border-gray-400 transition"><div class="text-2xl mb-1">📱</div><div class="font-bold text-sm text-gray-900">E-book</div><div class="text-xs text-gray-500 mb-2">Descarga</div><div class="text-gray-900 font-bold text-sm">$14.99€</div></div>
                        <div class="border border-gray-200 rounded-lg p-3 text-center cursor-pointer hover:border-gray-400 transition"><div class="text-2xl mb-1">🎧</div><div class="font-bold text-sm text-gray-900">Audiolibro</div><div class="text-xs text-gray-500 mb-2">Narración pro</div><div class="text-gray-900 font-bold text-sm">$19.99€</div></div>
                    </div>
                </div>
                <div class="mb-8 pt-6 border-t border-gray-100">
                    <p class="text-sm text-gray-500 mb-1">Precio (IVA incluido)</p>
                    <div class="text-4xl font-serif font-bold text-gray-900 mb-6">${{ number_format($book->price, 2) }}€</div>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="btn btn-outline border-brand-red text-brand-red hover:bg-brand-red hover:text-white flex-1 gap-2 normal-case text-lg h-12">Añadir al carrito</button>
                        <button class="btn bg-brand-red border-none text-white hover:bg-red-800 flex-1 normal-case text-lg h-12">Comprar ahora</button>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 mb-10 grid grid-cols-2 gap-y-4 text-sm">
                    <div><span class="block text-gray-500 mb-1">Editorial</span><span class="font-medium text-gray-900">{{ $book->publisher }}</span></div>
                    <div><span class="block text-gray-500 mb-1">Fecha</span><span class="font-medium text-gray-900">{{ $book->published_date }}</span></div>
                    <div><span class="block text-gray-500 mb-1">Idioma</span><span class="font-medium text-gray-900">{{ $book->language }}</span></div>
                    <div><span class="block text-gray-500 mb-1">Páginas</span><span class="font-medium text-gray-900">{{ $book->pages }}</span></div>
                </div>
                <div>
                    <h3 class="font-bold text-2xl font-serif mb-6">Reseñas de lectores</h3>
                    <div class="space-y-6">
                        @foreach($reviews as $review)
                            <div class="border-b border-gray-100 pb-6 last:border-0">
                                <div class="flex justify-between items-center mb-2"><span class="font-bold text-gray-900">{{ $review['user'] }}</span><span class="text-xs text-gray-400">{{ $review['date'] }}</span></div>
                                <div class="rating rating-xs mb-2">@for($i=1; $i<=5; $i++) <input type="radio" class="mask mask-star-2 bg-brand-red" @if($review['rating'] >= $i) checked @endif disabled /> @endfor</div>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ $review['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
