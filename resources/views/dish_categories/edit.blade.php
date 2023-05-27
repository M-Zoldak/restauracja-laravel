@section('content')
@extends('main')

<x-header>Edycja kategorii: {{$category->name}}</x-header>
<div class="new-dish">
    <table class="new-dish-table">
        <form method="POST" action="{{route('dish_categories.update', $category)}}">
            @csrf
            @method('PUT')
            <tr>
                <td>Nowa nazwa:</td>
                <td><input type="text" name="name" value="{{$category->name}}" required /></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Zapisz zmiany</button></td>
            </tr>
        </form>
    </table>
    <table class="new-dish-table">
        <form method="POST" action="{{route('dish_categories.destroy', $category)}}">
            @csrf
            @method('DELETE')
            <tr>
                <td colspan="2" >
                    <button type="submit">Usuń</button>
                </td>
            </tr>
        </form>
    </table>
</div>
@endsection
