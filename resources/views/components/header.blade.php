@if (!empty($slot))
    @section('title', 'M&M - ' . $slot)
@endif

<header>
    <h1>{{ $slot }}</h1>
</header>
