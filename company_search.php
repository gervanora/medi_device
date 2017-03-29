<?php include 'includes/db_config.php';

if (isset($_REQUEST['query'])) {
	$query = $_REQUEST['query'];
	$sql = "Select * FROM company WHERE company_name LIKE '%{$query}%'";
	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc()) {
	        $data[] = array (
	            'label' => $row['company_name'],
	            'value' => $row['id'],
	        );
	    }

	echo json_encode ($data);

}