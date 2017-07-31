<?php 

$country_sql = "Select * FROM countries ORDER BY country_name ASC";

$country_res = $conn->query($country_sql);

while($row = $country_res->fetch_row()){
	$countries[] = $row;
}
 

$reg_body_sql = "Select * FROM regulatory_body";

$reg_body_res = $conn->query($reg_body_sql);

while($row = $reg_body_res->fetch_row()){
	$reg_bodies[] = $row;
}


$reg_class_sql = "Select * FROM regulatory_class";

$reg_class_res = $conn->query($reg_class_sql);

while($row = $reg_class_res->fetch_row()){
	$reg_classes[] = $row;
}



//main product info

if(!empty($_GET['id'])){

	$sql = "Select products.*,company.company_name,indication.indication_name,application.application FROM products LEFT JOIN company on products.company_id = company.id LEFT JOIN indication on products.indication_id = indication.id LEFT JOIN application on products.application_id = application.id WHERE products.id=".$_GET['id'];

	$result = $conn->query($sql);



	if($result->num_rows > 0)

	{

		$data = $result->fetch_assoc();



		$milestones_sql = 'Select * FROM product_milestones WHERE product_id='.$_GET['id'];

		$milestone_res = $conn->query($milestones_sql);



		if ($milestone_res->num_rows > 0) {

			while($row = $milestone_res->fetch_row()){
				$milestone_data[] = $row;
			}

		}



		$class_sql = 'Select product_classification.id,product_classification.classification_name,product_classification.classification_fullname FROM product_to_classification LEFT JOIN product_classification ON product_to_classification.product_classification_id = product_classification.id WHERE product_id='.$_GET['id'];

		$class_res = $conn->query($class_sql);



		if ($class_res->num_rows > 0) {

			while($row = $class_res->fetch_row()){
				$classification_data[] = $row;
			}

		}



		$tech_sql = 'Select product_technology.id,product_technology.technology FROM product_to_technology LEFT JOIN product_technology ON product_to_technology.product_technology_id = product_technology.id WHERE product_id='.$_GET['id'];

		$tech_res = $conn->query($tech_sql);



		if ($tech_res->num_rows > 0) {

            while($row = $tech_res->fetch_row()){
				$technology_data[] = $row;
			}
		}



		$pipeline_sql = "SELECT * FROM `pipeline_product` WHERE product_id = ".$_GET['id'];

		$pipeline_res =  $conn->query($pipeline_sql);



		$market_sql = "SELECT * FROM `market_product` WHERE product_id = ".$_GET['id'];

		$market_res =  $conn->query($market_sql);

	}

	else

		header("Location: medi_device/index.php");

}

else{

	header("Location: medi_device/index.php");

}



?>