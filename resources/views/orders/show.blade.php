@section('content')
@extends('main')

<x-header>Zamówienie nr:{{ $order->id }}</x-header>
<div class="order-list-conteiner">
    <div>
        <table class="order-list-table">
            <tr>
                <td colspan="2">Dla stolika nr: </td>
                <td>{{ $order->table->table_number }}</td>
                <td colspan="3"><a href="{{route('order_items.create',["order_id"=>$order->id])}}">Nowa pozycja</a></td>
            </tr>
            <tr>
                <td colspan="5">Szczegóły zamówienia:</td>
            </tr>
            @foreach ($order->items as $orderItem)
                <tr>
                    <td>{{ $orderItem->meal->name }}</td>
                    <td>{{ $orderItem->amount }}</td>
                    <td>{{ $orderItem->meal->price }} zł (szt)</td>
                    <td><a href="{{route('order_items.edit',['order_item' => $orderItem])}}">Edytuj</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
