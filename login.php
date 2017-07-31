<?php include dirname(__FILE__).'/includes/non_logged_header.php'; ?>

<?php 

if(empty($_SESSION['token'])){

 if(!empty($_POST)){

 		$login_query = 'Select * FROM users WHERE username="'.$_POST['username'].'" AND password="'.md5($_POST['password']).'"';

 		

        $res = $conn->query($login_query);

 		if($res->num_rows > 0){

            $row = $res->fetch_assoc();

            $_SESSION['user_id'] = $row['id'];

 			$_SESSION['token'] = md5($_POST['username']);

            $_SESSION['role'] = $row['role'];

            //print_r($row); die;

            if($row['role'] == 1)

 			    header("Location: index_admin.php");

            else

                header("Location: index.php");

 		}

        else{

        	$error = "Username/Password Mismatch";

			echo $error;

        }

	}

}

else{

	if($_SESSION['role'] == 1)

            header("Location: index_admin.php");

        else

            header("Location: index.php");

}

?>

<div class="content">

    <div class="login_form">

    	<form method="POST" action="">

    	    <div class="form_div">

	    	    <label>Username:</label>

	    		<input type="text" name="username" id="username" size="60">

    		</div>

    		<div class="form_div">

	    	    <label>Password:</label>

	    		<input type="password" name="password" id="password" size="60">

    		</div>

    		<input type="submit" value="Login">

    	</form>

    </div>

</div>

<?php include 'includes/footer.php'; ?>