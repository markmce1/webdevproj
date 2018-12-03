<?php
session_start();

if(isset($_SESSION['login_user']))
{
	
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

			$sql = "SELECT COUNT(*) FROM `book` ";

		$result = $conn->query($sql);
		$row = $result->fetch_array(MYSQLI_NUM);
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
		
			$search = "";
			$offset = ($currentpage - 1) * $pagelimit;

		
			$sql = "SELECT * FROM `book` LIMIT $offset , $pagelimit";
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

    
    
    
    	<form method="post" action="favourites.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin w3-display-middle" style="width:50%">
            <h2 class="w3-center">Enter book number to store in your favourites</h2>
 
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"></div>
                <div class="w3-rest">
                    <input class="w3-input w3-border" name="ISBN" type="ISBN" placeholder="ISBN">
                </div>
            </div>
            
            <input type="submit" value="submit" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">

        </form>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<div class = "fadeinout" id="fadetext"> <h1> Books</h1>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<div class = "fadeinout" id="fadetext"> <h1> </h1>  
            <script>
			fadeloop('#fadetext', 1500,1200,true);
			
			function fadeloop(el, timeout, timein, loop)
			{
				var $el = $(el),intID,fn = function()
					{
						$el.fadeOut(timeout).fadeIn(timein);
					};
					fn();
					if(loop)
					{
						intId = setInterval(fn,timeout+timein+100);
						return intId;
					}
				return false;
			}
			</script>
		</div>
  
		
		<div id="navbar2" style="margin-left:45%" class="w3-container">
		<?php $range = 3;
			
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
			?>
   </body>
</html>
