<nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="{{ Auth::check() ? route('statuses_path') : route('home') }}">Jam A Lot</a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            {{-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> --}}
            {{-- <li><a href="#">Link</a></li> --}}
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ action('UsersController@bands') }}">View Bands</a></li>
                <li><a href="{{ action('UsersController@musicians') }}">View Musicians</a></li>

                <li><a href="{{ action('UsersController@index') }}">View All</a></li>
                @if ($currentUser)
                <li role="separator" class="divider"></li>
                <li><a href="{{ action('EventsController@index') }}">View All Events</a></li>
                <li><a href="{{ action('EventsController@index') }}">View Your Events</a></li>
                @endif

              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ action('PagesController@about')}}">About</a></li>
            @if ($currentUser)
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$currentUser->user_name}} <span class="caret"></span></a>
              <ul class="dropdown-menu">

                <li><a href="{{ action('UsersController@show', Auth::id()) }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Your Profile</a></li>
                <li><a href="{{ action('EventsController@create') }}">Create an Event</a></li>
                <li><a href="{{ action('AdsController@create') }}">Create a Jam/Gig/Lesson</a></li>
                <li role="separator" class="divider"></li>
                <li>{{ link_to_route('logout_path', 'Log Out')}}</li>
              </ul>
            </li>
            @else

            <li>{{ link_to_route('register_path', 'Register') }}</li>
            <li>{{ link_to_route('login_path', 'Log In') }}</li>
            
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>