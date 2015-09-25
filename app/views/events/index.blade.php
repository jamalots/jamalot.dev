@extends('layouts.master')

<head>
  <link rel="stylesheet" href="css/timeliner-future.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/js/vendor/venobox/venobox.css" type="text/css" media="screen">
</head>

@section('content')
<style>
.table{
  color: rgba(255, 255, 255, 0.85);
}

h1{
  color: rgba(255, 255, 255, 0.85);
}

a{
  color: #33B7AD;
}
</style>

  <div class="container">
    <h1>Upcoming Events</h1>
    {{-- BEGIN TIMELINE WRAPPER --}}
    <div id="timeline" class="timeline-container">

      <button class="timeline-toggle">+ expand all</button>

      <br class="clear">
      <div class="timeline-wrapper">
        <h2 class="timeline-time"><span>2015</span></h2>
      @foreach($events as $event)
        <dl class="timeline-series">
          <span class="tick tick-before"></span>
          <dt id="event{{ $event->id }}" class="timeline-event"><a>{{ date('n/d/Y ', strtotime($event->date)) }} {{ date('g:i a ', strtotime($event->start_time)) }} @if($event->user->user_type == 'musician'){{ $event->user->first_name }} {{ $event->user->last_name}}@else{{ $event->user->user_name }}@endif at {{ $event->venue }}</a></dt>
          <span class="tick tick-after"></span>
          <dd class="timeline-event-content" id="event{{ $event->id }}EX">
            <div class="media">
              <a class="venobox" data-overlay="rgba(0,0,0,0.5)"><img src="{{ $event->user->img }}" alt="some kickass image"></a>
              <p><a href="http://youtu.be/hUnibKe_o18" class="venobox" data-type="youtube" data-overlay="rgba(0,0,0,0.5)">Listen</a></p>
            </div><!-- /.media -->
              <div class="col-md-7 displayTable">
                <table class="table">
                  <tr>
                    <td>Band/Artist:</td>
                    @if($event->user->user_type == 'musician')
                    <td>{{ $event->user->first_name }} {{ $event->user->last_name }}</td>
                    @else
                    <td>{{ $event->user->user_name }}</td>
                    @endif 
                  </tr>
                  <tr>
                    <td>Location:</td>
                    <td>{{ $event->venue }}<span><a href="http://{{ $event->venue_site}}">  Visit the venue website.</a></span></td>
                  </tr>
                  <tr>
                    <td>Address:</td>
                    <td>{{ $event->address }}</td>
                  </tr>
                  <tr>
                    <td>City:</td>
                    <td>{{ $event->city }}</td>
                  </tr>
                  <tr>
                    <td>State:</td>
                    <td>{{ $event->state }}</td>
                  </tr>
                  <tr>
                    <td>Zip:</td>
                    <td>{{ $event->zip }}</td>
                  </tr>
                  <tr>
                    <td>Time:</td>
                    <td>{{ date('g:i a ', strtotime($event->start_time)) }}</td>
                  </tr>
                  <tr>
                    <td>Cover:</td>
                    <td>${{ $event->price }}</td>
                  </tr>
                  <tr>
                    <td>Genre:</td>
                    <td>{{ $event->user->genre}}</td>
                  </tr>
                  <tr>
                    <td>Description:</td>
                    <td>{{ $event->description }}</td>
                  </tr>
                  <tr>
                    <td><a class="btn btn-primary" href="{{{ action('UsersController@show', $event->user->id) }}}" role="button">Visit Band Profile</a></td>
                    <td><btn class="btn btn-primary">Follow</btn></td>
                  </tr>
                </table>
              </div>

          <br class="clear">
          </dd><!-- /.timeline-event-content -->


        </dl><!-- /.timeline-series -->
      @endforeach
      </div><!-- /.timeline-wrapper -->
      <button class="timeline-toggle">+ expand all</button>

      <br class="clear">

    </div><!-- /#timeline -->

  </div><!-- /.container -->

  <!-- GLOBAL CORE SCRIPTS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/vendor/venobox/venobox.min.js"></script>
  <script type="text/javascript" src="/js/timeliner.js"></script>
  <script>
    $(document).ready(function() {
      $.timeliner({
        timelineContainer:'#timeline',
      });
      $('.venobox').venobox();
    });

  </script>

@stop