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
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" class = "form-control" id="first_name">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class = "form-control" id="last_name" name="last_name">
            </div>

            <div class="form-group">
                <label for="user_type">Type of Artist:</label>
                <select id="user_type" class="selectpicker show-tick form-control" data-live-search="true" name="user_type">
                  <option>Musician</option>
                  <option>Band</option>
                </select>
			</div>

            <div class="form-group">
                <label for="location">Location:</label>
                <select id="location" class="selectpicker show-tick form-control" data-live-search="true" name="location">
                  <option>Alaska</option>
                  <option>Alabama</option>
                  <option>Arkansas</option>
                  <option>Arizona</option>
                  <option>California</option>
                  <option>Colorado</option>
                  <option>Connecticut</option>
                  <option>District of Columbia</option>
                  <option>Delaware</option>
                  <option>Florida</option>
                  <option>Georgia</option>
                  <option>Hawaii</option>
                  <option>Iowa</option>
                  <option>Idaho</option>
                  <option>Illinois</option>
                  <option>Indiana</option>
                  <option>Kansas</option>
                  <option>Kentucky</option>
                  <option>Louisiana</option>
                  <option>Massachusetts</option>
                  <option>Maryland</option>
                  <option>Maine</option>
                  <option>Michigan</option>
                  <option>Minnesota</option>
                  <option>Missouri</option>
                  <option>Mississippi</option>
                  <option>Montana</option>
                  <option>North Carolina</option>
                  <option>North Dakota</option>
                  <option>Nebraska</option>
                  <option>New Hampshire</option>
                  <option>New Jersey</option>
                  <option>New Mexico</option>
                  <option>Nevada</option>
                  <option>New York</option>
                  <option>Ohio</option>
                  <option>Oklahoma</option>
                  <option>Oregon</option>
                  <option>Pennsylvania</option>
                  <option>Puerto Rico</option>
                  <option>Rhode Island</option>
                  <option>South Carolina</option>
                  <option>South Dakota</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Utah</option>
                  <option>Virginia</option>
                  <option>Vermont</option>
                  <option>Washington</option>
                  <option>Wisconsin</option>
                  <option>West Virginia</option>
                  <option>Wyoming</option>
                </select>
            </div>

            <div class="form-group">
                <label for="instrument">Instruments Played:</label>
                <select id="basic" class="selectpicker show-tick form-control" multiple data-max-options="3" data-live-search="true" name="instrument">
                    <optgroup label="Guitar">
                      <option>Acoustic Guitar</option>
                      <option>Classical Guitar</option>
                      <option>Electric Guitar</option>
                      <option>Steel Guitar</option>
                      <option>Electric Bass</option>
                      <option>Double Bass</option>
                      <option>Ukelele</option>
                    </optgroup>
                    <optgroup label="Keys">
                      <option>Piano</option>
                      <option>Keyboard</option>
                      <option>Organ</option>
                      <option>Accordion</option>
                    </optgroup>
                    <optgroup label="Percussion">
                      <option>Drums</option>
                      <option>Other Percussion</option>
                    </optgroup>
                    <optgroup label="Vocals">
                      <option>Lead Rock/Pop</option>
                      <option>Lead Jazz</option>
                      <option>Bass</option>
                      <option>Baritone</option>
                      <option>Tenor</option>
                      <option>Alto</option>
                      <option>Mezzo-Soprano</option>
                      <option>Soprano</option>
                    </optgroup>
                    <optgroup label="Strings">
                      <option>Cello</option>
                      <option>Double Bass</option>
                      <option>Viola</option>
                      <option>Violin</option>
                      <option>Fiddle</option>
                      <option>Banjo</option>
                      <option>Harp</option>
                      <option>Mandolin</option>
                    </optgroup>
                    <optgroup label="Brass">
                      <option>Trumpet</option>
                      <option>Trombone</option>
                      <option>Tuba</option>
                      <option>French Horn</option>
                    </optgroup>
                    <optgroup label="Winds">
                      <option>Alto Sax</option>
                      <option>Tenor Sax</option>
                      <option>Flute</option>
                      <option>Oboe</option>
                      <option>Clarinet</option>
                      <option>Harmonica</option>
                      <option>Piccolo</option>
                      <option>Bassoon</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label for="level">Playing Level:</label>
                <select id="location" class="selectpicker show-tick form-control" data-live-search="true" name="level">
                  <option>Beginner</option>
                  <option>Intermediate</option>
                  <option>Semi-Pro</option>
                  <option>Professional</option>
                </select>
            </div>

            <div class="form-group">
                <label for="original">Playing Level:</label>
                <select id="original" class="selectpicker show-tick form-control" data-live-search="true" name="original">
                  <option>Originals</option>
                  <option>Covers</option>
                  <option>Both</option>
                </select>
            </div>

            <div class="form-group">
                <label for="genre">Genre:</label>
                <select id="basic" class="selectpicker show-tick form-control" multiple data-max-options="10" data-live-search="true" name="genre">
                    <optgroup label="Blues">
                      <option>Acoustic Blues</option>
                      <option>Electric Blues</option>
                    </optgroup>
                    <optgroup label="Bluegrass">
                      <option>Bluegrass</option>
                    </optgroup>
                    <optgroup label="Classical">
                      <option>Classical</option>
                    </optgroup>
                    <optgroup label="Country">
                      <option>Pop Country</option>
                      <option>Traditional Country</option>
                    </optgroup>
                    <optgroup label="Electronic">
                      <option>House</option>
                      <option>Deep House</option>
                      <option>Dubstep</option>
                      <option>Trap</option>
                      <option>Techno</option>
                      <option>Downtempo</option>
                      <option>Ambient</option>
                      <option>Drums & Bass</option>
                      <option>Video Game</option>
                    </optgroup>
                    <optgroup label="Folk">
                      <option>Americana</option>
                      <option>Acoustic Folk</option>
                      <option>Cajun Folk</option>
                      <option>Celtic Folk</option>
                      <option>Singer/Songwriter Folk</option>
                    </optgroup>
                    <optgroup label="Jazz">
                      <option>Combo Jazz</option>
                      <option>Dixieland Jazz</option>
                      <option>Ensemble Jazz</option>
                      <option>Fusion Jazz</option>
                      <option>Latin Jazz</option>
                      <option>Standards</option>
                      <option>Acid Jazz</option>
                    </optgroup>
                    <optgroup label="Latin">
                      <option>Latin</option>
                    </optgroup>
                    <optgroup label="New Age">
                      <option>New Age</option>
                    </optgroup>
                    <optgroup label="Rock/Pop">
                      <option>Ambient</option>
                      <option>Christian</option>
                      <option>Classic Rock</option>
                      <option>Dance</option>
                      <option>Hard Rock</option>
                      <option>Heavy Metal</option>
                      <option>Indie Rock</option>
                      <option>Latin Rock</option>
                      <option>New Wave</option>
                      <option>Pop</option>
                      <option>Psychedelic</option>
                      <option>Punk Rock</option>
                      <option>Rock & Roll</option>
                      <option>Rockabilly</option>
                      <option>Singer/Songwriter</option>
                      <option>Ska</option>
                      <option>Soft Rock</option>
                      <option>Southern Rock</option>
                      <option>Top 40</option>
                    </optgroup>
                    <optgroup label="Hip Hop/Rap">
                      <option>Hip Hop/Rap</option>
                    </optgroup>
                    <optgroup label="R&B/Soul">
                      <option>Classic Soul</option>
                      <option>Neo-Soul</option>
                      <option>Gospel</option>
                      <option>Contemporary R&B</option>
                    </optgroup>
                    <optgroup label="Reggae">
                      <option>Reggae</option>
                    </optgroup>
                    <optgroup label="Soundtrack">
                      <option>Soundtrack</option>
                    </optgroup>
                    <optgroup label="World Music">
                      <option>World Music</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label for="about">About:</label>
                <input type="text" class = "form-control" id="about" name="about">
            </div>

            <div class="form-group">
                {{-- <div class="col-md-6"> --}}
                <label for="img">Upload Profile Image:</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file">
                            Browse&hellip; <input type="file" name="img" id="img">
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
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

$(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
});

$('.selectpicker').selectpicker();
</script>

@stop



