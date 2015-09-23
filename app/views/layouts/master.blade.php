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
    </style>
    <!-- jQuery -->
    <script src="/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    
    
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



