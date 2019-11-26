<html>
	<head>
	<link rel="stylesheet" href="Styles.css">
    <link rel="shortcut icon" Type="image/x-icon" href="ICON.png">
		<title>Department of Computer Science - ASP .NET Remote Development Environment</title>
	</head>
	
	<body>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    <Center><img src="University-of-Hull-logo.jpg" width="500px"></Center>
		<h1>Edit User Details</h1>

	<div class="formcontainer" align="Center">  
	<form id="entry" action="EditUserData.php" method="get" name="submit" align="centre">
        <h4> Submit User details </h4>
        <input placeholder="Student ID" maxlength="9" name="studentID" size="30" value="" type="text" tabindex="1" required autofocus/>
    </br>
    </br>
        <input maxlength="20" name="forename" size="30" value="" type="text" placeholder="Forename" required/>
    </br>
    </br>
        <input maxlength="20" name="surname" size="30" value="" type="text" placeholder="Surname" required/>
    </br>
    </br>
        <button name="submit" type="submit" id="entry-submit" data-submit="Submit my information" /> Submit </button>
    </form>    

		<div id="buttons">
            <a href="Index.php" class="btn Home">Home</a>
		  </div>

	</body>
</html>