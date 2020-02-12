@extends('layouts.app')

@section('content')
<header>
    <style>
        .file{
            display: none;
        }
        #image-wrapper{
           height: 100px;
        /* background-color: dodgerblue; */
        }
        #image-wrapper img{
            width: 200px;
            height: 200px;
        }
    </style>
</header>
<div class="container">
    <div class="row">
            <div id="image-wrapper" class="col-lg-12"></div>
    </div>
   <div class="row">
       {{-- <img src="" class="img"> --}}
     
           
     
       <div class="col-lg-12">
            <input type="file"  class="file" multiple>
            <button class="btn btn-success select">select</button>
       </div>
    </div> 
</div>

<script>
$(document).ready(function() {
    $('.select').click(function() {
    $('.file').click();    
    })

    $('.file').change(function() {
        var _URL = window.URL || window.webkitURL;

    var file;
    var image;
    if ((file = $(".file")[0].files[0])) {
        image = new Image();
        image.src = _URL.createObjectURL(file);
        image.onload = function () {
            $("#image-wrapper").append(this);
        }
    }
    })
})
</script>
@endsection