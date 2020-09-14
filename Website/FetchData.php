<html>
    <head>
        <link rel="stylesheet" href="Styles.css">
        <link rel="shortcut icon" Type="image/x-icon" href="ICON.png">
        <title>Information System & Web Technologies</title>
    </head>
    <body>
        <h1>All Student Location Table</h1>
    </body>
</html>

<?php
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
    <th>Student_ID</th>
    <th>Forename</th>
    <th>Surname</th>
    <th>Location</th>
    <th>UserType</th>
    <th>Date & Time</th>
    </tr>";

    if (!conn) {
        echo "Connection Failed";
    } else {
        echo "Database Connected";
    }
        
    $select_query = "SELECT * FROM ACW";          
    $result = sqlsrv_query($conn, $select_query);

    while ($row = sqlsrv_fetch_array($result)) {
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
        </div>
    </body>
</html>
