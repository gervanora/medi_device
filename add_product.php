<?php 
include 'includes/header.php';
echo "Below is the data you entered";

echo "<pre>";
print_r($_POST);
echo "</pre>";

$product_main = array();

//fetch company id
$company_sql = 'Select id from company WHERE company_name = "'.$_POST['company_name'].'"';
$company = $conn->query($company_sql);
if($company->num_rows > 0){
	$company_id = $company->fetch_assoc();
	$company_id = $company_id['id'];
	$product_main['company_id'] = $company_id; 
}
else{
	$sql = "INSERT INTO company (company_name) VALUES ('".$_POST['company_name']."')";
	$conn->query($sql);
	$company_id = mysqli_insert_id($conn);
	$product_main['company_id'] = $company_id; 
}

//fetch product brand id
$brand_sql = 'Select id from brand WHERE brand_name = "'.$_POST['brand_name'].'"';
$brand = $conn->query($brand_sql);
if($brand->num_rows > 0){
	$brand_id = $brand->fetch_assoc();
	$brand_id = $brand_id['id'];
	$product_main['brand_id'] = $brand_id; 
}
else{
	$sql = "INSERT INTO brand (brand_name) VALUES ('".$_POST['brand_name']."')";
	$conn->query($sql);
	$brand_id = mysqli_insert_id($conn);
	$product_main['brand_id'] = $brand_id; 
}

//fetch indication
$indication_sql = 'Select id from indication WHERE indication_name = "'.$_POST['indication'].'"';
$indication = $conn->query($indication_sql);
if($indication->num_rows > 0){
	$indication_id = $indication->fetch_assoc();
	$indication_id = $indication_id['id'];
	$product_main['indication_id'] = $indication_id; 
}
else{
	$sql = "INSERT INTO indication (indication_name) VALUES ('".$_POST['indication']."')";
	$conn->query($sql);
	$indication_id = mysqli_insert_id($conn);
	$product_main['indication_id'] = $indication_id; 
}

//fetch indication
$application_sql = 'Select id from application WHERE application = "'.$_POST['application'].'"';
$application = $conn->query($application_sql);
if($application->num_rows > 0){
	$application_id = $application->fetch_assoc();
	$application_id = $application_id['id'];
	$product_main['application_id'] = $application_id; 
}
else{
	$sql = "INSERT INTO application (application) VALUES ('".$_POST['application']."')";
	$conn->query($sql);
	$application_id = mysqli_insert_id($conn);
	$product_main['application_id'] = $application_id; 
}


$product_main['university_pipelined'] = $_POST['prod_type_1'];
$product_main['alias_name'] = $_POST['product_alias'];
$product_main['generic_name'] = $_POST['generic_name'];
$product_main['profile_status'] = $_POST['profile_status'];

//pipeline or marketed
//product technology

$product_main['product_description'] = $_POST['product_description'];
$product_main['product_tech_description'] = $_POST['technology_description'];
$product_main['product_specification'] = $_POST['product_specification'];
$product_main['product_sources'] = $_POST['product_source'];

//product main insert query

$product_id = 1; //last insert id

for($i = 0;$i<count($_POST['classifications']);$i++){
	$classification['product_id'] = $product_id;
	$classification['product_classification_id'] = $product_id$_POST['classifications'][$i];
	//insert query
	
}  

print_r($product_main);

die;
?>