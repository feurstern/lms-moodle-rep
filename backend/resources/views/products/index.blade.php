@extends('mainlayout')

@section('content')
    <div>
        <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
        @foreach ($products as $x)
            <div> Product name : {{ $x->name }}</div>
            @foreach ($x->users as $u)
                Customer name : {{ $u->name }}
                Pivot : {{ $u->pivot }}
            @endforeach

            <br />
        @endforeach
    </div>
@endsection
