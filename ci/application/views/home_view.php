 <!DOCTYPE HTML>
<html>
	<head>
		<title>Log-in</title>
	</head>
	<body>
		<div>
			<h1>Welcome to MyBlog!</h1> 
			<a href="/home/logout">Logout</a><br/>

			<input type="submit" value="Create Blog" name="submit" />

			<ul>
				<?php foreach($results as $result): ?>
					<li>
						echo anchor('home/load_blog/', <?php echo $result->title; ?>, array('title' => 'The best news!'));
					</li>
				<?php endforeach; ?>
			</ul>
 
		</div> 
	</body>
</html>  