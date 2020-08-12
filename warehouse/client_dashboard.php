<?php
require_once('db_config.php');
if(!$user->is_loggedin())
{
    $user->redirect('login.php');
}
  $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
	
?>
<!DOCTYPE HTML>
<head>
	<title>CLIENT WAREHOUSE | PORTAL</title>
	<?php
	require_once('head.html');
	?>
   <style type="text/css">
            a
            {
                text-decoration:none;
            }
			     					.w3-allerta {
  font-family: "Allerta Stencil", Sans-serif;
}
 #tabs-content .profile
{
    display: none;
    position: relative;
}
            </style>
</head>
<body>
	<section class="w3-padding-16">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 w3-card-8 w3-black w3-card-24 w3-hover-shadow">
			<div class="row">
				<div class="col-sm-3 col-md-3 col-lg-3 w-padding-16 w3-rightbar">
					<h1 class="w3-xlarge w3-slim w3-margin-left">Welcome Client <span class="w3-text-green;"><?php echo $results['first_name'] ." " . $results['last_name']?></span></h1>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 w-padding-16 w3-rightbar w3-transparent w3-bottombar">
					<h1 class="w3-xlarge w3-text-white w3-slim w3-padding-left">Global Warehouse Limited</h1>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-3 w3-margin-top w-padding-16">
					 <div class="dropdown pull-right w3-margin-right">
  <i class="dropdown-toggle" type="button" data-toggle="dropdown">
	<img src="img/img_avatar14.png" class="img-circle" height="40px">
  <span class="caret w3-large"></span></i>
  <ul class="dropdown-menu">
    
    <li><a href="logout.php?logout=true">Logout</a></li>
    
  </ul>
</div> 
				</div>
			</div>	
			</div>
		</div>
	</section>
	<section>
		<div class="row  w3-padding-16 w3-card-8">
			<div class="w3-theme-d3 w3-hover-shadow  col-sm-3 col-md-3 col-lg-3 w3-card-8 ">
				<ul class="w3-ul" id="main-menu">
  <li class="small">
   <a href="#" style="text-decoration: none;" data-id="space" class="active  w3-large w3-text-white">
    Book Space</a>
  </li>
 
  <li class="small">
   <a href="#" style="text-decoration: none;" data-id="arrived-pending"  class="w3-large w3-text-white">Your Pending Containers</a>
  </li>
<li class="small">
   <a href="#" style="text-decoration: none;" data-id="charges"  class="w3-large w3-text-white">Charges Chart</a>
  </li>
<li class="small">
   <a href="#" style="text-decoration: none;" data-id="arrived-containers"  class="w3-large w3-text-white">Your Received Containers</a>
  </li>
<li class="small">
   <a href="#" style="text-decoration: none;" data-id="payments-made"  class="w3-large w3-text-white">Check Your Payments</a>
  </li>

<li>
 <a class="w3-bar-item w3-large w3-text-white" style="text-decoration: none;"  href="logout.php?logout=true"><i class="fa fa-power-off "></i>Logout</a>
</li>
</ul>
			</div>
   
			<div class="col-sm-9 col-md-9 col-lg-9">
    <div id="tabs-content">
     <div id="space" class="profile" style="display: block;">
				<legend class="w3-slim w3-xlarge w3-border-theme w3-bottombar w3-center w3-text-green" style="font-family:cursive;">Welcome Client Book Space For Your Container Here</legend>
			
	
		<form method="POST" id="formBook" class=" w3-padding-16 w3-padding-left w3-margin-right">
	
  <div  id="error"></div>
  	<div class="row">
			<div class="input-field col s6">
				<input type="text" name="owner" required/>
				<label>Owner/Company Name</label>
			</div>
			<div class="input-field col s6">
				
				<input type="number" name="cont-weight" required/>
				<label>Container Weight</label>
			</div>
			</div>
			<div class="row">
			<div class="input-field col s6">
			<input  name="date" type="text" class="datepicker" required/>
				<label>Arrival Date</label>
			</div>
			<div class="input-field col s6">

        <label>Product Name</label>
        <input type="text" name="product_name" required/>
     
      
			</div>
			</div>
   <div class="row">
			<div class="input-field col s6">
			<input  name="location" type="text" class="" required/>
				<label>Product Location &nbsp &nbsp <span class="w3-slim">eg City, Town,County </span></label>
			</div>
			<div class="input-field col s6">

        <label>Product Photo</label>
        <br>
        <br>
        <input type="file" name="img" required/>
     
      
			</div>
			</div>
   <div class="row">
     <div class="input-field col s12">
          <select name="product_type" required/>
      <option value="" disabled selected>Product Type</option>
      <option value="Food">Food</option>
      <option value="Medicine">Medicine</option>
      <option value="stationery">Stationery</option>
	  <option value="electronics">Electonics</option>
    <option value="cosmetics">Cosmetics</option>
    </select>
    <label>Select Product Type</label>
        </div>
   </div>
			<div class="row w3-margin-left">
				<div  class="col-sm-9 col-md-9 col-lg-9 w3-padding-right w3-margin-right">
					 <button type="submit" id="book" class="w3-margin-left button button-3d btn-lg btn-block button-primary button-rounded w3-xlarge w3-slim">BOOK SPACE</button>
				</div>
			</div>
		</form>
    </div>
    
    <div class="profile " id="payments-made">
    <legend class="w3-slim w3-xlarge w3-border-theme w3-bottombar w3-center w3-text-green" style="font-family:cursive;">Payments You Have Made</legend>
  <div class="row">
   <div class="col-sm-12  col-md-12 col-lg-12 w3-card-24 w3-hover-shadow">
<button class="btn btn-lg btn-success pull-right" onclick="javascript:printDiv('payment-retrieve')"  id="print">Print Receipt</button>
  <div id="payment-retrieve">
   
  </div>
   </div>
    
  </div>
   </div>
   <div class="profile " id="arrived-pending">
    <legend class="w3-slim w3-xlarge w3-border-theme w3-bottombar w3-center w3-text-green" style="font-family:cursive;">Your Containers Pending Arrival</legend>
  <div class="row">
   <div class="col-sm-12  col-md-12 col-lg-12 w3-card-24 w3-hover-shadow">

  <div id="pending">
   
  </div>
   </div>
    
  </div>
   </div>
   <div class="profile " id="arrived-containers">
    <legend class="w3-slim w3-xlarge w3-border-theme w3-bottombar w3-center w3-text-green" style="font-family:cursive;">Your Containers At The Warehouse</legend>
  <div class="row">
   <div class="col-sm-12  col-md-12 col-lg-12 w3-card-24 w3-hover-shadow">

  <div id="arrived">
   
  </div>
   </div>
    
  </div>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none';" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>	<legend style="text-align: center;" class="w3-xlarge w3-slim w3-text-white w3-allerta">Pay Container Charges Here</legend></h2>
      </header>
      <div class="w3-container w3-card-8  w3-padding-16 w3-padding-left">
        <form method="POST" id="formPay" class="w3-padding-left">
								<div class="w3-padding-16">
								
								</div>
<div id="return">

</div>
						<div class="row">
       <div class="col-sm-12 col-md-12 col-lg-12">
    
       </div>
      </div>
							<div class="row w3-padding-8">
       <div class="col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" name="contid" id="contid">
       <div class="form-group">
     <label class="label-control">
         
     </label>
     <div class="input-group">
     <span class="input-group-addon">MPESA CODE </span>
     <input type="text" class="form-control input-lg w3-padding-left" name="mpesa_code"  required/>
     </div>
 </div>
       </div>
      </div>
       <div class="row w3-padding-8">
       <div class="col-sm-12 col-md-12 col-lg-12">
       <div class="form-group">
     <label class="label-control">
         
     </label>
     <div class="input-group">
     <span class="input-group-addon">Amount Paid </span>
     <input type="number" class="form-control input-lg w3-padding-left" name="amount_paid"   required/>
     </div>
 </div>
       </div>
      </div>
							<button type="submit" id="block" class="btn btn-lg w3-xlarge btn-success w3-slim  btn-block">PAY</button>
						</form>
      </div>
     
    </div>
  </div>
   </div>
   <div id="charges" class="profile w3-padding-16">
          
          <div class="row w3-padding-left w3-padding-16">
           
           <div class="col-sm-12 col-lg-12 col-md-12 w3-padding-16 w3-card-8">
            <h1 class="w3-center w3-text-green w3-bottombar w3-border-theme">Container Charges</h1>
            <div id="fetched_charges">
             
            </div>
           </div>
          </div>
        </div>
  </div>
		</div>
		</div>
	
	</section>
 
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
		 function printDiv(divID) {
           //Get the HTML of div
           //document.getElementById('owned').style.display='block';
           var divElements = document.getElementById(divID).innerHTML;
           //Get the HTML of whole page
           var oldPage = document.body.innerHTML;

           //Reset the page's HTML with div's HTML only
           document.body.innerHTML =
             "<html><head><title></title></head><body>" +
             divElements + "</body>";

           //Print Page
           window.print();

           //Restore orignal HTML
           document.body.innerHTML = oldPage;


       }
 function GetProduct(id) {
    // Add User ID to the hidden field
    //alert(id);
   
    $("#product_id").val(id);
    $.post("fetch_product.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            $('#bid_return').html(data);
        } 
    );
   
}
function DeleteProduct(id)
     {
      //alert(id);
      
      var conf = confirm("Are you sure,do you really want to delete this Product");
      if(conf == true)
      {
       $.ajax({
        type:'POST',
        url:'delete_product.php',
        data:{id:id},
        success:function(data){
         if(data=="YES")
         {
           swal("Product Successfully Deleted", {
                              button: "OK",
                            });
           read();
         }
         else
         {
          alert("Error Deleting Try Again");
         }
        }
       });
       }
      }
  function PayCont(id) {
    // Add User ID to the hidden field
    //alert(id);
    document.getElementById('id01').style.display='block';
    $("#contid").val(id);
    $.post("fetch_payment_detail.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assign existing values to the modal popup fields
            $("#cust_name").val(user.first_name + " " + user.last_name);
            $("#cont_code").val(user.cont_code);
            $("#cont_weight").val(user.cont_weight);
            $("#owner_email").val(user.cont_owner);
             //alert("YOU ARE GOOD TO GO");
              // Open modal popup
    
        } 
    );
   }

</script>
             <script type="text/javascript">
                         function read_pending()
            {
             $('#pending').load('retrieve_pending.php',function(){
              setTimeout(read_pending,3000);
             });
            }
                      function read_payments()
            {
             $('#payment-retrieve').load('retrieve_payments.php',function(){
              setTimeout(read_payments,3000);
             });
            }
            function read_arrived()
            {
             $('#arrived').load('fetch_arrived.php',function(){
              setTimeout(read_arrived,3000);
             });
            }
            function read_charges()
            {
             $('#fetched_charges').load('fetch_charges.php',function(){
              setTimeout(read_charges,3000);
             });
            }
$(document).ready(function() {
 read_arrived();
 read_charges();
 read_payments();
 $('#main-menu .small  a').click(function(e){
                        //alert("You Are Good To Go");
                        $('#img').fadeIn(1000);
                      e.preventDefault();
                      //remove the active state from all links
                      $('main-menu .small  a').removeClass("active");
                      //add the active state to the clicked link
                      $(this).addClass("active");
                      //fade out the current container
                      $('.profile').fadeOut(600,function(){
                        //fade in the clicked container
                        $('#' + profileID).fadeIn(600);
                        $('#img').fadeOut(1000);
                      });
                      var profileID = $(this).attr("data-id");
                      
                    });
	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
	read_pending();

 $('.modal').modal();
					$('select').material_select();
     	$("#formBook").on('submit',(function(e)
																{
																	e.preventDefault();
																	$.ajax({
																		url:"book_container_space.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#error").fadeOut();
				$("#book").html('<i class="fa fa-spin"></i> &nbsp; Booking Space... ...');
			},
		success : function(response){						
				if(response=="ok"){									
				
					
				swal("Thanks For Booking Space At Global Warehouse Limited", {
                              button: "OK",
                            });
    document.getElementById("formBook").reset();
    /*
				 $("#modal1").fadeOut('slow');
				 $(".modal").close();
      $('.modal-backdrop').remove();
			*/
				}				
				else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('&nbsp; '+response+' !');
						
					});
					setTimeout(function(){
				$("#error").fadeOut("slow", function () {
				$("#book").html("BOOK SPACE");
				});
				
				}, 7000);
					
				}
			}
																	});
																	}));
	$("#formPay").on('submit',(function(e)
																{
																	e.preventDefault();
																	$.ajax({
																		url:"add_payment.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#return").fadeOut();
				$("#pay").html('<i class="fa fa-spin"></i> &nbsp; Placing Payment... ...');
			},
		success : function(response){						
				if(response=="ok"){									
				
					
				swal("Thanks For Making Payment", {
                              button: "OK",
                            });
    document.getElementById("formPay").reset();
    document.getElementById('id01').style.display='none';
    /*
				 $("#modal1").fadeOut('slow');
				 $(".modal").close();
      $('.modal-backdrop').remove();
			*/
				}				
				else {									
					$("#return").fadeIn(1000, function(){						
						$("#return").html('&nbsp; '+response+' !');
						
					});
					setTimeout(function(){
				$("#return").fadeOut("slow", function () {
				$("#book").html("BOOK SPACE");
				});
				
				}, 7000);
					
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
</html>
