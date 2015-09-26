@extends('layouts.master')
<style>
table {
    color: rgba(255,255,255,1);
}
.manage{
	color: rgba(255,255,255,1);
}
.modal-body{
	color: black;
}
.linkage:link{
    color: white;
}
.linkage:hover{
    color: blue;
}
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
.div-button
{
    margin-left: 20px;
}
</style>
@section('content')

<div>
		<div class="container">
			<h2 class='manage'>Manage Events<h2>
			<table class='table table-bordered'>
				<tr>
					<th>Venue</th>
					<th>Event Date</th>
					<th>Event Location</th>
					<th>Start Time</th>
					<th>Edit Post</th>
					<th>Remove Post</th>
				</tr>
				@foreach($events as $event)
				<tr>
					<td><a class="linkage" href="{{{ action('EventsController@show', $event->id) }}}" >{{ $event->venue }}</a>
					{{-- data-toggle="modal" data-target="" --}}
					{{-- DISPLAY MODAL --}}
    
				     
				    
				    {{-- END DISPLAY MODAL --}}

					</td>
					<td>{{ $event->date }}</td>
					<td>{{ $event->venue }}</td>
					<td>{{ $event->start_time }}</td>

					<td><btn class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $event->id }}">Edit</btn>

					{{-- EDIT MODAL --}}
    
				      <div class="modal fade" id="editModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $event->id }}">
				        <div class="modal-dialog" role="document">
				          <div class="modal-content">
				            <div class="modal-header">
				              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				              <div class="modal-title showmodal" id="editModalLabel{{ $event->id }}">
				              	<img src="{{ $event->img }}" width="100%"></div>
				            </div>
				            <div class="modal-body">
				              <div>
						        <h1 class="create">Edit Your Event</h1>

						        {{ Form::model($event, array('action' => array('EventsController@show', $event->id), 'files'=>true, 'class' => 'horizontal', 'method' => 'PUT')) }}
						            <div class="form-group">
						                {{ Form::label('venue', 'Venue Name') }}
						                {{ Form::text('venue', Input::old('venue'), ['class' => 'form-control']) }}
						            </div>

						            <div class="form-group">
						                {{ Form::label('venue_site', 'Venue Site Name') }}
						                {{ Form::text('venue_site', Input::old('venue_site'), ['class' => 'form-control']) }}
						            </div>

						            <div class="form-group">
						                {{ Form::label('description', 'Event Description') }}
						                {{ Form::textarea('description', Input::old('description'), ['class' => 'form-control']) }}
						            </div>

						            <div class="form-group">
						                {{ Form::label('price', 'Cover Price: $') }}
						                {{ Form::number('price') }}
						            </div>

						            <div class="form-group">
						                {{ Form::label('date', 'Event Date') }}
						                {{ Form::date('date') }}
						            </div>

						            <div class="form-group">
						                {{ Form::label('start_time', 'Start Time') }}
						                {{ Form::time('start_time')}}
						            </div>						           

						            <div class="form-group">
						                {{ Form::label('address', 'Address') }}
						                {{ Form::text('address', Input::old('address'), ['class' => 'form-control']) }}
						            </div>

						            <div class="form-group">
						                {{ Form::label('city', 'City') }}
						                {{ Form::text('city', Input::old('city'), ['class' => 'form-control']) }}
						            </div>

						            <div class="form-group">
						                {{ Form::label('state', 'State') }}
						                {{ Form::text('state', Input::old('state'), ['class' => 'form-control']) }}
						            </div>

						            <div class="form-group">
						                {{ Form::label('zip_code', 'Zip Code') }}
						                {{ Form::text('zip_code', Input::old('zip_code'), ['class' => 'form-control']) }}
						            </div>

						            <div class="form-group">
						                {{-- <div class="col-md-6"> --}}
						                {{ Form::label('img', 'Change Event Photo') }}
						                    <div class="input-group">
						                        <span class="input-group-btn">
						                            <span class="btn btn-info btn-file">Browse 
						                            {{ Form::file('img') }}
						                            </span>
						                        </span>
						                        {{ Form::text('img', null, ['class' => 'form-control', 'readonly']) }}
						                    </div>
						                {{-- </div> --}}
						            </div>

						            <div class="form-group">
						                {{-- <div class="col-md-6"> --}}
						                {{ Form::label('cover_img', 'Change Cover Photo') }}
						                    <div class="input-group">
						                        <span class="input-group-btn">
						                            <span class="btn btn-info btn-file">Browse 
						                            {{ Form::file('cover_img') }}
						                            </span>
						                        </span>
						                        {{ Form::text('cover_img', null, ['class' => 'form-control', 'readonly']) }}
						                    </div>
						                {{-- </div> --}}
						            </div>
						      
						            <button class="btn btn-warning">Save Changes</button><button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Nevermind</button>
						        {{ Form::close() }}
						      </div>
				            {{-- <div class="modal-footer">
			                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
			                </div> --}}
				          </div>
				        </div>
				      </div>
				    
				    {{-- END EDIT MODAL --}}
				    </td>
					<td><btn class="btn btn-danger" data-toggle="modal" data-target="">Delete</btn></td>
				</tr>
				@endforeach
			</table>
		</div>
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