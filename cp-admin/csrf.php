<?php
$conn = mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");

function validate_string($str){
    return mysqli_real_escape_string($str);
}

function redirect(){
    echo "<script>location.href='https://acma.in'</script>";
}

// function create_request(){
//     $bytes = random_bytes(16);
//     $current_request_token = bin2hex($bytes);
//     if(isset($_SESSION['current'])){
//         $_SESSION["previous"] = $_SESSION['current'];
//     }else{
//         $_SESSION["previous"] = "acma@acma";
//     }
//     $_SESSION["current"] = $current_request_token;
// }
// create_request();

function create_csrf_token(){
    $csrf_token = bin2hex(random_bytes(16));
    if(!isset($_POST['_token'])){
        $_SESSION["csrf_token"] = $csrf_token;
    }
}

create_csrf_token();

function csrf(){
    $csrf_token = $_SESSION['csrf_token'];
    echo "<input type='hidden' name='_token' value='{$csrf_token}'>";
}

function validate_csrf(){
    if(isset($_POST['_token'])){
        if($_POST['_token']==$_SESSION['csrf_token']){
            unset($_SESSION['csrf_token']);
        }else{            
            $_SESSION["419"] = "Invalid request or page expired";
            redirect();
            die;
        }
    }else{
        $_SESSION["419"] = "Invalid request or page expired";
        redirect();
        die;
    }
}

?>