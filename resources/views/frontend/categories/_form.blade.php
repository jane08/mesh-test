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
    <div class="container">
        <form action="{{ route('category_store') }}" method="post">

            <input type="hidden" name="category_id" id="category_id" value="{{ $category_id  }}">
            <div class="field">
                <label for="name">Name: </label>
                <div class="control">
                    <input type="text" class="input" name="name" id="name" value="{{ is_null($cat)? '': $cat->name }}">
                </div>
            </div>

            <div class="field">

                <label class="label" for="parent_id">Parent Category:</label>
                <div class="control">
                    <div class="select">
                        <select name="parent_id" id="parent_id">
                            <option value={{ null }}>Select category</option>
                            @foreach($categories as $category)

                                <option value="{{ !empty($category)? $category->id : '' }}"

                                        @if ($category->id == $category_id)
                                        disabled
                                        @endif
                                >{{ $category->name }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="control">
                <button type="submit" class="button is-link">Submit</button>
            </div>

            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
    </div>
    <br/>
@endsection