<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
	const DEFAULT_IMAGE = "326084549.jpg";

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Product $products)
	{
		return ProductResource::collection($products->with('categories')->paginate(5));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($product_id = null)
	{
		$categories = Category::all();
		$category_id = null;
		if ($product_id !== null) {
			$product = Product::findOrFail($product_id);
			foreach ($product->categories as $cat) {
				$category_id = $cat->id;
			}
		} else {
			$product = null;
		}

		return view('frontend.products._form', [
			'product_id' => $product_id,
			'categories' => $categories,
			'category_id' => $category_id,
			'product' => $product
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'category_id' => 'required|numeric',
			'product_image' => 'image|mimes:jpeg,png,jpg|max:2048',

		]);

		$product = $request->input('product_id') !== null ? Product::find($request->product_id) : new Product;

		$product->id = $request->input('product_id');
		$product->name = $request->input('name');
		$product->description = $request->input('description');

		$image = $request->file('product_image');
		if (!empty($request->file('product_image'))) {
			$new_name = rand() . "." . $image->getClientOriginalExtension();
			$path = $image->move(public_path("images"), $new_name);
			$product->path = $new_name;
		} else {
			if ($request->input('product_id') == null) {
				$product->path = self::DEFAULT_IMAGE;
			}
		}

		$category_id = $request->input('category_id');

		if ($product->save()) {
			$product->categories()->detach();
			$product->categories()->attach($category_id);
			return new ProductResource($product);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		return new ProductResource($product);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id);
		if ($product->delete()) {
			return new ProductResource($product);
		}

	}
}
