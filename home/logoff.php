<?php
    session_start();
    if(isset($_POST["logoff"])) {
        session_destroy();
        header("Location:index.php");
    }
    else if($_SESSION["user_id"] === 'admin'){
        header("Location:admin.php");
    }else{
        header("Location: index.php");
    }
?>