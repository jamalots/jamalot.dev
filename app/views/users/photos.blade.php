@extends('layouts.master')


@section('content')

@foreach($images as $image)
<p><img src="{{ $image->img }}"></p>
@endforeach

@stop