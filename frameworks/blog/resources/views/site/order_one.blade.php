<?php
/*** @var $order \App\Models\Order
 */
?>
@extends('layouts.welcome')

@section('content')
    <div class="container-lg" >
        <div class="btn-primary text-center" >
            <h2>Просмотр заказа</h2>
        </div>
        @if ($order)
            <div class="btn-primary text-center" >
                <h2>Заказ № {{$order['order_number']}}</h2>
            </div>

            <b>id - </b>           {{$order->id}}                           </br>
            <b>order_number - </b> {{$order->order_number}}                 </br>
            <b>order_date - </b>   {{$order->order_date}}                   </br>
            <b>user->name - </b>   {{$order->user->name}}                  </br>
            <b>order_sum - </b>    {{$order->order_sum}}                    </br>
            <b>created_at - </b>   {{$order->created_at->format('d.m.y')}}  </br>
            <b>updated_at - </b>   {{$order->updated_at->format('d.m.y')}}  </br>

        @endif

    </div>
@endsection