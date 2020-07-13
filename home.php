<?php
    include('select.php');

    include('cbt.php');

    $cbt_test = new etest();
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
    
    <title>E-Test Software</title>
	
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,500,600,700,800,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animation.css">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
</head>
<body data-spy="scroll" data-offset="25">
    <div class="animationload"><div class="loader">Loading...</div></div> 
    <header class="header">
        <div class="container">
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a href="index.html" class="navbar-brand">E-Test <br> <span class="slogo">D-CREATIVE <span></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a data-scroll href="#home" class="int-collapse-menu">Home</a></li>
                        <li><a data-scroll href="#services" class="int-collapse-menu">Services</a></li>
                        <li><a data-scroll href="#pricing" class="int-collapse-menu">Order Cbt Key</a></li>
                        <li><a data-scroll href="#start" class="int-collapse-menu">Upload Question</a></li>
						<li><a data-scroll href="#contact" class="int-collapse-menu">Contact</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="home" class="sliderwrapper clearfix">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
       			    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="demos/slider2.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
        				<div class="tp-dottedoverlay twoxtwo"></div>
 
                        <!-- LAYER NR. 3 -->
                         <div class="tp-caption rev-video  customin customout start"
                            data-x="center"
                            data-hoffset="0"
                            data-y="140"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1000"
                            data-start="500"
                            data-easing="Back.easeInOut"
                            data-endspeed="300"><h3><?php if(isset($_SESSION['new'])){
                                echo "Thanks for Using our Product";
                            }?></h3>
                            <hr class="topline"><h2>E-Test<br>Indispensible <br> Software</h2><hr class="bottomline">
                        </div>
    
                        <!-- LAYER NR. 4 -->
                         <div class="tp-caption rev-video2 customin customout start"
                            data-x="center"
                            data-hoffset="0"
                            data-y="340"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="2200"
                            data-start="500"
                            data-easing="Back.easeInOut"
                            data-endspeed="300"><p>with improved <br> performance</p>
                        </div>
                    </li>
                    
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="demos/slide1.jpg"  alt="slidebg2"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
        				<div class="tp-dottedoverlay twoxtwo"></div>
                        
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption rev-video skewfromleft customout"
                            data-x="center"
                            data-y="140"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="800"
                            data-start="1500"
                            data-easing="Power4.easeOut"
                            data-endspeed="300"
                            data-endeasing="Power1.easeIn"
                            data-captionhidden="on"
                            style="z-index: 6"><hr class="topline"><h2>100% Simplicity  <br> Usability </h2><hr class="bottomline">
                        </div>
    
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption rev-video2 skewfromright customout"
                            data-x="center" data-hoffset="0"
                            data-y="340"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="800"
                            data-start="1700"
                            data-easing="Power4.easeOut"
                            data-endspeed="300"
                            data-endeasing="Power1.easeIn"
                            data-captionhidden="on"
                            style="z-index: 7"><p>Endless Possibilities</p>
                        </div>
                    </li>
					
					<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="demos/parallax_02.jpg"  alt="slidebg3"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
        				<div class="tp-dottedoverlay twoxtwo"></div>
                        
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption rev-video skewfromleft customout"
                            data-x="center"
                            data-y="140"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="800"
                            data-start="1500"
                            data-easing="Power4.easeOut"
                            data-endspeed="300"
                            data-endeasing="Power1.easeIn"
                            data-captionhidden="on"
                            style="z-index: 6"><hr class="topline"><h2>Get Raw scores printed <br> Edit students report</h2><hr class="bottomline">
                        </div>
    
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption rev-video2 skewfromright customout"
                            data-x="center" data-hoffset="0"
                            data-y="340"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="800"
                            data-start="1700"
                            data-easing="Power4.easeOut"
                            data-endspeed="300"
                            data-endeasing="Power1.easeIn"
                            data-captionhidden="on"
                            style="z-index: 7"><p>List Students according to performance</p>
                        </div>
                    </li>
		        </ul>
		        <div class="tp-bannertimer"></div>
            </div>
		</div>
    </section>

    <!--/ SERVICE SECTION -->   
    <section id="services" class="white-wrapper">
        <div class="container">
            <div class="title text-center">
                <h2>Services we offer</h2>
                <hr>
            </div>
        
            <div class="row">
                <div data-scroll-reveal="enter from the bottom after 0.3s" class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div class="service-box">
                        <div class="service-border"><i class="fa fa-lightbulb-o alignleft"></i></div>
                        <h3>Design & Development</h3>
                        <p>We provide a very substantial computer-base examination software</p>
                    </div>
                </div>
            
                <div data-scroll-reveal="enter from the bottom after 0.6s" class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div class="service-box">
                        <div class="service-border"><i class="fa fa-laptop alignleft"></i></div>
                        <h3></h3>
                        <p>Download students raw scores in pdf format</p>
                        <p>Individual report</p>
                    </div>
                </div>
            
                <div data-scroll-reveal="enter from the bottom after 0.9s" class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div class="service-box">
                        <div class="service-border"><i class="fa fa-headphones alignleft"></i></div>
                        <h3>24/7 SUPPORT</h3>
                        <p>We receive messages from clients via email</p>
                        <p>Instant responce to received messages</p>
                    </div>
                </div>
            </div> 
        </div>
    </section>
            
    <!--PRICING SECTION  -->    
    <section id="pricing" class="dark-wrapper">
        <div class="container">
            <div class="title text-center">
                <h2>Pricing Structure</h2>
            </div>
            <div class="row text-center">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-effect="helix">
                    <div class="pricing-box">
                        <span class="hideme"><i class="fa fa-star bigstar"></i></span>
                        <div class="title"><h3>Standard</h3></div>
                        <div class="price">
                            <p class="price-value"><sub>$</sub>14.99</p>
                            <p class="price-month">Per month</p>
                        </div> 
                        <ul class="pricing clearfix">
                            <li>Get cbt authentication key</li>
                            <li> ++student raw-scores </li>
                            <li>downloadable in pdf</li>
                        </ul>
                    </div>
                </div>
        
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-effect="helix">
                    <div class="pricing-box">
                            <span class="hideme"><i class="fa fa-star bigstar"></i></span>
                        <div class="title"><h3>Premium</h3></div>
                        <div class="price">
                            <p class="price-value"><sub>$</sub>20.99</p>
                            <p class="price-month">Per month</p>
                        </div> 
                        <ul class="pricing clearfix">
                            <li>+ Indivual E-test report</li>
                            <li>+ Editable report format</li>
                            <li>+ Performance listing</li>
                            <li>+ All (pdf download)</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-9 col-xs-15" data-effect="helix">
                    <div class="pricing-box">
                        <div>
                            <form method="POST" action="home.php">
                                <table>
                                    <tr>
                                        <input type="text" value="<?php 
                                            if(isset($_SESSION['old'])){
                                                echo $_SESSION['old'];
                                            }?>" name="email" id="email" class="form-control" 
                                        placeholder="Email Address">
                                    </tr>
                                    <tr>
                                        <span class="hideme"><i class="fa fa-star bigstar"></i></span>
                                        <hr>
                                        <label>Order Type: </label>
                                        <select id="orderType" name="orderType">
                                            <?php buildOptions($orderOptions, $_SESSION['values']['orderType']);?>
                                        </select>
                                    </tr>
                                    <tr>
                                        <span class="hideme"><i class="fa fa-star bigstar"></i></span>
                                        <hr>
                                        <label>Name: </label>
                                        <input type="text" value="<?php 
                                            if(isset($_SESSION['old'])){
                                              echo 
                                                $cbt_test->user($_SESSION['old']);
                                            }?>" 
                                        name="name" id="name">
                                    </tr>
                                    <tr>
                                        <span class="hideme"><i class="fa fa-star bigstar"></i></span>
                                        <hr>
                                        <label>Bank name: </label>
                                        <select name="bankName" id="bankName">
                                            <?php buildOptions($bankOptions, $_SESSION['values']['bankName']);?> 
                                        </select>
                                    </tr>
                                    <tr>
                                        <span class="hideme"><i class="fa fa-star bigstar"></i></span>
                                        <hr>
                                        <label>Card type: </label>
                                        <select name="cardType" id="cardType">
                                            <?php buildOptions($cardOptions, $_SESSION['values']['cardType']);?>
                                        </select>
                                    </tr>
                                    <hr>
                                    
                                    </tr>
                                    <hr>
                                    <input name="submit" type="submit" value="submit"/>
                                </table>
                            </form> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="start" class="contact-wrapper">
        <hr>
        <div class="title text-center">
            <hr>
            <h2>Upload Examination Questions</h2>
            <hr>
            <img src="style.jpg" style="margin-left: 4%"/>
        </div>
        <div style="margin-left: 15%">
            <h3 style="color: green;"><em>The format that excel questions should be presented</em></h3>
            <p><span style="color: green">column A:</span> For the Questions</p>
            <p><span style="color: green">column B:</span> For option 1</p>
            <p><span style="color: green">column C:</span> For option 2</p>
            <p><span style="color: green">column D:</span> For option 3</p>
            <p><span style="color: green">column E:</span> For option 4</p>
            <p><span style="color: green">column F:</span> For "Answer", which must be same with one the options, it's case sensitive</p>
        </div>
        <div class="contact_tab text-center">
           <div id="myTabContent" class="tab-content">
                <br><br>
                <h3>Upload File to server</h3>
                <p>Save FILE to Server</p>
                <form method="POST" id="upload_excel_form" enctype="multipart/form-data">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <table>
                            <br>
                            <tr>
                                <span> Upload file(xls,xlsx) Excel: <input type="file"  name="upload_excel" class="form-control"></span>
                            </tr>
                        </table> 
                    </div>
                    <br><br>
                    <input type="submit" name="upload" id="upload" class="btn btn-primary" value="upload"/>
                    <hr>
                    <div id="message"></div>
                </form>

                <br><br>
                <h3>
                    Choose the file you uploaded 
                    to be imported into the database
                </h3>
                <p>Import questions into the database</p>
                <form method="POST" id="import_excel_form" enctype="multipart/form-data">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <input type="text" id="cbtkey" name="cbtkey" value="<?php 
                            if(isset($_POST['submit'])){
                                $cbtKey = $cbt_test->random_string(15);
                                echo $cbtKey;
                            }else{ echo "order cbt key before you get started"; }?>" class="form-control"> 
                        <br>
                        <input type="text" name="course-title" placeholder="course title">
                        <input type="text" name="course-code" placeholder="course code">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <table>
                            <tr>
                                <input type="text" value="<?php 
                                    if(isset($_POST['submit'])){
                                       echo $_POST['email'];
                                    }?>" name="email" id="email" class="form-control" 
                                placeholder="Email Address">
                            </tr>
                            <br>
                            <tr>
                                <span> Upload file(xls,xlsx) Excel: <input type="file"  name="import_excel" class="form-control"></span>
                            </tr>
                        </table> 
                    </div>
                    <div class="col-lg-1 col-md-4 col-sm-9 col-xs-9">
                        <label>Hour(s): </label>
                        <select name="hours" id="hours">
                            <?php buildOptions($hourOptions, $_SESSION['values']['hours']);?> 
                        </select>
                    
                        <label>Minute(s): </label>
                        <select name="minutes" id="minutes">
                            <?php buildOptions($minuteOptions, $_SESSION['values']['minutes']);?> 
                        </select>

                        <label>Second(s): </label>
                        <select name="seconds" id="seconds">
                            <?php buildOptions($secondOptions, $_SESSION['values']['seconds']);?> 
                        </select>
                    </div>
                    <br><br>
                    <input type="submit" name="import" id="import" class="btn btn-primary" value="import"/>
                    <div id="message"></div>
                </form>
                <br><br>
                <hr>
            </div>
        </div>
    <!--/ CONTACT AND MAP SECTION -->  
    <section id="contact" class="contact-wrapper">
        <div class="title text-center">
            <h2>Contact Us</h2>
            <hr>
        </div>
        <div class="contact_tab text-center">
           <div id="myTabContent" class="tab-content">
              	<div id="message"></div>
                <form method="POST" action="home.php">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <input type="text" value="<?php 
                        if(isset($_SESSION['old'])){
                          echo $_SESSION['old'];
                        }?>" name="email" id="email" class="form-control" placeholder="Email Address"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject"> 
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" id="submit" name="submitMail" class="btn btn-lg btn-contact btn-primary">SUBMIT</button>
                </form>
                <?php
                    if(isset($_POST['submitMail'])){
                        $email = $_POST['email'];
                        $subject  = $_POST['subject'];
                        $message = $_POST['comments'];

                        $cbt_test->phpmail($email, $message, $subject);
                    }
                ?>
            </div>
        </div> 
    
        <div class="container">
            <div class="title text-center">
                <div class="clearfix"></div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contact-box" data-scroll-reveal="enter from the bottom after 0.6s">
                        <a title="" href="#"><i class="fa fa-envelope-o aligncenter"></i></a>
                        <h2>adenusidamilola5@gmail.com</h2>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contact-box" data-scroll-reveal="enter from the bottom after 0.6s">
                        <a title="" href="#"><i class="fa fa-map-marker aligncenter"></i></a>
                        <h2>Lagos, Nigeria</h2>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contact-box"  data-scroll-reveal="enter from the bottom after 0.6s">
                         <a title="" href="#"><i class="fa fa-phone aligncenter"></i></a>
                        <h2>08100897169</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <!--/ FOOTER SECTION-->  
    <section id="footer" class="footer-wrapper text-center">
        <div class="container">
            <div class="title text-center" data-scroll-reveal="enter from the bottom after 0.5s">
               <div class="aligncenter">     
				   <a href="index.html" class="navbar-brand">ATLAS <br> <span class="slogo">CREATIVE <span></a>
                 
                    <div class="socialFooter">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                       
                        <a href="#"><i class="fa fa-flickr"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                       
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    
                    </div>
               		<!-- don't removed this as we are providing it for free -->
    	           <p>Designed by © 2015 <a href="http://www.createwebsite.net">Create Website</a></p>
                <a data-scroll-reveal="enter from the bottom after 0.3s" href="#home"><i class="fa fa-angle-up"></i></a>
            </div>
        </div>
    </section>
     
    <!-- SECTION CLOSED -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>   
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/jquery.easypiechart.min.js"></script>
    <script src="js/owl.carousel.js"></script>
	<script src="js/jquery.jigowatt.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/jquery.unveilEffects.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript">
        var cbtkey = document.getElementById('cbtkey').value;

        if(cbtkey==="order cbt key before you get started"){
           cbtkey = "";
        }else{
            alert("Pen down your cbt auth key: "+cbtkey);
        }

        $(document).ready(function(){
            $('#upload_excel_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"phpspreadsheet/uploadfile.php",
                    method:"POST",
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function(){
                        $('#upload').attr('disabled', 'disabled');
                        $('#upload').val('uploading...');
                    },
                    success:function(data){
                        $('#message').html(data);
                        $('#upload_excel_form')[0].reset();
                        $('#upload').attr('disabled', false);
                        $('#upload').val('upload');
                    }
                });
            });
        });  

        $(document).ready(function(){
            $('#import_excel_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"phpspreadsheet/import.php",
                    method:"POST",
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function(){
                        $('#import').attr('disabled', 'disabled');
                        $('#import').val('importing...');
                    },
                    success:function(data){
                        $('#message').html(data);
                        $('#import_excel_form')[0].reset();
                        $('#import').attr('disabled', false);
                        $('#import').val('import');
                    }
                });
            });
        }); 
    </script>
	<script>
		(function ($) {
			var $container = $('.masonry_wrapper'),
				colWidth = function () {
					var w = $container.width(), 
						columnNum = 1,
						columnWidth = 0;
					if (w > 1200) {
						columnNum  = 3;
					} else if (w > 900) {
						columnNum  = 3;
					} else if (w > 600) {
						columnNum  = 2;
					} else if (w > 300) {
						columnNum  = 1;
					}
					columnWidth = Math.floor(w/columnNum);
					$container.find('.item').each(function() {
						var $item = $(this),
							multiplier_w = $item.attr('class').match(/item-w(\d)/),
							multiplier_h = $item.attr('class').match(/item-h(\d)/),
							width = multiplier_w ? columnWidth*multiplier_w[1]-4 : columnWidth-4,
							height = multiplier_h ? columnWidth*multiplier_h[1]*0.5-4 : columnWidth*0.5-4;
						$item.css({
							width: width,
							height: height
						});
					});
					return columnWidth;
				}
							
				function refreshWaypoints() {
					setTimeout(function() {
					}, 1000);   
				}
							
				$('nav.portfolio-filter ul li a').on('click', function() {
					var selector = $(this).attr('data-filter');
					$container.isotope({ filter: selector }, refreshWaypoints());
					$('nav.portfolio-filter ul li a').removeClass('active');
					$(this).addClass('active');
					return false;
				});
					
				function setPortfolio() { 
					setColumns();
					$container.isotope('reLayout');
				}
		
				isotope = function () {
					$container.isotope({
						resizable: true,
						itemSelector: '.item',
						masonry: {
							columnWidth: colWidth(),
							gutterWidth: 0
						}
					});
				};
			isotope();
			$(window).smartresize(isotope);
		}(jQuery));
	</script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        
		<script type="text/javascript">
			var revapi;
			jQuery(document).ready(function() {
			revapi = jQuery('.tp-banner').revolution(
			{
				delay:9000,
				startwidth:1170,
				startheight:500,
				hideThumbs:10,
				fullWidth:"off",
				fullScreen:"on",
				fullScreenOffsetContainer: ""
			 });
		   });	//ready
		</script>
		
		
    
    <!-- Animation Scripts-->
    <script src="js/scrollReveal.js"></script>
    <script>
            (function($) {
            "use strict"
                window.scrollReveal = new scrollReveal();
            })(jQuery);
    </script>
    
    <!-- Portofolio Pretty photo JS -->       
    <script src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript">
        (function($) {
            "use strict";
            jQuery('a[data-gal]').each(function() {
                jQuery(this).attr('rel', jQuery(this).data('gal'));
            });  	
                jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow:false,overlay_gallery: false,theme:'light_square',social_tools:false,deeplinking:false});
        })(jQuery);
    </script>
          
    <!-- Video Player o-->
    <script src="js/jquery.mb.YTPlayer.js"></script>    
    <script type="text/javascript">
      (function($) {
        "use strict"
          $(".player").mb_YTPlayer();
        })(jQuery);	
    </script>
    
</body>
</html>