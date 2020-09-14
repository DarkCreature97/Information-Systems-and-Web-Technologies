<html>
    <head>
        <link rel="stylesheet" href="Styles.css">
        <link rel="shortcut icon" Type="image/x-icon" href="ICON.png">
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

    if (empty($_GET["studentID"])) {
        $StudentIDErr = "Student ID is required";
    } else {
        $StudentID = test_input($_GET["studentID"]);

        // Check if name only contains letters and whitespace
        if (!preg_match("/^[1-9]{1}[0-9]{8}$/",$StudentID)) {
            $StudentIDErr = "Student ID: Must start from 1 - Only a length of 9 number are allowed";  
        }
    }

    if (empty($_GET["forename"])) {
        $ForenameErr = "Forename is required";
    } else {
        $Forename = test_input($_GET["forename"]);

        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/",$Forename)) {
            $ForenameErr = "Forename: Only letters are allowed"; 
        }
    }

    if (empty($_GET["surname"])) {
        $SurnameErr = "Surname is required";
    } else {
        $Surname = test_input($_GET["surname"]);

        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$Surname)) {
            $SurnameErr = "Surname: Only letters and white space allowed"; 
        }
    }

    $server = 'sql.rde.hull.ac.uk';
    $connectionInfo = array("Database"=>"rde_561438");
    $conn = sqlsrv_connect($server,$connectionInfo);
            
    if($StudentIDErr == '' && $ForenameErr == '' && $SurnameErr == "") {
        $ExistsBase = "SELECT Student_ID FROM ACW WHERE $StudentID LIKE Student_ID"; //If this matches the Database
        $ExistsA = sqlsrv_query($conn, $ExistsBase); //Connect to the datatbase and initialise Search
        $Exists = sqlsrv_fetch_array($ExistsA); //Cut down the row that match
        
        if ($Exists['Student_ID'] != $StudentID) { //If the serach does not match the input - Error
            echo "Error - Student does not exist";
        } else { //Else Add User
            $parameters = array($Forename, $Surname, $StudentID);
            $select_editUser = "UPDATE ACW SET Forename = ?, Surname = ? WHERE Student_ID = ?";          
            $result = sqlsrv_query($conn, $select_editUser, $parameters);
            echo "User information has been updated";
        }

    } else {
        echo "$StudentIDErr $ForenameErr $SurnameErr";
    }

    sqlsrv_close($conn);
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