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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap-select.css">
    <link rel="stylesheet" href="/css/build.css">


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
        border-bottom: none;
      }
      .commentsForm textarea {
        border: 1px solid lightgrey;
        border-top:none;
        border-radius: 0;

      }

      .comments {

        margin-bottom: 5em;
      }

      .comments_comment {

        background:whitesmoke;
        margin-top: 0;
        border: 1px solid azure;
        border-bottom: 1px solid lightgrey;
        padding: 10px;

      }

      .profile-img {
          height:80px;
          width:80px;
      }
      .scroller {
        overflow-y:auto;
        height:100px;
      }
    

    </style>
    @yield('styles')
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap-select.js"></script>
    <script src="/js/bootstrap-filestyle.js"> </script>
    
    @yield('scripts')
    
</head>

<body>

  @include('layouts.partials.nav')
    
    <div class="container">

      @include('flash::message')

      @if (Session::has('successMessage'))
          <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
      @endif
      @if (Session::has('errorMessage'))
          <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
      @endif
      @if($errors->has())
          <div class="alert alert-danger" role="alert">
              <ul>
                  @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      
      @yield('content')
      
    </div>

    <script>

      $('#flash-overlay-modal').modal();


      $('.commentsForm').on('keydown', function(e){
          if(e.keyCode == 13){

            e.preventDefault();

            $(this).submit();

          }

      });

    </script>
</body>

</html>



