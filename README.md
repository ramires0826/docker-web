--------------------

MySQL
NGINX
bash

-------------------

[mysql]
Create 1 db "Students"
Create 2 tables "Male" "Female"
Tables contains "Name" and "Age"

[bash]
Create script for add to base user
Create script for remove user from base

[nginx]
Page show table to really time
Page show label '"Male.Name" and "Female.Name" same age!'



/* if(isset($_POST["id"]))
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
} */