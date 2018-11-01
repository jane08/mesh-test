<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get()->toTree();
        return view('frontend.categories.index', compact('categories'));
    }
}
