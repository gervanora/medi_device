<?php
   session_start();
   unset($_SESSION["token"]);

   header("Location: /medi_device/login.php"); 
