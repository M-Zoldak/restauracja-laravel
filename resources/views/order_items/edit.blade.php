@section('content')
@extends('main')

<div class="order-list-conteiner">
    <div>
        <table class="order-list-table">
            <form action="{{route('order_items.update',['order_item' => $orderItem])}}" method="post">
                @csrf
                @method('PUT')
                <tr>
                    <td>Danie</td>
                    <td>Ilość</td>
                    <td>Cena (szt)</td>
                    <td></td>
                    <td>Nowe danie</td>
                    <td>Nowa ilość</td>
                </tr>
                <tr>
                    <td>{{ $orderItem->meal->name }}</td>
                    <td>{{ $orderItem->amount }}</td>
                    <td>{{ $orderItem->meal->price }} zł </td>
                    <td></td>
                    <td>
                        <select name="dish" required class="custom-select">
                            @foreach ($dishes as $dish)
                                <option value="{{$dish->id}}">
                                    {{$dish->name}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input class="number-input" type="number" name="amount" value="{{ $orderItem->amount }}"></td>
                    <td><input type="submit" value="Zapisz"></td>
                </form>
                <form action="{{route('order_items.destroy',['order_item' => $orderItem])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <td><input type="submit" value="Usuń"></td>
                </form>
            </tr>
        </table>
    </div>
</div>

@endsection
