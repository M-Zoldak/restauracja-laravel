<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>
    <aside>
        @if (Auth::check())
            @include('partials.nav')
        @else
            <p>Portal jedynie dla zalogowanych użytkowników.</p>
        @endif
    </aside>

    <div class="main-container">

        @if (Auth::check())
            @include('partials.user-info')
        @endif

        @include('partials.notifications')

        @yield('content')
    </div>
</body>

</html>
