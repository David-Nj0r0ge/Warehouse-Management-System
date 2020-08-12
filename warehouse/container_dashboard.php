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
        <html>
                <head>
                        <title>ADMIN | DASHBOARD</title>
                      
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/w3school.css">
<link rel="stylesheet" href="css/w3-colors-windows.css" >
<link rel="stylesheet" href="css/w3-colors-metro.css">
<link rel="stylesheet" href="css/w3-theme-indigo.css">
<link rel="stylesheet" href="css/w3-colors-highway.css">

  <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/sweetalert.css">
  

  <link rel="stylesheet" type="text/css" href="css/fonts.css" media="all" />
	<!--========================================== -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="all" />

		 <link href="css/basic.css" rel="stylesheet"/>
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
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
       
       
<script type="text/javascript">
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
  function ReleaseCont(id){
      //alert(id);
      
      var conf = confirm("Are you sure,do you really want to release this container");
      if(conf == true)
      {
       $.ajax({
        type:'POST',
        url:'release_cont.php',
        data:{id:id},
        success:function(data){
         if(data=="YES")
         {
           swal("Container Successfully Released", {
                              button: "OK",
                            });
           //read();
         }
         else
         {
          alert("Error Releasing Container");
         }
        }
       });
       }
      }
   function GetCont(id) {
    // Add User ID to the hidden field
    //alert(id);
   
    $("#cont_id").val(id);
    $.post("fetch_cont_details.php", {
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
  function read_payments()
            {
             $('#pay-cont').load('fetch_admin_payments.php',function(){
              setTimeout(read_payments,3000);
             });
            }
            
              function release_cont()
            {
             $('#released-conts').load('released-conts.php',function(){
              setTimeout(release_cont,3000);
             });
            }
          function read_conts()
            {
             $('#admin-pendings').load('fetch_admin_pendings.php',function(){
              setTimeout(read_conts,3000);
             });
            }
            function read_recieved_conts()
            {
             $('#receive-conts').load('fetch_received.php',function(){
              setTimeout(read_recieved_conts,3000);
             });
            }
            function read_charges()
            {
             $('#fetched_charges').load('fetch_charges.php',function(){
              setTimeout(read_charges,3000);
             });
            }
            function read_blocks()
            {
             $('#block-results').load('retrieve_blocks.php',function(){
              setTimeout(read_blocks,3000);
             });
            }
  $(document).ready(function(){
   read_blocks();
   read_charges();
   read_recieved_conts();
   read_payments();
   release_cont();
   $('#main-menu .small  a').click(function(e){
                        //alert("You Are Good To Go");
                        //$('#img').fadeIn(1000);
                      e.preventDefault();
                      //remove the active state from all links
                      $('#main-menu .small  a').removeClass("active");
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
    read_conts();
  // $('.modal').modal();
					//$('select').material_select();
     $("#formReceive").on('submit',(function(e)
																{
                 //alert("You Are Good To Go");
																	e.preventDefault();
																	$.ajax({
																		url:"receive_cont.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#cont-error").fadeOut();
				$("#receive").html('<i class="fa fa-spin"></i> &nbsp; Receiving Container... ...');
			},
		success : function(response){						
				if(response=="ok"){									
				
					
				swal("Container Successfully Received", {
                              button: "OK",
                            });
    document.getElementById("formReceive").reset();
    document.getElementById('myModal').style.display='none';
    $("#receive").html("Receive Container");
    
				 $("#modal1").fadeOut('slow');
				 $(".modal").close();
			
				}				
				else {									
					$("#cont-error").fadeIn(1000, function(){						
						$("#cont-error").html('&nbsp; '+response+' !');
						
					});
					setTimeout(function(){
				$("#cont-error").fadeOut("slow", function () {
				$("#receive").html("Receive Container");
				});
				
				}, 2000);
					
				}
			}
																	});
																	}));
     	$("#formBlock").on('submit',(function(e)
																{
                 //alert("You Are Good To Go");
																	e.preventDefault();
																	$.ajax({
																		url:"add_block.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#return").fadeOut();
				$("#block").html('<i class="fa fa-spin"></i> &nbsp; Adding Block... ...');
			},
		success : function(response){						
				if(response=="ok"){									
				
					
				swal("Block Successfully Added", {
                              button: "OK",
                            });
    document.getElementById("formBlock").reset();
    document.getElementById('id01').style.display='none';
    $("#block").html("Add Block");
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
				$("#block").html("Add Block");
				});
				
				}, 4000);
					
				}
			}
																	});
																	}));
     	$("#formCharges").on('submit',(function(e)
																{
                 //alert("You Are Good To Go");
																	e.preventDefault();
																	$.ajax({
																		url:"add_plan.php",
																		type:"POST",
																		data:new FormData(this),
																		contentType:false,
																		cache:false,
																		processData:false,
																		beforeSend: function(){	
				$("#charge_errors").fadeOut();
				$("#block").html('<i class="fa fa-spin"></i> &nbsp; Adding Charges... ...');
			},
		success : function(response){						
				if(response=="ok"){									
				
					
				swal("Plan Successfully Added", {
                              button: "OK",
                            });
    document.getElementById("formCharges").reset();
    //document.getElementById('id01').style.display='none';
    $("#ch").html("Add Charges");
    /*
				 $("#modal1").fadeOut('slow');
				 $(".modal").close();
      $('.modal-backdrop').remove();
			*/
				}				
				else {									
					$("#charge_errors").fadeIn(1000, function(){						
						$("#charge_errors").html('&nbsp; '+response+' !');
						
					});
					setTimeout(function(){
				$("#charge_errors").fadeOut("slow", function () {
				$("#ch").html("Add Plan");
				});
				
				}, 10000);
					
				}
			}
																	});
																	}));
  });
</script>
	


                </head>
                <body>
                 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title w3-center w3-large w3-text-black w3-bottombar">
         Receive Container For The Following Customer</h4>
      </div>
      <div class="modal-body">
       <form method="POST" id="formReceive" class="w3-padding-left">
								<div id="cont-error">
         
        </div>

<input type="hidden" name="owner_email" id="owner_email">
<input type="hidden" name="cont_id" id="cont_id">
						<div class="row">
       <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
     <label class="label-control">
         Customer Name
     </label>
     <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-home"></i> </span>
     <input type="text" class="form-control input-lg" name="cust_name" id="cust_name"  disabled  required/>
     </div>
 </div>
       </div>
      </div>
							<div class="row w3-padding-16">
       <div class="col-sm-12 col-md-12 col-lg-12">
       <div class="form-group">
     <label class="label-control">
         Container Code
     </label>
     <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-home"></i> </span>
     <input type="text" class="form-control input-lg" name="cont_code" id="cont_code" disabled   required/>
     </div>
 </div>
       </div>
      </div>
       <div class="row">
       <div class="col-sm-12 col-md-12 col-lg-12">
       <div class="form-group">
     <label class="label-control">
         Weight
     </label>
     <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-home"></i> </span>
     <input type="number" class="form-control" name="cont_weight" id="cont_weight" disabled  required/>
     </div>
 </div>
       </div>
      </div>
       <div class="row">
       <div class="col-sm-12 col-md-12 col-lg-12">
        <label>Select Block</label>
       <select class="form-control "  name="block_nam">
  <option>Select Block</option>
  <?php
  $stmt4=$DB_con->prepare("SELECT * FROM blocks");
  $stmt4->execute();
  while($res=$stmt4->fetch(PDO::FETCH_ASSOC))
  {
   ?>
    <option value="<?php echo $res['block_name']?>"><?php echo $res['block_name']?></option>
   <?php
  }
  ?>
 
  
       </select>
       </div>
      </div>
       <div class="modal-footer">
							<button type="submit" id="block" class="button button-3d button-primary button-rounded btn-lg btn-block">Receive</button>
						 </div>
       </form>
      </div>
      
        
     
    </div>
    </div>
  </div>
</div>
                        <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Global Warehouse</a>
            </div>
    
                    
                       
                        <h2 style="text-align:center;color: #FFFFFF;font-family: cursive;" class="w3-border-theme w3-bottombar"> Welcome to <strong>Global Warehouse Authority</strong> </h2>

                   
                
        </nav>
        
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div w3-black">
                            <img src="img/admin.jpeg" class="img-circle" />

                            <div class="inner-text">
                                Administrator Panel
                            <br />
                               
                            </div>
                        </div> 

                    </li>


                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
					
					 <li class="small">
                        <a href="#" class="active"  data-id="users"><i class="fa fa-university "></i>Users</a>
                    </li>
					
					 
					<li class="small">
                        <a href="#" " data-id="pendings-cont"><i class="fa fa-usd "></i>Pending Containers</a>
                    </li>
						<li class="small">
                        <a href="#" " data-id="received"><i class="fa fa-usd "></i>Received Containers</a>
                    </li>
						<li class="small">
                        <a href="#" " data-id="blocks"><i class="fa fa-usd "></i>Blocks</a>
                    </li>
      <li class="small">
                        <a href="#" " data-id="charges"><i class="fa fa-usd "></i>Charges</a>
                    </li>
					  <li class="small">
                        <a href="#" " data-id="payed"><i class="fa fa-usd "></i>Payments</a>
                    </li>
					
						<li class="small">
                        <a href="#" " data-id="released"><i class="fa fa-usd "></i>Released Containers</a>
                    </li>
					
					 <li>
                        <a href="logout.php?logout=true"><i class="fa fa-power-off "></i>Logout</a>
                    </li>
					
			
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
           
                <!-- /. ROW  -->
               
                <!-- /. ROW  -->
   <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
      <div class="" id="tabs-content">
        <div id="users" class="profile w3-card-8 w3-padding-16" style="display:block">
          <h1 class="w3-center w3-text-green w3-bottombar w3-border-theme">Global Warehouse Registered Users</h1>
          <table class="table table-hover table-responsive">
            <tr>
              <td>Name</td>
              <td>Email</td>
              <td>Phone Number</td>
            </tr>
            <?php
            $stmt=$DB_con->prepare("SELECT * FROM users_content");
            $stmt->execute();
            while($rw=$stmt->fetch(PDO::FETCH_ASSOC))
            {
              ?>
              <tr>
                <td><?php echo $rw['first_name'] . " " . $rw['last_name']?></td>
                <td><?php echo $rw['email']?></td>
                 <td><?php echo 0 . $rw['phone_no']?></td>
              </tr>
              <?php
            }
            ?>
          </table>
        </div>
         <div id="charges" class="profile w3-padding-16">
          
          <div class="row w3-padding-left w3-padding-16">
           <div class="w3-padding-left col-sm-6 col-md-6 col-lg-6 w3-card-8 w3-padding-16">
            <h1 class="w3-center w3-text-green w3-bottombar w3-border-theme">Set Container Charges</h1>
            <form class="w3-padding-left" method="POST" id="formCharges">
             <div id="charge_errors"></div>
                      <div class="form-group w3-padding-16" style="width: 100%;">
     <label class="label-control">
         Charge Plan
     </label>
     <div class="input-group" style="width: 100%;">
      <input type="text" class="form-control input-lg" name="plan_name" placeholder="Plan Name"  required/>
     </div>
 </div>
              <div class="form-group w3-padding-16">
     <label class="label-control">
         Charges in Kshs
     </label>
     <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-home"></i> </span>
     <input type="number" class="form-control input-lg" name="plan_charge" placeholder="Charges in Kshs"  required/>
     </div>
 </div>
       <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
         <button type="submit" id="ch" class="button button-3d button-primary button-rounded btn-lg btn-block">Add Charge Plan</button>
        </div>
       </div>
            </form>
           </div>
           <div class="col-sm-6 col-lg-6 col-md-6 w3-padding-16 w3-card-8">
            <h1 class="w3-center w3-text-green w3-bottombar w3-border-theme">Set Container Charges</h1>
            <div id="fetched_charges">
             
            </div>
           </div>
          </div>
        </div>
         <div id="received" class="profile w3-card-8 w3-padding-16">
          <h1 class="w3-center w3-text-green w3-bottombar w3-border-theme">Global Warehouse Received Containers</h1>
            <div id="receive-conts">
             
            </div>
        </div>
          <div id="released" class="profile w3-card-8 w3-padding-16">
           <button class="btn btn-lg btn-success pull-right" onclick="javascript:printDiv('print-released')"  id="print">Print</button>
         <div id="print-released">
          <h1 class="w3-center w3-text-green w3-bottombar w3-border-theme">Global Warehouse Released Containers</h1>
            
            <div id="released-conts">
             
            </div>
          </div>
        </div>
          <div id="pendings-cont" class="profile w3-card-8 w3-padding-16">
          <h1 class="w3-center w3-text-green w3-bottombar w3-border-theme">Global Warehouse  Containers Pending Arrival</h1>
            <div id="admin-pendings">
             
            </div>
        </div>
                     	<div class="profile w3-padding-16 w3-card-8" id="payed">
						<div class="w3-padding-16 ">
						<h2 class="w3-xlarge w3-bottombar w3-slim w3-text-blue w3-hover-text-light-blue" style="text-align: center;">Global Warehouse Services Container Payments</h2>
					</div>
						<br>
      <div class="row">
       <div class="col-sm-12 col-md-12 col-lg-12">
        <div id="pay-cont">
         
        </div>
       </div>
      </div>
                      </div>
           	<div class="profile w3-padding-16 w3-card-8" id="blocks">
						<div class="w3-padding-16 ">
						<h2 class="w3-xlarge w3-bottombar w3-slim w3-text-light-blue w3-hover-text-blue" style="text-align: center;">Global Warehouse Services Container Blocks</h2>
					</div>
						<br>
						<a onclick="document.getElementById('id01').style.display='block'" class="waves-effect waves-light w3-button w3-circle w3-teal  w3-xxlarge" href="#modal2">+</a>
						<br>
						<br>
						<div id="block-results">

						</div>
      <!--Start w3 Modal !-->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none';" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>	<legend style="text-align: center;" class="w3-xlarge w3-slim w3-text-white w3-allerta">ADD NEW BLOCK</legend></h2>
      </header>
      <div class="w3-container w3-card-8  w3-padding-16 w3-padding-left">
        <form method="POST" id="formBlock" class="w3-padding-left">
								<div class="w3-padding-16">
								
								</div>
<div id="return">

</div>
						<div class="row">
       <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
     <label class="label-control">
         Block Name
     </label>
     <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-home"></i> </span>
     <input type="text" class="form-control input-lg" name="block_name" placeholder="Block Name"  required/>
     </div>
 </div>
       </div>
      </div>
							<div class="row w3-padding-16">
       <div class="col-sm-12 col-md-12 col-lg-12">
       <div class="form-group">
     <label class="label-control">
         No of Containers
     </label>
     <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-home"></i> </span>
     <input type="number" class="form-control input-lg" name="block_no" placeholder="No of Containers"  required/>
     </div>
 </div>
       </div>
      </div>
							<button type="submit" id="block" class="btn btn-lg btn-success w3-slim  btn-block">ADD</button>
						</form>
      </div>
     
    </div>
  </div>
					<!--End W3 Modal !-->	 
					</div>
      </div>
    </div>
   </div>
            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
      CoNTAINER FREIGHT SYSTEM Brought To You By : <a href="#" target="">David Njoroge</a>
    </div>
                </body>
        </html>
