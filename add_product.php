<?php 

include 'includes/header.php';

//echo "Below is the data you entered";

/*echo "<pre>";

print_r($_POST);

echo "</pre>";*/



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

$brand_sql = 'Select brand_name from brand WHERE brand_name = "'.$_POST['brand_name'].'"';

$brand = $conn->query($brand_sql);

if($brand->num_rows > 0){

	$brand_id = $brand->fetch_assoc();

	$brand_id = $brand_id['brand_name'];

	$product_main['brand_name'] = $brand_id; 

}

else{

	$sql = "INSERT INTO brand (brand_name) VALUES ('".$_POST['brand_name']."')";

	$conn->query($sql);

	//$brand_id = mysqli_insert_id($conn);

	$product_main['brand_name'] = $_POST['brand_name']; 

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



//fetch application

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

$product_main['pipelined_marketed'] = $_POST['prod_type_2'];



//product technology



$product_main['product_description'] = $_POST['product_description'];

$product_main['product_tech_description'] = $_POST['technology_description'];

$product_main['product_specification'] = $_POST['product_specification'];

$product_main['product_sources'] = $_POST['product_source'];

$product_main['function_data'] = $_POST['function_data'];



$product_main['user_id'] = $_SESSION['user_id'];

$product_main['approval_status'] = 0;

$product_main['created'] = date('Y-m-d H:i:s');

$product_main['modified'] = date('Y-m-d H:i:s');



$product_main['product_developing'] = $_POST['product_developing'];

$product_main['development_partners'] = $_POST['development_partners'];



//echo "dsvds";

//print_r($product_main); die;

//product main insert query  



//echo "INSERT INTO products (university_pipelined,alias_name,generic_name,profile_status,pipelined_marketed,product_description,product_tech_description,product_specification,product_sources,company_id,brand_name,indication_id,application_id) VALUES ('".$product_main['university_pipelined']."','".$product_main['alias_name']."','".$product_main['generic_name']."','".$product_main['profile_status']."','".$product_main['pipelined_marketed']."','".$product_main['product_description']."','".$product_main['product_tech_description']."','".$product_main['product_specification']."','".$product_main['product_sources']."',".$product_main['company_id'].",".$product_main['brand_name'].",".$product_main['indication_id'].",".$product_main['application_id'].")";



$product_insert = "INSERT INTO products (university_pipelined,alias_name,generic_name,profile_status,pipelined_marketed,product_description,product_tech_description,product_specification,product_sources,company_id,brand_name,indication_id,application_id,user_id,approval_status,created,modified,product_developing,development_partners,function_data) VALUES ('".$product_main['university_pipelined']."','".$product_main['alias_name']."','".$product_main['generic_name']."','".$product_main['profile_status']."','".$product_main['pipelined_marketed']."','".$product_main['product_description']."','".$product_main['product_tech_description']."','".$product_main['product_specification']."','".$product_main['product_sources']."',".$product_main['company_id'].",'".$product_main['brand_name']."',".$product_main['indication_id'].",".$product_main['application_id'].",".$product_main['user_id'].",".$product_main['approval_status'].",'".$product_main['created']."','".$product_main['modified']."','".$product_main['product_developing']."','".$product_main['development_partners']."','".$product_main['function_data']."')";



$conn->query($product_insert);

$product_id = mysqli_insert_id($conn);





for($i = 0;$i<count($_POST['classifications']);$i++){

	$classification['product_id'] = $product_id;

	$classification['product_classification_id'] = $_POST['classifications'][$i];



$classification_insert = "INSERT INTO product_to_classification(product_id,product_classification_id) VALUES(".$classification['product_id'].",".$classification['product_classification_id'].")";

$conn->query($classification_insert);



}  



for($j = 0;$j<count($_POST['technologies']);$j++){

	$technology['product_id'] = $product_id;

	$technology['product_technology_id'] = $_POST['technologies'][$j];



$technology_insert = "INSERT INTO product_to_technology(product_id,product_technology_id) VALUES(".$technology['product_id'].",".$technology['product_technology_id'].")";

$conn->query($technology_insert);



}  



$m = 1;



while(!empty($_POST['Milestonetitle_'.$m])){

    $milestone_query = "INSERT INTO product_milestones(product_id,milestone_title,milestone_date,milestone_type) VALUES(".$product_id.",'".$_POST['Milestonetitle_'.$m]."','".$_POST['Milestonedate_'.$m]."','".$_POST['Milestonetype_'.$m]."')";

	$conn->query($milestone_query);

	$m++;

}



if($product_main['pipelined_marketed'] == "Markets"){



	foreach ($_POST['market_data'] as $market_data) {

		//echo "INSERT INTO market_product(product_id,approved_country,regulatory_body,510_num,pma_num,510_mod_num,pma_mod_num,submission_date,approval_date,launch_date) VALUES(".$product_id.",".$market_data['approved_country'].",'".$market_data['country_reg_body']."','".$market_data['510k_num']."','".$market_data['pma_num']."','".$market_data['510k_mod_num']."','".$market_data['pma_mod_num']."','".$market_data['submission_date']."','".$market_data['approval_date']."','".$market_data['launch_date']."')";

		$markets_insert = "INSERT INTO market_product(product_id,approved_country,regulatory_body,510_num,pma_num,510_mod_num,pma_mod_num,submission_date,approval_date,launch_date) VALUES(".$product_id.",'".$market_data['approved_country']."','".$market_data['country_reg_body']."','".$market_data['510k_num']."','".$market_data['pma_num']."','".$market_data['510k_mod_num']."','".$market_data['pma_mod_num']."','".$market_data['submission_date']."','".$market_data['approval_date']."','".$market_data['launch_date']."')";

		$conn->query($markets_insert);

	}

}

elseif ($product_main['pipelined_marketed'] == "Pipeline") {

	foreach ($_POST['pipeline_data'] as $pipeline_data) {

		$pipeline_data['estimated_approval'] = $pipeline_data['estimated_approval'].'-01';

		$pipeline_data['estimated_launch'] = $pipeline_data['estimated_launch'].'-01';

		$pipeline_insert = "INSERT INTO pipeline_product(product_id,country_reg_body,developing_country,approved_other,estimated_approval,estimated_launch,device_class,analyst_notes,highest_stage_development) VALUES(".$product_id.",'".$pipeline_data['country_reg_body']."','".$pipeline_data['pipeline_country']."','".$pipeline_data['approved_country']."','".$pipeline_data['estimated_approval']."','".$pipeline_data['estimated_launch']."','".$pipeline_data['device_class']."','".$pipeline_data['AnalystNotes']."','".$pipeline_data['highest_stage_development']."')";

		$conn->query($pipeline_insert);

	}

}



header("Location: view_product.php?id=".$product_id); 

?>

<?php include 'includes/footer.php'; ?>