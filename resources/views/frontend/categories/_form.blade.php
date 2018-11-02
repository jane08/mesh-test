@extends('layouts.master')

@section('title')
    Categories
@endsection

@section('content')

    @if (@count($errors) > 0)
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category_store') }}" method="post">

        <input type="hidden" name="category_id" id="category_id" value="{{ $category_id  }}">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        <label for="category_id">Category: </label>
        <input type="text" name="category_id" id="category_id">
        <button type="submit" > Submit </button>
        <input type="hidden" value="{{ Session::token() }}" name="_token">
    </form>

@endsection