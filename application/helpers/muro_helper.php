<?php

	class plantilla{

		static $instancia;

		static function inicio(){
			self::$instancia = new plantilla();
		}


		function __construct(){
	?>
		<!DOCTYPE html>
		<html lang="en">

		<head>

		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="description" content="">
		    <meta name="author" content="Zoilo Reyes">

		    <link rel="shortcut icon" href="<?php  echo base_url('base/content')?>/favicon.ico" type="image/x-icon">
		    <link rel="icon" type="image/x-icon" href="<?php  echo base_url('base/content')?>/favicon.ico">
		    <title>Muro</title>

		    <!-- Bootstrap Core CSS -->
		    <link href="<?php  echo base_url('base')?>/css/bootstrap.min.css" rel="stylesheet">

		    <!-- Custom CSS -->
		    <link href="<?php  echo base_url('base')?>/css/logo-nav.css" rel="stylesheet">
		    <script src="<?php  echo base_url('base') ?>/js/jquery.js"></script>
		     <link href="<?php  echo base_url('base')?>/css/style.css" rel="stylesheet">
		    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->



		</head>

		<body>

		    <!-- Navigation -->
		    <nav class="navbar navbar-default navbar-fixed-top bg-faded" role="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="<?php echo site_url('home')?>">
	                    <img src="<?php  echo base_url('base/content')?>/red_rooster.png" alt="" height="50" width="50">
	                </a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav">
	                    <li>
	                        <a href="<?php echo site_url('users/registration')?>">Regístrate</a>
	                    </li>
	                    <li>
	                        <a href="<?php echo site_url('users/login')?>">Inicia sesión</a>
	                    </li>
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>

	    <!-- Page Content -->
	    <div class="container">
	<?php
		}

		function __destruct(){
	?>
		<footer style="margin-top: 20px;">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Tareas@ITLA 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

		</div>
		    <!-- /.container -->

		    <!-- jQuery -->
		    <script src="<?php  echo base_url('base') ?>/js/jquery.js"></script>

		    <!-- Bootstrap Core JavaScript -->
		    <script src="<?php  echo base_url('base') ?>/js/bootstrap.min.js"></script>

		</body>

		</html>	
	<?php
		}
	}

	function cargar_mensajes(){
		$CI =& get_instance();

		$sql = "Select * from mensaje";
		$rs = $CI->db->query($sql);
		return $rs->result();
	}	 