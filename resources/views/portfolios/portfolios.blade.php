@extends('layouts.app')


@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Crea un portfolio nuevo</div>
                    <div class="panel-body">
                        <form method="POST" action="/home/portfolios/upload" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="" name="name" placeholder="Nombre del portfolio: thumb1/ thumb2/ thumb3..." style="width: 100%;">
                            <br><br><br>
                            <select class="js-example-basic-multiple" name="tags" multiple="multiple">
                            </select>

                            <input type="hidden" name="array_tags" id="array_tags">
                             
                             <div class="img-container"></div>
                             
                                <input type="hidden" id="array" name="array">

                                <br><br>
                                <input class="load_img" type="file" accept="image/*" name="picture[]" multiple style="display: block;" size="20">
                                <br><br>

                                <textarea class="ckeditor" name="html" id="editor1" rows="10" cols="80">
                                    Texto
                                </textarea>

                                <br>
                                <div class="button-container">
                                    <button class="submit_btn image" type="submit" >PUBLICAR</button>
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsfunctions')

    <script src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
    
    <script type="text/javascript">
        
        $(".js-example-basic-multiple").select2({
          placeholder: "TAGS"
        });
		
        $(".js-example-basic-multiple.select2-hidden-accessible").addClass("hidden");

    </script>

@stop