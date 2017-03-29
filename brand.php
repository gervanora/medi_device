<?php include 'includes/header.php';

if(!empty($_POST['brand_name'])){
	//$sql = "INSERT INTO brand (brand_name) VALUES ('".mysql_real_escape_string($_POST['brand_name'])."')";
    $sql = "INSERT INTO brand (brand_name) VALUES ('".$_POST['brand_name']."')";
	$conn->query($sql);
}
//fetching Brands Data
$sql = "Select * FROM brand";
$result = $conn->query($sql);
?>
  <div class="content">
    <div class="add_form">
    	<form method="POST" action="">
    		<input type="text" name="brand_name" id="brand_name" size="60">
    		<input type="submit" value="Add Brand">
    	</form>
    </div>
	  <div class="listings">
	    <div class="listing_title">List of Brands</div>
		<div><table border="1" align="center">
		    <thead>
			  <td>Sr. no.</td>
			  <td>Brand Name</td>
			</thead>
			<tbody>
             <?php if ($result->num_rows > 0) {
             			while($row = $result->fetch_assoc()) {
             ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['brand_name']; ?></td>
				</tr>
			 <?php	}
				}
			    ?>
			</tbody>
		</table>
	  </div>
	</div>
  </div>
<?php include 'includes/footer.php'; ?>