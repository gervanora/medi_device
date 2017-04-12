<?php
   session_start();
   unset($_SESSION["token"]);
   unset($_SESSION['user_id']);
   header("Location: /medi_device/login.php"); 
