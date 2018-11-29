<?php
session_start();

if(isset($_SESSION['login_user']))
{
	
}
else
{
	header("Location:login.html");
}

If(isset($_POST['search']))
{
	$search = $_POST['search'];
}
If(isset($_POST['option']))
{
	$option = $_POST['option'];
}

If(isset($_GET['search']))
{
	$search = $_GET['search'];
}
If(isset($_GET['option']))
{
	$option = $_GET['option'];
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
               <a href="index.html"><img src="Assets/Images/DIT_logocol_reverse2013.png"></img></a>
               <span id="spanNav">
                  <h1> DIT Libary </h1>
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
	  <div id="content">
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

			
			
		if(isset($search))
		{
			$sql = "SELECT COUNT(*) FROM `book` WHERE `$option` LIKE '%{$search}%'";
		}
		
		if(isset($cat))
		{
			$sql = "SELECT COUNT(*) FROM book WHERE Category = '$cat'";
		}
			
		$result = $conn->query($sql);
		$row = $result->fetch_array(MYSQLI_NUM)  or die($conn->error);
		$num = $row[0];
		
		$pagelimit = 10;
		
		$total = ceil($num/$pagelimit);
		
		
		if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
		
			$currentpage = (int) $_GET['currentpage'];
		} 
		else 
		{
			$currentpage = 1;
		} 
		
		if ($currentpage > $total) {
		  
		   $currentpage = $total;
		} 
		if ($currentpage < 1) {
		  
		   $currentpage = 1;
		}
		
		
		$offset = ($currentpage - 1) * $pagelimit;

			if(isset($option))
			{
			$conn->real_escape_string($search);
			$sql = "SELECT * FROM `book` WHERE `$option` LIKE '%{$search}%'  LIMIT $offset,$pagelimit";
			}
			
			if(isset($cat))
			{
			$sql = "SELECT * FROM `book` WHERE Category = '$cat'  LIMIT $offset,$pagelimit";
			}
			
			
			$result = $conn->query($sql);
			if ($conn->error) {
				die("Connection failed: " . $conn->error);
			}
			echo '<table class="w3-table-all">';
			echo '<tr class="w3-blue">';
			echo '<th>ISBN</th>';
			echo '<th>BookTitle</th>';
			echo '<th>Author</th>';
			echo '<th>Category</th>';
			echo '<th>Year</th>';
			echo '<th>Edition</th>';
			echo '</tr>';

			
			while ($list = $result->fetch_assoc()) 
			{
				echo "<tr class=" . "w3-hover-white" . ">";
				echo "<td>" . $list['ISBN'] . "</td>";
				echo "<td>" . $list['BookTitle'] . "</td>";
				echo "<td>" . $list['Author'] . "</td>";
				echo "<td>" . $list['Category'] . "</td>";
				echo "<td>" . $list['Year'] . "</td>";
				echo "<td>" . $list['Edition'] . "</td>";
				
                
				echo "</tr>";
			}
				
		
	  ?>
	  </div>
	  <div id="navbar2" style="margin-left:45%" class="w3-container">
	  <?php 
	  
			$range = 3;
			
			if(isset($option))
			{
				for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
			   
				   if (($x > 0) && ($x <= $total)) {
					 
					  if ($x == $currentpage) {
						 echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x&search=$search' class='w3-button w3-blue'>$x</a> ";
					  } 
					  else {
						 
						 echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x&search=$search' class='w3-button'>$x</a> ";
						 
					  } 
				   } 
				} 
			}
			
			if(isset($cat))
			{
				for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
			   
				   if (($x > 0) && ($x <= $total)) {
					 
					  if ($x == $currentpage) {
						 echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x&cat=$cat' class='w3-button w3-blue'>$x</a> ";
					  } 
					  else {
						 
						 echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x&cat=$cat' class='w3-button'>$x</a> ";
						 
					  } 
				   } 
				} 
			}
				
				
			?>
	  </div>
   </body>
</html>