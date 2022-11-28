<?php 
if (!isset($_SESSION['useradmin']) || empty( $_SESSION['useradmin'] ) ) 
{
	header('Location:login.php' );
    exit;
}