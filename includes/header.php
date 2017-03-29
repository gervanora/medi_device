<!DOCTYPE html>
<html>
	<head>
		<title>Medical Device Database System</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.steps.css">
		<script src="js/jquery.min.js" ></script>
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
	        	<li><a href="addproduct_form.php">Add Products</a></li>
				<li><a href="companies.php">Companies</a></li>
				<li><a href="brand.php">Brands</a></li>
				<li><a href="#">Product Classifications</a></li>
				<li><a href="#">Product Technology</a></li>
				<li><a href="indication.php">Indication</a></li>
				<li><a href="application.php">Application</a></li>
			</ul>
		</div>
	 	</div>
<?php include 'db_config.php'; ?>