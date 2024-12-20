<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment Checkout Form | ChildCareSystem</title>
  <link rel="icon" type="image/x-icon" href="../img/logo5.png" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<link rel="stylesheet" href="../css/paymentStyle.css">

</head>
<body>
	
  <div class="wrapper">
  <div class="payment">
    <div class="payment-logo">
      <p>p</p>
    </div>
    
    
    <h2>Payment Online</h2>
    <div class="form">
      <form action="../php/paying.php">
        <div class="card space icon-relative">
          <label class="label">Card holder:</label>
          <input type="text" class="input" placeholder="Card name" required>
          <i class="fas fa-user"></i>
        </div>
        <div class="card space icon-relative">
          <label class="label">Card number:</label>
          <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number" required>
          <i class="far fa-credit-card"></i>
        </div>
        <div class="card-grp space">
          <div class="card-item icon-relative">
            <label class="label">Expiry date:</label>
            <input type="text" name="expiry-data" class="input" data-mask="00 / 00"  placeholder="00 / 00" required>
            <i class="far fa-calendar-alt"></i>
          </div>
          <div class="card-item icon-relative">
            <label class="label">CVC:</label>
            <input type="text" class="input" data-mask="000" placeholder="000" required>
            <i class="fas fa-lock"></i>
          </div>
        </div>
        <input class="btn" type="submit" name="pay" id="pay" value="Pay">
        <a href = "customer.php" style=" display: inline-block;
  padding: 6px 107px;
  margin-top: 10px;
  text-transform: uppercase;
  text-decoration: none;
  cursor: pointer;
  background: #red;
  text-align: center;
  color: #f8f8f8;
  transition: background-color 0.2s, border 0.2s, color 0.2;
  border-radius: 8px;" class="btn" type="submit" >Home</a>
      </form>
      
      
      
      
    </div>
  </div>
</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</body>
</html>