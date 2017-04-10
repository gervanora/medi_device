<?php include 'includes/header.php';

if(!empty($_POST['application_name'])){
	//$sql = "INSERT INTO Application (application_name) VALUES ('".mysql_real_escape_string($_POST['application_name'])."')";
    $sql = "INSERT INTO application (application) VALUES ('".$_POST['application_name']."')";
	$conn->query($sql);
}
//fetching Application Data
$sql = "Select * FROM application";
$result = $conn->query($sql);
?>
  <div class="content">
    <div class="add_form">
    	<form method="POST" action="">
    		<input type="text" name="application_name" id="application_name" size="60">
    		<input type="submit" value="Add Application">
    	</form>
    </div>
	  <div class="listings">
	    <div class="listing_title">List of Application</div>
		<div><table border="1" align="center">
		    <thead>
			  <td>Sr. no.</td>
			  <td>Application Name</td>
			  <td>&nbsp;</td>
			</thead>
			<tbody>
             <?php if ($result->num_rows > 0) {
             			while($row = $result->fetch_assoc()) {
             ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['application']; ?></td>
					<td style="text-align:center;"><a href="delete.php?type=application&id=<?php echo $row['id']; ?>"><img src="images/delete.png"/></a></td>
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