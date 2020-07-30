<?php
/**
 * @var $errors \Illuminate\Support\ViewErrorBag
 */
?>
@extends('layouts.welcome')

@section('product')
    <div class="container">
        <div class="btn-primary text-center" >
            <h2>Товары</h2>
        </div>

        <form action="{{route("homework.product_create")}}" method="POST">
            {{ csrf_field() }}

            <div class="row">
                <label for="product_name" class="required">НАЗВАНИЕ</label>
                <input type="text"
                       class="form-control @if($errors->has('product_name')) is-invalid @endif" id="product_name"
                       name="product_name"
                       value="{{ old('product_name') }}">
                @if($errors->has('product_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_name') }}
                    </div>
                @endif

            </div>

            <div class="row">
                <label for="price">ЦЕНА</label>
                <input type="text"
                       class="form-control @if($errors->has('price')) is-invalid @endif" id="price"
                       name="price"
                       value="{{ old('price') }}">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>

            <div class="row">
                <label for="quality" class="required">КОЛИЧЕСТВО</label>
                <input type="text"
                       class="form-control @if($errors->has('quality')) is-invalid @endif" id="quality"
                       name="quality"
                       value="{{ old('quality') }}">
                @if($errors->has('quality'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quality') }}
                    </div>
                @endif
            </div>


            <button type="submit" class="btn btn-primary" style="margin-top:20px">
                Сохранить
            </button>

        </form>
    </div>
@endsection