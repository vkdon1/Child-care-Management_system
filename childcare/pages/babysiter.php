<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="image/x-icon" href="../images/favicon.png" />
	<title>Babysitter | ChildCareSystem</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/x-icon" href="../img/logo5.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
	<link rel="stylesheet" href="../css/style1.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand" href="babysiter.php"><img src="../img/logo1.png" alt="CHILDLogo" class="img-fluid" width="70px">CHILD CARE SYSTEM</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			
		  </ul>
		
		  <form class="form-inline my-2 my-lg-0">
		  <ul class="navbar-nav mr-auto mt-5 mt-lg-0">
		  <div class="nav-item active mr-3 mt-3">
        <a  href="babysiter.php"><span class="fa fa-dashboard"></span> Dashboard </a></div>
		
		<div class="nav-item active mr-3 mt-3">
		<a href="myinfobabysitter.php"><span class="fa fa-user"></span> Profile</a>
		</div>
		<div class="nav-item active mr-3 mt-3">
		<a href="request.php"><span class="fa fa-bell"></span> View Request</a>
		</div>
		<div class="nav-item active mr-3 mt-3">
		<a href="msgBabysitterToCustomer.php"><span class="fa fa-envelope"></span> View Messages</a>
		</div>
		<div class="nav-item active mr-3 mt-3">
		<a href="../php/logout.php"><span class="fa fa-sign-out"></span> Logout</a></div>
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
					$_SESSION['babysiter_profile_id'] = $row['profile_id'];
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
		<h3><a href="babysiter.php">CHILD | <span>CARE SYSTEM</span></a></h3>
		<hr>
			<h2>Dashboard</h2>

			<p>Select the module below to view the infomation of the selected module.</p>
			<div class="row ">
    <div class="col-md-3 ml-5 ">
        <div class="card p-2" style="width: 18rem;">
            <img src="../img/profile.jpg" class="card-img-top" height="200px">
			
            <div class="card-body">
                <h5 class="card-title">View Information</h5>
                <p class="card-text">You can view personal information clicking below button.</p>
                <a href="myinfobabysitter.php" class="btn btn-primary">View Information</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 ml-5 ">
        <div class="card p-2" style="width: 18rem;">
            <img src="../img/home_bg.jpg" class="card-img-top" height="200px">
            <div class="card-body">
                <h5 class="card-title">View Customer Request</h5>
                <p class="card-text">You can View customer information clicking below button.</p>
                <a href="request.php" class="btn btn-primary">View Request</a>
            </div>
        </div>
    </div> 
	<div class="col-md-3 ml-5 ">
        <div class="card p-2" style="width: 18rem;">
            <img src="../img/search_bg.jpg" class="card-img-top" height="200px">
            <div class="card-body">
                <h5 class="card-title">View Messages</h5>
                <p class="card-text">You can view customer messages by clicking below button.</p>
                <a href="msgBabysitterToCustomer.php" class="btn btn-primary">View Messages</a>
            </div>
        </div>
    </div>
	
</div>

</div>
<hr>
</body>
<div class="container d-flex justify-content-center" style="center">
<div class="footer">
					<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed & Developed by vallabh Dongre.</p>
</div>
</div>
</html>










