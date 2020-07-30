<?php
/**
 * @var $errors \Illuminate\Support\ViewErrorBag
 */
?>
@extends('layouts.welcome')

@section('customer')
    <div class="container">
        <div class="btn-primary text-center" >
            <h2>Пользователи</h2>
        </div>

        <form action="{{route("homework.customer_create")}}" method="POST">
            {{ csrf_field() }}

            <div class="row">
                <label for="customer_name" class="required">ИМЯ</label>
                <input type="text"
                       class="form-control @if($errors->has('customer_name')) is-invalid @endif" id="customer_name"
                       name="customer_name"
                       value="{{ old('customer_name') }}" autofocus>
                @if($errors->has('customer_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_name') }}
                    </div>
                @endif

            </div>

            <div class="row">
                <label for="surname">ФАМИЛИЯ</label>
                <input type="text"
                       class="form-control @if($errors->has('surname')) is-invalid @endif" id="surname"
                       name="surname"
                       value="{{ old('surname') }}">
                @if($errors->has('surname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('surname') }}
                    </div>
                @endif
            </div>

            <div class="row">
                <label for="email" class="required">ЭЛЕКТРОННАЯ ПОЧТА</label>
                <input type="email"
                       class="form-control @if($errors->has('email')) is-invalid @endif" id="email"
                       name="email"
                       value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif

            </div>

            <div class="row">
                <label for="phone" class="required">ТЕЛЕФОН</label>
                <input type="tel"
                       class="form-control @if($errors->has('phone')) is-invalid @endif" id="phone"
                       placeholder="+38(___) ___-__-__"
                       name="phone"
                       value="{{ old('phone') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </div>


            <button type="submit" class="btn btn-primary" style="margin-top:20px">
                Сохранить
            </button>

        </form>
    </div>
@endsection