@section('content')
@extends('main')

<x-header>Nowa kategoria</x-header>
<div class="new-dish">
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
