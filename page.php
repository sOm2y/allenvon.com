<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Allenvon Creative</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="allenvon creative offical site" />
        <meta name="keywords" content="allenvon, photograph, auckland" />
        <meta name="author" content="sOm2y" />
        <link rel="shortcut icon" href="<?php bloginfo('template_url');?>/./favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/text.css" />
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/index.css" />
        <link href='http://fonts.googleapis.com/css?family=Miltonian|Bitter' rel='stylesheet' type='text/css' />
        <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/modernizr.custom.21750.js"></script>
        <noscript>
            <style>
                .bx-loading{display:none;}
            </style>
        </noscript>
    </head>
    <body>
        <div class="container">       
          
            <div id="bx-wrapper" class="bx-wrapper">
                <div class="bx-loading">
                    <span>LOADING...</span>
                </div>		
				<div class="bx-thumbs">
                   
                    <a href="#" id="0" class="bx-thumbs-current"></a>
                    <a href="#" id="1"></a>
                    <a href="#" id="2" ></a>
                    <a href="#" id="3"></a>
                    <a href="#" id="4"></a>
                    <a href="#" id="5"></a>
                   
                </div>
                <div class="logo">
                    <img src="<?php bloginfo('template_url');?>/images/logo.png"> <br>
                   <a href="http://allenvon.dev/portfolio/?portfolio=true">portfolio</a>
                   <a href="http://allenvon.dev/portfolio/?contact=true">contact</a>
                </div>
                <div class="bx-container">
<!--
                   
                    <img src="<?php bloginfo('template_url');?>/images/bw/1.jpg" alt="image01" title=""/>
                    <img src="<?php bloginfo('template_url');?>/images/bw/2.jpg" alt="image02" title=""/>
                    <img src="<?php bloginfo('template_url');?>/images/bw/3.jpg" alt="image03" title=""/>
                    <img src="<?php bloginfo('template_url');?>/images/bw/4.jpg" alt="image04" title=""/>
                    <img src="<?php bloginfo('template_url');?>/images/bw/5.jpg" alt="image05" title=""/>
                    <img src="<?php bloginfo('template_url');?>/images/bw/6.jpg" alt="image06" title=""/>
-->
                    
                    <?php if( have_rows('bg-slider') ): ?>

                        <?php while( have_rows('bg-slider') ): the_row(); 

                            // vars
                            $image = get_sub_field('image');

                            ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

                               

                        <?php endwhile; ?>

                  

                    <?php endif; ?>

                </div>
                <div class="bx-overlay"></div>
            </div>
        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/StackBlur.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/bg-slides.js"></script>
    </body>
</html>