<?php
if(isset($_SESSION)){
    $_SESSION['name'] = 'chetan';
    $_SESSION['billing_date'] = '12/12/12';
    $_SESSION['amount'] = '512';
 }else{
    session_start();
    $_SESSION['name'] = 'chetan';
    $_SESSION['billing_date'] = '12/12/12';
    $_SESSION['amount'] = '512';
}
?>