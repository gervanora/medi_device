<?php 
    include 'includes/db_config.php';

	if(!isset($_GET['id'])){ // to add order condition with $_GET['type']
		header("Location: /medi_device/index.php"); 
	}
	else{
		switch ($_GET['type']) {
			case 'product':
				$del_sql = 'Delete FROM products WHERE id='.$_GET['id'];
				$conn->query($del_sql); 
				header("Location: /medi_device/index.php"); 
				break;
			case 'company':
				$del_sql = 'Delete FROM company WHERE id='.$_GET['id'];
				$conn->query($del_sql); 
				header("Location: /medi_device/companies.php"); 
				break;
			case 'technology':
				$del_sql = 'Delete FROM product_technology WHERE id='.$_GET['id'];
				$conn->query($del_sql); 
				header("Location: /medi_device/technology.php"); 
				break;
			case 'indication':
				$del_sql = 'Delete FROM indication WHERE id='.$_GET['id'];
				$conn->query($del_sql); 
				header("Location: /medi_device/indication.php"); 
				break;
			case 'application':
				$del_sql = 'Delete FROM application WHERE id='.$_GET['id'];
				$conn->query($del_sql); 
				header("Location: /medi_device/application.php"); 
				break;
			case 'classification':
				$del_sql = 'Delete FROM product_classification WHERE id='.$_GET['id'];
				$conn->query($del_sql); 
				header("Location: /medi_device/product_classification.php"); 
				break;
			default:
				break;
		}
	}


?>