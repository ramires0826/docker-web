<?php
    require_once "/app/conf/.env.php";
    foreach($config as $key => $value) {
        $$key=$value;
    }
    if(isset($_POST["id"],$_POST["table"]))
    {
        $link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        if($link->connect_error){
            die("Error: " . $link->connect_error);
        }
        $userid = $link->real_escape_string($_POST["id"]);
        $table_name = $link->real_escape_string($_POST["table"]);
        $SQL = "DELETE FROM $table_name WHERE id = '$userid'";
        if($link->query($SQL)){
            header("Location: index.php");
        }
        $link->close();
    }
?>