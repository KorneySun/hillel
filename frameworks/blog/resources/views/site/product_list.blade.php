<?php
/***
     @var $products \App\Models\Product
 */
?>
@extends('layouts.welcome')

@section('content')
    <div class="container-lg" >
        <div class="btn-primary text-center" >
            <h2>Товары</h2>
        </div>

        <div class="btn-primary col-2" >
            <h6>
                <a style="color:white" href="{{ route('homework.product_create') }}" title="Добавить запись">
                    <img src="{{ asset('img/icons/add_.png')}}" style="height:20px; width:20px" alt="Добавить запись">
                    Добавить запись
                </a>
            </h6>
        </div>

    <table cellpadding="0" cellspacing="0" border="0">
        <tbody>

                <tr class="btn-dark">
                    <th style="width:25%">Наименование</th>
                    <th style="width:25%">Описание</th>
                    <th style="width:10%">Единица измерения</th>
                    <th style="width:20%">Категория</th>
                    <th style="width:10%">Цена</th>
                    <th style="width:10%">Действия</th>
                </tr>

            @if ($products)
                @foreach($products as $k=>$product)
                        @if ($k == 0 || $k%2 == 0)
                            <tr class="btn-info">
                        @else
                            <tr class="btn-secondary">
                        @endif

                            <td><a style="color:white" href="{{ route('homework.product_show', $product) }}" title="Просмотр записи">{{$product->name}}</a></td>
                            <td style="color:white">{{$product->description}}</td>
                            <td style="color:white">{{$product->package}}</td>
                            <td style="color:white">{{$product->category->name}}</td>
                            <td style="color:white">{{$product->price}}</td>
                            <td>

                                <a href="{{ route('homework.product_show', $product) }}" title="Просмотр записи">
                                    <img src="{{ asset('img/icons/view.png')}}" style="height:20px; width:20px" alt="Просмотр записи">
                                </a>
                                <a href="{{ route('homework.product_edit', $product->id) }}" title="Редактирование записи">
                                    <img src="{{ asset('img/icons/edit.png')}}" style="height:20px; width:20px" alt="Редактировать запись">
                                </a>
                                <a
                                   title="Удаление записи">
                                   <img class="js-destroy-item" id="destroy-{{(string)$product->id}}"src="{{ asset('img/icons/close.png')}}" style="height:20px; width:20px" alt="Удалить запись">
                                </a>


                            </td>
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