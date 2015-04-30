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
<!--		<link rel="stylesheet" type="text/css" href="css/icons.css" />-->
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
		    $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];

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

                            ?>
                                   
							    <figure class="effect-chico">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
								<figcaption>
									
									<p style="margin-top:25%;">VIEW MORE</p>
									<a class="fancybox-thumb" rel="fancybox-thumb" href="<?php echo $image['url']; ?>">View more</a>
								</figcaption>			
							</figure>
			                               

                        <?php endwhile; ?>

                  

                    <?php endif; ?>
				
			</div>
				
<!--
				
				<div class="md-modal md-effect-12" id="modal-12">
			<div class="md-content">
				<h3>Modal Dialog</h3>
				<div>
					<p>This is a modal window. You can do the following things with it:</p>
					<ul>
						<li><strong>Read:</strong> modal windows will probably tell you something important so don't forget to read what they say.</li>
						<li><strong>Look:</strong> a modal window enjoys a certain kind of attention; just look at it and appreciate its presence.</li>
						<li><strong>Close:</strong> click on the button below to close the modal.</li>
					</ul>
					<button class="md-close">Close me!</button>
				</div>
			</div>
		</div>
				
				
				
-->
           <div class="about_container">
               
              	<div class="row" style="margin-bottom:40px;margin-top:10%;">
			    
			    <p><em>“When words become unclear, I shall focus with photographs. When images become inadequate, I shall be                         content with silence.” <br>
                            <span style="float:right;margin-right:15%;">― Ansel Adams</span> 
                </em></p>
			    
			</div>
				<div class="row">
				    <div class="col-md-7"> 
                       <p>Hello! My name is Allen, I am a landscape and lifestyle photographer based in Auckland, New Zealand. I enjoy waking up every morning with a creative mind and being able to capture moments around me. Photographs speak more than words, I hope you have an idea of what my passion is and enjoy scrolling through my works. I will be regularly updating my photos so please stay tuned.  If you have any enquiries, please do not hesitate to contact me through <a id="email" href="mailto:voncreativenz@gmail.com" >voncreativenz@gmail.com                 </a>
                       </p>
                    </div>
				   
               
                   <div class="col-md-4">
                       
                        
                           
                        <a id="head" href="img/head.jpg" title="Allenvon">
                             <img id="portrait" style="width:300px;border-radius:180px;" src="img/head.jpg" alt="portrait">
                       
                       </a>

                       
                   </div>
               
				    
				    
				    
				</div>
              
              
              
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
				
<!--					<li><a href="#">Blog</a></li>-->
					<li><a href="home.php" id="contact">Contact</a></li>
					
<!--
				   <div class="logo">
                        <img src="img/logo.png" alt="logo">
                    </div>
-->
				</ul>
               
				<ul>
<!--				    <li><a style="color:#fff;" href="http://som2y.com">Powered By sOm2y</a></li>-->
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
	<script src="<?php bloginfo('template_url');?>/js/modalEffects.js"></script>
	<!-- for the blur effect -->
    <!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
<!--
    <script>
        // this is important for IEs
        var polyfilter_scriptpath = '/js/';
    </script>
    <script src="js/cssParser.js"></script>
    <script src="js/css-filters-polyfill.js"></script>
-->
	
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url');?>/fancybox/source/helpers/jquery.fancybox-media.js"></script>
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
                $(".form-horizontal").hide();
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
                
                
//                $("#about").click(function(){
//                    $("#home").removeClass("active");
//                    $("#about").addClass("active");
//                    document.getElementById("#container").innerHTML="about!!!";
//                
//                
//                });
           
            });
          
            
//            $("#about").click(function(){
//                $("body").css({"background":"black","z-index":"93"});
//            
//            
//            });


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
		 // echo $_GET['portfolio'];
	
		?>
		<script>
		jQuery(document).ready(function($){
			  $(".grid").fadeOut("slow");
              $("img").fadeOut("slow");
              $(".figure").fadeOut("slow");
              $(".figcaption").fadeOut("slow");
                     
              $("div.row").hide();
              $("#portrait").hide()
              $(".form-group").fadeIn("slow"); 
                   
              $(".form-horizontal").fadeIn("slow");
              $(".active").removeClass();
              $("#contact").addClass("active");
		});
		</script>
	
	<?php endif; ?>

	
</html>