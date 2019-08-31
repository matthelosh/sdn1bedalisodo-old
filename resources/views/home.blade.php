@extends('layouts.app')

@section('content')

    @if($p !== 'undefined')

        @switch($p)
            @case('adm-guru')
                @include('admin.guru')
                @break
            @case('adm-mapel')
                @include('admin.mapel ')
                @break

            @case('adm-ekskul')
                @include('admin.ekskul')
                @break
            @case('adm-ki')
                @include('admin.ki')
                @break
            @case('adm-kd')
                @include('admin.kd')
                @break
            @case('adm-rombel')
                @include('admin.rombel')
                @break
            @case('adm-siswa')
                @include('admin.siswa')
                @break
            @case('adm-users')
                @include('admin.users')
                @break
            {{-- @case('adm-tapel')
                @include('admin.tapel')
                @break
            @case('adm-semester')
                @include('admin.semester')
                @break
            @case('adm-tingkat')
                @include('admin.tingkat')
                @break --}}
            @case('guru-nilai')
                @include('guru.nilai')
                @break
            @case('guru-siswa')
                @include('guru.siswa')
                @break
            @default
                <h1 class="text-center"><small>Selamat Datang!</small> <br> <span style="text-transform: uppercase;">{{Auth::user()->name}}</span></h1>
                <p class="text-center">
                    <div class="pic-holder" style="width:200px;height:200px; background:url('{{asset('img/users/'.Auth::user()->username.'.jpg')}}'); border-radius: 50%; margin:auto; background-position:center center; background-size: 100%;" >

                    </div>

                {{-- <img src="{{asset('img/users/'.(Auth::user()->username).'.jpg')}}" alt="{{(Auth::user()->username)}}" width="200" height="200" style="border-radius:50%"> --}}

                </p>
                <p class="text-center">Silahkan pilih menu di samping untuk mengoperasikan. :)</p>
                <p>{{$_SERVER['REQUEST_URI']}}</p>

                @break

        @endswitch
    @else
        <h5>Halaman Admin</h5>
    @endif

@endsection
