@extends('layouts.master')

@section('title')
   Categories
@endsection

@section('content')

    <div id="app">
        <app></app>


    <ul>
        @foreach($categories as $category)
            <li>
                <router-link :to="{ name: 'products+{{$category->id}}' }"> {{ $category->name }}</router-link>

                @if($category->children)
                    <ul>
                        @foreach($category->children as $cats)
                            <li>
                                {{ $cats->name }}

                                @if($cats->children)
                                    <ul>
                                        @foreach($cats->children as $cat)
                                            <li>{{$cat->name}}</li>
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
    </div>
    <script src="{{mix('js/app.js')}}"></script>

@endsection