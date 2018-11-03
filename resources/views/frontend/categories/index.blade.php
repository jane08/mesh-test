@extends('layouts.master')

@section('title')
   Categories
@endsection

@section('content')


        <app :categories="{{ $categories }}"></app>


    <ul>
        @foreach($categories as $category)
            <li>
                <router-link :to="{ name: 'products',params : {category_id : {{$category->id}}}}"> {{ $category->name }} </router-link>

                @if($category->children)
                    <ul>
                        @foreach($category->children as $cats)
                            <li>

                                <router-link :to="{ name: 'products',params : {category_id : {{$cats->id}}}}"> {{ $cats->name }} </router-link>
                                @if($cats->children)
                                    <ul>
                                        @foreach($cats->children as $cat)
                                            <li>
                                                <router-link :to="{ name: 'products',params : {category_id : {{$cat->id}}}}"> {{ $cat->name }} </router-link>

                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
    <hr>



@endsection