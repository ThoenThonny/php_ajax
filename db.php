<?php
    $conn = new mysqli("localhost","root","","db_php_time7",3306);
    if($conn->connect_error){
        echo "<h1>Connection Is Faild</h1>";
    }else{
        echo "<h1>DB Connection</h1>";
    }
?>