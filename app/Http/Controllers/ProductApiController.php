<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $products)
    {
      //  $products = Product::paginate(5);
        return ProductResource::collection($products->with('categories')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id = null)
    {
        return view('frontend.products._form', ['product_id' => $product_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required|unique:products',
            'category_id'=>'required|numeric',

        ]);

        $product = $request->input('product_id') !== null ? Product::find($request->product_id) : new Product;

        $product->id =  $request->input('product_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->path = 'path';
        $category_id = $request->input('category_id');

        if($product->save()) {
           // if($request->input('product_id') !== null) {
                $product->categories()->detach();
            //}
            $product->categories()->attach($category_id);
            return new ProductResource($product);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return  new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product->delete()){
            return new ProductResource($product);
        }

    }
}
