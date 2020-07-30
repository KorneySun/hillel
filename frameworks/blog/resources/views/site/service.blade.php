<?php
/**
 * @var $errors \Illuminate\Support\ViewErrorBag
 */
?>
@extends('layouts.welcome')

@section('service')
    <div class="container">
        <div class="btn-primary text-center" >
            <h2>Заказы</h2>
        </div>

        <form action="{{route("homework.service_create")}}" method="POST">
            {{ csrf_field() }}

            <div class="row">
                <label for="order_number" class="required">Номер заказа</label>
                <input type="text"
                       class="form-control @if($errors->has('order_number')) is-invalid @endif" id="order_number"
                       name="order_number"
                       value="{{ old('order_number') }}" autofocus>
                @if($errors->has('order_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_number') }}
                    </div>
                @endif

            </div>

            <div class="row">
                <label for="order_price">Сумма заказа</label>
                <input type="text"
                       class="form-control @if($errors->has('order_price')) is-invalid @endif" id="order_price"
                       name="order_price"
                       value="{{ old('order_price') }}">
                @if($errors->has('order_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_price') }}
                    </div>
                @endif
            </div>

            <div class="row">
                <label for="order_date" class="required">Дата выполнения</label>
                <input type="date"
                       class="form-control @if($errors->has('order_date')) is-invalid @endif" id="order_date"
                       name="order_date"
                       value="{{ old('order_date') }}">
                @if($errors->has('order_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_date') }}
                    </div>
                @endif

            </div>


            <button type="submit" class="btn btn-primary" style="margin-top:20px">
                Сохранить
            </button>

        </form>
    </div>
@endsection