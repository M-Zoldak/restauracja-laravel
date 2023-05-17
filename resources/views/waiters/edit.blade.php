@section('content')
@extends('main')

<div class="buttons__container">
    <h2>
        Edytuj kelnera
    </h2>
</div>
<br>

<div>
    <table>
        <form action="{{route('waiters.update', ["waiter"=>$waiter])}}" method="POST">
            @csrf
            @method("PUT")
            <tr>
                <td>Imie:</td>
                <td><input type="text" name="firstname" value="{{$waiter->firstname}}"></td>
            </tr>
            <tr>
                <td>Nazwisko:</td>
                <td><input type="text" name="lastname" value="{{$waiter->lastname}}"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="{{$waiter->email}}"></td>
            </tr>
            <tr>
                <td>Login:</td>
                <td><input type="text" name="login" value="{{$waiter->login}}"></td>
            </tr>
            <tr>
                <td>Haslo:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Zapisz zmiany"></td>
        </form>
        <form action="{{route('waiters.destroy', ["waiter"=>$waiter])}}" method="POST">
                @csrf
                @method("DELETE")
                <td> <input type="submit" value="Usuń"> </td>
            </tr>
        </form>
    </table>
</div>
@endsection
