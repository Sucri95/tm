@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="../../css/components.css">
<link rel="stylesheet" type="text/css" href="../../css/loader.css">  
<link rel="stylesheet" type="text/css" href="../../css/walls.css">
<link rel="stylesheet" type="text/css" href="../../css/ylmm-media.css">
<link rel="stylesheet" type="text/css" href="../../css/ylmm.css">

@section('content')
  <div class="container">
      <h4>Cargar imágenes para el banner principal</h4>
        <form method="POST" action="/home/upload/banner" enctype="multipart/form-data">
            {{ csrf_field() }}
              <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

              <input class="input-type-1" type="text" name="title" id="title" placeholder="Escribí el título de la/ s imágen/ es..." autocomplete="off" style="width: 100%;">

                <div class="img-container"></div>
                <div class="timer">
                  
                  <div class="loader">
                    <svg class="circular" viewBox="25 25 50 50">
                      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                    </svg>
                  </div>

                </div>

                <input type="hidden" id="array" name="array">

                <input class="load_img" type="file" accept="image/*" name="picture[]" multiple style="display: block;" size="20"><br/>

            <button type="submit" >PUBLICAR</button>
       
      </form>
  </div>
@endsection

@section('jsfunctions')


@stop