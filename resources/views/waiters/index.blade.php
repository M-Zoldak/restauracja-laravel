@section('content')
@extends('main')

    <div class="buttons__container">
        <a class="button" href="{{route('waiters.create')}}">Dodaj kelnera</a>
    </div>
    <br>
    <div>
        @foreach ($waiters as $waiter)
                <ul class="dishes-container-ul">
                    <li class="dishes-container-li">
                        <div class="dishes-container-meal">
                            <p>Imie: {{$waiter->firstname}}</p>
                            <p>Nazwisko: {{ $waiter->lastname}}</p>
                            <p>Login: {{ $waiter->login}}</p>
                            <p>Email: {{ $waiter->email}}</p>
                        </div>
                        <div class="order-options">
                            <a href="{{route('waiters.edit', ["waiter"=>$waiter])}}"class="button dish-edit-button">
                                <i class="fa-sharp fa-solid fa-pen-to-square"></i>Edytuj
                            </a>
                        </div>
                    </li>
                </ul>
        @endforeach
    </div>
@endsection
