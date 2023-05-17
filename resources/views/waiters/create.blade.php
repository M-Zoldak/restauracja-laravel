@section('content')
@extends('main')

<div class="buttons__container">
    <h2>
        Dodaj kelnera
    </h2>
</div>
<br>

<div>
    <form action="{{route('waiters.store')}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Imie:</td>
                <td><input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>Nazwisko:</td>
                <td><input type="text" name="lastname"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Login:</td>
                <td><input type="text" name="login"></td>
            </tr>
            <tr>
                <td>Haslo:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Zarejestruj"></td>
            </tr>
        </table>
    </form>
</div>
@endsection
