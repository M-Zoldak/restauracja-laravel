@section('content')
    @extends('main')
    <!-- Session Status -->
    <x-auth-session-status />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div>
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                <span>{{ __('Remember me') }}</span>
            </label>
        </div>

        <x-primary-button>
            {{ __('Zaloguj') }}
        </x-primary-button>
        <div>
            <a href="{{ route('password.request') }}">
                {{ __('Zapomniałeś hasła?') }}
            </a>
            <a href="{{ route('register') }}">
                {{ __('Stwórz konto') }}
            </a>

        </div>
    </form>
@endsection