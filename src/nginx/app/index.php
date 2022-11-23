<!-- ###############################################   VARIABLES     -->
<?php
    require_once "/app/conf/.env.php";
    foreach($config as $key => $value) {
        $$key=$value;
    }
?>
<!-- ##############################################################  -->
<!-- ###############################################   FUNCTION      -->
<?php
    function showTable($link, $db_name, $db_table)
            {
                if($result = $link->query("SELECT * FROM $db_name.$db_table")){
                    while($row = $result->fetch_array()){
                        echo "<tr>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["Age"] . "</td>";
                            echo "<td><form action='del.php' method='post'>
                                  <input type='hidden' name='table' value='" . $db_table ."'>
                                  <input type='hidden' name='id' value='" . $row["id"] . "' />
                                  <input type='submit' value='Delete'>
                                  </form></td>";
                        echo "</tr>";
                    }
                }
            }
?>
<!-- ##############################################################  -->
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


<!-- #####################################   CONNECT TO DATABASE     -->
    <?php
        echo 'Connect to database...' . '<br>';
        $link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        if ($link->connect_error) {
            die("Error:" . "<br>" . $link->connect_error);
        } else {
            echo 'Connected to database successful.' . '<br><br><br>';
        }
    ?>
<!-- ############################№################################## -->


    <div>
        <div><p>
<!-- #####################################   TABLE Men               -->
            <?php
                echo "<h2> Men </h2>";
                echo "<table><tr><th>Name</th><th>Age</th></tr>";
                showTable($link, $DB_NAME, $DB_TABLE_MEN);
                echo "</table>";
                echo "<td><form action='add.php' method='post'>
                      <input type='hidden' name='table' value='Men' />
                      <input type='submit' value='Add'>
                      </form></td>";
            ?>
<!-- ############################################################### -->
        </p></div>
        <div><p>
<!-- #####################################   TABLE WOMAN             -->
            <?php
                echo "<h2> Woman </h2>";
                echo "<table><tr><th>Name</th><th>Age</th></tr>";
                showTable($link, $DB_NAME, $DB_TABLE_WOMAN);
                echo "</table>";
                echo "<td><form action='add.php' method='post'>
                      <input type='hidden' name='table' value='Woman' />
                      <input type='submit' value='Add'>
                      </form></td>";
            ?>
<!-- ############################################################### -->
        </p></div>
    </div>
<!-- #####################################   CHECK FOR SAME AGE      -->
    <?php
        echo "<br><br>";
        echo "<table>";
        if($resultM = $link->query("SELECT * FROM $DB_NAME.$DB_TABLE_MEN")){
            $i = 0;
            while($rowM = $resultM->fetch_array()){
                $i++;
                $i = $rowM["Age"];
                if($resultW = $link->query("SELECT * FROM $DB_NAME.$DB_TABLE_WOMAN")){
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
        $resultW->close();
        $resultM->close();
        $link->close();
    ?>
<!-- ############################################################### -->
</body>
</html>