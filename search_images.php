<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = "images";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$searchtext=$_POST["search"];

$select_images="SELECT * FROM images WHERE imagetext LIKE '%$searchtext%'";

if ($res = $conn->query($select_images)) {
  echo "Displaying search results for \"$searchtext\"<br>";
  echo "No of images : ".$res->num_rows."<br>";
  while ($row = $res->fetch_assoc()) {
    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['imagetmp'] ).'"/>';
  }
}
else {
 $error = "Error: " . $select_images . "<br>" . $conn->error;	
   echo $error;
}

?>