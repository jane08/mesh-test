@extends('layouts.master')

@section('title')
    Products
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
        <form action="{{ route('product_store') }}" method="post" enctype="multipart/form-data">

            <input type="hidden" name="product_id" id="product_id" value="{{ $product_id  }}">
            <div class="field">
                <label for="name">Name: </label>
                <div class="control">
                    <input type="text" name="name" class="input" id="name">
                </div>
            </div>
            <div class="field">
                <label for="description">Description: </label>
                <div class="control">
                    <textarea class="textarea" name="description" id="description"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label" for="category_id">Category:</label>
                <div class="control">
                    <div class="select">
                        <select name="category_id" id="category_id">
                            <option value="36">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="control">
            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="product_image">
                    <span class="file-cta">
                      <span class="file-icon">
                        <i class="fas fa-upload"></i>
                      </span>
                      <span class="file-label">
                        Choose a file…
                      </span>
                    </span>
                </label>
            </div>
            </div>

            <br />
            <div class="control">
                <button type="submit" class="button is-link">Submit</button>
            </div>

            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
    </div>
    <br />
@endsection