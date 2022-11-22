<!DOCTYPE html>
<html>
    <head>
        <title>My SQL test</title>
        <meta charset="utf-8" />
        <style type="text/css">
            body > div{display:table; border-spacing:5px; border:solid 3px red; width:20%;}
            div > div{display:table-cell; text-align:center; border:solid 1px green;}
        </style>
    </head>
<body>
    <h2>Список пользователей</h2>
    <?php
        function addSql($link, $name, $table)
        {
                if($conn->connect_error){
                     die("Ошибка: " . $conn->connect_error);
                 }
                if($result = $link->query("SELECT * FROM $name.$table")){
                    while($row = $result->fetch_array()){
                           $id = $row['id']+1;
                       }
                }
                $sql = "INSERT INTO $table (Name, Age, id) VALUES ('123', '2222', $id)";
                if($link->query($sql)){
                    header("Location: index.php");
                }
        }
        function getSql($link, $name, $table)
        {
            if($result = $link->query("SELECT * FROM $name.$table")){
                while($row = $result->fetch_array()){
                    echo "<tr>";
                        echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>" . $row["Age"] . "</td>";
                        echo "<td><form action='del.php' method='post'>
                              <input type='hidden' name='id' value='" . $row["id"] . "' />
                              <input type='submit' value='Delete'>
                              </form></td>";
                    echo "</tr>";
                }
                echo "  <td><form method='post'>
                        <input type='submit' name='buttonAdd' value='Add' /><br>
                        </form></td>";
                if(count($_POST) > 0) {
                    addSql($conn, $db_name, $tableMen);
                }
            }
        }

        $db_host = "192.168.112.3";
        $db_user = "db";
        $db_name = "Students";
        $db_pass = "12345";
        $tableMen  = "Men";
        $tableWom  = "Women";
        echo 'Connect to database...' . '<br>';
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($conn->connect_error) {
            die("Error:" . "<br>" . $conn->connect_error);
        }
        echo 'Connected to database successful.' . '<br><br><br>';
    ?>
    <div>
        <div><p>
            <?php
                echo "<h2> Men </h2>";
                echo "<table><tr><th>Name</th><th>Age</th></tr>";
                getSql($conn, $db_name, $tableMen);
                echo "</table><br><br><br><br><br>";
            ?>
        </p></div>
        <div><p>
            <?php
                echo "<h2> Women </h2>";
                echo "<table><tr><th>Name</th><th>Age</th></tr>";
                getSql($conn, $db_name, $tableWom);
                echo "</table>";
            ?>
        </p></div>
    </div>
    <?php
        echo "<br><br>";
        echo "<table>";
        if($resultM = $conn->query("SELECT * FROM $db_name.$tableMen")){
            $i = 0;
            while($rowM = $resultM->fetch_array()){
                $i++;
                $i = $rowM["Age"];
                if($resultW = $conn->query("SELECT * FROM $db_name.$tableWom")){
                    $ii = 0;
                    while($rowW = $resultW->fetch_array()){
                        $ii++;
                        $ii = $rowW["Age"];
                        if($i==$ii){
                          echo $rowM["Name"] . " " . " and " . $rowW["Name"] . " same age!!";
                          echo "<br>";
                        }
                    }
                }
            }
        }
        echo "</table>";
        $result->close();
        $conn->close();
    ?>
</body>
</html>