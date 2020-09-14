<html>
    <head>
        <link rel="stylesheet" href="Styles.css">
        <title>Information System & Web Technologies</title>
    </head>
    <body>
    </body>
</html>


<?php 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST["studentID"])) {
        $StudentIDErr = "Student ID is required";
    } else {
        $StudentID = test_input($_POST["studentID"]);
        
        //Check if name only contains letters and whitespace
        if (!preg_match("/^[1-9]{1}[0-9]{8}$/",$StudentID)) {
            $StudentIDErr = "Student ID: Must start from 1 - Only a length of 9 number are allowed"; 
        }
    }

    if (empty($_POST["forename"])) {
        $ForenameErr = "Forename is required";
    } else {
        $Forename = test_input($_POST["forename"]);
        
        //Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/",$Forename)) {
            $ForenameErr = "Forename: Only letters are allowed"; 
        }
    }

    if (empty($_POST["surname"])) {
        $SurnameErr = "Surname is required";
    } else {
        $Surname = test_input($_POST["surname"]);
        
        //Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$Surname)) {
            $SurnameErr = "Surname: Only letters and white space allowed"; 
        }
    }

    if (empty($_POST["location"])) {
        $LocationErr = "Location is required";
    } else {
        $Location = test_input($_POST["location"]);
        
        //Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$Location)) {
            $LocationErr = "Location: You must select a valid location"; 
        }
    }

    if (empty($_POST["UserType"])) {
        $UserTypeErr = "UserType is required";
    } else {
        $UserType = test_input($_POST["UserType"]);
        
        //Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/",$UserType)) {
            $UserTypeErr = " User Type: You must select a valid user type"; 
        }
    }

    try {  
        $server = 'sql.rde.hull.ac.uk';
        $connectionInfo = array("Database"=>"rde_561438");
        $conn = sqlsrv_connect($server,$connectionInfo);
        
        if (!conn) {
            echo "Connection failed";
            echo "error";
        }

        if ($StudentIDErr == '' && $ForenameErr == '' && $SurnameErr == "" && $LocationErr == "" && $UserTypeErr == "") {
            //$insert_query = "INSERT INTO ACW (Student_ID, Forename, Surname, Location, UserType, Date) VALUES ('$StudentID', '$Forename', '$Surname', '$Location', '$UserType', SYSDATETIME())";

            $ExistsBase = "SELECT Student_ID FROM ACW WHERE $StudentID LIKE Student_ID"; //If this matches the Database
            $ExistsA = sqlsrv_query($conn, $ExistsBase); //Connect to the datatbase and initialise Search
            $Exists = sqlsrv_fetch_array($ExistsA); //Cut down the row that match

            if ($Exists['Student_ID'] == $StudentID) { //If the serach mathes the input - Error
                echo "Error - Student already exists";
            } else { //Else Add User
                $parameters = array($StudentID, $Forename, $Surname, $Location, $UserType);
                $insert_query = "INSERT INTO ACW (Student_ID, Forename, Surname, Location, UserType, Date) VALUES (?,?,?,?,?, SYSDATETIME())";
                $result = sqlsrv_query($conn,$insert_query, $parameters);
                echo "User has been added";
            }
        } else {
            echo "$StudentIDErr $ForenameErr $SurnameErr $LocationErr $UserTypeErr";
        }

        sqlsrv_close($conn);

    } catch (Exception $e) {  
        echo("Error!");  
    }  
?>


<html>
    <head>
    </head>
    <body>
        <div id="buttons" align="Center">
            <a href="Index.php" class="btn Home">Home</a>
        </div>
    </body>
</html>