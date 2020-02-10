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

$select_images="SELECT * FROM images";

if ($res = $conn->query($select_images)) {
  echo "No of images : ".$res->num_rows."<br>";
  while ($row = $res->fetch_assoc()) {
    echo '<form action="find_similar.php?text='.$row['imagetext'].'" method="POST">
    <img src="data:image/jpeg;base64,'.base64_encode($row['imagetmp'] ).'"/>
    <input type="submit" value="Find similar images"/></form>';
  }
 }
else {
 $error = "Error: " . $select_images . "<br>" . $conn->error;	
   echo $error;
}

?>