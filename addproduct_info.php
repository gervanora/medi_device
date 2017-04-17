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

?>