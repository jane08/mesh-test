<?php

namespace Tests\Unit;

use App\Category;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
	/**
	 * A product test.
	 *
	 * @return void
	 */

	/** @test */
	public function it_can_see_list_of_products()
	{
		$response = $this->getJson('/api/products');
		//dd($response->getContent());
		$response->assertStatus(200)
			->assertJsonStructure([
				'data' => [
					'*' => [
						'id',
						'name',
						'description',
						'path',
						'categories' => [
							'*' => ['id', 'name', 'parent_id']
						]
					]
				]
			]);
	}


	/** @test */
	public function it_can_see_single_product_item()
	{
		$product = Product::first();

		$response = $this->getJson("/api/product/" . $product->id);
		//dd($response->getContent());
		$response->assertStatus(200)
			->assertJsonStructure([
				'data' => [
					'id',
					'name',
					'description',
					'categories'
				]
			]);
	}

	/** @test */
	public function it_can_create_a_product()
	{
		$faker = \Faker\Factory::create();
		//	$product = factory(Product::class)->create();
		$category = Category::first();
		$body = [
			'name' => $faker->name,
			'description' => $faker->text,
			'path' => '326084549.jpg',
			'category_id' => $category->id,
			//'categories_ids' => $cats->pluck('id')->toArray(),
		];


		$response = $this->json('POST', 'api/product', $body);
		//dd($response->getContent());
		$response
			->assertStatus(201)
			->assertJsonStructure([
				'data' => [
					'id',
					'name',
					'description',
					'path',
					'categories' => [
						'*' => ['id', 'name', 'parent_id']
					]
				]
			]);

	}

	/** @test */
	public function it_can_update_a_product()
	{
		$faker = \Faker\Factory::create();
		$product = Product::first();
		$category = Category::first();
		$body = [
			'product_id' => $product->id,
			'name' => 'changed',
			'description' => $faker->text,
			'path' => '326084549.jpg',
			'category_id' => $category->id,
			//'categories_ids' => $cats->pluck('id')->toArray(),
		];


		$response = $this->putJson('api/product', $body);
		//dd($response->getContent());
		$response
			->assertStatus(200)
			->assertJsonStructure([
				'data' => [
					'id',
					'name',
					'description',
					'path',
					'categories' => [
						'*' => ['id', 'name', 'parent_id']
					]
				]
			])
			->assertJson([
				'data' => [
					'name' => 'changed'
				]
			]);

	}

	/** @test */
	public function it_can_delete_product()
	{
		$product = Product::first();

		$this->getJson("/api/delete/product/{$product->id}", [])
			->assertStatus(200);

		$this->assertDatabaseMissing('products', ['id' => $product->id]);
	}

}
