<div class='notifications_bar'>
    @if ($errors->any())
        <ul class="notifications errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if (!empty(session('confirmation')))
        <ul class="notifications confirmations">
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">{{ session('confirmation') }}
            </p>
        </ul>
    @endif
</div>
