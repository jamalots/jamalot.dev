@extends('layouts.master')

@section('content')

<style type="text/css">


.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

</style>

@include('layouts.partials.errors')

<div class="container">
        <h1 class="create">Update Your Profile</h1>

        {{ Form::open(array('action' => array('UsersController@update', $user->id), 'files'=>true, 'method'=>'PUT')) }}
            
            <div class="form-group">
                {{ Form::label('first_name', 'First Name') }}
                {{ Form::text('first_name', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('last_name', 'Last Name') }}
                {{ Form::text('last_name', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('location', 'Location') }}
                {{ Form::text('location', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('instrument', 'Instrument') }}
                {{ Form::text('instrument', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('level', 'Playing Level') }}
                {{ Form::select('original', array('Professional' => 'Professional', 'Intermediate' => 'Intermediate', 'Novice' => 'Novice'), 'Novice'); }}
            </div>

            <div class="form-group">
                {{ Form::label('original', 'Originals/Covers') }}
                {{ Form::select('original', array('Originals' => 'Originals', 'Covers' => 'Covers', 'Both' => 'Both'), 'Originals'); }}
            </div>

            <div class="form-group">
                {{ Form::label('genre', 'Genre') }}
                {{ Form::text('genre', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('about', 'About the Band') }}
                {{ Form::textarea('about', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">

				{{ Form::label('user_type', 'Type of Artist') }}
				{{ Form::select('user_type', array('Musician' => 'Musician', 'Band' => 'Band'), 'Musician'); }}

			</div>

            <div class="form-group">
                {{-- <div class="col-md-6"> --}}
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-info btn-file">Upload Profile Image 
                            {{ Form::file('img') }}
                            </span>
                        </span>
                        {{ Form::text('img', null, ['class' => 'form-control', 'readonly']) }}
                    </div>
                {{-- </div> --}}
            </div>
            <div class="clearfix"></div>
            <br>
            <button class="btn btn-primary">Update Profile!</button>
        {{ Form::close() }}
      </div>
 
<script>

$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
});

</script>

@stop



