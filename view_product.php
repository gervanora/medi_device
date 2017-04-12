<?php include 'includes/header.php';
 	$sql = "Select products.*,company.company_name FROM products LEFT JOIN company on products.company_id = company.id WHERE products.id=".$_GET['id'];
	$result = $conn->query($sql);

	$data = $result->fetch_assoc();
	//print_r($data);

	$milestones_sql = 'Select * FROM product_milestones WHERE product_id='.$_GET['id'];
	$milestone_res = $conn->query($milestones_sql);

	if ($milestone_res->num_rows > 0) {
		$milestone_data = $milestone_res->fetch_all();
	}

	$class_sql = 'Select product_classification.classification_fullname FROM product_to_classification LEFT JOIN product_classification ON product_to_classification.product_classification_id = product_classification.id WHERE product_id='.$_GET['id'];
	$class_res = $conn->query($class_sql);

	if ($class_res->num_rows > 0) {
		$classification_data = $class_res->fetch_all();
	}

?>
<div class="content">
	<h3>Product View Page</h3>
	<div><?php echo $data['brand_name']; ?></div>
	<div><?php echo $data['company_name']; ?></div>
	<div><?php echo $data['development_partners']; ?></div>
	<?php if(!empty($classification_data)){ ?>
	<div>
		<strong>Taxonomy</strong>
		<table border="1" width="100%">
			<thead>
				<td>&nbsp;</td>
			</thead>
			<tbody>
				<?php foreach ($classification_data as $classification) { ?>
					<tr>
						<td><?php echo $classification[0]; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<?php } ?>
	<?php if(!empty($milestone_data)){ ?>
	<div>
		<strong>Milestones</strong>
		<table border="1" width="100%">
			<thead>
				<td>Title</td>
				<td>Type</td>
				<td>Date</td>
			</thead>
			<tbody>
				<?php foreach ($milestone_data as $milestone) { ?>
					<tr>
						<td><?php echo $milestone[2]; ?></td>
						<td><?php echo $milestone[4]; ?></td>
						<td><?php echo $milestone[3]; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<?php } ?>
	<div><?php echo $data['product_description']; ?></div>
    <div>Technologies</div>
    <div><?php echo $data['product_tech_description']; ?></div>
    <div><?php echo $data['product_specification']; ?></div>
    <div><?php echo $data['product_sources']; ?></div>
</div>

<?php include 'includes/footer.php'; ?>