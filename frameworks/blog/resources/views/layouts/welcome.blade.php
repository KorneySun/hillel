<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Homework</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>


    </head>
    <body>
        <div class="container">
            <ul class="nav col justify-content-between">
                <li class="nav-item">
                    <a class="nav-link active h1" href="{{ route('homework.categories_show')}}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link h1" href="{{ route('homework.products_show', ['category_id' => 0])}}">Товары</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link h1" href="{{ route('homework.orders_show')}}">Заказы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link h1" href="{{ route('homework.users_show')}}">Пользователи</a>
                </li>
            </ul>
        </div>

        {{--<div class="container">--}}
            {{--<ul class="nav col justify-content-between">--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link active h1" href="{{ route('homework.customer_create') }}">Пользователи</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link h1" href="{{ route('homework.product_create') }}">Товары</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link h1" href="{{ route('homework.service_create') }}">Заказы</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}

        {{--@yield('customer')--}}
        {{--@yield('product')--}}
        {{--@yield('service')--}}

        @yield('category_list')
        @yield('product_list')
        @yield('product_one')
        @yield('user_list')
        @yield('user_one')
        @yield('order_list')
        @yield('order_one')

    </body>
</html>
