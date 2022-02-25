<?php 
session_start();
include('inc/header.php');
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers($_POST['email'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['user'] = $user[0]['first_name']."".$user[0]['last_name'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];		
		$_SESSION['address'] = $user[0]['address'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		// header("Location:invoice_list.php");
		header("Location:nouislider.php");
	} else {
		$loginError = "Invalid email or password!";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="css/style.css" rel="stylesheet">
	<style>
		.heading  {
			margin-top: 50px;
		}

		.red {
			color: red;
		}
	</style>
</head>
<body style="background-image: url(http://mmopilot.oesman.id/wp-content/themes/gamehoak/images/codezeel/body-bg.jpg);">
<?php include('inc/container.php');?>
<div class="row heading">	
	<!-- <div class="demo-heading ">
		<h2>Login (Validasi User di Invoice) </h2>
	</div> -->
	<div class="login-form">		
		<h4>Invoice User Login:</h4>		
		<form method="post" action="">
			<div class="form-group">
			<?php if ($loginError ) { ?>
				<div class="alert alert-warning"><?php echo $loginError; ?></div>
			<?php } ?>
			</div>
			<div class="form-group">
				<input name="email" id="email" type="email" class="form-control" placeholder="Email address" autofocus="" required>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="pwd" placeholder="Password" required>
			</div>  
			<div class="form-group">
				<button type="submit" name="login" class="btn btn-info">Login</button>
			</div>
		</form>
		<br>
		<p><b>Email</b> : mmopilot@gmail.com<br><b>Password</b> : 12345</p>	
		<p class="red"><i>untuk validasi invoice pas checkout</i></p>		
	</div>		
</div>		
</div>
<?php include('inc/footer.php');?>
</body>
</html>

<!-- <title>Login</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('inc/container.php');?>
<div class="row">	
	<div class="demo-heading">
		<h2>Login (Ini Untuk Input DB User yang mau Checkout) </h2>
	</div>
	<div class="login-form">		
		<h4>Invoice User Login:</h4>		
		<form method="post" action="">
			<div class="form-group">
			<?php if ($loginError ) { ?>
				<div class="alert alert-warning"><?php echo $loginError; ?></div>
			<?php } ?>
			</div>
			<div class="form-group">
				<input name="email" id="email" type="email" class="form-control" placeholder="Email address" autofocus="" required>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="pwd" placeholder="Password" required>
			</div>  
			<div class="form-group">
				<button type="submit" name="login" class="btn btn-info">Login</button>
			</div>
		</form>
		<br>
		<p><b>Email</b> : mmopilot@gmail.com<br><b>Password</b> : 12345</p>			
	</div>		
</div>		
</div>
<?php include('inc/footer.php');?> -->