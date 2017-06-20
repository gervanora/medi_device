<?php 

$country_sql = "Select * FROM countries ORDER BY country_name ASC";
$country_res = $conn->query($country_sql);
$countries = mysqli_fetch_all($country_res);

$reg_body_sql = "Select * FROM regulatory_body";
$reg_body_res = $conn->query($reg_body_sql);
$reg_bodies = mysqli_fetch_all($reg_body_res);

$reg_class_sql = "Select * FROM regulatory_class";
$reg_class_res = $conn->query($reg_class_sql);
$reg_classes = mysqli_fetch_all($reg_class_res);

//main product info
if(!empty($_GET['id'])){
	$sql = "Select products.*,company.company_name FROM products LEFT JOIN company on products.company_id = company.id WHERE products.id=".$_GET['id'];
	$result = $conn->query($sql);

	if($result->num_rows > 0)
	{
		$data = $result->fetch_assoc();

		$milestones_sql = 'Select * FROM product_milestones WHERE product_id='.$_GET['id'];
		$milestone_res = $conn->query($milestones_sql);

		if ($milestone_res->num_rows > 0) {
			$milestone_data = $milestone_res->fetch_all();
		}

		$class_sql = 'Select product_classification.classification_fullname FROM product_to_classification LEFT JOIN product_classification ON product_to_classification.product_classification_id = product_classification.id WHERE product_id='.$_GET['id'];
		$class_res = $conn->query($class_sql);

		if ($class_res->num_rows > 0) {
			$classification_data = $class_res->fetch_all();
		}

		$pipeline_sql = "SELECT * FROM `pipeline_product` WHERE product_id = ".$_GET['id'];
		$pipeline_res =  $conn->query($pipeline_sql);

		$market_sql = "SELECT * FROM `market_product` WHERE product_id = ".$_GET['id'];
		$market_res =  $conn->query($market_sql);
	}
	else
		header("Location: /medi_device/index.php");
}
else{
	header("Location: /medi_device/index.php");
}

?>