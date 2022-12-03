<html>
<body>

 <form action= "deliverable-3-main-page.php" method="post">
        <br>
<input type="submit" value="View Table">
</form>

</body>

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

//INSERT
$sqlPlayerInsert = $conn->prepare("INSERT INTO PLAYER (userName, legendName)
VALUES (?,?)");

//PREPARED STATEMENTS
$sqlPlayerInsert->bind_param("ss",$playername,$legendname);

$playername = $_POST["username"];
$legendname = $_POST["legendname"];


// Check to see if the insert completed successfully
if ($sqlPlayerInsert->execute() === TRUE) {
  echo "New Player record created successfully";
} else {
  echo "Error: " . $conn->error;
}


$sqlPlayerInsert->close();

mysqli_close($conn);
?>
</html>
