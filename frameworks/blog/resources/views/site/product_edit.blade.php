<?php
/**
 * @var $errors \Illuminate\Support\ViewErrorBag
 */
?>
@extends('layouts.welcome')

@section('content')
    <div class="container">
        <div class="btn-primary text-center" >
            <h2>Товары</h2>
        </div>

        <form action="{{route("homework.product_update", $product)}}" method="POST">
            {{ csrf_field() }}
            @method('PUT')

            <div class="row">
                <label for="name" class="required">НАЗВАНИЕ</label>
                <input type="text"
                       class="form-control @if($errors->has('name')) is-invalid @endif" id="name"
                       name="name"
                       value="{{ old('name', $product->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="row">
                <label for="description" class="required">ОПИСАНИЕ</label>
                <input type="text"
                       class="form-control @if($errors->has('description')) is-invalid @endif" id="description"
                       name="description"
                       value="{{ old('description', $product->description) }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>

            <div class="row">
                <label for="package" class="required">ЕДИНИЦА ИЗМЕРЕНИЯ</label>
                <input type="text"
                       class="form-control @if($errors->has('package')) is-invalid @endif" id="package"
                       name="package"
                       value="{{ old('package', $product->package) }}">
                @if($errors->has('package'))
                    <div class="invalid-feedback">
                        {{ $errors->first('package') }}
                    </div>
                @endif
            </div>

            <div class="row">
                <label for="category_id" class="required">КАТЕГОРИЯ</label>
                <input type="text"
                       class="form-control @if($errors->has('category_id')) is-invalid @endif" id="category_id"
                       name="category_id"
                       value="{{ old('category_id', $product->category_id) }}">
                @if($errors->has('category_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </div>
                @endif
            </div>

            <div class="row">
                <label for="price">ЦЕНА</label>
                <input type="text"
                       class="form-control @if($errors->has('price')) is-invalid @endif" id="price"
                       name="price"
                       value="{{ old('price', $product->price) }}">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>

            </br>
            @foreach($product->product_images as $item)
                <img src="{{str_replace('public', '/..', $item->image)}}">
            @endforeach

            <div class="row">
                <label for="image">ИЗОБРАЖЕНИЕ ТОВАРА</label>
                <input type="file"
                       class="form-control-plaintext  @if($errors->has('image')) is-invalid @endif" id="image"
                       name="image"
                       value="{{ old('image') }}">
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top:20px">
                Сохранить
            </button>

        </form>
    </div>
@endsection