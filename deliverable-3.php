<!-- Start the html -->
<html>


<!-- Start the html body -->
<body>


        <!-- Here we creating a form where there is a button to return to View the Table -->
        <form action= "deliverable-3-main-page.php" method="post">
                <br>
                <input type="submit" value="View Table">
        </form>


</body> <!-- End of the html body -->


<!-- Start the PHP commands -->
<?php


        // First we create several variables to keep track of the database information
        $servername = "ecs-pd-proj-db.ecs.csus.edu";
        $username = "CSC174043";
        $password = "Csc134_557929315";
        $mydb = "CSC174043";


        // Create a connection to the database using the variables that we created
        $conn = new mysqli($servername, $username, $password,$mydb);


        // Check the connection to confirm that it is connecting properly
        if ($conn->connect_error) {

                // If the coneection does not connect properly then kill the program and display the connect error
                die("Connection failed: " . $conn->connect_error);

        }


        // Create the prepared statement with the query that is going to be run
        $sqlPlayerInsert = $conn->prepare("INSERT INTO PLAYER (userName, legendName) VALUES (?,?)");


        // Bind the variable names to the inputs that are going to be added
        $sqlPlayerInsert->bind_param("ss",$playername,$legendname);


        // Create two variables matching the same in the binding param
        $playername = $_POST["username"];
        $legendname = $_POST["legendname"];


        // Check to see if the insert completed successfully
        if ($sqlPlayerInsert->execute() === TRUE) {

                // If the insert completed successfully then we echo that a New Player was added
                echo "New Player record created successfully";

        }

        // If the insert was not complete succesfully
        else {

                // Echo the error that is occuring
                echo "Error: " . $conn->error;

        }


        // Close the insert SQL statement
        $sqlPlayerInsert->close();


        // Close the conncetion to the database
        mysqli_close($conn);


?> <!-- End of PHP commands -->

</html> <!-- End of the html -->
