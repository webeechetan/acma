<?php
$con=mysqli_connect("localhost","acmaig3n_live","%%3e3d3c","acmaig3n_acmalive");
    // Check connection
     if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      
      echo$_session['member_name2'];
      ?>
    