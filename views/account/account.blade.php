@extends('layouts/default.blade.php')

@section('title', 'Личный кабинет')

@section('content')

    <div class="m-4">
        <h3>Редактирование данных</h3>
        <h5>{{$errors}}</h5>
        <form method="post" action="/submit/account">
            <div class="form-group">
                <label for="login">Логин:</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Введите логин" required min="2"
                       max="55" value="{{ $user->login }}">
                <small id="loginMessage" class="form-text"></small>
            </div>
            <div class="form-group">
                <label for="name">Пароль:</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Введите пароль"
                       max="55">
                <small id="passwordMessage" class="form-text"></small>
            </div>
            <div class="form-group">
                <label for="email">Email-адрес:</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                       placeholder="Введите email" required max="55" value="{{ $user->email }}">
                <small id="emailMessage" class="form-text"></small>
            </div>
            <div class="form-group">
                <label for="fio">ФИО:</label>
                <input type="text" name="fio" class="form-control" id="fio" placeholder="Введите ФИО" required min="2"
                       max="55" value="{{ $user->fio }}">
                <small id="fioMessage" class="form-text"></small>
            </div>
            <button id="submit" name="submit" type="submit" class="btn btn-primary">Изменить</button>
        </form>
        <div class="mt-3">
            <a href="exit"><button class="btn btn-danger">Выйти из аккаунта</button></a>
        </div>
    </div>

@endsection