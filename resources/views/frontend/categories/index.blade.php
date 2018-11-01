@extends('layouts.master')

@section('title')
   Categories
@endsection

@section('content')
    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
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



@endsection