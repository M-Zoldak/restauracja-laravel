@section('content')
@extends('main')

<div id="modal-window" class="confirm-hidden">
    <div class="confirm-message">
        <h3>Potwierdź zamowienie</h3>
        {{-- href='{{route("orders.create", ["id"=>$table->id])}}' id='{{ $table->id }}'> --}}
        <form id="form" action={{ route('orders.store', ["id"=>$tableNr]) }} method="post">
            @csrf
            <input id="order-detail" type="hidden" name="order-details" value="">
            <input type="submit" value="Zamawiam">
        </form>
    </div>
    <div class="blurred"></div>
</div>
<div>
    <h2>Stolik nr: {{$tableNr}} </h2>
</div>
<div>
    <h2>Dodaj zamówienie</h2>
    <div class='dishes-container-nav'>
        <ul>
            @foreach ($categories as $item)
                <li>
                    <a href="#{{$item->name}}">
                        {{$item->name}}</a>
                </li>
            @endforeach
            <li>
                <button class="new-order-button" type="submit" id="order-button">Zamów</button>
            </li>
        </ul>
    </div>
    <div>
        @foreach ($categories as $category)
            <section class="dishes-container-section" id="{{$category->category_name}}">
                <h3>{{$category->name}} </h3>
                <ul class="dishes-container-ul">
                    @foreach ($dishes as $dish)
                        @if ($dish->category_id == $category->id)
                            <li class="dishes-container-li">
                                <div class="dishes-container-meal">
                                    <h4>Nazwa:  {{$dish->name}}</h4>
                                    <p>Składniki: {{$dish->ingredients}} </p>
                                    <p>Opis:  {{$dish->description}} </p>
                                    <p>Cena:  {{$dish->price}}  zł</p>
                                </div>
                                <div class="order-options quantity-buttons">
                                    <button class="add-to-order-button add-button" id='{{ $dish->id}}' ><i class="fa-sharp fa-solid fa-plus"></i></button>
                                    <span id='span{{$dish->id}}'>0</span>
                                    <button class="minus-order-button remove-button" id='{{$dish->id}}'><i class="fa-sharp fa-solid fa-minus"></i></button>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        @endforeach
    </div>
</div>
<script src={{ asset('js/new_order.js') }}></script>
@endsection
