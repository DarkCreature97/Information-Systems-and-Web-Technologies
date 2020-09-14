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
        <h1> University of Hull Location Service</h1>

        <div class="formcontainer" align="Center">  
        <form id="entry" action="InsertStudent.php" method="post" name="submit" align="centre">
            <h4> Submit User details </h4>
            <input placeholder="Student ID" maxlength="9" name="studentID" size="30" value="" type="text" tabindex="1" required autofocus/>
            </br>
            </br>
            <input maxlength="20" name="forename" size="30" value="" type="text" placeholder="Forename" maxlength="30" required/>
            </br>
            </br>
            <input maxlength="20" name="surname" size="30" value="" type="text" placeholder="Surname" maxlength="30" required/>
            </br>
            </br>
            <select required name="location">
                <option disbaled selected hidden value=""> Select a Location </option>
                <option value="Allam Building">Allam Building</option>
                <option value="Allam Medical Building">Allam Medical Building</option>
                <option value="Applied Science">Applied Science</option>
                <option value="Brynmore Jones Library">Brynmore Jones Library</option>
                <option value="Canham Turner">Canham Turner</option>
                <option value="Cohen">Cohen</option>
                <option value="Derwent">Derwent</option>
                <option value="Don">Don</option>
                <option value="Esk">Esk</option>
                <option value="Fenner">Fenner</option>
                <option value="Ferens">Ferens</option>
                <option value="Hardy">Hardy</option>
                <option value="Larkin">Larkin</option>
                <option value="Middleton Hall">Middleton Hall</option>
                <option value="Prayer Room">Prayer Room</option>
                <option value="Robert Blackburn">Robert Blackburn</option>
                <option value="Sports and Fitness Centre">Sports and Fitness Centre</option>
                <option value="Taylor Court">Taylor Court</option>
                <option value="The Courtyard">The Courtyard</option>
                <option value="Venn">Venn</option>
                <option value="West Campus Accommodation">West Campus Accommodation</option>
                <option value="Wilberforce">Wilberforce</option>
                <option value="Wiske">Wiske</option>
                <option value="Wolfson">Wolfson</option>
            </select>
            </br>
            </br>
            <!-- <input maxlength="20" name="UserType" size="7" value="" type="text" placeholder="User Type" required/> -->
            <select required name="UserType" placeholder="Select a User">
                <option disbaled selected hidden value=""> Select a user type</option>
                <option value="Student">Student</option>
                <option value="Staff">Staff</option>
            </select>
            </br>
            </br>
            <button name="submit" type="submit" id="entry-submit" data-submit="Submit my information" /> Submit </button>
        </form>    

        <div id="buttons">
            <a href="EditUserWebsite.php" class="btn Edit">Edit User</a>
            <a href="UpdateLocationWebsite.php" class="btn UpdateLocation">Update User Location</a>
            <a href="24hObtainWebsite.php" class="btn ObtainData">Obtain 24h Data</a>
            <a href="SearchLocationWebsite.php" class="btn SearchLocation">Search by Location</a>
            <a href="FetchData.php" class="btn Fetch">Fetch All Data</a>
        </div>

	</body>
</html>

