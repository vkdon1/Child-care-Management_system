<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="image/x-icon" href="../images/favicon.png" />
	<title>Result | CHILD CARE System</title>
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
		<a class="navbar-brand" href="customer.php"><img src="../img/logo1.png" alt="VBMVLogo" class="img-fluid" width="70px">CHILD CARE SYSTEM</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			
		  </ul>
		
		  <form class="form-inline my-2 my-lg-0">
		  <ul class="navbar-nav mr-auto mt-5 mt-lg-0">
		  <div class="nav-item active mr-3 mt-3">
        <a  href="customer.php"><span class="fa fa-dashboard"></span> Dashboard </a></div>
		
		<div class="nav-item active mr-3 mt-3">
		<a href="myinfo.php"><span class="fa fa-user"></span> Profile</a>
		</div>
		<div class="nav-item active mr-3 mt-3">
		<a href="babySignup.html"><span class="fa fa-book"></span> Add Child</a>
		</div>
		<div class="nav-item active mr-3 mt-3">
		<a href="childinfo.php"><span class="fa fa-book"></span> Child Info</a>
		</div>
		<div class="nav-item active mr-3 mt-3">
		<a href="search.html"><span class="fa fa-search"></span> Search</a>
		</div>
		<div class="nav-item active mr-3 mt-3">
		<a href="../php/logout.php"><span class="fa fa-sign-out"></span> Logout</a></div>
		<div class="nav-item active mr-3">
		 
		<?php
				session_start();
				if(!isset($_SESSION['customer_email_id'])){
					echo '<script>alert ("You are not logged in. Please login to enter the main page.")</script>';
					echo '<script>window.location.href="index.html"</script>';
				}
			$conn = mysqli_connect('localhost:3306', 'root', '', 'project');

			if (mysqli_connect_error()){
				die ('Connection ERROR');
			}  
			$sql = 'SELECT * FROM customer WHERE email_id = "'.$_SESSION['customer_email_id'].'"';
			$result = mysqli_query($conn, $sql);
			if(mysqli_affected_rows($conn)>0) {
				for($i = 0; $i < mysqli_num_rows($result); $i++){
					$row = mysqli_fetch_assoc($result);
					$_SESSION['customer_profile_id'] = $row['profile_id'];
					$stdid=$row['email_id'];
					$stname=$row['first_name'];
				}
			}
			?>
			<h6><span class="glyphicon glyphicon-user"></span> Customer Email: <?php 
	echo $stdid; 
      ?></h6>
	  <h6><span class="glyphicon glyphicon-user"></span> Customer Name: <?php 
	echo $stname; 
      ?></h6>
		</div>
		  </ul>


		  </form>
		</div>
	  </nav>

</head>

<body>
	<div class="container mt-4 mb-3">
		<h3><a href="customer.php">CHILD | <span>CARE SYSTEM</span></a></h3>
		<hr>
			

			<p>Select the module below to view the infomation of the selected module.</p>


	<div class="results-box">
		<?php
		$location="";
		$post="";
		if( isset($_POST['location']) ){
			$location=$_POST['location'];
		}
		if( isset($_POST['post']) ){
			$post=$_POST['post'];
		}
		try{
			$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
		}
		catch(PDOException $err){
			echo "<script>window.alert('db connection error');</script>";
			echo "<script>location.assign('../pages/search.html');</script>";
		}
		$sqlquery1="SELECT * FROM babysiter WHERE area_name like '%$location%' OR postal_code='$post'";
		$object1=$conn->query($sqlquery1);

		if($object1->rowCount()==0){

				echo "<h2> 0 results found </h2>";
		}
		else{
			$nrow = $object1->rowCount();
			echo  "<h2>$nrow Result Found </h2> <br>";
			foreach( $object1 as $row ) {
				$fname = $row['first_name'];
				$lname = $row['last_name'];
				$gender = $row['gender'];
				$salary = $row['salary'];
				$email_id = $row['email_id'];
				$area_name = $row['area_name'];
				$phone_number = $row['phone_number'];
				$profile_id = $row['profile_id'];

				echo '<table class="table table-hover table-borderless">
				<thead>
				  <tr>
					<th scope="col">Babysitter Name</th>
					<th scope="col">Gender</th>
					<th scope="col">Expected Salary</th>
					<th scope="col">Location</th>
					<th scope="col">Email Id </th>
					<th scope="col">Contact</th>
				
				  </tr>
				  <tr>
				   <th scope="col">'.$fname.' '.$lname.'</th>
					<th scope="col">'.$gender.'</th>
					<th scope="col">'.$salary.' Salary</th>
					<th scope="col">'.$area_name.'</th>
					<th scope="col">'.$email_id.'</th>
					<th scope="col">'.$phone_number.'</th>
				</tr>
				<tr><td><div class="show-result"> 
				<form action="profile_info.php" method="post">
				   <h7> <input type="submit" value= "Book Now"></h7>
				   <p><input type="hidden" name="email_id" id="email_id" value="'.$email_id.'"> 
				   <input type="hidden" name="profile_id" id="profile_id" value="'.$profile_id.'"></p><br>
				</form>
		   </div><td></tr>
				</thead>
				</table>';
			}
		}
		?>
		<center><a href = "customer.php" style="font-size: 1.1rem "> Back to Home</center>
	</div>
</body>
</html>