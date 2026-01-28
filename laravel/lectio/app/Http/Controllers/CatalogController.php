<?php

namespace App\Http\Controllers;

use App\Models\Book;

class CatalogController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('catalogo', compact('books'));
    }
}
