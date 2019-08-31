@extends('layout.master')
@section('content')
    @switch($page)
        @case("profile")
            @include('pages.profile')
            @break
        @case('guru')
            @include('pages.guru')
            @break
        @default

    @endswitch
@endsection
