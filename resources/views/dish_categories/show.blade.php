@section('content')
@extends('main')

<x-header>Wszystkie kategorie</x-header>
    <div class="buttons__container">
        <a class="button" href="dish_categories/create">Dodaj kategorie</a>
    </div>
    <br>
    <div>
        <table class="new-dish-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nazwa</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="dish_categories/{{$category->id}}/edit">
                            Edytuj
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
