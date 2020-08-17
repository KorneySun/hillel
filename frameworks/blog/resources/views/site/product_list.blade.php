<?php
/***
     @var $products \App\Models\Product
 */
?>
@extends('layouts.welcome')

@section('product_list')
    <div class="container-lg" >
        <div class="btn-primary text-center" >
            <h2>Товары</h2>
        </div>
    <table class="cart-table" cellpadding="0" cellspacing="0" border="0">
        <tbody>

                <tr class="btn-dark">
                    <th style="width:25%">Наименование</th>
                    <th style="width:25%">Описание</th>
                    <th style="width:10%">Единица измерения</th>
                    <th style="width:20%">Категория</th>
                    <th style="width:10%">Цена</th>
                </tr>


            @if ($products)
                @foreach($products as $k=>$product)
                    @if ($k == 0 || $k%2 == 0)
                        <tr class="btn-info">
                    @else
                        <tr class="btn-secondary">
                    @endif

                        <td><a style="color:white" href="{{ route('homework.product_show', ['id' => $product['id']]) }}">{{$product['name']}}</a></td>
                        <td><a style="color:white" href="{{ route('homework.product_show', ['id' => $product['id']]) }}">{{$product['description']}}</a></td>
                        <td><a style="color:white" href="{{ route('homework.product_show', ['id' => $product['id']]) }}">{{$product['package']}}</a></td>
                        <td><a style="color:white" href="{{ route('homework.product_show', ['id' => $product['id']]) }}">{{$product['category_id']}}</a></td>
                        <td><a style="color:white" href="{{ route('homework.product_show', ['id' => $product['id']]) }}">{{$product['price']}}</a></td>


                    </tr>



                @endforeach

            @endif

        </tbody>
    </table>
    </div>
@endsection