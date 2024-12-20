<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://use.fontawesome.com/d1341f9b7a.js"></script>
    <link rel="stylesheet" href="../css/profileinfoStyle.css">
	<link rel="icon" type="image/x-icon" href="../img/logo5.png" />
    <title>Personal Information | ChildCareSystem</title>
  </head>
  <body>
		<div class="box">
		  <img src="../img/profile.jpg" alt="" class="box-img">
		  
		  <?php
		  		session_start();
				$babysiter_profile_id = $_SESSION['babysitter_profile_id'];
				$babysiter_email_id = $_SESSION['babysiter_email_id'];
		  		
			try{
				$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
			}
			catch(PDOException $err){
				echo "<script>window.alert('db connection error');</script>";
				echo "<script>location.assign('../pages/search.html');</script>";
			}

			$sqlquery1="SELECT * FROM babysiter WHERE email_id='$babysiter_email_id' AND profile_id='$babysiter_profile_id'";
			$object1=$conn->query($sqlquery1);

			if($object1->rowCount()==1){

				foreach( $object1 as $row ){
				$pro_id = $row['profile_id'];
				$fname = $row['first_name'];
				$lname = $row['last_name'];
				$gender = $row['gender'];
				$salary = $row['salary'];
				$email_id = $row['email_id'];
				$phone_number = $row['phone_number'];
				$area_name = $row['area_name'];
				$bank = $row['bank_name'];

				echo '<form action="babysiter.php">
						<h1>'.$fname.' '. $lname.'</h1><br><br>
						<p>
							<span class="other-info">Gender  :  '.$gender.'</span><br>
							<span class="other-info">Location  :  '.$area_name.'</span><br>
							<span class="other-info">Contact  :  '.$phone_number.'</span><br>
							<span class="other-info">E-mail  :  '.$email_id.'</span><br>
							<span class="other-info">Bank  :  '.$bank.'</span><br>
						</p>
						<input class="btn" type="submit" name="booking" id="booking" value="home">
					</form>';

				}
				 
			}
			else{

				echo " 0 results found";

			}

		?>

		<ul>
			<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
		</ul>
		</div>
</body>
</html>
