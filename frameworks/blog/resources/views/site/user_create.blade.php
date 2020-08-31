<?php
/**
 * @var $errors \Illuminate\Support\ViewErrorBag
 */
?>
@extends('layouts.welcome')

@section('content')
    <div class="container">
        <div class="btn-primary text-center" >
            <h2>Пользователи</h2>
        </div>

        <form action="{{route("homework.user_store")}}" method="POST">
            {{ csrf_field() }}

            <div class="row">
                <label for="name" class="required">ИМЯ</label>
                <input type="text"
                       class="form-control @if($errors->has('name')) is-invalid @endif" id="name"
                       name="name"
                       value="{{ old('name') }}" autofocus>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
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
                <label for="password" class="required">ПАРОЛЬ</label>
                <input type="password"
                       class="form-control @if($errors->has('password')) is-invalid @endif" id="password"
                       name="password"
                       value="{{ old('password') }}">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="row">
                <label for="password-confirm" class="required">ПОДТВЕРДИТЕ ПАРОЛЬ</label>
                <input type="password"
                       class="form-control"
                       name="password_confirmation" required>

            </div>

            <button type="submit" class="btn btn-primary" style="margin-top:20px">
                Сохранить
            </button>

        </form>
    </div>
@endsection

