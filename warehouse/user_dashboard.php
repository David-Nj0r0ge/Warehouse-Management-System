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
    //echo $results['reg_no'];
    $stmt1 = $DB_con->prepare("SELECT * FROM student_details WHERE reg_no = :reg_no");
    $stmt1->bindParam(":reg_no",$results['reg_no']);
    $stmt1->execute();
    $row= $stmt1->fetch(PDO::FETCH_ASSOC);
    
?>
<!DOCTYPE HTML>
    <html>
        <head>
            <title>
                CUSTOMER | DASHBOARD
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
        <body>'
            <header class="w3-card-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 w3-black w3-padding-16">
                       <h5 class="w3-center w3-text-white" style="font-family:cursive;">
                        Welcome <?php echo $row['surname'] . " " . $row['f_name'] . " " . $row['l_name']?>
                        To The Student  Portal</h5> 
                    </div>
                </div>
            </header>
            <section>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4" id="siderbar">
         <ul id="tabs-nav" class="w3-ul w3-card-4 w3-padding-8 w3-green">
    <li>
    <span><i class="fa fa-user-plus"></i></span>  <a href="#" data-id="new">Your Profile</a>

    </li>
    
    <li>
        <span><i class="fa fa-users"></i></span> 
     <a href="registered" data-id="lost-id">Add Lost ID</a>
    
    </li>
	<li>
        <span><i class="fa fa-users"></i></span> 
     <a href="registered" data-id="found-id">Add Found ID</a>
    
    </li>

  </ul>
         <ul class="w3-ul w3-green w3-padding-left">
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
          <?php
          if($row['status'] == "Pending")
          {
           ?>
           <div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <span class="glyphicon glyphicon-info-sign">
           
          </span> &nbsp; Your Student ID is <?php echo $row['status']?></div>
          <?php
          }
          else if($row['status']== "Ready")
          {
           ?>
           <div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <span class="glyphicon glyphicon-info-sign">
           
          </span> &nbsp; Your Student ID is <?php echo $row['status']?></div>
           <?php
          }
          ?>
                      <h4 class="w3-bottombar" style="text-align: center;"  class="">Here is Your Profile</h4>

          <form id="formStudent" method="POST">
            <div id="student_errors"></div>
            <div class="row w3-padding-16">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Firstname</label>
                    <input type="text" class="" value="<?php echo $row['f_name'] ?>" name="f_name">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Surname</label>
                    <input type="text" value="<?php echo $row['surname'] ?>" class="" name="s_name">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Lastname</label>
                    <input type="text" class="" value="<?php echo $row['l_name'] ?>" name="l_name">
                </div>
            </div>
             <div class="row w3-padding-16">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>National ID  No</label>
                    <input type="number" value="<?php echo $row['id_no']?>" class="" name="id_no">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Phone Number</label>
                    <input type="text" class="" value="<?php echo 0 . $row['phone_no']?>" name="phone_no">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Date of Birth</label>
                    <input type="text" class="" value="<?php echo $row['dob']?>" name="dob">
                </div>
            </div>
              <div class="row w3-padding-16">
                
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <select name="course" id="course" required>
      <option value="" disabled selected>Select Course</option>
      <option value="Bsc IT">Bsc IT</option>
      <option value="Bcom">Bcom</option>
      <option value="3">BBIT</option>
	  <option value="Computer Science">Computer Science</option>
	
    </select>
	<label for="course">Course : <?php echo $row['course']?></label>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                 <select name="year" id="year" required>
      <option value="" disabled selected>Select Year</option>
      
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
	  <option value="4">4</option>
	
    </select>
	<label for="course">Year <?php echo $row['year']?></label>
                </div>
              </div>
                 <div class="row w3-padding-16">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <select name="sem" id="sem" required>
      <option value="" disabled selected>Select Semester</option>
      <option value="1">1</option>
      <option value="2">2</option>
      
	
    </select>
	<label for="sem">Semester <?php echo $row['sem']?></label>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>School</label>
                    <input type="text" class="" value="<?php echo $row['school']?>" name="school">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Dept</label>
                    <input type="text" class="" value="<?php echo $row['dept']?>" name="dept">
                </div>
            </div>
                  <div class="row w3-padding-16">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Next of Kin Name</label>
                    <input type="text" value="<?php echo $row['guardian_name']?>" class="" name="n_name">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Next of Kin Phone Number</label>
                    <input type="text" class="" value="<?php echo 0 . $row['guardian_phone']?>" name="n_phone">
                </div>
                
            </div>
                  <div class="row">
                   <div class="col-sm-12 col-lg-12 col-md-12">
                    <button type="submit" id="btn-reg" class="button button-primary button-primary-flat  button-jumbo" >Update</button>
                   </div>
                  </div>
            
        </form>
         </div>
         <div id="registered" class="profile">
      <h4 class="w3-bottombar" style="text-align: center;"  class="">Registered Students</h4>
      <!--Start w3 Modal Update Inputs !-->
<div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id02').style.display='none';" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>	<legend style="text-align: center;" class="w3-xlarge w3-slim w3-text-white w3-allerta w3-center">Update Student ID Status</legend></h2>
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
	<label for="course">ID Status</label>
                           </div>
                        </div>
                       
                       
                       
                        
                         <div class="row w3-padding-32">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" id="btn-up-status" class="btn btn-lg btn-block btn-primary">Update ID Status</button>
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
             <h4 class="w3-bottombar" style="text-align: center;"  class="">Add Lost ID Here</h4>
<form method="POST" id="formLost">
 <div id="lost-errors">
  
 </div>
  <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
 <label>
  Your Student ID Reg No
 </label>
 <input type="text" name="reg-no" class="input-field">
  </div>
 </div> 
 <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
   <button type="submit" id="btn-lost" class="buttton button-highlight-flat button-jumbo">Check Lost ID</button>
  </div>
 </div> 
</form>
<div class="row">
            <div  class="w3-card-4 col-sm-12 col-md-12 col-lg-12">
              <div id="lost-details">
               
              </div>
   
            </div>
           </div>
         </div>
         <!---End Lost ID div !---->
                  <!---Add Found ID div !---->
         <div class="profile" id="found-id">
             <h4 class="w3-bottombar" style="text-align: center;"  class="">Add Lost ID Here</h4>
           <form method="POST" id="formFound">
  <div id="found-errors">
  
 </div>
  <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
 <label>
  Found ID Reg No
 </label>
 <input type="text" name="reg-no-found" class="input-field">
  </div>
 </div> 
 <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
   <button id="btn-found" type="submit" class="buttton button-primary-flat button-jumbo">Add Found ID</button>
  </div>
 </div> 
</form>
           <div class="row">
            <div  class="w3-card-4 col-sm-12 col-md-12 col-lg-12">
              <div id="found-details">
               
              </div>
   
            </div>
           </div>
         </div>
         <!---End Found ID div !---->
                  <!--- Lost IDs doundsiv !---->
         <div class="profile" id="losts">
             <h4 class="w3-bottombar" style="text-align: center;"  class=""> Lost IDS </h4>
<div id="losts-id"></div>
         </div>
         <!---End Lost IDs div !---->
                  <!---Found IDs div !---->
         <div class="profile" id="founds">
             <h4 class="w3-bottombar" style="text-align: center;"  class="">Found IDS</h4>
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
																		url:"update_student.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#student_errors").fadeOut();
				$("#btn-reg").html('<i class="fa fa-spin"></i> &nbsp; Updating Your Details........');
			},
		success : function(response){						
				if(response=="ok"){									
				loadFounds();
    loadLosts();
					loadStudents();
				swal("Details Successfully Updated", {
                              button: "OK",
                            });
   
    //document.getElementById('id01').style.display='none';
    $("#btn-reg").html("Update");
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
				$("#btn-reg").html("Update");
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
																		url:"lost_id_student.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#lost-errors").fadeOut();
				$("#btn-lost").html('<i class="fa fa-spin"></i> &nbsp; Checking ID........');
			},
		success : function(response){
  $('#lost-details').html(response);
							$("#btn-lost").html('<i class="fa fa-spin"></i> &nbsp; Check ID');

			}
																	});
																	}));
                $("#formFound").on('submit',(function(e)
																{
                 //alert("You Are Good To Go");
																	e.preventDefault();
																	$.ajax({
																		url:"found_id_student.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#found-errors").fadeOut();
				$("#btn-found").html('<i class="fa fa-spin"></i> &nbsp; Adding Found ID........');
			},
		success : function(response){
   $('#found-details').html(response);
   
				$("#btn-found").html('<i class="fa fa-spin"></i> &nbsp; Add Found ID');
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