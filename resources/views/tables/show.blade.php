@extends('main')
@section('content')
    @inject('controller', 'App\Http\Controllers\OrderController')

    <x-header>Podgląd stolika</x-header>
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
        <a class="button order-button" href='{{ route('orders.create', ['id' => $table->id]) }}'
            id='{{ $table->id }}'>Zamów</a>
    </div>

    <div class="order-list-conteiner">
        <ul class="order-list-ul">
            @foreach ($table->orders as $order)
                <li class="draggable" draggable="true">
                    <div class="{{ $controller::getOrderStatusClass($order->order_status) }}">
                        <a href="{{ route('orders.show', ['order' => $order]) }}">Szczegóły</a>
                        <h3>Zamówienie nr:{{ $order->id }}</h3>
                        <table class="order-list-table">
                            <tr>
                                <td>Stolika nr: <b>{{ $table->table_number }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2">Szczegóły zamówienia:</td>
                            </tr>
                            <tr>
                                <td class="orders">
                                    <ul>
                                        @foreach ($order->items as $orderItem)
                                            <li>
                                                <span>{{ $orderItem->amount }} x {{ $orderItem->meal->name }}</span>
                                                <span>{{ $orderItem->amount * $orderItem->meal->price }} zł</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td class="orders order_summary">
                                    <span>Łącznie do zapłaty</span>
                                    <span>{{ $controller::getOrderTotalPrice($order) }} zł</span>
                                </td>
                            </tr>
                        </table>
                        <div class="order-status">
                            <p id="status{{ $order->id }}">
                                {{ $controller::getOrderStatusString($order->order_status) }}</p>
                            <button id="{{ $order->id }}"
                                class="status-button">{{ $controller::getOrderButtonStatusMessage($order->order_status) }}</button>
                            <div id="delete{{ $order->id }}" class="confirm-hidden">
                                <form action="{{ route('orders.destroy', ['order' => $order]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
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
