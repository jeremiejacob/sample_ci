<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/img/favicon.ico">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/smj-theme.css" rel="stylesheet">
    <!-- Custom style sheet for application -->
    <link href="/css/user-defined.css" rel="stylesheet">
    <link href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">SMJ Donation System</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php echo $this->authentication->get_role() ? $this->load->view('menu/' . $this->authentication->get_role(), '', TRUE) : '<li></li>'; ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if ($this->authentication->is_logged_in()): ?>
              <li><a href="/logout">Logout</a></li>
            <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      <h2><?php echo $title; ?></h2>
      <?php if ($this->session->flashdata('flash_success_message')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('flash_success_message') ?></div>
      <?php endif ?>
      <?php if ($this->session->flashdata('flash_error_message')): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('flash_error_message') ?></div>
      <?php endif ?>
      <?php echo $body; ?>
    </div><!-- /.container -->

    <!-- footer -->
    <div id="footer">
      <div class="container">
        <p class="text-muted">Copyright © SOCIAL MEDIA JAPAN CO., LTD. ALL Right Reserved.</p>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- Custom javascript for application -->
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
    <script src="/js/user-defined.js"></script>
  </body>
</html>