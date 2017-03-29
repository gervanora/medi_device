<?php include 'includes/db_config.php';

if (isset($_REQUEST['term'])) {
	$query = $_REQUEST['term'];
	$sql = "Select * FROM application WHERE application LIKE '%{$query}%'";
	//$sql = "Select * FROM company";
	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc()) {
	        $data[] = array (
	            'label' => $row['application'],
	            'value' => $row['application'],
	        );
	    }

	echo json_encode ($data);

}