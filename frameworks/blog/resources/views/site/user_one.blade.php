<?php
/*** @var $errors \Illuminate\Support\ViewErrorBag
@var $user \App\Models\User
 */
?>
@extends('layouts.welcome')

@section('content')
    <div class="container-lg" >
        <div class="btn-primary text-center" >
            <h2>Просмотр пользователя</h2>
        </div>
        @if ($user)
            <div class="btn-primary text-center" >
                <h2>{{$user['name']}}</h2>
            </div>

            <b>id - </b>           {{$user->id}}                           </br>
            <b>name - </b>         {{$user->name}}                         </br>
            <b>email - </b>        {{$user->email}}                        </br>
            <b>password - </b>     {{$user->password}}                     </br>
            <b>created_at - </b>   {{$user->created_at->format('d.m.y')}}  </br>
            <b>updated_at - </b>   {{$user->updated_at->format('d.m.y')}}  </br>

            </br>
            <a href="{{ route('homework.user_edit', $user->id) }}" class="btn-warning btn" style="width:120px">Редактировать</a>

            <a class="btn-danger btn" style="width:120px" href=""
               onclick="event.preventDefault();
                        document.getElementById('destroy-form').submit();">
                Удалить
            </a>

            <form id="destroy-form"
                  action="{{ route('homework.user_destroy', $user) }}"
                  method="POST"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>

        @endif
    </div>
@endsection