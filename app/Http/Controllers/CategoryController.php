<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get()->toTree();

        //$traverse($categories);

        return view('frontend.categories.index',  ['categories' => $categories]);
    }

    public function products($category_id = null)
    {
        if($category_id !== null) {
            $products = Category::find($category_id)->products()->get();

        }
        else{
            $products = Product::all();
        }
        return ProductResource::collection($products);
       // return view('frontend.categories.products', ['category_id' => $category_id]);
    }
}
