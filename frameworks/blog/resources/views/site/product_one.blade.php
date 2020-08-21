<?php
/*** @var $errors \Illuminate\Support\ViewErrorBag
@var $product \App\Models\Product
 */
?>
@extends('layouts.welcome')

@section('product_one')
    <div class="container-lg" >
        <div class="btn-primary text-center" >
            <h2>Просмотр товара</h2>
        </div>
            @if ($product)
                <div class="btn-primary text-center" >
                    <h2>{{$product['name']}}</h2>
                </div>

                <b>id - </b>           {{$product->id}}          </br>
                <b>name - </b>         {{$product->name}}        </br>
                <b>description - </b>  {{$product->description}} </br>
                <b>package - </b>      {{$product->package}}     </br>
                <b>category_id - </b>  {{$product->category_id}} </br>
                <b>price - </b>        {{$product->price}}       </br>
                <b>created_at - </b>   {{$product->created_at->format('d.m.y')}}  </br>
                <b>updated_at - </b>   {{$product->updated_at->format('d.m.y')}}  </br>

                @foreach($product->product_images as $item)
                    <img src="{{str_replace('public', '/..', $item->image)}}">
                @endforeach




            @endif

    </div>
@endsection