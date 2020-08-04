@extends('layouts/default.blade.php')

@section('title', 'Регистрация')

@section('content')

        <div class="m-4">
            <h3>Регистрация</h3>
            <h5>{{$errors}}</h5>
            <form method="post" action="/submit/sign-up/">
                <div class="form-group">
                    <label for="login">Логин:</label>
                    <input type="login" name="login" class="form-control" id="login" placeholder="Введите логин" required max="55">
                    <small id="loginMessage" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Введите пароль" required max="55">
                    <small id="passwordMessage" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="email">Email-адрес:</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                           placeholder="Введите email" required max="55">
                    <small id="emailMessage" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="fio">ФИО:</label>
                    <input type="text" name="fio" class="form-control" id="fio" placeholder="Введите ФИО" required min="2"
                           max="55">
                    <small id="fioMessage" class="form-text"></small>
                </div>
                <button id="submit" name="submit" type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </form>
        </div>

@endsection