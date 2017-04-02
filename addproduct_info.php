<?php 

$country_sql = "Select * FROM countries";
$country_res = $conn->query($country_sql);
$countries = mysqli_fetch_all($country_res);
?>