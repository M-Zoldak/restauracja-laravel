<section>
    <header>
        <h2>
            {{ __('Delete Account') }}
        </h2>

        <p>
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <br>
    <form method="post" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        <div>
            <x-input-label for="password" value="{{ __('Password') }}" />

            <x-text-input id="password" name="password" type="password" placeholder="{{ __('Password') }}" />
            (1234 - dla Testowego użytkownika)
        </div>
        <br>
        <x-danger-button>{{ __('Delete Account') }}</x-danger-button>
    </form>

</section>
