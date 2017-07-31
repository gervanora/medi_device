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


?>