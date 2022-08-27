<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = app(Category::class)->getCategories();
        return view('categories.index', [
            'categoryList' => $categories
        ]);
    }
}
