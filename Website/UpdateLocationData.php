<html>
    <head>
        <link rel="stylesheet" href="Styles.css">
        <title>Information System & Web Technologies</title>
</head>
<body>

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

if (empty($_GET["studentID"])) 
{
    $StudentIDErr = "Student ID is required";
} 
else 
{
    $StudentID = test_input($_GET["studentID"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[1-9]{1}[0-9]{8}$/",$StudentID)) 
{
    $StudentIDErr = "Student ID: Must start from 1 - Only a length of 9 number are allowed"; 
    
}
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

    $server = 'sql.rde.hull.ac.uk';
    $connectionInfo = array("Database"=>"rde_561438");
    $conn = sqlsrv_connect($server,$connectionInfo);
          
if($StudentIDErr == '' && $LocationErr == "")
{
    $ExistsBase = "SELECT Student_ID FROM ACW WHERE $StudentID LIKE Student_ID"; //If this matches the Database
    $ExistsA = sqlsrv_query($conn, $ExistsBase); //Connect to the datatbase and initialise Search
    $Exists = sqlsrv_fetch_array($ExistsA); //Cut down the row that match
    
    if ($Exists['Student_ID'] != $StudentID) //If the serach does not match the input - Error
    {
        echo "Error - User does not exist";
    }
    else //Else Add User
    {  
    // $select_editUser = "UPDATE ACW SET Location = '$Location', Date = SYSDATETIME() WHERE Student_ID = '$StudentID'";          
    // $result = sqlsrv_query($conn, $select_editUser);
    // echo "Location has been updated";

//Antiguo -Funciona-

    // $parameters = array($Location, $StudentID);  
    // $select_editUser = "UPDATE ACW SET Location = ?, Date = SYSDATETIME() WHERE Student_ID = ?";          
    // $result = sqlsrv_query($conn, $select_editUser, $parameters);
    // echo "Location has been updated";

//Nuevo Con Parametros -Funciona-
    $parameters = array($StudentID); 
    $Select_Forename = "SELECT Forename FROM ACW WHERE Student_ID = ?"; //Select the forename that matches the Student ID
    $Select_Forename = sqlsrv_query($conn, $Select_Forename, $parameters);
    $Select_Forename = sqlsrv_fetch_array($Select_Forename);
    $Select_Surname = "SELECT Surname FROM ACW WHERE Student_ID = ?";
    $Select_Surname = sqlsrv_query($conn, $Select_Surname, $parameters);
    $Select_Surname = sqlsrv_fetch_array($Select_Surname);
    $Select_UserType = "SELECT UserType FROM ACW WHERE Student_ID = ?";
    $Select_UserType = sqlsrv_query($conn, $Select_UserType, $parameters);
    $Select_UserType = sqlsrv_fetch_array($Select_UserType);
    $parameters = array($StudentID, $Select_Forename[Forename],$Select_Surname[Surname],$Location,$Select_UserType[UserType]); 
    $insert = "INSERT INTO ACW (Student_ID,Forename,Surname,Location,UserType,Date) VALUES (?,?,?,?,?,SYSDATETIME())";
    $sql = sqlsrv_query($conn, $insert, $parameters);
    echo "Location has been updated";
}
}

else
{
    echo "$StudentIDErr $LocationErr";
}
sqlsrv_close($conn);
?>

<html>
<head>
</head>
<body>
<div id="buttons" align="Center">
    <a href="Index.php" class="btn Home">Home</a>
    <a href="UpdateLocationWebsite.php" class="btn Home">Back</a>
</div>
</body>
</html>