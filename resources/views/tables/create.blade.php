@extends('main')
@section('content')
    <div class="new-table">
        <h1>Nowy stolik</h1>
        <table>
            <form method="POST" action={{ route('tables.store') }}>
                @csrf
                <tr>
                    <td>Numer stolika</td>
                    <td><input type=" text" name="table_number" required />
                    </td>
                </tr>
                <tr>
                    <td>Liczba miejsc</td>
                    <td><input type="number" name="places_count" required /></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Dodaj</button></td>
                </tr>
            </form>
        </table>
    </div>
@endsection