<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://use.fontawesome.com/d1341f9b7a.js"></script>
    <link rel="stylesheet" href="../css/profileinfoStyle.css">
	<link rel="icon" type="image/x-icon" href="../img/logo5.png" />
    <title>Personal WebSite</title>
  </head>
  <body>
		<div class="box">
		  <img src="../img/profile.jpg" alt="" class="box-img">
		  
		  <?php
		  		$email_id ="";
				$profile_id ="";
				if( isset($_POST['email_id']) ){
					$email_id=$_POST['email_id'];
				}
				if( isset($_POST['profile_id']) ){
					$profile_id=$_POST['profile_id'];
				}
			try{
				$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
			}
			catch(PDOException $err){
				echo "<script>window.alert('db connection error');</script>";
				echo "<script>location.assign('../pages/search.html');</script>";
			}

			$sqlquery1="SELECT * FROM babysiter WHERE email_id='$email_id' AND profile_id='$profile_id'";
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

				echo '<form action="../php/booking.php" method="post">
						<h1>'.$fname.' '. $lname.'</h1>
						<h5>Babysitter - Care for your child</h5>
						<p>
							<span class="other-info">Gender  :  '.$gender.'</span><br>
							<span class="other-info">Location  :  '.$area_name.'</span><br>
							<span class="other-info">Contact  :  '.$phone_number.'</span><br>
							<span class="other-info">E-mail  :  '.$email_id.'</span><br>
							<span class="other-info">Bank  :  '.$bank.'</span><br>
						</p>
						<input type="hidden" name="email_id" id="email_id" value="'.$email_id.'">
						<input type="hidden" name="profile_id" id="profile_id" value="'.$pro_id.'">
						<input class="btn" type="submit" name="booking" id="booking" value="booking">
						<a href ="customer.php" style=" display: inline-block;
						padding: 8px 100px;
					  
						margin-bottom: 20px;
						word-spacing: 4px;
						letter-spacing: 3px;
					  
						font-weight: lighter;
						text-decoration: none;
						text-transform: uppercase;
						border-radius: 200px;
						transition: background-color 0.2s, border 0.2s, color 0.2;
					  cursor: pointer;
						/*we can maek another class*/
						background-color: transparent;
						color: #fff;
						border: 1px solid #fff;" name="booking" id="booking" > Home</a>
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
