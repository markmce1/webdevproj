<?php

$ISBN = $_POST['ISBN'];

session_start();

if(isset($_SESSION['login_user']))
{

}
else
{
	header("Location:login.html");
}


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
            $username = $_SESSION['login_user'];
            $ISBN = $_POST['ISBN'];

            $sql = "select BookTitle from book where ISBN = '$ISBN'";
            $result = $conn->query($sql);
            $booktitle = $result;



            $sql2 = "select Author from book where ISBN = $ISBN";
            $result = $conn->query($sql2);
            $author = $result;

            
            $sql = "INSERT INTO `favourites` values ('$username', '$ISBN', '$booktitle', '$author')";

            
            if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            } 
            else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

    

?>
