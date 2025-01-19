
{{-- thee variable is being passeed from the routes --}}
@extends('mainlayout')

{{-- we have to wrap i the sub section --}}
@section('content')
<div>
    <h2> Welcome to {{ $title }}</h2>

    @for ($i = 0; $i <= 2; $i++)
        <div> {{ $i + 1 }}. Hello there </div>
    @endfor

    <div>
        {{ $desc }}
    </div>

    @foreach ($course as $x)
        <div>
             Course name : {{ $x->course }}
        </div>
    @endforeach
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
</div>

@endsection