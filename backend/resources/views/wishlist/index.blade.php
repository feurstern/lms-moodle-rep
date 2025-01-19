@extends('mainlayout')
@section('content')
    <div>
        @php
            $i = 1;
        @endphp
        @foreach ($wishlistData as $x)
            <div>
                {{ $i }} =====
                Item : {{ $x->name }}
                <br />
                Price : {{ $x->price }}

                <br />
                <a href="wishlist/detail/{{$x->id}}" >Detail</a>

                ======================
            </div>
            @php
                $i++;
            @endphp
        @endforeach

        {{-- detail --}}

        @if ($filter != 'all')
            <div>
                @yield('list-detail')
            </div>
        @endif
    </div>
@endsection
