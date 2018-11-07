@extends('layouts.master')

@section('title')
    Categories
@endsection

@section('content')

    <div class="block">
        <div class="columns is-desktop">
            <div class="column is-two-fifths">
                <aside class="menu">
                    <ul class="menu-list">
						<?php
						$traverse = function ($categories, $prefix = ' ') use (&$traverse) {
						foreach ($categories as $category) {
						?>

                        <li>
                            <router-link
                                    :to="{ name: 'products',params : {category_id : {{$category->id}}}}"> {{ $category->name }} </router-link>
							<?php
							if($category->children){
							?>
                            <ul>
                                <li>
                                    {{ $traverse($category->children, $prefix . '-')}}
                                </li>
                            </ul>
							<?php
							}

							?>
                        </li>

						<?php
						}

						};
						?>
						<?php
						$traverse($categories);
						?>
                    </ul>
                </aside>
            </div>
            <div class="column">
                <app :categories="{{ $categories }}"></app>

            </div>

        </div>
    </div>

@endsection