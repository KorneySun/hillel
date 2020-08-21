<?php
/*** @var $errors \Illuminate\Support\ViewErrorBag
*@var $category \App\Models\Product
 */
?>
@extends('layouts.welcome')

@section('category_list')
<div class="container-lg" >
    <div class="btn-primary text-center" >
        <h2>Категории</h2>
    </div>
    <table class="cart-table" cellpadding="0" cellspacing="0" border="0">
        <tbody>

        <tr class="btn-dark">
            <th style="width:10%">Номер категории</th>
            <th style="width:10%">Наименование</th>
        </tr>


        @if ($category)
            @foreach($category as $k=>$item)
                @if ($k == 0 || $k%2 == 0)
                    <tr class="btn-info">
                @else
                    <tr class="btn-secondary">
                @endif

                <td style="color:white" >{{$item['id']}}</td>
                <td><a style="color:white" href="{{ route('homework.products_show', ['category_id' => $item->id]) }}">{{$item['name']}}</a></td>

                </tr>

            @endforeach
        @endif

        </tbody>
    </table>
</div>
@endsection