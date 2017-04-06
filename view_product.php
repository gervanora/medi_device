<?php include 'includes/header.php';
 	$sql = "Select * FROM products WHERE id=".$_GET['id'];
	$result = $conn->query($sql);

	$data = $result->fetch_assoc();

	print_r($data);

?>
<?php include 'includes/footer.php'; ?>