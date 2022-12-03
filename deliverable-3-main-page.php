<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }

        th, td {
        padding: 15px
        }
</style>


We are inserting data into the PLAYER table which has two columns known as userName and legendName.
<br>These are both varchar (50) fields which are meant to have strings inserted into them.
<br>Also userName is the primary key of the table so it cannot be left blank.
<br>If it is left blank the page will not submit until it is filled.

<br>
<br>
<br>

<h2>Add Players</h2>

<form action="deliverable-3.php" method="post">
Username: <input type="text" name="username" required><br>
Legend name: <input type="text" name="legendname"><br>
<input type="submit">
</form>

<h2>Player Table</h2>

<?php

$servername = "ecs-pd-proj-db.ecs.csus.edu";
$username = "CSC174043";
$password = "Csc134_557929315";
$mydb = "CSC174043";

// Create connection
$conn = new mysqli($servername, $username, $password,$mydb);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


//SELECT
$sql = "SELECT username, legendName FROM PLAYER";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

?>
<table>
<tr>
<td>User Name</td>
<td>Legend Name</td>
</tr>

<?php
    while($row = $result->fetch_assoc()) {

echo " <tr>
        <td>".$row["username"]."</td>
        <td>".$row["legendName"]."</td>
        </tr>";
        }
} else {
echo "0 results";

}

?>
</table>
<?php
mysqli_close($conn);
?>

</body>
</html>
