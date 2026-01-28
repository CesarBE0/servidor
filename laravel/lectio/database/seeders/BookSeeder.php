<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::truncate(); // Limpia la tabla antes de insertar

        $defaultSynopsis = "Entre la vida y la muerte hay una biblioteca. Cada libro ofrece la oportunidad de probar otra vida que podrías haber vivido. Una obra maestra que explora la profundidad de la experiencia humana.";

        $books = [
            // --- Sección Descuentos (Home) ---
            [
                'title' => 'La insoportable levedad del ser',
                'author' => 'Milan Kundera',
                'category' => 'Filosofía',
                'pages' => 320,
                'price' => 17.42,
                'old_price' => 22.50,
                'discount_percent' => '-20%',
                'image_url' => 'img/libro2.png',
                'is_bestseller' => false
            ],
            [
                'title' => 'Cosmos de una muerte...',
                'author' => 'Gabriel García Márquez',
                'category' => 'Novela',
                'pages' => 150,
                'price' => 14.99,
                'old_price' => 19.99,
                'discount_percent' => '-25%',
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => false
            ],
            [
                'title' => 'Mujeres fuertes',
                'author' => 'Gustavo Macaut',
                'category' => 'Ensayo',
                'pages' => 210,
                'price' => 13.89,
                'old_price' => 18.80,
                'discount_percent' => '-26%',
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => false
            ],

            // --- Sección Bestsellers (Home) y Catálogo ---
            [
                'title' => 'Don Quijote de la Mancha',
                'author' => 'Miguel de Cervantes',
                'category' => 'Novela',
                'pages' => 863,
                'price' => 24.99,
                'old_price' => null,
                'discount_percent' => null,
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => true
            ],
            [
                'title' => 'Cien años de soledad',
                'author' => 'Gabriel García Márquez',
                'category' => 'Novela',
                'pages' => 417,
                'price' => 19.99,
                'old_price' => null,
                'discount_percent' => null,
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => true
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'category' => 'Distopía',
                'pages' => 328,
                'price' => 16.99,
                'old_price' => null,
                'discount_percent' => null,
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => true
            ],
            [
                'title' => 'Orgullo y prejuicio',
                'author' => 'Jane Austen',
                'category' => 'Romántica',
                'pages' => 279,
                'price' => 18.99,
                'old_price' => null,
                'discount_percent' => null,
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => false
            ],
            [
                'title' => 'La Odisea',
                'author' => 'Homero',
                'category' => 'Épica',
                'pages' => 541,
                'price' => 21.99,
                'old_price' => null,
                'discount_percent' => null,
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => false
            ],
            [
                'title' => 'El señor de los anillos',
                'author' => 'J.R.R. Tolkien',
                'category' => 'Fantasía',
                'pages' => 1178,
                'price' => 34.99,
                'old_price' => null,
                'discount_percent' => null,
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => true
            ],
            [
                'title' => 'Fahrenheit 451',
                'author' => 'Ray Bradbury',
                'category' => 'Distopía',
                'pages' => 249,
                'price' => 15.99,
                'old_price' => null,
                'discount_percent' => null,
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => true
            ],
            [
                'title' => 'La sombra del viento',
                'author' => 'Carlos Ruiz Zafón',
                'category' => 'Novela',
                'pages' => 565,
                'price' => 22.99,
                'old_price' => null,
                'discount_percent' => null,
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => true
            ],
            [
                'title' => 'El principito',
                'author' => 'Antoine de Saint-Exupéry',
                'category' => 'Fábula',
                'pages' => 96,
                'price' => 12.99,
                'old_price' => null,
                'discount_percent' => null,
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => false
            ],
            [
                'title' => 'Crimen y castigo',
                'author' => 'Fiódor Dostoyevski',
                'category' => 'Novela',
                'pages' => 671,
                'price' => 25.99,
                'old_price' => null,
                'discount_percent' => null,
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => false
            ],
            [
                'title' => 'La República',
                'author' => 'Platón',
                'category' => 'Filosofía',
                'pages' => 389,
                'price' => 14.60,
                'old_price' => 16.80,
                'discount_percent' => '-15%',
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => false
            ],
            [
                'title' => 'Matar a un ruiseñor',
                'author' => 'Harper Lee',
                'category' => 'Novela',
                'pages' => 336,
                'price' => 19.99,
                'old_price' => null,
                'discount_percent' => null,
                'image_url' => 'img/libro1.jpg',
                'is_bestseller' => false
            ],
        ];

        foreach ($books as $book) {
            // Rellenamos datos faltantes por defecto para que no de error
            $fullBook = array_merge([
                'synopsis' => $defaultSynopsis,
                'publisher' => 'Penguin Books',
                'language' => 'Español',
                'published_date' => 'Ene 2026',
                'rating' => 4.5,
                'reviews_count' => rand(5, 50),
                'old_price' => null,
                'discount_percent' => null,
                'is_bestseller' => false
            ], $book);

            Book::create($fullBook);
        }
    }
}
