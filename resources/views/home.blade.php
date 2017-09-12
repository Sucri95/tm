@extends('layouts.app')

@section('content')

<div class="overlay">
  <div class="container">
    <div class="close"></div>
      <h4>Cargar imágenes para el banner principal</h4>
      <form method="POST" action="/home/upload/banner" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input class="input-type-1" type="text" name="title" id="title" placeholder="Escribí el título de la imagen: 1... (web), 1m... (mobile)." autocomplete="off" style="width: 100%;">

            <div class="img-container"></div>

            <input type="hidden" id="array" name="array">

            <input class="load_img" type="file" accept="image/*" name="picture[]" multiple style="display: block;" size="20"><br/>

            <div class="button-container">
                <button class="submit_btn image" type="submit" >PUBLICAR</button>
            </div>
            
      
      </form>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Carga de contenido principal</div>

                    <div class="panel-body">
                        <ul>
                            <li><a class="home-a banner" href="javascript:;">Cargar imágenes para el banner principal</a></li>
                            <li><a class="home-a" href="{{ url('/home/cases') }}">Cargar casos</a></li>
                            <li><a class="home-a" href="{{ url('/home/portfolios') }}">Cargar portfolio</a></li>
                            <li><a class="home-a testimonials" href="{{ url('/home/testimonials') }}">Cargar testimonios</a></li>
                            <!--
                            <li><a class="home-a clientslogos" href="{{ url('/home/clients') }}">Cargar logo de los clientes</a></li>
                            -->
                        </ul>
                    </div>

                <div class="panel-heading" style="border-top: 1px solid #d3e0e9;">Carga de información sobre la empresa</div>
                    
                    <div class="panel-body">
                        <ul>
                            <li><a class="home-a clients" href="{{ url('/home/clients_image') }}">Cargar imagen de los clientes</a></li>
                            <li><a class="home-a teams" href="{{ url('/home/team_image') }}">Cargar imagen del team</a></li>
                        </ul>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection