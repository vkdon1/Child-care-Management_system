<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="image/x-icon" href="../images/favicon.png" />
	<title>Child Info | Child Care System</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/x-icon" href="../img/logo5.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
	<link rel="stylesheet" href="../../css/style1.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand" href="../babysiter.php"><img src="../../img/logo1.png" alt="CHILDLogo" class="img-fluid" width="70px">CHILD CARE SYSTEM</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			
		  </ul>
		
		  <form class="form-inline my-2 my-lg-0">
		  <ul class="navbar-nav mr-auto mt-5 mt-lg-0">
		  <div class="nav-item active mr-3 mt-3">
        <a  href="../babysiter.php"><span class="fa fa-dashboard"></span> Dashboard </a></div>
		
		<div class="nav-item active mr-3 mt-3">
		<a href="../myinfobabysitter.php"><span class="fa fa-user"></span> Profile</a>
		</div>
		<div class="nav-item active mr-3 mt-3">
		<a href="../request.php"><span class="fa fa-bell"></span> View Request</a>
		</div>
		<div class="nav-item active mr-3 mt-3">
		<a href="../msgBabysitterToCustomer.php"><span class="fa fa-envelope"></span> View Messages</a>
		</div>
		<div class="nav-item active mr-3 mt-3">
		<a href="../../php/logout.php"><span class="fa fa-sign-out"></span> Logout</a></div>
		<div class="nav-item active mr-3">
		 
		<?php
				session_start();
				if(!isset($_SESSION['babysiter_email_id'])){
					echo '<script>alert ("You are not logged in. Please login to enter the main page.")</script>';
					echo '<script>window.location.href="index.html"</script>';
				}
			$conn = mysqli_connect('localhost:3306', 'root', '', 'project');

			if (mysqli_connect_error()){
				die ('Connection ERROR');
			}  
			$sql = 'SELECT * FROM babysiter WHERE email_id = "'.$_SESSION['babysiter_email_id'].'"';
			$result = mysqli_query($conn, $sql);
			if(mysqli_affected_rows($conn)>0) {
				for($i = 0; $i < mysqli_num_rows($result); $i++){
					$row = mysqli_fetch_assoc($result);
					$_SESSION['babysitter_profile_id'] = $row['profile_id'];
					$stdid=$row['email_id'];
					$stname=$row['first_name'];
                    $stname1=$row['last_name'];
				}
			}
			?> <h6><span class="glyphicon glyphicon-user"></span> Babysitter Name: <?php 
            echo $stname . " " . $stname1; 
        ?></h6>
			<h6><span class="glyphicon glyphicon-user"></span> Babysitter Email: <?php 
	echo $stdid; 
      ?></h6>
	 
		</div>
		  </ul>


		  </form>
		</div>
	  </nav>

</head>

<body>
	<div class="container mt-4 mb-3">
		<h3><a href="../babysiter.php">CHILD | <span>CARE SYSTEM</span></a></h3>
		<hr>
			

			
<br>
        <?php 
            $customerprofile_id = $_POST['profile_id'];
            $customeremail_id = $_POST['email_id'];

            

            $_SESSION['receiver_customer_id'] = $customerprofile_id;
            $_SESSION['receiver_customer_email'] = $customeremail_id;
            echo "<p>Message to Customer Mail id - <h6>$customeremail_id </h6></p>";
        
        ?>
        <div class="clearfix box">
            
            <div id="msgbox" class="msg-box"></div>
            <input type="text" id="content" class="msg-input"  style="width: 1045px" ><input class="btn ml-2 mb-2" id="btn" type="submit" value="send" onclick="insertdata();">

        </div>
        <script>
            var input = document.getElementById("content");
            input.addEventListener("keyup", function(event) {
              if (event.keyCode === 13) {
               event.preventDefault();
               document.getElementById("btn").click();
              }
            });
        </script>
        <script>
        function drawmsgbox(){
            var req=new XMLHttpRequest();
            
            req.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    document.getElementById("msgbox").innerHTML=this.responseText;
                }
            }
            req.open("POST","readmsg.php");
            req.send();
        }
        drawmsgbox();
        setInterval(drawmsgbox, 2000);
        function insertdata(){
            var content=document.getElementById("content").value;
            document.getElementById("content").value = '';

            var req=new XMLHttpRequest();
            
            req.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    console.log("message sent successfully");
                }
            }
            
            var formdata=new FormData();
            
            formdata.append("content",content);
            
            req.open("POST","updatemsg.php");
            req.send(formdata);
        }
        
        </script>
         </div>
        
        <center><a href = "../babysiter.php" style="font-size: 1.1rem "> Back to Home</a></center>
    </body><div class="container d-flex justify-content-center mt-4" style="center">
    <div class="footer">
                        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed & Developed by vallabh dongre.</p>
    </div>
    </div>
    </html>
    