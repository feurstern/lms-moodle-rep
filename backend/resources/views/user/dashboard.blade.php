@extends('mainlayout')
@section('content')
    <div>
        welcome to user dashboard {{ $user->name }}

        Your emaiil : {{ $user->email }}

        {{-- we can use the auth meethod tooo to re --}}

        Role : {{ auth()->user()->role }}
    </div>
@endsection
