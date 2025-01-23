@extends('mainlayout')
@section('content')
    <div>
        welcome to user dashboard {{ $user->name }}

        Your emaiil : {{ $user->email }}

        {{-- we can use the auth meethod tooo to re --}}

        Role : {{ auth()->user()->role }}
    </div>

    <form action="{{ route("logout") }}" method="post">

        @csrf

        <button class="btn btn-prmary btn-xs">logout</button>
    </form>
@endsection
