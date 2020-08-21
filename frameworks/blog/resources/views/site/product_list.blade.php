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
    <table cellpadding="0" cellspacing="0" border="0">
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

                            <td><a style="color:white" href="{{ route('homework.product_show', ['id' => $product->id]) }}">{{$product->name}}</a></td>
                            <td style="color:white">{{$product->description}}</td>
                            <td style="color:white">{{$product->package}}</td>
                            <td style="color:white">{{$product->category_id}}</td>
                            <td style="color:white">{{$product->price}}</td>
                            </tr>

                    @endforeach


            @endif

        </tbody>
    </table>
        <hr/>
        <div style="margin-left:40%">
            {{ $products->links() }}
        </div>
    </div>
@endsection