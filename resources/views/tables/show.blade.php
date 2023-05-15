@extends('main')
@section('content')
    <div class="table-status">
        <h2>Stolik nr: {{ $table->table_number }}</h2>
        <table>
            <tr>
                <td>Status</td>
                <td class="table-occupied">{{ $table->is_occupied == 1 ? 'zajęty' : 'wolny' }}</td>
            </tr>
            <tr>
                <td>Miejsc:</td>
                <td>{{ $table->places_count }}</td>
            </tr>
            <tr>
                <td>Zajęte miejsca:</td>
                <td><button onClick="removePersonFromTable()" class="remove-button button">-</button><span
                        data-id={{ $table->id }} class="occupiedPlaces"
                        style="margin: 1rem;">{{ $table->occupied_places_count }}</span><button onClick="addPersonToTable()"
                        class="add-button button">+</button></td>
            </tr>
        </table>
        <a class="button order-button" href='{{-- route("orders.create") --}}' id='{{ $table->id }}'>Zamów</a>
    </div>

    <div class="order-list-conteiner">
        <ul class="order-list-ul">
            @foreach ($table->orders as $order)
                <li class="draggable" draggable="true">
                    <div>
                        <h3>Zamówienie nr:{{ $order->id }}</h3>
                        <table class="order-list-table">
                            <tr>
                                <td>Dla stolika nr: </td>
                                <td>{{ $table->table_number }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Szczegóły zamówienia:</td>
                            </tr>
                            @foreach ($order->items as $orderItem)
                                <tr>
                                    <td>{{ $orderItem->meal->name }}</td>
                                    <td>{{ $orderItem->amount }}</td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="order-status">
                            <p id="status{{ $order->id }}">Status: {{ $order->order_status }}</p>
                            <button id="{{ $order->id }}" class="status-button">Zamówienie gotowe</button>
                            <div id="delete{{ $order->id }}" class="confirm-hidden">
                                <form action="{{-- route('orders.destroy') --}}" method="post">

                                    @csrf
                                    {{-- @method('DELETE') --}}
                                    <input id="order-detail" type="hidden" name="delete-order"
                                        value="{{ $order->id }}">
                                    <input type="submit" value="Usuń z listy">
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <script src={{ asset('js/table_management.js') }}></script>
    <script src={{ asset('js/order_list.js') }}></script>
@endsection
