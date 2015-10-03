@extends('layouts.master')


@section('content')

<link href="/css/index.css" rel="stylesheet">



{{-- alternate solution --}}
<div class="media">
  <h1>View All</h1>
  @foreach ($users->chunk(4) as $chunk)
    <div class="media-row">
        @foreach ($chunk as $user)
            <div class="thumbnail"><img src="{{ $user->img }}">
          <div class="overlay">

            @if($user->user_type == 'Musician')
              <h2>{{ $user->first_name }} {{ $user->last_name}}</h2>
            @elseif($user->user_type == 'Band')
              <h2>{{ $user->band_name }}</h2>
            @else
              <h2>{{ $user->user_name }}</h2>
            @endif

            <p>{{ $user->location }}</p><span class="zoom-btn"></span>
            <div id="bandDetails" style="display: none;">
              <p id="location">{{ $user->location }}</p>
              <p id="instrument">{{ $user->instrument }}</p>
              <p id="level">{{ $user->level }}</p>
              <p id="genre">{{ $user->genre }}</p>
              <p id="about">{{ $user->about }}</p>
              <p id="userid">{{ $user->id }}</p>
            </div>
          </div>
        </div>

        @endforeach
    </div>
    @endforeach
</div>


<script src="/js/index.js"></script>
@stop



