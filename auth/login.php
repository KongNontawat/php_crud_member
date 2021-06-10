<?php 
session_start();



?>

<?php include '../components/header.php';?>
<?php include '../CSS/login.php';?>
<div class="container">
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Tabs Titles -->

			<!-- Icon -->
			<div class="fadeIn first">
				<h3 class="title">Login</h3>
			</div>

			<!-- Login Form -->
			<form action="check_log_reg.php" method="POST">
			<?php if(isset($_GET['error'])) :?>
				<h5 class="my-3 alert alert-danger"> Invalid Gmail or Password try again.</h5>
			<?php endif; ?>
				<input type="email" id="login" class="fadeIn second" name="email" placeholder="Email" required>
				<input type="password" id="password" class="fadeIn third" name="password"
					placeholder="password" required>
				<input type="submit" name="login" class="fadeIn fourth" value="Log In"> <br>
				<a href="register.php" class="register">Create New Account?</a>
			</form>

			<!-- Remind Passowrd -->
			<div id="formFooter">
				<a class="underlineHover" href="register.php">Forgot Password?</a>
			</div>

		</div>
	</div>
</div>

<?php include '../components/footer.php';?>