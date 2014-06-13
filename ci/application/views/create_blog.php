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
        <?php echo form_open('home/post_blog', array('class' => 'form-signin', 'role' => 'form')); ?>
    		  <div class="form-group">
    		    <label for="author_name">Author</label>
    		    <input name="author_name" type="text" class="form-control" id="author_name" placeholder="Enter author name" require="">
    		  </div>
    		  <div class="form-group">
    		    <label for="title_entry">Entry Title</label>
    		    <input name="title_entry" type="text" class="form-control" id="title_entry" placeholder="Enter title">
    		  </div>
    		  <div class="form-group">
    		    <label for="content">Content</label>
    		    <textarea name="content" type="text" class="form-control" id="content" placeholder="Blog content here." rows="10"></textarea>
    		  </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-default" align-text="center">Submit</button>
          </div>
  		<?php echo form_close(); ?>
      <?php echo validation_errors(); ?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>


