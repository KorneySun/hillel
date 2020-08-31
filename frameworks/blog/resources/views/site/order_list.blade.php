<?php
/***
@var $orders \App\Models\Order
 */
?>
@extends('layouts.welcome')

@section('content')
    <div class="container-lg" >
        <div class="btn-primary text-center" >
            <h2>Заказы</h2>
        </div>
        <div>
        <table class="cart-table" cellpadding="0" cellspacing="0" border="0">
            <tbody>

            <tr class="btn-dark">
                <th style="width:5%">Номер заказа</th>
                <th style="width:5%">Дата заказа</th>
                <th style="width:5%">Заказчик</th>
                <th style="width:5%">Сумма заказа</th>
            </tr>


            @if ($orders)
                @foreach($orders as $k=>$order)
                    @if ($k == 0 || $k%2 == 0)
                        <tr class="btn-info">
                    @else
                        <tr class="btn-secondary">
                    @endif

                            <td><a style="color:white" href="{{ route('homework.order_show', $order) }}">
                                    &nbsp;&nbsp;&nbsp;{{$order->order_number}}&nbsp;&nbsp;&nbsp;
                                </a>
                            </td>
                            <td style="color:white">{{$order->order_date}}</td>
                            <td style="color:white">{{$order->user->name}}</td>
                            <td style="color:white">{{$order->order_sum}}</td>
                        </tr>
                        @endforeach
                    @endif
            </tbody>
        </table>
            <hr/>
            <div style="margin-left:40%">
                {{ $orders->links() }}
            </div>
        </div>

    </div>

@endsection