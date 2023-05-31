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
