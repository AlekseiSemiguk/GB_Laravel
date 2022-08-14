<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = $this->getCategories();
        return view('category.index', [
            'categoryList' => $categories
        ]);
    }
}
