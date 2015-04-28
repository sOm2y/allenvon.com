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
				<p class="demos">
<!--				    <a class="current-demo" href="home.html">VIEW MORE </a>-->
				</p>
		
				
				<div class="bx-thumbs">
                   
<!--                    style="background-color:black;"-->
                    <a href="#" id="0" class="bx-thumbs-current"></a>
                    <a href="#" id="1"></a>
                    <a href="#" id="2" ></a>
                    <a href="#" id="3"></a>
                    <a href="#" id="4"></a>
                    <a href="#" id="5"></a>
                   
                </div>
                <div class="logo">
                    <img src="<?php bloginfo('template_url');?>/images/logo.png"> <br>
                   <a href="<?php the_field('home-template-link'); ?>?portfolio=true">portfolio</a>
                   <a href="<?php the_field('home-template-link'); ?>?contact=true">contact</a>
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
        <script type="text/javascript">
            $(function() {	
                var BlurBGImage	= (function() {
					
                    var $bxWrapper			= $('#bx-wrapper'),
                    // loading status to show while preloading images
                    $bxLoading			= $bxWrapper.find('div.bx-loading'),
                    // container for the bg images and respective canvas
                    $bxContainer		= $bxWrapper.find('div.bx-container'),
                    // the bg images we are gonna use
                    $bxImgs				= $bxContainer.children('img'),
                    // total number of bg images
                    bxImgsCount			= $bxImgs.length,
                    // the thumb elements
                    $thumbs				= $bxWrapper.find('div.bx-thumbs > a').hide(),
                    // the title for the current image
                    $title				= $bxWrapper.find('h2:first'),
                    // current image's index
                    current				= 0,
                        
                    
                    // variation to show the image:
                    // (1) - blurs the current one, fades out and shows the next image
                    // (2) - blurs the current one, fades out, shows the next one (but initially blurred)
                    // speed is the speed of the animation
                    // blur Factor is the factor used in the StackBlur script
                    animOptions			= { speed : 1000, variation : 1, blurFactor : 20 },
                    // control if currently animating
                    isAnim				= false,
                    // check if canvas is supported
                    supportCanvas 		= Modernizr.canvas,
					
                    // init function
                    init				= function() {
							
                        // preload all images and respective canvas
                        var loaded = 0;
							
                        $bxImgs.each( function(i) {
								
                            var $bximg	= $(this);
								
                            // save the position of the image in data-pos
                            $('<img data-pos="' + $bximg.index() + '"/>').load(function() {
									
                                var $img	= $(this),
                                // size of image to be fullscreen and centered
                                dim		= getImageDim( $img.attr('src') ),
                                pos		= $img.data( 'pos' );
									
                                // add the canvas to the DOM
                                $.when( createCanvas( pos, dim ) ).done( function() {
											
                                    ++loaded;
										
                                    // all images and canvas loaded
                                    if( loaded === bxImgsCount ) {
											
                                        // show thumbs
                                        $thumbs.fadeIn();
											
                                        // apply style for bg image and canvas
                                        centerImageCanvas();
											
                                        // hide loading status
                                        $bxLoading.hide();
											
                                        // initialize events
                                        initEvents();
                                        
								       
                                     
                                    }
										
                                });
								
                            }).attr( 'src', $bximg.attr('src') );
							
                        });
						
                    },
                    // creates the blurred canvas image
                    createCanvas		= function( pos, dim ) {
							
                        return $.Deferred( function(dfd) {
								
                            // if canvas not supported return
                            if( !supportCanvas ) {
                                dfd.resolve();
                                return false;
                            }	
								
                            // create the canvas element:
                            // size and position will be the same like the fullscreen image
                            var $img	= $bxImgs.eq( pos ),
                            imgW	= dim.width,
                            imgH	= dim.height,
                            imgL	= dim.left,
                            imgT	= dim.top,
									
                            canvas	= document.createElement('canvas');
								
                            canvas.className	= 'bx-canvas';
                            canvas.width 		= imgW;
                            canvas.height 		= imgH;
                            canvas.style.width  = imgW + 'px';
                            canvas.style.height = imgH + 'px';
                            canvas.style.left	= imgL + 'px';
                            canvas.style.top	= imgT + 'px';
                            canvas.style.visibility = 'hidden';
                            // save position of canvas to know which image this is linked to
                            canvas.setAttribute('data-pos', pos);
                            // append the canvas to the same container where the images are
                            $bxContainer.append( canvas );
                            // blur it using the StackBlur script
                            stackBlurImage( $img.get(0), dim, canvas, animOptions.blurFactor, false, dfd.resolve );
							
                        }).promise();							
								
                    },
                    // gets the image size and position in order to make it fullscreen and centered.
                    getImageDim			= function( img ) {
							
                        var $img    = new Image();
							
                        $img.src    = img;
							
                        var $win	= $( window ),
                        w_w		= $win.width(),
                        w_h		= $win.height(),
                        r_w		= w_h / w_w,
                        i_w		= $img.width,
                        i_h		= $img.height,
                        r_i		= i_h / i_w,
                        new_w, new_h, new_left, new_top;
									
                        if( r_w > r_i ) {
								
                            new_h	= w_h;
                            new_w	= w_h / r_i;
							
                        }
                        else {
							
                            new_h	= w_w * r_i;
                            new_w	= w_w;
							
                        }
									
                        return {
                            width	: new_w,
                            height	: new_h,
                            left	: ( w_w - new_w ) / 2,
                            top		: ( w_h - new_h ) / 2
                        };
						
                    },
                    // initialize the events
                    initEvents			= function() {
							
                        $( window ).on('resize.BlurBGImage', function( event ) {
								
                            // apply style for bg image and canvas
                            centerImageCanvas();
                            return false;
								
                        });
							
                        // clicking on a thumb shows the respective bg image
                        $thumbs.on('click.BlurBGImage', function( event ) {
								
                            var $thumb	= $(this),
                            pos		= $thumb.index();
								
                            if( !isAnim && pos !== current ) {
									
                                $thumbs.removeClass('bx-thumbs-current');
                                $thumb.addClass('bx-thumbs-current');
                                isAnim = true;
                                // show the bg image
                                showImage( pos );
								
                            }
								
                            return false;
								
                        });
						
                    },
                        
                    
                    // apply style for bg image and canvas
                    centerImageCanvas	= function() {
							
                        $bxImgs.each( function(i) {
								
                            var $bximg	= $(this),
                            dim			= getImageDim( $bximg.attr('src') ),
                            $currCanvas	= $bxContainer.children('canvas[data-pos=' + $bximg.index() + ']'),
                            styleCSS	= {
                                width	: dim.width,
                                height	: dim.height,
                                left	: dim.left,
                                top		: dim.top
                            };	
								
                            $bximg.css( styleCSS );
								
                            if( supportCanvas )
                                $currCanvas.css( styleCSS );
									
                            if( i === current )	
                                $bximg.show();
								
                        });
							
                    },
                    // shows the image at position "pos"
                    showImage			= function( pos ) {
						
                        // current image 
                        var $bxImage		= $bxImgs.eq( current );
                        // current canvas
                        $bxCanvas		= $bxContainer.children('canvas[data-pos=' + $bxImage.index() + ']'),
                        // next image to show
                        $bxNextImage	= $bxImgs.eq( pos ),
                        // next canvas to show
                        $bxNextCanvas	= $bxContainer.children('canvas[data-pos='+$bxNextImage.index()+']');
							
                        // if canvas is supported
                        if( supportCanvas ) {
							
                            $.when( $title.fadeOut() ).done( function() {
								
                                $title.text( $bxNextImage.attr('title') );
									
                            });
							
                            $bxCanvas.css( 'z-index', 100 ).css('visibility','visible');
								
                            $.when( $bxImage.fadeOut( animOptions.speed ) ).done( function() {
									
                                switch( animOptions.variation ) {
									
                                    case 1 	:
                                        $title.fadeIn( animOptions.speed );
                                        $.when( $bxNextImage.fadeIn( animOptions.speed ) ).done( function() {
										
                                            $bxCanvas.css( 'z-index', 1 ).css('visibility','hidden');
                                            current = pos;
                                            $bxNextCanvas.css('visibility','hidden');
                                            isAnim 	= false;
											
                                        });
                                        break;
                                    case 2	:
                                        $bxNextCanvas.css('visibility','visible');
											
                                        $.when( $bxCanvas.fadeOut( animOptions.speed * 1.5 ) ).done( function() {
											
                                            $(this).css({
                                                'z-index' 		: 1,
                                                'visibility'	: 'hidden'
                                            }).show();
												
                                            $title.fadeIn( animOptions.speed );
												
                                            $.when( $bxNextImage.fadeIn( animOptions.speed ) ).done( function() {
													
                                                current = pos;
                                                $bxNextCanvas.css('visibility','hidden');
                                                isAnim 	= false;
												
                                            });
												
                                        });
                                        break;
									
                                };
									
                            });
							
                        }
                        // if canvas is not shown just work with the bg images
                        else {
								
                            $title.hide().text( $bxNextImage.attr('title') ).fadeIn( animOptions.speed );
                            $.when( $bxNextImage.css( 'z-index', 102 ).fadeIn( animOptions.speed ) ).done( function() {
									
                                current = pos;
                                $bxImage.hide();
                                $(this).css( 'z-index', 101 );
                                isAnim = false;
								
                            });
							
                        }
						
                    };
						
                    return {
                        init	: init
                    };
				
                })();
				
                
                
                
                // call the init function
                BlurBGImage.init();
                
               
                var autoslides = (function(){
                    var $bxWrapper          = $('#bx-wrapper');
                    // loading status to show while preloading images
                    $bxLoading          = $bxWrapper.find('div.bx-loading');
                    // container for the bg images and respective canvas
                    $bxContainer        = $bxWrapper.find('div.bx-container');
                    // the bg images we are gonna use
                    $bxImgs             = $bxContainer.children('img');
                    // total number of bg images
                    bxImgsCount         = $bxImgs.length;
                    // the thumb elements
                    $thumbs             = $bxWrapper.find('div.bx-thumbs > a').hide();
                    // the title for the current image
                    $title              = $bxWrapper.find('h2:first');
                    // current image's index
                    current             = 0;
                        
                    
                    // variation to show the image:
                    // (1) - blurs the current one, fades out and shows the next image
                    // (2) - blurs the current one, fades out, shows the next one (but initially blurred)
                    // speed is the speed of the animation
                    // blur Factor is the factor used in the StackBlur script
                    animOptions         = { speed : 1000, variation : 1, blurFactor : 20 };
                    // control if currently animating
                    isAnim              = false;
                    // check if canvas is supported
                    supportCanvas       = Modernizr.canvas;

                    // set the variable which holds the number of steps/slides you have
                    var totalSteps = 5;
                    // set the current selected step, default is the first slide.
                    var selectedStep = 0; 
                    // assign this to a variable so you can use later
                    var myInterval = null;

                    var start = function(){

                    myInterval = window.setInterval(function(){

                        // increment the step
                        selectedStep++;

                        // check that we are not attempting to select a step that doesn't exist
                        if ( selectedStep > totalSteps ){
                            // reset back to 1
                            selectedStep = 0;
                        }

                        // call the function with the selected step
                        selectStep(selectedStep);

                    }, 8000);        

                };


                
               


          
                function selectStep(pos){
                     var $bxWrapper = $('#bx-wrapper');
                     $slide = $bxWrapper.find("#"+pos);
                     
                     $thumbs= $bxWrapper.find('div.bx-thumbs > a');
                     $thumb = $bxWrapper.find('a.bx-thumbs-current');
                    
                 
                                    
                                $thumbs.removeClass('bx-thumbs-current');
                                $slide .addClass('bx-thumbs-current');
                                isAnim = true;
                                // show the bg image
                                showImage( pos );
                                pos++;
                                
                    
                  
                   
                }

                 // shows the image at position "pos"
                function showImage( pos ) {
                        
                        // current image 
                        var $bxImage        = $bxImgs.eq( current );
                        // current canvas
                        $bxCanvas       = $bxContainer.children('canvas[data-pos=' + $bxImage.index() + ']'),
                        // next image to show
                        $bxNextImage    = $bxImgs.eq( pos ),
                        // next canvas to show
                        $bxNextCanvas   = $bxContainer.children('canvas[data-pos='+$bxNextImage.index()+']');
                            
                        // if canvas is supported
                        if( supportCanvas ) {
                            
                            $.when( $title.fadeOut() ).done( function() {
                                
                                $title.text( $bxNextImage.attr('title') );
                                    
                            });
                            
                            $bxCanvas.css( 'z-index', 100 ).css('visibility','visible');
                                
                            $.when( $bxImage.fadeOut( animOptions.speed ) ).done( function() {
                                    
                                switch( animOptions.variation ) {
                                    
                                    case 1  :
                                        $title.fadeIn( animOptions.speed );
                                        $.when( $bxNextImage.fadeIn( animOptions.speed ) ).done( function() {
                                        
                                            $bxCanvas.css( 'z-index', 1 ).css('visibility','hidden');
                                            current = pos;
                                            $bxNextCanvas.css('visibility','hidden');
                                            isAnim  = false;
                                            
                                        });
                                        break;
                                    case 2  :
                                        $bxNextCanvas.css('visibility','visible');
                                            
                                        $.when( $bxCanvas.fadeOut( animOptions.speed * 1.5 ) ).done( function() {
                                            
                                            $(this).css({
                                                'z-index'       : 1,
                                                'visibility'    : 'hidden'
                                            }).show();
                                                
                                            $title.fadeIn( animOptions.speed );
                                                
                                            $.when( $bxNextImage.fadeIn( animOptions.speed ) ).done( function() {
                                                    
                                                current = pos;
                                                $bxNextCanvas.css('visibility','hidden');
                                                isAnim  = false;
                                                
                                            });
                                                
                                        });
                                        break;
                                    
                                };
                                    
                            });
                            
                        }
                        // if canvas is not shown just work with the bg images
                        else {
                                
                            $title.hide().text( $bxNextImage.attr('title') ).fadeIn( animOptions.speed );
                            $.when( $bxNextImage.css( 'z-index', 102 ).fadeIn( animOptions.speed ) ).done( function() {
                                    
                                current = pos;
                                $bxImage.hide();
                                $(this).css( 'z-index', 101 );
                                isAnim = false;
                                
                            });
                            
                        }
                        
                    };


                    start();
                });

                
                     
                 autoslides();
                
				
            });
        </script>
    </body>
</html>