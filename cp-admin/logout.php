<?php
include( __DIR__."/../config.php" );
if(session_destroy())
{
    header("Location: index.php");
    exit;
}
?>
