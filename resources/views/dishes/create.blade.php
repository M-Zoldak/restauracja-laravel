@section('content')
@extends('main')

<x-header>Nowe danie</x-header>
<div class="new-dish">
    <table class="new-dish-table">
        <form action="{{route('dishes.store')}}" method="POST">
            @csrf
            <tr>
                <td>Nazwa</td>
                <td><input type="text" name="name" required /></td>
            </tr>
            <tr>
                <td>Cena</td>
                <td><input type="number" name="price" min='1' step="any" required /></td>
            </tr>
            <tr>
                <td>Składniki</td>
                <td><input type="text" name="ingredient" maxlength="250" required /></td>
            </tr>
            <tr>
                <td>Kategoria</td>
                <td>
                    <select name="category" required>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                            @dump($category)
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Opis</td>
                <td><textarea rows="4" cols="40" name="description"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Dodaj</button></td>
            </tr>
        </form>
    </table>
</div>
@endsection
