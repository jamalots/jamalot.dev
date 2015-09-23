@extends('layouts.master')


@section('content')

<link href="/css/index.css" rel="stylesheet">



{{-- alternate solution --}}
<div class="media">
	@foreach ($users->chunk(4) as $chunk)
    <div class="media-row">
        @foreach ($chunk as $user)
            <div class="thumbnail"><img src="{{ $user->img }}">
		      <div class="overlay">
		        <h2>{{ $user->user_name }}</h2>
		        <p>The Lion</p><span class="zoom-btn"></span>
		      </div>
		    </div>
        @endforeach
    </div>
    @endforeach
</div>

<script src="/js/index.js"></script>
@stop