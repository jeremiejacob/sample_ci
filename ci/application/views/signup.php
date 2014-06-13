<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/img/favicon.ico">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<div class="container">
	      <?php echo form_open('signup/check_signup_data', array('class' => 'form-signin', 'role' => 'form')); ?>
	        <h2 class="form-signin-heading"><?php echo 'Create an account.'; ?></h2>
	        <?php echo form_input(array('name' => 'firstname', 'id' => 'firstname', 'value' => set_value('firstname'), 'class' => 'form-control', 'placeholder' => 'Firstname')); ?>
	        <?php echo form_input(array('name' => 'lastname', 'id' => 'lastname', 'value' => set_value('lastname'), 'class' => 'form-control', 'placeholder' => 'Lastname')); ?>
	        <?php echo form_input(array('name' => 'username', 'id' => 'username', 'value' => set_value('username'), 'class' => 'form-control', 'placeholder' => 'Email/Username')); ?>
	        <?php echo form_password(array('name' => 'password', 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')); ?>
	        <?php echo form_submit('signup', ' Sign up', 'class="btn btn-primary btn-lg btn-block"'); ?>
	      <?php echo form_close(); ?>
	      <?php echo validation_errors(); ?>
	</div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>