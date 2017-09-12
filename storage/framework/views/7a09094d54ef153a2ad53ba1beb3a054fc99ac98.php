<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="icon" href="../../images/favicon.ico">
        
        <title>TM.GROUP</title>
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link rel="StyleSheet" href="../../css/general.css" type="text/css" media="all" />
        
        <script src="../../js/jquery.js"></script>
        <script src="../../js/general.js"></script>
    </head>
    
    <body onload="setScreen();" onresize="setScreen();">
        <div class="top">
            <img class="logo" src="../../images/general/logo.png" alt="TM.GROUP" />
            
            <div class="hamburger" onclick="menuToggle();"></div>
            
            <div class="menu">
                <div class="btn" onclick="nav('home');">HOME</div>
                <div class="btn" onclick="nav('casos');">CASOS</div>
                <div class="btn" onclick="nav('trabajos');">PORTFOLIO</div>
                <div class="btn" onclick="nav('testimonios');">TESTIMONIOS</div>
                <div class="btn" onclick="nav('about');">ABOUT</div>
                <div class="btn" onclick="nav('blog');">BLOG</div>
                <div class="btn" onclick="nav('clientes');">CLIENTES</div>
                <div class="btn" onclick="nav('español');">ESPAÑOL</div>
            </div>
        </div>
        
        <div class="content">
            <div class="section home">
                <div class="slide">             
                    <img class="arrow left" onclick="onSlideHome('left');" src="../../images/general/arrow_left.png" alt=" " />
                    <img class="arrow right" onclick="onSlideHome('right');" src="../../images/general/arrow_right.png" alt=" " />
                </div>
            </div>
            
            <div class="section casos">
                <div class="txt">
                    <h2>ENTENDEMOS LAS NECESIDADES<br><span class="dest">DE BRANDING Y DE NEGOCIO.</span></h2>
                    <p>Somos pensamiento estratégico +<br>creación de conceptos + diseño multidisciplinario.</p>
                </div>
                
                <div class="casos">
                    <?php $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <img class="caso" onclick="" src="<?php echo e($case->route); ?>" alt=" " />
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            </div>
            
            <div class="section trabajos">
                <div class="txt">
                    <h2>TRABAJOS RECIENTES</h2>
                    <p>Estos son algunos de los proyectos en los que hemos<br>estado trabajando.</p>
                </div>
                
                <div class="trabajos">
                    <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <img class="trabajo" onclick="" src="<?php echo e($portfolio->route); ?>" alt=" " />
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            </div>
            
            <div class="section testimonios">
                <div class="slide_c">
                    <div class="slides">
                        <div class="slide n1">
                            <img class="pic" src="<?php echo e($testimonials[0]->id_images); ?>" alt=" " />
                            <p><?php echo e($testimonials[0]->bio); ?></p>
                            <p><span class="autor"><?php echo e($testimonials[0]->name); ?></span><br><?php echo e($testimonials[0]->author); ?><br></p>
                        </div>
                        <div class="slide n2" style="display: none;">
							<img class="pic" src="<?php echo e($testimonials[1]->id_images); ?>" alt=" " />
							<p><?php echo e($testimonials[1]->bio); ?></p>
							<p><span class="autor"><?php echo e($testimonials[1]->name); ?></span><br><?php echo e($testimonials[1]->author); ?><br></p>
						</div>
						
                        <div class="slide n3" style="display: none;">
							<img class="pic" src="<?php echo e($testimonials[2]->id_images); ?>" alt=" " />
							<p><?php echo e($testimonials[2]->bio); ?></p>
							<p><span class="autor"><?php echo e($testimonials[2]->name); ?></span><br><?php echo e($testimonials[2]->author); ?><br></p>
						</div>
						
						<img class="arrow left" onclick="onSlideTestimonios('left');" src="images/general/arrow2_left.png" alt=" " />
						<img class="arrow right" onclick="onSlideTestimonios('right');" src="images/general/arrow2_right.png" alt=" " />
                    </div>
                </div>
            </div>
            
            <div class="section blog">
                <h2>BLOG POSTS</h2>
                
                <div class="slide_c">
                    <div class="slides">
                        <div class="slide n1" onmouseover="onBlogOver(1);" onmouseout="onBlogOut(1);" style="background-image: url(../../images/section/blog/1.png);">
                            <div class="over">
                                <div class="background"></div>
                                <h3>LANZAMOS<br>LA NUEVA IMAGEN DE TM!</h3>
                            </div>
                        </div>
                    </div>
                    
                    <img class="arrow left" onclick="onSlideBlog('left');" src="../../images/general/arrow2_left.png" alt=" " />
                    <img class="arrow right" onclick="onSlideBlog('right');" src="../../images/general/arrow2_right.png" alt=" " />
                </div>
            </div>
            
            <div class="section clientes">
                <h2>CONFÍAN EN NOSOTROS</h2>
                    <img class="logos" src="<?php echo e($clients[0]->route); ?>" alt="Clientes" />
                    <img class="logos2" src="<?php echo e($clients[1]->route); ?>" alt="Clientes" />
            </div>
            
            <div class="footer">
                <div class="cols">
                    <div class="col a">
                        <h3>INFORMACIÓN</h3>
                        <a href="#">About</a>
                        <a href="javascript:nav('trabajos');">Portfolio</a>
                    </div>
                    
                    <div class="col b">
                        <h3>STUDIO</h3>

                        <p><strong>TMGROUP BUENOS AIRES</strong><br>O'higgins 1321.<br>Ciudad Autónoma de Buenos Aires.<br>ARGENTINA. TEL: +54 9 11 4042 2776</p>
                        <p><strong>TMGROUP PANAMÁ</strong><br>Costa del Este. Av. La Rotonda.<br>Edificio Prime Time Tower. Piso 6. OF 6A.<br>Ciudad de Panamá<br>PANAMÁ. TEL: +507 838. 8387</p>
                    </div>
                    
                    <div class="col c">
                        <h3>CONTACT</h3>
                        <a href="mailto:info@tmgroupweb.com">info@tmgroupweb.com</a>
                        <div class="social">
                            
                            <div class="btn in" onclick="#" >
                                <a target="_blank" href="https://www.linkedin.com/company-beta/953116/"></a>
                            </div>
                            
                            <div class="btn fb" onclick="#">
                                <a target="_blank" href="https://www.facebook.com/TMGroup-113197778702833/"></a>
                            </div>
                            
                            <div class="btn pint" onclick="#">
                                <a target="_blank" href="https://ar.pinterest.com/tanatozzelli/"></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
