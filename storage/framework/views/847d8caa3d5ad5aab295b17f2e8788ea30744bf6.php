<?php $__env->startSection('content'); ?>
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Crea un caso nuevo</div>
                    <div class="panel-body">
                        <form method="POST" action="/home/cases/upload" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <input type="" name="name" placeholder="Título del caso: case1/ case2" style="width: 100%;">
                            <br><br><br>
                            <select class="js-example-basic-multiple" name="tags" multiple="multiple">
                            </select>

                            <input type="hidden" name="array_tags" id="array_tags">
                             
                             <div class="img-container"></div>

                                <input type="hidden" id="array" name="array">
                                <br><br>
                                <input class="load_img" type="file" accept="image/*" name="picture[]" multiple style="display: block;" size="20">
                                <br>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsfunctions'); ?>

    <script src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
    
    <script type="text/javascript">
        
        $(".js-example-basic-multiple").select2({
          placeholder: "TAGS"
        });

        $(".js-example-basic-multiple.select2-hidden-accessible").addClass("hidden");

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>