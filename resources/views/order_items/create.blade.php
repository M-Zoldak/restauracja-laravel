@section('content')
@extends('main')

<x-header>Nowa pozycja</x-header>
<div class="order-list-conteiner">
    <div>
        <form action="{{route('order_items.store',["order_id"=>$id])}}" method="post">
            @csrf
            @method('POST')
            <table class="order-list-table">
                <tr>
                    <td>Danie</td>
                    <td>Ilość</td>
                </tr>
                <tr>
                    <td>
                        <select name="dish" required class="custom-select">
                            @foreach ($dishes as $dish)
                                <option value="{{$dish->id}}">
                                    {{$dish->name}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input class="number-input" type="number" name="amount"></td>
                    <td><input type="submit" value="Dodaj"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

@endsection
