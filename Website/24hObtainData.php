<html>
    <head>
        <link rel="stylesheet" href="Styles.css">
        <link rel="shortcut icon" Type="image/x-icon" href="ICON.png">
        <title>Information System & Web Technologies</title>
    </head>
    <body>
        <h1>24h User Location Table</h1>
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

    $server = 'sql.rde.hull.ac.uk';
    $connectionInfo = array("Database"=>"rde_561438");
    $conn = sqlsrv_connect($server,$connectionInfo);
    echo "<style>
    table, td, th {    
        border: 1px solid #ddd;
        text-align: left;
    }
    
    table {
        border-collapse: collapse;
        width: 100%;
    }
    
    th, td {
        padding: 15px;
    }
    </style>";

    echo "<table>
    <tr>
    <th>ID</th>
    <th>Student ID</th>
    <th>Forename</th>
    <th>Surname</th>
    <th>Location</th>
    <th>User Type</th>
    <th>Date & Time</th>
    </tr>";

    if (!conn) {
        echo "Connection Failed";
    }
            
    if($StudentIDErr == '') {
        $ExistsBase = "SELECT Student_ID FROM ACW WHERE $StudentID LIKE Student_ID"; //If this matches the Database
        $ExistsA = sqlsrv_query($conn, $ExistsBase); //Connect to the datatbase and initialise Search
        $Exists = sqlsrv_fetch_array($ExistsA); //Cut down the row that match

        if ($Exists['Student_ID'] != $StudentID) { //If the serach does not match the input - Error
            echo "Error - Student does not exist";
        } else { //Else Add User
            $parameters = array($StudentID);
            $select_FetchData = "SELECT * FROM ACW WHERE Student_ID = ? AND Date >= DATEADD(day, -1, GETDATE())";          
            $result = sqlsrv_query($conn, $select_FetchData, $parameters);
        }

    } else {
        echo "$StudentIDErr";
    }

    while($row = sqlsrv_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Student_ID'] . "</td>";
        echo "<td>" . $row['Forename'] . "</td>";
        echo "<td>" . $row['Surname'] . "</td>";
        echo "<td>" . $row['Location'] . "</td>";
        echo "<td>" . $row['UserType'] . "</td>";
        echo "<td>" . $row['Date']->format('d-m-y H:i:s') . "</td>";
        echo "</tr>" ;
        echo "</tr>" ;
    }

    echo "</table>";
    sqlsrv_close($conn);
?>

<html>
    <head>
    </head>

    <body>
        <div id="buttons" align="Center">
            <a href="Index.php" class="btn Home">Home</a>
            <a href="24hObtainWebsite.php" class="btn Home">Back</a>
        </div>
    </body>
</html>