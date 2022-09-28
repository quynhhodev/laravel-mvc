@extends('frontend.unmain')
@section('content')
    <h1>{{$page->title}}</h1>
    <p>{!!nl2br($page->content)!!}</p>
@endsection