<?php
/*** @var $errors \Illuminate\Support\ViewErrorBag
@var $user \App\Models\User
 */
?>
@extends('layouts.welcome')

@section('user_one')
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

        @endif

    </div>
@endsection