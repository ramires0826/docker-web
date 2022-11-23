<?php
    require_once "/app/conf/.env.php";
    foreach($config as $key => $value) {
        $$key=$value;
    }
    if(isset($_POST["table"])){
        $age = rand(18, 45);



        include 'MenSpace.php';
        $name = $MenSpaceName[array_rand($MenSpaceName)];
        echo $name + 1;
        $link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        if($link->connect_error){
            die("Error: " . $link->connect_error);
        }
        $table_name = $link->real_escape_string($_POST["table"]);
        if($result = $link->query("SELECT * FROM $DB_NAME.$table_name")){
            while($row = $result->fetch_array()){
                   $id = $row['id']+1;
            }
        }
        $SQL = "INSERT INTO $table_name (Name, Age, id) VALUES ($name, $age, $id)";
        if($link->query($SQL)){
            header("Location: index.php");
        }
        $link -> close();
    }
?>