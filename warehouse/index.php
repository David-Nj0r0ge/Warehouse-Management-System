
<!DOCTYPE HTML>
<HTML>
	<head>
		<title>GLOBAL | LIMITED</title>
		<?php
		require_once('head.html');
		?>
	</head>
	<style type="text/css">
		.about {
    
    width: 100%;
    height: 30vh;
    background-image: url('img/bg2.jpeg');
    background-size: cover;
    background-position: top;
   
    position: relative;
}
	.devider {
	width: 100%;
	height: 23px;
	background: url('img/devider.png') no-repeat center center;
	margin: 5px 0 10px;
}
				/* ===== Begin page header ===== */
.page-header {
	margin: 0 0 60px 0;
	padding: 0;
	border: none;
}	
	</style>
	<body>
		<section id="home">
			<header>
				<div class="menu-content overlay">

	<nav class="menu">
<span class="w3-padding-left pull-left"> <a href="login.php"><i class="fa fa-sign-in"></i>LOGIN</span></a>
    	<ul>

	    	<li class="menu__item">
	    		<a href="#" class="menu__link scroll-link active w3-xlarge "  data-id="home">Home</a>
	    	</li>
	<li class="menu__item">
	    		<a href="#" class="menu__link scroll-link w3-large" data-id="services">Our Services</a>
	    	</li>
	    	
	<li class="menu__item to-left">
	    		<a href="#" class="menu__link scroll-link w3-large"  data-id="about">About Us</a>
	    		

	    	</li
	    	

	    
		
<li class="menu__item">
	    		<a href="#" class="menu__link scroll-link w3-large" data-id="contact">Contact Us</a>
	    	</li>
<li class="pull-right w3-padding-left"><a href="#modal1" class="modal-trigger">
<span class=""><i class="fa fa-user-plus"></i> REGISTER</span></a></li>
    	</ul>

	</nav>

</div>
				<!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class="header_text w3-bottombar">Create Your Free Account</h4>
      <div class="row w3-padding-16 w3-padding-left">
    <form class="col s12" id="registerForm">
			<div class="" id="error"></div>
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" name="first" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" name="last" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
	   <div class="row">
        <div class="input-field col s6">
          <input id="email" type="email" name="email" class="validate">
          <label for="email">Email</label>
        </div>
		 <div class="input-field col s6">
          <input id="number" type="number" name="phone" class="validate">
          <label for="number">Phone Number</label>
        </div>
      </div>
	   
    
      <div class="row">
        <div class="input-field col s6">
          <input id="password" type="password" name="pass" class="validate">
          <label for="password">Password</label>
        </div>
		  <div class="input-field col s6">
          <input  id="passwordConf" name="pass2" type="password" class="validate">
          <label for="password">Confirm Password</label>
        </div>
      </div>
     <div id="register_success" class="">
			
		 </div>
     <div class="row">
		<div class="col s12">
			<p class="register"><input type="submit" id="register" value="REGISTER" class="my_reg hvr-round-corners w3-green btn-lg btn-block"></p>
		</div>
	 </div>
    </form>
  </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">ClOSE</a>
    </div>
  </div>
			</header>
		
			 <div class="header w3-padding-16" >
						<div class="logo-box w3-padding-16" style="margin-top:5%;">
						<img src="img/photo-1493946740644-2d8a1f1a6aff.jpeg" style="max-height: 70px;max-width: 70px;" alt="Image Goes Here" class="logo">
						</div>
						<div class="text-box w3-padding-16">
						<h1 class="heading-primary">
						<span class="heading-primary-main w3-text-black w3-bottombar w3-xxlarge" style="font-family: Comic Sans MS, cursive, sans-serif;"></span>
						<span class="heading-primary-sub w3-text-black w3-xxlarge" style="font-family: cursive;">GLOBAL LOGISTICS  LIMITED WAREHOUSE</span>
					  </h1>
						<a href="#" class="bt bt-white bt-animated scroll-link""   data-id="about">Discover Us</a>
					   </div>
				  
					  </div>
				  
					  <div id="nav-icon" class="menu-button visible-xs">
						  <span class="burger-icon"></span>
					  </div>


		</section>
		
		<section class="w3-card-4 w3-padding-8" id="about" >
			<div class="row about">
				<div class="col-sm-2 col-lg-2 col-md-2" style="padding-top: 5%;">
					<i style="margin-right: 5%" class="fa fa-2x fa-diamond w3-text-white" aria-hidden="true"></i> 
				</div>
				<div class="col-sm-8 col-lg-8 col-md-8 w3-padding-8">
					<h2 class="w3-text-white w3-xlarge w3-serif" style="text-align: center;font-family: cursive;">Who Are We?</h2>
					<div class="devider"></div>
					<h1 class="w3-text-white w3-xlarge w3-serif"  style="text-align: center;font-family: cursive;">About Global Logistics Limited</h1>
				</div>
				<div class="col-sm-2 col-lg-2 col-md-2" style="padding-top: 5%;">
					<i style="padding-right: 5%" class="fa fa-2x fa-diamond w3-text-white" aria-hidden="true"></i> 
				</div>
			</div>
			<div class="row">
				<div style="background: rgba(0, 0, 0, 0) url(img/hire_bg.jpg) repeat scroll 0 0;" class="hire_text col-sm-6 col-lg-6 col-md-6 w3-card-4 w3-padding-8 w3-padding-right">
					<i class="w3-border-bottom w3-justify w3-border-green w3-xlarge" style="font-family: cursive;"></i>
					<div class="hire w3-padding-8">
						<h2>Global Logistics Limited <span>In A Nutshell</span></h2>
						<p>
							GLOBALFREIGHT was formed in 1977, with the vision to provide first class freight services to all of our clients. Through the years, our original personalized style remains the Hallmark of our operation. Today, we are offering value added services to ANY destination around the world,
							thanks to our intricate network of global associates who offer support services
						</p>
					</div>
				</div>
				<div class="col-sm-6 col-lg-6 col-md-6 w3-card-8">
					<img class="materialboxed" width="650" height="400" src="img/DSC00342.JPG">
					<p class="w3-padding-16  w3-center w3-slim">
						Many hands make work light’
*** act locally  ..and.. play globally  ***

					</p>
				</div>
			</div>
		</section>
			<!--=========================
		Start area for Service
	============================== -->
	<section id="services" class="section_padding service_area">
		<div class="w3-card-4 service">	
		
			<!-- Start Service Title -->
			<div class="row service_title wow  rollIn ">
				<div class="col-md-12">
					<h2 class="page-header text-center wow fadeInDown" data-wow-delay="0.4s"> <span>Our Services</span></h2>
					 <div class="devider"></div>
					<p>
						Global Logistics provide a cost effective solution from port or door for all your airfreight needs. We have established strong partner relationships
						with several major overseas forwarding companies 
					</p>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
										<img class="w3-padding-left materialboxed img-responsive" height="400" src="img/WAREHOUSING-SERVICE.jpg">

				</div>
			</div>
			<!-- Start Service item -->
			<div class="row service_item w3-padding-left w3-card-8">
				<div class="col-md-4 w3-padding-16 w3-padding-left col-sm-4 col-xs-4 single_servicr  wow fadeInUp" data-wow-delay=".2s">
					<div class="service_icon">
						<i class="fa fa-file-code-o"></i>
					</div>
					<div class="service_text w3-padding-left">
						<h3>Multi-temp Warehouse Space</h3>
						<p>Our company has over 400,000 sq. ft. of strategically located, sprinklered, multi-temp space offering inside rail, 38 doors, separate rooms with deep lane, racked, and bulk areas. </p>
					</div>
				</div>
				<div class="col-md-4 w3-padding-16  w3-padding-right w3-padding-left col-sm-4 col-xs-4 single_servicr   wow fadeInUp" data-wow-delay=".3s">
					<div class="service_icon">
						<i class="fa fa-qrcode"></i>
					</div>
					<div class="service_text">
						<h3>Packaging</h3>
						<p>Global Warehouse carefully packs products with your packaging to present a strong, uniform brand image to your customers..</p>
					</div>
				</div>
				<div class="col-md-4 w3-padding-16  w3-padding-right w3-padding-left col-sm-4 col-xs-4 single_servicr wow fadeInUp" data-wow-delay=".2s">
					<div class="service_icon">
						<i class="fa fa-paint-brush"></i>
					</div>
					<div class="service_text">
						<h3>Inside Rail Service</h3>
						<p>
							Our inside rail service is what sets us apart from our competitors. Whether you are unloading and storing within our warehouse or simply cross-docking your product, our inside rail services provide Global Limited Warehouse and your company the upper hand
						</p>
					</div>
				</div>
				
			</div>
		</div>
	</section><!-- End of Service Area -->
	
		<section id="contact" class="section_padding service_area">
				<div class="">
			<div class="row">
				<div class="col-md-12 contact_a_title  wow  rollIn ">
					<h2>Have any <span>Query!</span></h2>
					<p>Just send us a message I will help you and make you smile</p>
				</div>
			</div>
			<div class="row contact_buttom">
				<div class="col-md-4 col-sm-4 col-xs-12 social_icon wow fadeInDown" data-wow-delay=".4s">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="single_social fb_link">
								<a class="facebook hvr-bounce-to-bottom" href=""><i class="fa fa-facebook"></i></a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="single_social tw_link">
								<a class="twitter hvr-bounce-to-bottom" href=""><i class="fa fa-twitter"></i></a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="single_social int_link">
								<a class="instagram hvr-bounce-to-bottom" href=""><i class="fa fa-instagram"></i></a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="single_social dri_link">
								<a class="dribbble hvr-bounce-to-bottom" href=""><i class="fa fa-dribbble"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12 contact_box">
					<div class="input-group">
						<form class="form">
						<div class="row">
							<div class="form-group col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay=".2s">
								<input value="" type="text" class="form-control" id="fast-name" placeholder="First Name">
							</div>
							<div class="form-group col-md-6 col-sm-6 col-xs-12  wow fadeInRight" data-wow-delay=".2s">
								<input value="" type="text" class="form-control" id="last-name" placeholder="Last Name">
							</div>
							<div class="form-group col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay=".3s">
								<input value="" type="mail" class="form-control" id="email" placeholder="E-Mail Address">
							</div>
							<div class="form-group col-md-6 col-sm-6 col-xs-12  wow fadeInRight" data-wow-delay=".3s">
								<input value="" type="numbar" class="form-control" id="project-name" placeholder="Phone Number">
							</div>
							<div class="form-group col-md-12 col-sm-12 col-xs-12 massage_a  wow fadeInUp" data-wow-delay=".4s">
								<textarea name="" id="discription" rows="9" class="form-control " placeholder="Your project details and description ..." ></textarea>
								<div class="button bold-text main-bg massage_s"><i class="fa fa-paper-plane"></i></div>
							</div>
						</div>
						</form>
					
					</div>
				</div>
			</div>
		</div>
		</section>
	
	
	<footer  class="footer_area">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
	</footer><!-- End of Footer Area -->
		
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script  src="js/materialize.min.js"></script>
<script src="js/sweetalert.min.js"></script>
		 <script src="js/jPushMenu.js"></script>
		<script src="js/owl.carousel.js"></script>
		
		<script src="js/wow.min.js"></script>
		<script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		<script src="js/scripts.js"></script>
<script>
jQuery(document).ready(function($) {
	$('.menu').responsiveMenu({
		breakpoint: '992'
	});
});
</script>
             <script type="text/javascript">
							            function read_products()
            {
             $('#main').load('retrieve_new_products.php',function(){
              setTimeout(read_products,3000);
             });
            }
$(document).ready(function() {
	$('.materialboxed').materialbox();
	
	$("#registerForm").on('submit',(function(e)
																{
																	e.preventDefault();
																	$.ajax({
																		url:"register.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#error").fadeOut();
				$("#register").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Registering ...');
			},
		success : function(response){						
				if(response=="ok"){									
				 swal("Thanks,You Have Successfully Been Registered", {
                              button: "OK",
                            });
				 $("#modal1").fadeOut('slow');
				 $(".modal").close();
				}				
				else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('&nbsp; '+response+' !');
						$("#register").html('REGISTER');
					});
				}
			}
																	});
																	}));
	$('.modal').modal();
	// navigation click actions	
	$('.scroll-link').on('click', function(event){
		event.preventDefault();
		var sectionID = $(this).attr("data-id");
		scrollToID('#' + sectionID, 750);
	});
	// scroll to top action
	$('.scroll-top').on('click', function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop:0}, 'slow'); 		
	});
	// mobile nav toggle
	$('#nav-toggle').on('click', function (event) {
		event.preventDefault();
		$('#main-nav').toggleClass("open");
	});
	$('#show-panels').click(function()
					 {
						$('.panels').slideDown();
						$('#show-again').show();
						$('#show-panels').hide();
						
					 });
	$('#show-again').click(function()
						   {
							$('.panels').slideUp();
							//$('.panels').hide();
							$('#show-again').hide();
						$('#show-panels').show();
						   });
	
});
// scroll function
function scrollToID(id, speed){
	var offSet = 50;
	var targetOffset = $(id).offset().top - offSet;
	var mainNav = $('#main-nav');
	$('html,body').animate({scrollTop:targetOffset}, speed);
	if (mainNav.hasClass("open")) {
		mainNav.css("height", "1px").removeClass("in").addClass("collapse");
		mainNav.removeClass("open");
	}
}
if (typeof console === "undefined") {
    console = {
        log: function() { }
    };
}

</script>
	</body>
</HTML>