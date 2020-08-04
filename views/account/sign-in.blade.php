@extends('layouts/default.blade.php')

@section('title', 'Главная страница')

@section('content')

    <div class="m-4">
        <h3>Вход</h3>
        <h5>{{$errors}}</h5>
        <form method="post" action="/submit/sign-in">
            <div class="form-group">
                <label for="login">Логин:</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Введите логин" required min="2"
                       max="55">
                <small id="loginMessage" class="form-text"></small>
            </div>
            <div class="form-group">
                <label for="name">Пароль:</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Введите пароль" required max="55">
                <small id="passwordMessage" class="form-text"></small>
            </div>
            <button id="submit" name="submit" type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>

@endsection