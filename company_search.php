<?php include 'includes/db_config.php';

if (isset($_REQUEST['term'])) {
	$query = $_REQUEST['term'];
	$sql = "Select * FROM company WHERE company_name LIKE '%{$query}%'";
	//$sql = "Select * FROM company";
	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc()) {
	        $data[] = array (
	            'label' => $row['company_name'],
	            'value' => $row['company_name'],
	        );
	    }

	echo json_encode ($data);

}