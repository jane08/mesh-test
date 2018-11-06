<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create(5);

/*        $categories = [
            [
                'name' => 'Books',
                'children' => [
                    [
                        'name' => 'Comic Book',
                        'children' => [
                            ['name' => 'Marvel Comic Book'],
                            ['name' => 'DC Comic Book'],
                            ['name' => 'Action comics'],
                        ],
                    ],
                    [
                        'name' => 'Textbooks',
                        'children' => [
                            ['name' => 'Business'],
                            ['name' => 'Finance'],
                            ['name' => 'Computer Science'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Electronics',
                'children' => [
                    [
                        'name' => 'TV',
                        'children' => [
                            ['name' => 'LED'],
                            ['name' => 'Blu-ray'],
                        ],
                    ],
                    [
                        'name' => 'Mobile',
                        'children' => [
                            ['name' => 'Samsung'],
                            ['name' => 'Honor'],
                            ['name' => 'Xiomi'],
                        ],
                    ],
                ],
            ],
        ];

        foreach($categories as $category)
        {
            \App\Category::create($category);
        }*/


        $categories = [
            [
                'name' => $faker->text(20),
                'children' => [
                    [
                        'name' => $faker->text(20),
                        'children' => [
                            ['name' => $faker->text(20)],
                            ['name' => $faker->text(20)],
                            ['name' => $faker->text(20)],
                        ],
                    ],
                    [
                        'name' => $faker->text(20),
                        'children' => [
                            ['name' => $faker->text(20)],
                            ['name' => $faker->text(20)],
                            ['name' => $faker->text(20)],
                        ],
                    ],
                ],
            ],
            [
                'name' => $faker->text(20),
                'children' => [
                    [
                        'name' => $faker->text(20),
                        'children' => [
                            ['name' => $faker->text(20)],
                            ['name' => $faker->text(20)],
                        ],
                    ],
                    [
                        'name' => $faker->text(20),
                        'children' => [
                            ['name' => $faker->text(20)],
                            ['name' => $faker->text(20)],
                            ['name' => $faker->text(20)],
                        ],
                    ],
                ],
            ],
        ];

        foreach($categories as $category)
        {
            \App\Category::create($category);
        }


        $cats = App\Category::all();

        foreach($cats as $cat){

            $product = new App\Product();
            $product->name = $faker->text(20);
            $product->description = $faker->text(100);
            $product->path = "326084549.jpg";
            $product->save();
            $cat->products()->attach($product->id);
        }
    }
}
