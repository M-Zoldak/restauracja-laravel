@extends('main')
@section('content')
    <x-header>Przegląd stolików</x-header>
    <div class="tables">
        @if (empty($tables))
            <h2>Brak stolików do obsługi!</h2>
        @else
            @foreach ($tables as $table)
                <a href='{{ route('tables.show', ['table' => $table->id]) }}'
                    class='table {{ $table->is_occupied > 0 ? 'is_occupied' : '' }}' id='{{ $table->id }}'>
                    <span class='table__number'> <i class="fa-regular fa-hashtag"></i> {{ $table->table_number }}</span>
                    <span>
                        <i class="fa-solid fa-person"></i> {{ $table->occupied_places_count }}/{{ $table->places_count }}
                    </span>
                    <span style="width:100%; text-align:center">Id: {{ $table->id }}
                </a>
            @endforeach
        @endif
    </div>
@endsection
