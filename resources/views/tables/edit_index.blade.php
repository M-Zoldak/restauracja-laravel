@extends('main')
@section('content')
    <div class="buttons__container">
        <a class="button" href="{{ route('tables.create') }}">Dodaj stolik</a>
    </div>
    <div class="tables">
        @foreach ($tables as $table)
            <a href='{{ route('tables.edit', ['table' => $table->id]) }}' class='table' id='<?= $table->id ?>'>
                <span><i class="fa-solid fa-person"></i> <?= $table->places_count ?></span>
                <span class='table__number'><i class="fa-regular fa-hashtag"></i> <?= $table->table_number ?></span>
                <span style="width:100%; text-align:center">Id: <?= $table->id ?>
            </a>
        @endforeach
    </div>
@endsection
