<!DOCTYPE html>

<html>

	<head>

		<title>Medical Device Database System</title>

		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="css/styles.css">

		<link rel="stylesheet" type="text/css" href="css/jquery.steps.css">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

		<script src="js/jquery.min.js" ></script>

		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

		<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js'></script>

		<script type="text/javascript" src='js/jquery.steps.js'></script>

		<script type="text/javascript" src='js/typeahead.js'></script>

		<script src="js/ckeditor/ckeditor.js"></script>	

	</head>

	<body>

	 	<div class="header">Medical Device Database System

        <div class='admin_menu'>

        	<ul>

        		<li><a href="index.php">Home</a></li>

				<li><a href="login.php">Login</a></li>

			</ul>

		</div>

	 	</div>

<?php include dirname(__FILE__).'/db_config.php';

	  session_start();

	  //$userid=$_SESSION['user_id'];

	  

?>