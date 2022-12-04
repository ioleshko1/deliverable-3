<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!-- We are creating a body and changing the style of the tables, th, and td inside of the style tag -->
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


<!-- Here we are inserting some text to be displayed so the user can see what kind of data we want to be inputted -->
We are inserting data into the PLAYER table which has one columns known as userName.
<br>It is a varchar (50) field which is meant to have strings inserted into it. Also userName is
<br>the primary key of the table so it cannot be left blank.  If it is left blank the page will not submit
<br>until it is filled.


<!-- Added several breaks in here for neatness -->
<br>
<br>
<br>


<!-- Added a header to showcase that these is where the user can add Players -->
<h2>Add Players</h2>


<!-- Here we have a form available with the User Name and the submit button along with a POST method to lead to the next page -->
<form action="deliverable-3.php" method="post">
        Username: <input type="text" name="username" required><br><br>
        <input type="submit">
</form>


<!-- Added several breaks in here for neatness -->
<br>
<br>
<br>


<!-- Added a header to showcase that this is where the data from the Player Table is being showcased -->
<h2>Player Table</h2>


<!-- Here we start the php command -->
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


        // Here we are creating a variable to keep track of the SQL query and the result that it is getting
        $sql = "SELECT userName FROM PLAYER";
        $result = $conn->query($sql);


        // Here we are checking to see if there are more than one row that has been returned from the query
        if ($result->num_rows > 0) {

?> <!-- End the php commands -->


<!-- Here we are creating a table structure so we can insert the data that we are getting from the database in a clean fashion -->
<table>
        <tr>
                <!-- Add a column name to the column that we will be using -->
                <td>User Name</td>
        </tr>


<!-- Start up the PHP commands again -->
<?php

                // While we have more row that we can read through from the SQL query we keep reading
                while($row = $result->fetch_assoc()) {


                        // Here we are echoing all of the rows of data using the table format
                        echo "<tr>
                                     <td>".$row["userName"]."</td>
                              </tr>";

                } // End of the while loop

        } // End of the if statement where we have more than one row from the SELECT query


        // If we did not have any rows returned then we just output the fact that we have 0 results
        else {
                echo "0 results";
        }

?> <!-- End the php commands -->


<!-- Here we are ending the table of the results that we are getting from the SELECT query -->
</table>


<!-- Start up the PHP commands again -->
<?php

        // Close the database connection to not waste resources
        mysqli_close($conn);

?> <!-- End the php commands -->


<!-- End of the html body -->
</body>


<!-- End of the html -->
</html>
