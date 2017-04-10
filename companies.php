<?php include 'includes/header.php';

if(!empty($_POST['company_name'])){
	//$sql = "INSERT INTO company (company_name) VALUES ('".mysql_real_escape_string($_POST['company_name'])."')";
    $sql = "INSERT INTO company (company_name) VALUES ('".$_POST['company_name']."')";
	$conn->query($sql);
}
//fetching Companies Data
$sql = "Select * FROM company";
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
			  <td>&nbsp;</td>
			</thead>
			<tbody>
             <?php if ($result->num_rows > 0) {
             			while($row = $result->fetch_assoc()) {
             ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['company_name']; ?></td>
					<td style="text-align:center;"><a href="delete.php?type=company&id=<?php echo $row['id']; ?>"><img src="images/delete.png"/></a></td>
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