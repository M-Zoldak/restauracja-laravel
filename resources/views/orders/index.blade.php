@section('content')
    @extends('main')

    @inject('controller', 'App\Http\Controllers\OrderController')

    <x-header>Zamówienia</x-header>

    <div class="order-list-conteiner">
        <ul class="order-list-ul">
            @foreach ($tables as $table)
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
            @endforeach
        </ul>
    </div>



    <script src={{ asset('js/order_list.js') }}></script>
@endsection
