@section('content')
@extends('main')

<div class="new-dish">
    <h1>Nowa Kategoria</h1>
    <table class="new-dish-table">
        <form action="{{route('dish_categories.store')}}" method="POST">
            @csrf
            <tr>
                <td>Nazwa</td>
                <td><input type="text" name="name" required /></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Dodaj</button></td>
            </tr>
        </form>
    </table>
</div>
@endsection
