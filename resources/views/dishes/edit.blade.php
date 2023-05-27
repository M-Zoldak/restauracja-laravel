@section('content')
@extends('main')

<x-header>Edycja dania: {{$dish->name}}</x-header>
<div class="new-dish">
    <table class="new-dish-table">
        <form method="POST" action="{{route('dishes.update', $dish)}}">
            @csrf
            @method('PUT')
            <tr>
                <td>Nowa nazwa:</td>
                <td><input type="text" name="name" value="{{$dish->name}}" required /></td>
            </tr>
            <tr>
                <td>Nowa cena:</td>
                <td><input type="number" name="price" min='1' step="any"
                    value="{{$dish->price }}" required /></td>
            </tr>
            <tr>
                <td>Nowe składniki:</td>
                <td><input type="text" name="ingredient" maxlength="250" value=" {{$dish->ingredients}}" /></td>
            </tr>
            <tr>
                <td>Nowa kategoria:</td>
                <td>
                    <select name="category" required>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                {{ $category->id == $dish->category_id ? 'selected' : '' }}>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nowy opis:</td>
                <td>
                    <textarea rows="4" cols="40" name="description">{{$dish->description}} </textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Zapisz zmiany</button></td>
            </tr>
        </form>
    </table>
    <table class="new-dish-table">
        <form method="POST" action="{{route('dishes.destroy', $dish)}}">
            @csrf
            @method('DELETE')
            <tr>
                <td colspan="2" >
                    <button type="submit">Usuń danie</button>
                </td>
            </tr>
        </form>
    </table>
</div>
@endsection
