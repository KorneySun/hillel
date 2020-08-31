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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


    </head>
    <body>
        <div class="container">
            <ul class="nav col justify-content-between">
                <li class="nav-item">
                    <a class="nav-link active h1" href="{{ route('homework.categories_show')}}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link h1" href="{{ route('homework.products_show')}}">Товары</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link h1" href="{{ route('homework.orders_show')}}">Заказы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link h1" href="{{ route('homework.users_show')}}">Пользователи</a>
                </li>
            </ul>
        </div>

        <div class="container">
            <div class="row">
                @include('layouts.alerts')
            </div>
        </div>

        @yield('content')

    </body>
</html>


<script>
    $(document).ready(function(){
        $('.js-destroy-item').on('click',function() {
            isDelete = confirm("Удалить запись?");
            if (isDelete) {
                general_id = $(this).attr('id');
                temp_id = general_id.indexOf("-", -1);
                id = general_id.substring(temp_id + 1);
                $.ajax({
                    type: 'DELETE',
                    url: '{{ route('homework.product_destroy') }} ',
                    data: {'delete_id': id, '_token': '{{csrf_token()}}'},

                    success: function (data) {
                        if (data == true) {
                            alert("Запись успешно удалена!");
                            window.location.href = window.location.href;
                        }
                    }
                });
            }
        })});
</script>
