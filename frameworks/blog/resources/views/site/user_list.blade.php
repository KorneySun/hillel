<?php
/***
@var $users \App\Models\User
 */
?>
@extends('layouts.welcome')

@section('user_list')
    <div class="container-lg" >
        <div class="btn-primary text-center" >
            <h2>Пользователи</h2>
        </div>
        <table class="cart-table" cellpadding="0" cellspacing="0" border="0">
            <tbody>

            <tr class="btn-dark">
                <th style="width:10%">Имя</th>
                <th style="width:10%">E-mail</th>
            </tr>


            @if ($users)
                @foreach($users as $k=>$user)
                    @if ($k == 0 || $k%2 == 0)
                        <tr class="btn-info">
                    @else
                        <tr class="btn-secondary">
                            @endif

                            <td><a style="color:white" href="{{ route('homework.user_show', ['id' => $user['id']]) }}">{{$user['name']}}</a></td>
                            <td style="color:white">{{$user['email']}}</td>


                        </tr>



                        @endforeach

                    @endif

            </tbody>
        </table>
        <hr/>
        <div style="margin-left:40%">
            {{ $users->links() }}
        </div>
    </div>
@endsection