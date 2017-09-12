@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="../../css/components.css">

@section('content')
  <div class="container clients">
      <h4>Cargar imágenes del Team</h4>
        <form method="POST" action="/home/upload/team_image" enctype="multipart/form-data">
            {{ csrf_field() }}
              <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

              <input class="input-type-1" type="text" name="title" id="title" placeholder="Escribí el título de la imagen: team1/ team1_mobile" autocomplete="off" style="width: 100%;">

                <div class="img-container" style="max-height: 15em;"></div>
                
                <input type="hidden" id="array" name="array">

                <input class="load_img" type="file" accept="image/*" name="picture[]" multiple style="display: block;" size="20"><br/>

                <div class="button-container">
                    <button class="submit_btn image" type="submit" >PUBLICAR</button>
                </div>
       
      </form>
  </div>
@endsection

@section('jsfunctions')


@stop