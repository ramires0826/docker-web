<?php
    $db_host = "192.168.112.3";
    $db_user = "db";
    $db_name = "Students";
    $db_pass = "12345";
    $tableMen  = "Men";
    $tableWom  = "Women";
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if(isset($_POST["id"]))
    {
        if($conn->connect_error){
              die("Error: " . $conn->connect_error);
        }
        if($result = $conn->query("SELECT * FROM $db_name.$tableMen")){
            while($row = $result->fetch_array()){
                   $id = $row['id']+1;
               }
        }





        echo ""







        echo "<p>Name: <input type='text' name='name' /></p>
             <p>Age:  <input type='text' age='age' /></p>
             <p><input type='submit' name='Add' /></p>";


        $sql = "INSERT INTO Men (Name, Age, id) VALUES ($name, $age, $id)";


        if($conn->query($sql)){
            header("Location: index.php");
        }


        $conn->close();
    }
?>