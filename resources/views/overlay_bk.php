<!--
{{ url('/home/upload_banner') }}

<div class="overlay-clients">
  <div class="container">
    <div class="close"></div>
      <h4>Cargar imágenes de los clientes</h4>
        <form method="POST" action="/home/upload/clients_image" enctype="multipart/form-data">
            {{ csrf_field() }}

              <input class="input-type-1" type="text" name="title" id="title" placeholder="Escribí el título de la/ s imágen/ es..." autocomplete="off" style="width: 100%;">

                <div class="img-container"></div>

                <input type="hidden" id="array" name="array">

                <input class="load_img" type="file" accept="image/*" name="picture[]" multiple style="display: block;" size="20"><br/>

                <div class="button-container">
                    <button class="submit_btn image" type="submit" >PUBLICAR</button>
                </div>
       
      </form>
  </div>
</div>

<div class="overlay-teams">
  <div class="container">
    <div class="close"></div>
      <h4>Cargar imágenes del Team</h4>
        <form method="POST" action="/home/upload/team_image" enctype="multipart/form-data">
            {{ csrf_field() }}

              <input class="input-type-1" type="text" name="title" id="title" placeholder="Escribí el título de la/ s imágen/ es..." autocomplete="off" style="width: 100%;">

                <div class="img-container"></div>

                <input type="hidden" id="array" name="array">

                <input class="load_img" type="file" accept="image/*" name="picture[]" multiple style="display: block;" size="20"><br/>

                <div class="button-container">
                    <button class="submit_btn image" type="submit" >PUBLICAR</button>
                </div>
       
      </form>
  </div>
</div>

<div class="overlay-testimonials">
  <div class="container">
    <div class="close"></div>
      <h4>Comparte los testimonios de tus clientes</h4>
        <form method="POST" action="/home/testimonials/upload" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="img-container"></div>
            <br>

            <input type="hidden" id="array" name="array">

            <input class="load_img" type="file" accept="image/*" name="picture" style="display: block;" size="20">
            <br>

            <input class="input-type-1" type="text" name="name" id="name" placeholder="Nombre" autocomplete="off" style="width: 100%;">
            <br>

            <input class="input-type-1" type="text" name="author" id="author" placeholder="Autor" autocomplete="off" style="width: 100%;">
            <br>

            <textarea class="main-textarea" name="bio" id="bio" placeholder="Biografía"></textarea>
            <br>

            <div class="button-container">
                <button class="submit_btn image" type="submit" >PUBLICAR</button>
            </div>
       
      </form>
  </div>
</div>

<script>
$(document).on('click', '.home-a.testimonials',function() {
   $('.overlay-testimonials').addClass('active');
});

$(document).on('click', '#app > div.overlay-testimonials > div > div',function() {
   $('.overlay-testimonials').removeClass('active');
});

$(document).on('click', '.home-a.clients',function() {
   $('.overlay-testimonials').addClass('active');
});

$(document).on('click', '#app > div.overlay-clients > div > div',function() {
   $('.overlay-clients').removeClass('active');
});

$(document).on('click', '.home-a.teams',function() {
   $('.overlay-testimonials').addClass('active');
});

$(document).on('click', '#app > div.overlay-teams > div > div',function() {
   $('.overlay-teams').removeClass('active');
});

</script>
 -->