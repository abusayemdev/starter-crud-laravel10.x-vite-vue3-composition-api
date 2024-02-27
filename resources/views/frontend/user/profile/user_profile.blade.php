@extends('frontend.dashboard')
@section('content')
<user-profile :profile="{{$profile}}"></user-profile>

@endsection