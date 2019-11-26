<html>
    <head>
        <link rel="stylesheet" href="Styles.css">
        <title>Information System & Web Technologies</title>
</head>
<body>
    <h1>User Location Table</h1>
</body>
</html>

<?php
function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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

        if (!conn)      
        {
           echo "Connection Failed";
        }

if (empty($_GET["location"])) 
{
    $LocationErr = "Location is required";
} 
else 
{
    $Location = test_input($_GET["location"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$Location)) {
    $LocationErr = "Location: You must select a valid location"; 
    
}
}


if($LocationErr == "")
{    
    $parameters = array($Location);   
    $select_FetchData = "SELECT * FROM ACW WHERE Location = ?";          
    $result = sqlsrv_query($conn, $select_FetchData, $parameters);
}
    
else
{
    echo "$StudentIDErr $ForenameErr $SurnameErr $LocationErr $UserTypeErr";
}

while($row = sqlsrv_fetch_array($result))
{
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
    <a href="SearchLocationWebsite.php" class="btn Home">Back</a>
</div>
</body>
</html>