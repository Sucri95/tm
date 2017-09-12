<link rel="stylesheet" type="text/css" href="../../css/components.css">

<?php $__env->startSection('content'); ?>
  <div class="container clients">
      <h4>Cargar imágenes de los clientes</h4>
        <form method="POST" action="/home/upload/clients_image" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


              <input class="input-type-1" type="text" name="title" id="title" placeholder="Escribí el título de la imagen: logos/ logos_mobile" autocomplete="off" style="width: 100%;">

                <div class="img-container" style="max-height: 15em;"></div>

                <input type="hidden" id="array" name="array">

                <input class="load_img" type="file" accept="image/*" name="picture[]" multiple style="display: block;" size="20"><br/>

                <div class="button-container">
                    <button class="submit_btn image" type="submit" >PUBLICAR</button>
                </div>
       
      </form>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsfunctions'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>