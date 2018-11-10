<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Http\Request;
use App\Http\Requests;

class CategoryApiController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$categories = Category::paginate(5);
		return CategoryResource::collection($categories);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($category_id = null)
	{
		$categories = Category::find($category_id);
		if (!empty($categories)) {
			$categories = $categories->getSiblings();
			//$categories = Category::all();
			if (empty($categories)) {
				$categories = Category::all();
			}
		} else {
			$categories = Category::all();
		}
		if (!is_null($category_id)) {
			$cat = Category::findOrFail($category_id);
		} else {
			$cat = null;
		}

		return view('frontend.categories._form',
			['category_id' => $category_id, 'categories' => $categories, 'cat' => $cat]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$parent = Category::find($request['parent_id']);
		// $node = new Category();
		$node = $request->input('category_id') !== null ? Category::find($request->category_id) : new Category;
		$node->id = $request->input('category_id');
		$node->name = $request['name'];
		$node->parent_id = $request->parent_id;

		//$node->save();
		if ($node->save()) {
			$moved = $node->hasMoved();
		}

		return new CategoryResource($node);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$category = Category::findOrFail($id);
		return new CategoryResource($category);
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
		$category = Category::findOrFail($id);
		if ($category->delete()) {
			return new CategoryResource($category);
		}

	}
}
