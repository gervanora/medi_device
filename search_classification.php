<?php include 'includes/db_config.php';

if (isset($_REQUEST['term'])) {
	$query = $_REQUEST['term'];
	$sql = "Select * FROM product_classification WHERE classification_fullname LIKE '%{$query}%'";
	//$sql = "Select * FROM company";
	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc()) {
	        $data[] = array (
	            'label' => $row['classification_fullname'],
	            'value' => $row['classification_fullname'],
	        );
	    }

	echo json_encode ($data);

}

