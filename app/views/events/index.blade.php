@extends('layouts.master')

<head>
  <link rel="stylesheet" href="css/timeliner-future.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/js/vendor/venobox/venobox.css" type="text/css" media="screen">
</head>

@section('content')

  <div class="container">
    <h1>Upcoming Events</h1>
    {{-- BEGIN TIMELINE WRAPPER --}}
    <div id="timeline" class="timeline-container">

      <button class="timeline-toggle">+ expand all</button>

      <br class="clear">
      @foreach($events as $event)
      <div class="timeline-wrapper">
        <h2 class="timeline-time"><span>2015</span></h2>
        <dl class="timeline-series">
          <span class="tick tick-before"></span>
          <dt id="robots" class="timeline-event"><a>{{ date('F d, Y ', strtotime($event->date)) }} {{ date('g:i a ', strtotime($event->time)) }} {{ $event->user->first_name }} {{ $event->user->last_name }} plays at {{ $event->location }}</a></dt>
          <span class="tick tick-after"></span>
          <dd class="timeline-event-content" id="robotsEX">
            <div class="media">
              <a class="venobox" data-overlay="rgba(0,0,0,0.5)"><img src="{{ $event->user->img }}" alt="singing robots"></a>
              <p><a href="http://youtu.be/hUnibKe_o18" class="venobox" data-type="youtube" data-overlay="rgba(0,0,0,0.5)">Listen</a></p>
            </div><!-- /.media -->
              <div>
                <table class="table">
                  <tr>
                    <td>Location:</td>
                    <td>{{ $event->venue }}<span><a href="{{event->venue_site}}">Visit the venue page</a></span></td>
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
                    <td>{{ $event->start_time }}</td>
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
                    <td><btn class="btn btn-primary">View Band Page</btn></td>
                    <td><btn class="btn btn-primary">Follow</btn></td>
                  </tr>
                </table>
              </div>

          <br class="clear">
          </dd><!-- /.timeline-event-content -->


        </dl><!-- /.timeline-series -->
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