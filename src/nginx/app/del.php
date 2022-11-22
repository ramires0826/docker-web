<?php
    $db_host = "192.168.112.3";
    $db_user = "db";
    $db_name = "Students";
    $db_pass = "12345";
    $tableMen  = "Men";
    $tableWom  = "Women";
    if(isset($_POST["id"]))
    {
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $userid = $conn->real_escape_string($_POST["id"]);
        $sql = "DELETE FROM $tableMen WHERE id = '$userid'";
        if($conn->query($sql)){
            header("Location: index.php");
        }
        $sql = "DELETE FROM $tableWom WHERE id = '$userid'";
        if($conn->query($sql)){
            header("Location: index.php");
        }
        $conn->close();
    }
?>