<html>
	<head>
		<title><?php print (isset($title) ? $title : 'playground') ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">

	     <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->

		
		<!--link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/text.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/960.css" /-->

		<link rel="stylesheet" type="text/css" media="all" href="/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="/css/bootstrap-responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="/css/ie.css" />
	</head>

	<body>

	<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Playground</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="/">Home</a></li>
              <li><a href="http://laravel.local/">Laravel</a></li>
              <li><a href="/canvas">Canvas</a></li>
              <li><a href="/fileSystem/">File API</a></li>
              <li><a href="/blueimp">File Upload</a></li>
              <li><a href="#mongo">Mongo</a></li>
              <li><a href="http://localhost:4000/todos">Geddy</a></li>
              <li><a href="/misc/domainSetup.php">Domain Setup</a></li>
              <li><a href="/handlebars/">Handlebars</a></li>
              <li><a href="/maps/">amMaps</a></li>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container" style="margin-top:5em">
