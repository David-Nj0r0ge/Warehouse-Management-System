<?php
require_once('db_config.php');
/*
$password = "password";
$email = "admin@jkuat.co.ke";
echo md5($password);
*/
if(!$user->is_loggedin())
{
    $user->redirect('index.php');
}
  $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
    <html>
        <head>
            <title>
                ADMIN | DASHBOARD
            </title>
            <!-- Required meta tags !--->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
             <link type="text/css" rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/w3-theme-indigo.css" type="text/css">
<link rel="stylesheet" href="css/w3-colors-metro.css" type="text/css">
<link rel="stylesheet" href="css/w3-colors-flat.css" type="text/css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/buttons.css">
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/w3-colors-windows.css" type="text/css">
<link rel="stylesheet" href="css/w3-colors-safety.css" type="text/css">
<link rel="stylesheet" href="css/w3-colors-highway.css" type="text/css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/sweetalert.css">
<link rel="stylesheet" href="css/style.css">
     <link type="text/css" rel="stylesheet" href="css/w3school.css">
        <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="js/sweetalert.min.js"></script>

      <script type="text/javascript" src="js/materialize.min.js"></script>
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
#tabs-nav li a
{
    text-decoration:none;
    color:#FFFFFF;
    font-family: cursive;
}
label{
    color:#000;
    font-size:14px;
}
            </style>
         <script type="text/javascript">
          $(document).ready(function(){
           				
					$('select').material_select();
     $('#tabs-nav li a').click(function(e){
                        //alert("You Are Good To Go");
                        //$('#img').fadeIn(1000);
                      e.preventDefault();
                      //remove the active state from all links
                      $('#tabs-nav li a').removeClass("active");
                      //add the active state to the clicked link
                      $(this).addClass("active");
                      //fade out the current container
                      $('.profile').fadeOut(600,function(){
                        //fade in the clicked container
                        $('#' + profileID).fadeIn(600);
                        //$('#img').fadeOut(1000);
                      });
                      var profileID = $(this).attr("data-id");
                      
                    });
          });
         </script>
        </head>
        <body>
            <header class="w3-card-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 w3-black w3-padding-16">
                       <h5 class="w3-center w3-text-black" style="font-family:cursive;">Customer Registration & Product Information Portal</h5> 
                    </div>
                </div>
            </header>
            <section>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4" id="siderbar">
                                      <ul id="tabs-nav" class="w3-ul w3-card-4 w3-padding-8 w3-green">
    <li>
    <span><i class="fa fa-user-plus"></i></span>  <a href="#" data-id="new">Register </a>

    </li>
    <li>
        <span><i class="fa fa-users"></i></span> 
     <a href="registered" data-id="registered">Registered Customer</a>
    
    </li> 
    <li>
        <span><i class="fa fa-users"></i></span> 
     <a href="registered" data-id="lost-id">Add Product</a>
    
    </li>
	<li>
        <span><i class="fa fa-users"></i></span> 
     <a href="registered" data-id="found-id">Payment</a>
    
    </li>
 <li>
        <span><i class="fa fa-users"></i></span> 
     <a href="registered" data-id="losts">Withdraw Product</a>
    
    </li>
 <li>
        <span><i class="fa fa-users"></i></span> 
     <a href="registered" data-id="founds">Added Products</a>
    
    </li>
  </ul>
                                      <ul class="w3-ul w3-blue w3-padding-left">
            <li>
        <a style="color:#FFFFFF;text-decoration: none;" href="logout.php?logout=true"><i class="fa fa-power-off "></i>Logout</a>
    
    </li>
         </ul>
                    </div>
                    <div class="col-sm-8 col-lg-8 col-md-8">
 <div class="panel panel-primary ">
    <div class="panel-heading">
        <div class="panel-title">
        </div>
    </div>
    <div class="panel-body">
        <div id="tabs-content">
         <div id="new" class="profile" style="display: block">
                      <h4 class="w3-bottombar" style="text-align: center;"  class="">Register New Customer Here</h4>

          <form id="formStudent" method="POST">
            <div id="student_errors"></div>
            <div class="row w3-padding-16">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Firstname</label>
                    <input type="text" class="" name="f_name">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Surname</label>
                    <input type="text" class="" name="s_name">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Lastname</label>
                    <input type="text" class="" name="l_name">
                </div>
            </div>
             <div class="row w3-padding-16">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>National ID  No</label>
                    <input type="number" class="" name="id_no">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Phone Number</label>
                    <input type="number" class="" name="phone_no">
                </div>
                <!--<div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Date of Birth</label>
                    <input type="text" class="" name="dob">
                </div> 
            </div> -->
              <div class="row w3-padding-16">
                <div class="col-sm-4 col-md-4 col-lg-4">
                     <label>Profile Photo</label>
                    <input type="file" class="" name="img">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <select name="course" id="course" required>
      <option value="" disabled selected>Select Product</option>
      <option value="Food Stuffs">Food Stuffs</option>
      <option value="Farm Produce">Farm Produce</option>
      <option value="Machinery">Machinery</option>
	  <option value="Chemicals">Chemicals</option>
	
    </select>
	<label for="course">Quantity</label>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                 <select name="year" id="year" required>
      <option value="" disabled selected>Select </option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	  <option value="6">6</option>
	  <option value="7">7</option>
	  <option value="8">8</option>
	  <option value="9">9</option>
	  <option value="10">10</option>
	
    </select>
	<!--<label for="course">Year</label>
                </div>
              </div>
                 <div class="row w3-padding-16">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <select name="sem" id="sem" required>
      <option value="" disabled selected>Select Semester</option>
      <option value="1">1</option>
      <option value="2">2</option>
      
	
    </select> -->
	<!--<label for="sem">Phone</label>
                <!--</div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>School</label>
                    <input type="text" class="" name="school">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Dept</label>
                    <input type="text" class="" name="dept">
                </div>
            </div>
                  <div class="row w3-padding-16">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Next of Kin Name</label>
                    <input type="text" class="" name="n_name">
                </div> 
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Phone Number</label>
                    <input type="text" class="" name="n_phone">
                </div>
                
            </div> -->
                  <div class="row">
                   <div class="col-sm-12 col-lg-12 col-md-12">
                    <button type="submit" id="btn-reg" class="button button-primary button-primary-flat  button-jumbo" >Register</button>
                   </div>
                  </div>
            
        </form>
         </div>
         <div id="registered" class="profile">
      <h4 class="w3-bottombar" style="text-align: center;"  class="">Registered Customers</h4>
      <!--Start w3 Modal Update Inputs !-->
<div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id02').style.display='none';" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>	<legend style="text-align: center;" class="w3-xlarge w3-slim w3-text-white w3-allerta w3-center">Update Space Status</legend></h2>
      </header>
      <div class="w3-container w3-card-8  w3-padding-16 w3-padding-left">
       <form action="" id="formUpdateStatus" method="POST">
                     <div id="status-error">
                      
                      
                     </div>
                     <input type="hidden" id="id-up" name="id-up">
                       <div class="row w3-padding-16">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <select name="status" required>
      <option value="" disabled selected>Select Status</option>
      <option value="Pending">Pending</option>
      <option value="Ready">Ready</option>
     
    </select>
	<label for="course">Space Status</label>
                           </div>
                        </div>
                       
                       
                       
                        
                         <div class="row w3-padding-32">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" id="btn-up-status" class="btn btn-lg btn-block btn-primary">Update Space Status</button>
                            </div>
                         </div>
                    </form>
      </div>
     
    </div>
  </div>
      
					<!--End W3 Modal !-->	
<div id="new-students">
 
</div>
         </div>
         <!---Add Lost ID div !---->
         <div class="profile" id="lost-id">
             <h4 class="w3-bottombar" style="text-align: center;"  class="">Withdraw products Here</h4>
<form method="POST" id="formLost">
 <div id="lost-errors">
  
 </div>
  <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
 <label>
  Prod No
 </label>
 <input type="text" name="prod-no" class="input-field">
  </div>
 </div> 
 <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
   <button type="submit" id="btn-lost" class="buttton button-highlight-flat button-jumbo">Withdraw Product</button>
  </div>
 </div> 
</form>
         </div>
         <!---End Lost ID div !---->
                  <!---Add Found ID div !---->
         <div class="profile" id="found-id">
             <h4 class="w3-bottombar" style="text-align: center;"  class="">Withdraw Products Here</h4>
           <form method="POST" id="formFound">
  <div id="found-errors">
  
 </div>
  <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
 <label>
  Prod No
 </label>
 <input type="text" name="reg-no-found" class="input-field">
  </div>
 </div> 
 <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
   <button id="btn-found" type="submit" class="buttton button-primary-flat button-jumbo">Withdraw Products</button>
  </div>
 </div> 
</form>
         </div>
         <!---End Found ID div !---->
                  <!--- Lost IDs doundsiv !---->
         <div class="profile" id="losts">
             <h4 class="w3-bottombar" style="text-align: center;"  class=""> Withdraw Products </h4>
<div id="losts-id"></div>
         </div>
         <!---End Lost IDs div !---->
                  <!---Found IDs div !---->
         <div class="profile" id="founds">
             <h4 class="w3-bottombar" style="text-align: center;"  class="">Added Products</h4>
<div id="founds-id"></div>
         </div>
         <!---Lost IDs div !---->
        </div>
    </div>
 </div>
                    </div>
                </div>
            </section>
            <script type="text/javascript">
             $(document).ready(function(){
              loadStudents();
              loadFounds();
              loadLosts();
               $("#formStudent").on('submit',(function(e)
																{
                 //alert("You Are Good To Go");
																	e.preventDefault();
																	$.ajax({
																		url:"register_student.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#student_errors").fadeOut();
				$("#btn-reg").html('<i class="fa fa-spin"></i> &nbsp; Registering New Customer........');
			},
		success : function(response){						
				if(response=="ok"){									
				loadFounds();
    loadLosts();
					loadStudents();
				swal("New Customer Successfully Registered", {
                              button: "OK",
                            });
    document.getElementById("formCustomer").reset();
    //document.getElementById('id01').style.display='none';
    $("#btn-reg").html("Register");
    /*
				 $("#modal1").fadeOut('slow');
				 $(".modal").close();
      $('.modal-backdrop').remove();
			*/
				}				
				else {									
					$("#student_errors").fadeIn(1000, function(){						
						$("#student_errors").html('&nbsp; '+response+' !');
						
					});
					setTimeout(function(){
				$("#student_errors").fadeOut("slow", function () {
				$("#btn-reg").html("Register");
				});
				
				}, 10000);
					
				}
			}
																	});
																	}));
               $("#formLost").on('submit',(function(e)
																{
                 //alert("You Are Good To Go");
																	e.preventDefault();
																	$.ajax({
																		url:"lost_id.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#lost-errors").fadeOut();
				$("#btn-lost").html('<i class="fa fa-spin"></i> &nbsp; Registering New Student........');
			},
		success : function(response){						
				if(response=="ok"){									
				
					loadStudents();
				swal("Lost ID Successfully Added", {
                              button: "OK",
                            });
    document.getElementById("formLost").reset();
    //document.getElementById('id01').style.display='none';
    $("#btn-lost").html("ADD LOST ID");
    /*
				 $("#modal1").fadeOut('slow');
				 $(".modal").close();
      $('.modal-backdrop').remove();
			*/
				}				
				else {									
					$("#lost-errors").fadeIn(1000, function(){						
						$("#lost-errors").html('&nbsp; '+response+' !');
						
					});
					setTimeout(function(){
				$("#lost-errors").fadeOut("slow", function () {
				$("#btn-lost").html("ADD LOST ID");
				});
				
				}, 10000);
					
				}
			}
																	});
																	}));
                $("#formFound").on('submit',(function(e)
																{
                 //alert("You Are Good To Go");
																	e.preventDefault();
																	$.ajax({
																		url:"found_id.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#found-errors").fadeOut();
				$("#btn-found").html('<i class="fa fa-spin"></i> &nbsp; Registering New Student........');
			},
		success : function(response){						
				if(response=="ok"){									
				loadFounds();
    loadLosts();
					loadStudents();
				swal("Found ID Successfully Added", {
                              button: "OK",
                            });
    document.getElementById("formFound").reset();
    //document.getElementById('id01').style.display='none';
    $("#btn-found").html("ADD FOUND ID");
    /*
				 $("#modal1").fadeOut('slow');
				 $(".modal").close();
      $('.modal-backdrop').remove();
			*/
				}				
				else {									
					$("#found-errors").fadeIn(1000, function(){						
						$("#found-errors").html('&nbsp; '+response+' !');
						
					});
					setTimeout(function(){
				$("#found-errors").fadeOut("slow", function () {
				$("#btn-found").html("ADD LOST ID");
				});
				
				}, 10000);
					
				}
			}
																	});
																	}));
                 $(document).on('click','.up-student',function(){
                  //alert("You are good to go");
       var std_id = $(this).attr('id');
       document.getElementById('id02').style.display='block';
       $.ajax({
        url:'fetch_student_up_status.php',
        method:'POST',
        data:{std_id:std_id},
        dataType:'json',
        success:function(data)
        {
         //alert(data);
         $('#status').val(data.status);
          $('#id-up').val(data.std_id);
           //$('#phone-no-up').val(data.input_cost);
        }
       });
      });
            
              $("#formUpdateStatus").on('submit',(function(e)
																{
                 //alert("You Are Good To Go");
																	e.preventDefault();
																	$.ajax({
																		url:"status_update.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#status-error").fadeOut();
				$("#btn-up-status").html('<i class="fa fa-spin"></i> &nbsp; Updating Status.. ...');
			},
		success : function(response){						
				if(response=="ok"){									
				
					loadStudents();
				swal("Student ID Status Successfully Updated", {
                              button: "OK",
                            });
    document.getElementById("formUpdateStatus").reset();
   
    $('#id02').slideUp();
    $("#btn-up-status").html("Update ID");
    /*
				 $("#modal1").fadeOut('slow');
				 $(".modal").close();
      $('.modal-backdrop').remove();
			*/
				}				
				else {									
					$("#status-error").fadeIn(1000, function(){						
						$("#status-error").html('&nbsp; '+response+' !');
						
					});
					setTimeout(function(){
				$("#status-error").fadeOut("slow", function () {
				$("#btn-up-status").html("Update ID");
				});
				
				}, 10000);
					
				}
			}
																	});
																	}));
               });
             function loadStudents()
             {
              $.ajax({
               url:"fetch_students.php",
               method:"POST",
               success:function(data)
               {
                $('#new-students').html(data);
               }
              });
             }
             function loadLosts()
             {
              $.ajax({
               url:"fetch_losts.php",
               method:"POST",
               success:function(data)
               {
                $('#losts-id').html(data);
               }
              });
             }
              function loadFounds()
             {
              $.ajax({
               url:"fetch_founds.php",
               method:"POST",
               success:function(data)
               {
                $('#founds-id').html(data);
               }
              });
             }
            </script>
        </body>
    </html>