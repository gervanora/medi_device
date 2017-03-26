<?php include 'includes/header.php';

if(!empty($_POST['company_name'])){
	$sql = "INSERT INTO company (company_name) VALUES ('".mysql_real_escape_string($_POST['company_name'])."')";
	$conn->query($sql);
}
//fetching Companies Data
$sql = "Select * FROM Company";
$result = $conn->query($sql);
?>
  <div class="content">
    <div class="add_form">
    	<form method="POST" action="">
    		<input type="text" name="company_name" id="company_name" size="60">
    		<input type="submit" value="Add Company">
    	</form>
    </div>
	  <div class="listings">
	    <div class="listing_title">List of Companies</div>
		<div><table border="1" align="center">
		    <thead>
			  <td>Sr. no.</td>
			  <td>Company Name</td>
			</thead>
			<tbody>
             <?php if ($result->num_rows > 0) {
             			while($row = $result->fetch_assoc()) {
             ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['company_name']; ?></td>
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