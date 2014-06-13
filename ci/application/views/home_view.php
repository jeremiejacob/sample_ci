 <!DOCTYPE HTML>
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
		<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
		  <div class="container">
		    <div class="navbar-header">
		      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a href="../" class="navbar-brand">MyBlog</a>
		    </div>
		    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
		      <ul class="nav navbar-nav">
		        <li>
		          <a href="">Getting started</a>
		        </li>
		        <li class="active">
		          <a href="">About MyBlog</a>
		        </li>
		        <li class="active">
		          <a href="">Blog Entries</a>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		      	<li><a>Welcome, User</a></li>
		        <li><a href="/home/create_blog">Compose Blog</a></li>
		        <li><a href="/logout/logout">Logout</a></li>
		      </ul>
		    </nav>
		  </div>
		</header>
		
		
		<div>
			<ul>
				<?php foreach($results as $result): ?>
					<li>
						<?php $id = $result->id; ?>
						<?php echo anchor('home/load_blog/'.$id, $result->title , array('title' => 'The best news!')); ?>
					</li>
				<?php endforeach; ?>
			</ul>
 		</div> 

 		<div>
 			<?php echo $this->calendar->generate(); ?>
 		</div>
		
	</body>
</html>  