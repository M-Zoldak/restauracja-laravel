@section('content')
    @extends('main')
    <x-header>Przypominanie hasła</x-header>
    <div>
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <br>
            <x-text-input id="email" required autofocus />
            <br>
            <x-input-error :messages="$errors->get('email')" />
        </div>
        <br>

        <div>
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
@endsection
