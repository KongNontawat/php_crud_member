<?php 



?>

<?php include '../components/header.php';?>
<?php include '../CSS/login.php';?>
<div class="container">
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Tabs Titles -->

			<!-- Icon -->
			<div class="fadeIn first">
				<h3 class="title">Register</h3>
			</div>

			<!-- Login Form -->
			<form action="check_log_reg.php" method="POST">
				<input type="text" id="login" class="fadeIn second" name="name" placeholder="User Name" required>
				<input type="email" id="login" class="fadeIn second" name="email" placeholder="Gmail" required>
				<input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
				<input type="password" id="password2" class="fadeIn third" name="password2" placeholder="Enter password" required>
				<input type="submit" name="register" class="fadeIn fourth" value="Register"> <br>
				<a href="login.php" class="login">Login ?</a>
			</form>

		</div>
	</div>
</div>

<?php include '../components/footer.php';?>