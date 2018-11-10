<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * A category test.
     *
     * @return void
     */
	/** @test */
	public function it_can_see_list_of_categories()
	{
		$response = $this->getJson('/api/categories');
		//dd($response->getContent());
		$response->assertStatus(200)
			->assertJsonStructure([
				'data' => [
					'*' => [
						'id',
						'name',
						'parent_id',

					]
				]
			]);
	}

	/** @test */
	public function it_can_see_single_category_item()
	{
		$category = Category::first();

		$response = $this->getJson("/api/category/" . $category->id);
		//dd($response->getContent());
		$response->assertStatus(200)
			->assertJsonStructure([
				'data' => [
					'id',
					'name',
					'parent_id',
				]
			]);
	}

	/** @test */
	public function it_can_create_a_product()
	{
		$faker = \Faker\Factory::create();
		$category = Category::first();
		$body = [
			'name' => $faker->name,
			'parent_id' => $category->id,

		];

		$response = $this->json('POST', 'api/category', $body);
		//dd($response->getContent());
		$response
			->assertStatus(201)
			->assertJsonStructure([
				'data' => [
					'id',
					'name',
					'parent_id',
				]
			]);

	}

	/** @test */
	public function it_can_update_a_category()
	{
		$category = Category::first();
		$body = [
			'category_id' => $category->id,
			'name' => 'changed category',
			'parent_id' => $category->parent_id,
			//'categories_ids' => $cats->pluck('id')->toArray(),
		];
		//dd($category);

		$response = $this->putJson('api/category', $body);
		//dd($response->getContent());
		$response
			->assertStatus(200)
			->assertJsonStructure([
				'data' => [
					'id',
					'name',
					'parent_id',

				]
			])
			->assertJson([
				'data' => [
					'name' => 'changed category'
				]
			]);

	}

	/** @test */
	public function it_can_delete_category()
	{
		$category = Category::first();

		$response =	$this->getJson("/api/delete/category/{$category->id}", []);
//dd($response);
		$response->assertStatus(200);

		$this->assertDatabaseMissing('categories', ['id' => $category->id]);
	}


}
