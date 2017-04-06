<?php 

$country_sql = "Select * FROM countries ORDER BY country_name ASC";
$country_res = $conn->query($country_sql);
$countries = mysqli_fetch_all($country_res);
?>