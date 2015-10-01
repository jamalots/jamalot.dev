@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/StarPlugins/thumbelina/master/thumbelina.css" />

<style type="text/css">
            /* Some styles for the containers */
            #slider3 {
                position:relative;
                margin-top:40px;
                width:93px;
                height:256px;
                border-left:1px solid #aaa;
                border-right:1px solid #aaa;
                margin-bottom:40px;
            }
        </style>
@stop

@section('content')
<div class="container col-md-12">
    <div class="col-md-6">
        <h2>Vertical Slider</h2>
        <div id="slider3">
            <div class="thumbelina-but vert top">&#708;</div>
            <ul>
                <li><img src="/images/image1.jpg"></li>
                <li><img src="/images/image2.jpg"></li>
                <li><img src="/images/image3.jpg"></li>
                <li><img src="/images/image4.jpg"></li>
                <li><img src="/images/image5.jpg"></li>
                <li><img src="/images/image6.jpg"></li>
            </ul>
            <div class="thumbelina-but vert bottom">&#709;</div>
        </div>
        </div>
    </div>

    


<script src="https://cdn.rawgit.com/StarPlugins/thumbelina/master/thumbelina.js"></script>
<script type="text/javascript">
    $(function(){
        
        $('#slider3').Thumbelina({
            orientation:'vertical',         // Use vertical mode (default horizontal).
            $bwdBut:$('#slider3 .top'),     // Selector to top button.
            $fwdBut:$('#slider3 .bottom')   // Selector to bottom button.
        });
      
    })
</script>    

@stop