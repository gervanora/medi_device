<?php include 'includes/header.php';

 	$sql = "Select products.*,company.company_name,indication.indication_name,application.application FROM products LEFT JOIN company on products.company_id = company.id LEFT JOIN indication on products.indication_id = indication.id LEFT JOIN application on products.application_id = application.id WHERE products.id=".$_GET['id'];

	$result = $conn->query($sql);



	$data = $result->fetch_assoc();

	

	$milestones_sql = 'Select * FROM product_milestones WHERE product_id='.$_GET['id'];

	$milestone_res = $conn->query($milestones_sql);



	if ($milestone_res->num_rows > 0) {

		while($row = $milestone_res->fetch_row()){
				$milestone_data[] = $row;
			}

	}



	$class_sql = 'Select product_classification.classification_fullname FROM product_to_classification LEFT JOIN product_classification ON product_to_classification.product_classification_id = product_classification.id WHERE product_id='.$_GET['id'];

	$class_res = $conn->query($class_sql);



	if ($class_res->num_rows > 0) {

		while($row = $class_res->fetch_row()){
				$classification_data[] = $row;
			}
	}



	$tech_sql = 'Select product_technology.id,product_technology.technology FROM product_to_technology LEFT JOIN product_technology ON product_to_technology.product_technology_id = product_technology.id WHERE product_id='.$_GET['id'];

	$tech_res = $conn->query($tech_sql);



	if ($tech_res->num_rows > 0) {

		while($row = $tech_res->fetch_row()){
				$technology_data[] = $row;
			}

	}



	$pipeline_sql = "SELECT * FROM `pipeline_product` WHERE product_id = ".$_GET['id'];

	$pipeline_res =  $conn->query($pipeline_sql);



	$market_sql = "SELECT * FROM `market_product` WHERE product_id = ".$_GET['id'];

	$market_res =  $conn->query($market_sql);



?>

<div class="content product_view">

	<h3>Product Details</h3>

	<div id="brand_name"><?php echo $data['brand_name']; ?></div>

	<div id='company_name'><?php echo $data['company_name']; ?></div>

	<div id="dev_partner"><?php echo $data['development_partners']; ?></div>

	<?php if(!empty($classification_data)){ ?>

	<div id="taxonomies">

		<strong>Taxonomy</strong>

		<table width="100%">

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

	<div id="milestones">

		<strong>Milestones</strong>

		<table border="1">

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

						<td><?php echo date('d/m/Y',strtotime($milestone[3])); ?></td>

					</tr>

				<?php } ?>

			</tbody>

		</table>

	</div>

	<?php } ?>

	<?php if ($pipeline_res->num_rows > 0) {	

		//$pipeline_data = $pipeline_res->fetch_all();

	?>

	<div>

		<div><b>Pipeline Info</b></div>

		<table border="1">

			<thead>

				<td>Country Reg. Body</td>

				<td>Developing Country</td>

				<td>Highest Stage of development</td>

				<td>Approved Other</td>

				<td>Estimated Approval</td>

				<td>Estimated Launch</td>

				<td>Device Class</td>

				<td>Analyst Notes</td>

			</thead>

		<?php while ($pipe_data = $pipeline_res->fetch_row()){ ?>

			<tr>

				<td><?php echo $pipe_data[2];  ?></td>

				<td><?php echo $pipe_data[3];  ?></td>

				<td><?php echo $pipe_data[4];  ?></td>

				<td><?php echo $pipe_data[5];  ?></td>

				<td><?php echo date('d/m/Y',strtotime($pipe_data[6])); ?></td>

				<td><?php echo date('d/m/Y',strtotime($pipe_data[7])); ?></td>

				<td><?php echo $pipe_data[8];  ?></td>

				<td><?php echo $pipe_data[9];  ?></td>

			</tr>

		<?php } ?>

		</table>

	</div>

	<?php } ?>

	<?php if ($market_res->num_rows > 0) {	

		//$market_data = $market_res->fetch_all();

	?>

	<div>

		<div><b>Marketed Info</b></div>

		<table border="1">

			<thead>

				<td>Approved Country</td>

				<td>Reg. Body</td>

				<td>510k Num</td>

				<td>PMA Num</td>

				<td>510k Mod Num</td>

				<td>PMA Mod Num</td>

				<td>Submission date</td>

				<td>Approval Date</td>

				<td>Launch Date</td>

			</thead>

		<?php while($mar_data = $market_res->fetch_row()){ ?>

			<tr>

				<td><?php echo $mar_data[2];  ?></td>

				<td><?php echo $mar_data[3];  ?></td>

				<td><?php echo $mar_data[4];  ?></td>

				<td><?php echo $mar_data[5];  ?></td>

				<td><?php echo $mar_data[6]; ?></td>

				<td><?php echo $mar_data[7]; ?></td>

				<td><?php echo date('d/m/Y',strtotime($mar_data[8])); ?></td>

				<td><?php echo date('d/m/Y',strtotime($mar_data[9])); ?></td>

				<td><?php echo date('d/m/Y',strtotime($mar_data[10])); ?></td>

			</tr>

		<?php } ?>

		</table>

	</div>

	<?php } ?>

	<div id="product_description"><?php echo $data['product_description']; ?></div>

    <?php if(!empty($technology_data)){ ?>

    <div><b>Technologies</b></div>

    <ul>

    <?php foreach($technology_data as $technology){ ?>

         <li><?php echo $technology[1]; ?></li>

    <?php } ?>

    </ul>

    <?php } ?>

    <div id="product_tech_description"><?php echo $data['product_tech_description']; ?></div>

    <div id="product_indication"><?php echo $data['indication_name']; ?></div>

    <div id="application"><?php echo $data['application']; ?></div>

    <div id="prod_specification"><?php echo $data['product_specification']; ?></div>

    <div id="product_sources"><?php echo $data['product_sources']; ?></div>

</div>



<?php include 'includes/footer.php'; ?>