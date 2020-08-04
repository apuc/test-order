@extends('layouts/default.blade.php')

@section('title', 'Главная страница')

@section('content')
    @if(isset($_SESSION['id']))
        <div class="mt-5">
            <h3>Email'ы встречающиеся более чем у одного пользователя</h3>
            <ul class="list-group">
                @foreach($emails as $email)
                    <li class="list-group-item">
                        {{ $email['email'] }}
                        <span class="badge badge-primary badge-pill">встречается у {{ $email['count_emails'] }} пользователей</span>
                    </li>
                @endforeach
            </ul>

            <br/>
            <h3>Пользователи, которые не сделали ни одного заказа</h3>
            <ul class="list-group">
                @foreach($users_without_orders as $users)
                    <li class="list-group-item">
                        {{ $users['login'] }}
                    </li>
                @endforeach
            </ul>

            <h3>Пользователи, которые сделали более двух заказов</h3>
            <ul class="list-group">
                @foreach($users_with_orders as $users)
                    <li class="list-group-item">
                        {{ $users['login'] }}
                        <span class="badge badge-primary badge-pill">сделал {{ $users['count_orders'] }} заказов</span>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <h3>Для просмотра информации следует войти в учетную запись</h3>
    @endif

@endsection