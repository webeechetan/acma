<?php
        
         $dbhost = 'localhost:3306';
         $dbuser = 'acmaig3n_live';
         $dbpass = '%%3e3d3c';
         $dbname  = 'acmaig3n_acmalive';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
         if(! $conn ){
            die('Could not connect: ' . mysqli_connect_error());
         }
         echo 'Connected successfully';
        //  mysqli_close($conn);
      ?>


