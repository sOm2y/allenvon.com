<?php
/*
Template Name:home-template
* Version: 1.0
*/
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Allenvon Creative</title>
		<meta name="description" content="Allenvon Creative" />
		<meta name="keywords" content="PhotoGraph, Arts, Creative" />
		<meta name="author" content="sOm2y" />
		<link rel="shortcut icon" href="./favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/sideBar.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/component.css">
		
		
		<!-- Add fancyBox -->
        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />

        <!-- Optionally add helpers - button, thumbnail and/or media -->
        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />


        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
        
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!--
        
         <link rel="stylesheet" href="css/about.css">
-->
       <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/bootstrap.css">


	</head>
	<body>
	<?php 
		if(isset($_POST['submit'])){
		    $to = "voncreativenz@gmail.com"; // this is your Email address
		    $from = $_POST['email']; // this is the sender's Email address
		    $name = $_POST['name'];
			$subject = "Form submission";
		    $subject2 = "Copy of your form submission";
		    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
		    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

		    $headers = "From:" . $from;
		    $headers2 = "From:" . $to;
		    mail($to,$subject,$message,$headers);
		    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender


		    echo "<center>
		    	<div class='feedback'>
		    	<strong>Success!</strong> Your message has been sent successfully.
				</div></center>";
		    // You can also use header('Location: thank_you.php'); to redirect to another page.
		    }
		?>

		<div class="container" id="container">
			
            <div class="grid" id="grid">

                    <?php if( have_rows('home-pic') ): ?>

                        <?php while( have_rows('home-pic') ): the_row(); 

                            // vars
                            $image = get_sub_field('image');
                            $attachment_id = get_sub_field('image');
                            $thumbnail_size = "portfolio"; // (thumbnail, medium, large, full or custom size)
                            $full_size="full";
                            $thumbnail_image = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
                            $full_image = wp_get_attachment_image_src( $attachment_id, $full_size );

                            ?>
                                   
        							    <figure class="effect-chico">
          								<img src="<?php echo $thumbnail_image[0]; ?>" alt=""/>
          								<figcaption>
          									
          									<p style="margin-top:25%;">VIEW MORE</p>
          									<a class="fancybox-thumb" rel="fancybox-thumb" href="<?php echo $full_image[0]; ?>">View more</a>
          								</figcaption>			
          							</figure>
			                               

                        <?php endwhile; ?>

                  

                    <?php endif; ?>
				
			</div>

           <div class="about_container">

           <?php

            // check if the flexible content field has rows of data
            if( have_rows('about_me') ):

                 // loop through the rows of data
                while ( have_rows('about_me') ) : the_row();

                    if( get_row_layout() == 'about_me' ):
                      ?>
                      <div class="row" style="margin-bottom:40px;margin-top:10%;">
          
                             <p><em><?php the_sub_field('quote'); ?>
                            </em></p>
                      
                        </div>
                        <div class="row">
                          <div class="col-md-7"> 
                              <?php the_sub_field('description'); ?>
                          </div>
                       
                           
                            <div class="col-md-4">                
                                    <a id="head" href="<?php the_sub_field('image'); ?>" title="Allenvon">
                                         <img id="portrait" style="width:300px;border-radius:180px;" src="<?php the_sub_field('image'); ?>" alt="portrait">
                                   
                                   </a>
                            </div>
                      
                        </div>
                      <?php

                    endif;

                endwhile;

                // no layouts found

            endif;

            ?>
              <div class="about_container">
                  <form class="form-horizontal"  action="" method="post">

                        <!-- Text input-->
                        <div class="form-group" style="margin-top:20%;margin-right:8%;">
                          <label class="col-md-4 control-label" for="textinput"style="margin-top:10px;">Your name</label>  
                          <div class="col-md-6">
                          <input id="textinput" name="name" type="text" placeholder="type your name" class="form-control input-md"style="margin-top:10px;">
                         
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group" style="margin-right:8%;" >
                          <label class="col-md-4 control-label" for="textinput"style="margin-top:10px;">Your email</label>  
                          <div class="col-md-6">
                          <input id="textinput" name="email" type="email" placeholder="type your email" class="form-control input-md"style="margin-top:10px;">
                        
                          </div>
                        </div>
                        
                        <!-- Textarea -->
                        <div class="form-group" style="margin-right:8%;">
                          <label class="col-md-4 control-label" for="textarea"style="margin-top:10px;">Your Messeage</label>
                          <div class="col-md-6">                     
                            <textarea class="form-control" id="textarea" name="message" rows="10"style="margin-top:10px;" placeholder="type your message"></textarea>
                          </div>
                        </div>
                                
                                
                                <div class="col-md-6"></div>
                          
                               <div class="col-md-6" style="margin-top:20px;"> <input class="btn-submit" type="submit" value="submit" name="submit"></div>                    
                    </form>                  
                  
              </div>      
               
           </div>
           		
			<nav id="bt-menu" class="bt-menu">
				<a href="#" class="bt-menu-trigger"><span>Menu</span></a>
				<ul>
				  <li><a href="home.php" id="home" class="active">portfolio</a></li>
					
					<li><a href="home.php" class="md-trigger" data-modal="modal-12" id="about">About me</a></li>
			
					<li><a href="home.php" id="contact">Contact</a></li>
          <li id="author"><a  href="http://som2y.com">&#60; &#62; with &#10084; by sOm2y</a></li> 
					
				</ul>
               
				<ul>
				
					<li><a href="http://instagram.com/alnvon" target="_blank" class="fa fa-instagram " style="margin-top:12px;"></a></li>
					<li><a href="https://www.flickr.com/photos/124710685@N08/" target="_blank" class="fa fa-flickr" style="margin-top:12px;"></a></li>
					<li><a href="https://www.facebook.com/allenvoncreativenz" target="_blank" class="fa fa-facebook-square"style="margin-top:12px;"></a></li>
					<li><a href="http://weibo.com/alnfeng" target="_blank" class="fa fa-weibo" style="margin-top:12px;"></a></li>

				</ul>
			</nav>
		</div><!-- /container -->
	</body>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="<?php bloginfo('template_url');?>/js/modernizr.custom.js"></script>
	<script src="<?php bloginfo('template_url');?>/js/classie.js"></script>
	<script src="<?php bloginfo('template_url');?>/js/borderMenu.js"></script>

    <script type="text/javascript" src="<?php bloginfo('template_url');?>/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url');?>/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url');?>/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
   
    
		<script type="text/javascript">
            $(document).ready(function() {
                $(".fancybox-thumb").fancybox({
                    prevEffect	: 'none',
                    nextEffect	: 'none',
                    helpers	: {
                        title	: {
                            type: 'outside'
                        },
                        thumbs	: {
                            width	: 50,
                            height	: 50
                        }
                    }
                });
                $("div.row").hide();
                // $(".form-horizontal").hide();
                $("#home").click(function(){
                    
                    $(".grid").fadeIn("slow");
                    $("img").fadeIn("slow");
                    $(".figure").fadeIn("slow");
                    $(".figcaption").fadeIn("slow");
                    $("div.row").fadeOut("slow");
                    $("#portrait").fadeOut("slow")
                    
                    $(".form-horizontal").hide();
                    $(".active").removeClass();
                    $(this).addClass("active");
                
                    return false;
                });
                $("#about").click(function(){
                    
                    $(".grid").fadeOut("slow");
                    $("img").fadeOut("slow");
                    $(".figure").fadeOut("slow");
                    $(".figcaption").fadeOut("slow");
                     $(".form-horizontal").hide();
                    $("div.row").fadeIn("slow");
                    $("#portrait").fadeIn("slow")
                    
                   
                    $(".active").removeClass();
                    $(this).addClass("active");
                    
                    return false;
                });
                
                $("#head").fancybox({
                    openEffect	: 'elastic',
                    closeEffect	: 'elastic',

                    helpers : {
                        title : {
                            type : 'inside'
                        }
                    }
                });

                 $("#contact").click(function(){
                    
                    $(".grid").fadeOut("slow");
                    $("img").fadeOut("slow");
                    $(".figure").fadeOut("slow");
                    $(".figcaption").fadeOut("slow");
                     
                    $("div.row").hide();
                    $("#portrait").hide()
                    $(".form-group").fadeIn("slow"); 
                   
                    $(".form-horizontal").fadeIn("slow");
                    $(".active").removeClass();
                    $(this).addClass("active");
                    
                    return false;
                });
           
            });


			setTimeout(function() {
			    $('.feedback').fadeOut('fast');
			}, 3000); // <-- time in milliseconds
			                	              
           

		</script>
	<?php 
	$portfolio = isset($_GET['portfolio']) ? $_GET['portfolio'] : '';
	if ($portfolio==true) :
		 // echo $_GET['portfolio'];
	
		?>
		<script>
		jQuery(document).ready(function($){
			  $(".grid").fadeIn("slow");
        $("img").fadeIn("slow");
        $(".figure").fadeIn("slow");
        $(".figcaption").fadeIn("slow");
        $("div.row").fadeOut("slow");
        $("#portrait").fadeOut("slow")
                    
        $(".form-horizontal").hide();
        $(".active").removeClass();
        $("#home").addClass("active");
                
		});
		</script>
	
	<?php endif; ?>

	<?php 
	$contact = isset($_GET['contact']) ? $_GET['contact'] : '';
	
	if ($contact == true) :	
		?>
		<script>
			  $(".grid").fadeOut("slow");
        $("img").fadeOut("slow");
        $(".figure").fadeOut("slow");
        $(".figcaption").fadeOut("slow");
                     
        $("div.row").hide();
        $("#portrait").hide()
        $(".form-group").fadeIn("slow"); 
                   
        $(".form-horizontal").show();
        $(".active").removeClass();
        $("#contact").addClass("active");

		</script>
	
	<?php endif; ?>

	
</html>