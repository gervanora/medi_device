<?php include 'includes/header.php';

if(!empty($_POST['classification_name'])){
  if(!empty($_POST['parent_id'])){
    $fetch_classification = "Select id FROM product_classification WHERE classification_fullname='".$_POST['parent_id']."'";
    $parent_classification = $conn->query($fetch_classification); 
    $parent_id = $parent_classification->fetch_assoc();
    $parent_id = $parent_id['id'];

      $full_path = $_POST['parent_id'].' -> '.$_POST['classification_name'];
  }
  else{
    $parent_id = 0;
    $full_path = $_POST['classification_name'];
  }
    

  $sql = "INSERT INTO product_classification (classification_name,parent_id,classification_fullname,level) VALUES ('".$_POST['classification_name']."',$parent_id,'".$full_path."','".$_POST['level']."')";
  $conn->query($sql);
}
//fetching Companies Data
$sql = "Select * FROM product_classification";
$result = $conn->query($sql);
?>
  <div class="content">
    <div class="classification_form">
      <form method="POST" action="">
            <div class="form_div">
          <label>Classification name: </label>
          <input type="text" name="classification_name" id="classification_name" size="60">
        </div>
            <div class="form_div">
          <label>Parent Classification: </label>
          <input type="text" name="parent_id" id="parent_id" size="60">
        </div>
            <div class="form_div">
            <label>Level: </label>
             <select name="level">
              <option value="Market Level">Market Level</option>
              <option value="Segment Level">Segment Level</option>
              <option value="Sub Segment Level">Sub Segment Level</option>
              <option value="Nodes">Nodes</option>
              <option value="Sub-Nodes">Sub-Nodes</option>
            </select>
            </div>
        <input type="submit" value="Add Classification">
      </form>
    </div>
    <div class="classification_listing">
      <div class="listing_title">Product Classifications</div>
    <div><table border="1" align="center">
        <thead>
        <td>Sr. no.</td>
        <td>Classification Name</td>
        <td>Classification Full Path</td>
        <td>Level</td>
      </thead>
      <tbody>
             <?php if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
             ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['classification_name']; ?></td>
          <td><?php echo $row['classification_fullname']; ?></td>
          <td><?php echo $row['level']; ?></td>
        </tr>
       <?php  }
        }
          ?>
      </tbody>
    </table>
    </div>
  </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){     
            $("#parent_id").autocomplete({
                source: 'search_classification.php'
            }); 
        });
  </script>
<?php include 'includes/footer.php'; ?>