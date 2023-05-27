<section>
    <header>
        <h2>
            {{ __('Update Password') }}
        </h2>

        <p>
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>
    <br>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" autocomplete="current-password" />
        </div>

        <br>
        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" autocomplete="new-password" />
        </div>

        <br>
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                autocomplete="new-password" />
        </div>

        <br>
        <div>
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
