@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Comparte los testimonios de tus clientes</div>

                <div class="panel-body">
                  <form method="POST" action="/home/testimonials/upload" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input class="input-type-1" type="text" name="title" id="title" placeholder="Título de la imagen: 1, 2, 3" autocomplete="off" style="width: 100%;">

                    <div class="img-container"></div>
                    <br>

                    <input type="hidden" id="array" name="array">

                    <input class="load_img" type="file" accept="image/*" name="picture" style="display: block;" size="20">
                    <br>

                    <input class="input-type-1" type="text" name="name" id="name" placeholder="Nombre" autocomplete="off" style="width: 100%;">
                    <br>

                    <input class="input-type-1" type="text" name="author" id="author" placeholder="Reseña" autocomplete="off" style="width: 100%;">
                    <br>

                    <textarea class="main-textarea" name="bio" id="bio" placeholder="Cita"></textarea>
                    <br>

                    <button type="submit" >PUBLICAR</button>
       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsfunctions')


@stop