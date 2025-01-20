@extends('mainlayout')
@section('content')
    
<div>
  xoxox
  {{-- @foreach($users as $x)
  
  <div>  name : {{$x->userProfile}}</div>
  
  @endforeach --}}

  @foreach($userProfile as $x)
  
  <div>  profilee: {{$x->province}}</div>
  
  @endforeach
</div>





@endsection