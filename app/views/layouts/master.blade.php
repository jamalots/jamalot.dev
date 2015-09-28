<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">

    <title>Jam-A-Lot</title>


    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <style>
      body{
        padding-top: 85px;
      }

      .status-post{
        background: white;
        margin-bottom: 3em;
        padding: 0px;

      }
      .mainpost {
        border: 1px solid lightgrey;
        margin-bottom: 0px;
      }
      .status-post-submit {
        padding: .5em .5em;
        padding-top:0px;
        overflow: hidden;

      }
      .status-post-submit .btn {
        float:right;
        margin-top: 0px;
      }

      .status-media {
        border: 1px solid lightgrey;
        background: white;
        padding: 20px;
        margin-bottom: 25px;
      }

    </style>
    @yield('styles')
    <!-- jQuery -->
    <script src="/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    @yield('scripts')
    
</head>

<body>

  @include('layouts.partials.nav')
    
    <div class="container">
      @include('flash::message')
      @yield('content')
    </div>

    <script>$('#flash-overlay-modal').modal();</script>
</body>

</html>



