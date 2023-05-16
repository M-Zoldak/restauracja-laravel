@section('content')
@extends('main')

    <div class="buttons__container">
        <a class="button" href="/dishes/create">Dodaj danie</a>
    </div>
    <br>
    <div class='dishes-container-nav'>
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="#{{$category->name}}">
                        {{$category->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div>
        @foreach ($categories as $category)
            <section class="dishes-container-section" id="{{$category->name}}">
                <h3> {{$category->name}}</h3>
                <ul class="dishes-container-ul">
                    @foreach ($dishes as $dish)
                        @if ($dish->category_id == $category->id)
                            <li class="dishes-container-li">
                                <div class="dishes-container-meal">
                                    <h5>Nazwa: {{$dish->name}}</h5>
                                    <p>Składniki: {{ $dish->ingredients}}</p>
                                    <p>Opis: {{ $dish->description}}</p>
                                    <p>Cena: {{ $dish->price}}</p>
                                    <p>Kategoria: {{ $dish->category->name}}</p>
                                </div>
                                <div class="order-options">
                                    <a href="/dishes/{{$dish->id}}/edit"class="button dish-edit-button">
                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>Edytuj
                                    </a>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        @endforeach
    </div>
@endsection
