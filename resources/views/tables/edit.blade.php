@extends('main')
@section('content')
    <x-header>Edycja stolika</x-header>
    <div class="new-table">
        <form method="POST" action="{{ route('tables.update', ['table' => $table->id]) }}">
            @csrf
            @method('PATCH')
            <table>
                <tr>
                    <td>Numer stolika</td>
                    <td><input type="number" name="table_number" required value="{{ $table->table_number }}" /></td>
                </tr>
                <tr>
                    <td>Liczba miejsc</td>
                    <td><input type="number" name="places_count" required value="{{ $table->places_count }}" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Zaktualizuj</button></td>
                </tr>
            </table>
        </form>
        <table>
            <tr>
                <td colspan="2">
                    <form method="POST" action="{{ route('tables.destroy', ['table' => $table->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            Usuń stolik</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
@endsection
