<!DOCTYPE HTML>
<html>
	<head>
		<title>Log-in</title>
	</head>
	<body>
		<div>
			<h1>Login</h1>
			<?php 
				if($login){
					echo validation_errors(); 
				}
			?>
			<?php echo form_open('login/check_login'); ?>

			Username: <br/>
			<input type="text" name="username" /><br/>

			Password: </br>
			<input type="password" name="password" /><br/>

			<input type="submit" value="Login" name="submit" />

			
			</form>
		</div> 
			<hr />
		<div>
			<h1>SignUp</h1>

			<?php 
				if(!$login){
					echo validation_errors(); 
				}
			?>
			<?php echo form_open('login/check_signup_data'); ?>
			
			First Name: <br/>
			<input type="text" name="firstname" /><br/>
			
			Last Name: </br>
			<input type="text" name="lastname" /><br/>

			Email: </br>
			<input type="text" name="email" /><br/>

			Password: </br>
			<input type="password" name="password" /><br/>
			
			<input type="submit" value="SignUp" name="submit" />
			</form>
		</div> 
	</body>
</html>  