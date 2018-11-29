<?php
session_start();

if(isset($_SESSION['login_user']))
{
	$nameofuser = $_SESSION['login_user'];
}
else
{
	header("Location:login.html");
}


?>

<!DOCTYPE HTML>
<html>
   <head>
      <title>Main Page</title>
      <link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
      <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta charset="UTF-8">
   </head>
   <body>
      <div id="main">
         <header>
            <nav>
               <a href="loginpage.php"><img src="Assets/Images/DIT_logocol_reverse2013.png"></img></a>
               <span id="spanNav">
                  <h1> DIT Library </h1>
               </span>
               <ul>
                   <li><a class="active" href="contact.html">Contact Us</a></li>
                  <li><a href="MyProfile.php">MyProfile</a></li>
                  <li><a href="catalog.php">Catalog</a></li>
                  <li><a href="user.php">Home</a></li>
               </ul>
            </nav>
         </header>
      </div>
    
    <div id="Title" class="w3-container" style="width:50%; margin-left:25%; color: #0095DA">
        
        <h2>My profile</h2>
        <a href="deletepage.php">Click here to delete your account</a>
        
        
        
    </div>
<?php
	  
		$servername = "localhost";
		$username = "root";
		$passwordDB = "";
		$dbname = "webdevproj";

		// Create connection
		$conn = new mysqli($servername,$username,$passwordDB,$dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

			$sql = "SELECT COUNT(*) FROM `book`";

		$result = $conn->query($sql);
		$row = $result->fetch_array(MYSQLI_NUM);
		$num = $row[0];
		

		
			$sql = "SELECT * FROM `favourites` where 'username' = $nameofuser";
			$result = $conn->query($sql);
			if ($conn->error) {
				die("Connection failed: " . $conn->error);
			}
			echo '<table class="w3-table-all">';
			echo '<tr class="w3-blue">';
			echo '<th>ISBN</th>';
			echo '<th>BookTitle</th>';
			echo '<th>Author</th>';
			echo '</tr>';

			
			while ($list = $result->fetch_assoc()) 
			{
				echo "<tr class=" . "w3-hover-white" . ">";
				echo "<td>" . $list['ISBN'] . "</td>";
				echo "<td>" . $list['BookTitle'] . "</td>";
				echo "<td>" . $list['Author'] . "</td>";
				echo "</tr>";
			}
          
				 

?>