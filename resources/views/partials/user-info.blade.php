<div class="user-info">
    <p>Zalogowano jako: <strong>{{ Auth::user()->name }}</strong></p>
    <div class="links">
        <a href="{{ route('profile.edit') }}">
            {{ __('Profile') }}
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href={{ route('logout') }}
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </form>
    </div>
</div>
