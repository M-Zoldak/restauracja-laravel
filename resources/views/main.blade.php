<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>
    {{-- <?php if (isLoggedIn()) : ?> --}}
    <aside>
        <p class="mainNav__header">Personel</p>
        <ul>
            <li><a href="{{ route('tables.index') }}">Obsługa sali</a></li>
            <li><a href="{{ route('orders.index') }}">Pogląd na zamówienia - Funkcja Mc'Donalds</a></li>
        </ul>

        <p class="mainNav__header">Zarządzanie</p>
        <ul>
            <li><a href="{{ route('tables.edit_index') }}">Edycja stolików</a></li>
            <li><a href="{{ route('dishes.index') }}">Edycja dań</a></li>
            <li><a href="/management/waiter_registration">Rejestracja kelnerów</a></li>
        </ul>
    </aside>

    {{-- <?php endif; ?> --}}

    <div class="main-container">
        <div class="user-info"><?= $_COOKIE['loggedInAs'] ?? '' ?></div>
        <header>
            <h1><?= $pageTitle ?? '' ?></h1>
        </header>
        {{-- <?= Messager::readNotifications() ?> --}}

        @yield('content')
    </div>
</body>

</html>
