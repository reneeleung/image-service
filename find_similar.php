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
  echo "<script type='text/javascript'>alert('".$_GET['text']."');</script>";
  $keywords = preg_split('/\s+/', $_GET['text']);

  foreach ($keywords as $key) {
    $sql="SELECT * FROM images WHERE imagetext LIKE '%$key%'";
    if ($res = $conn->query($sql)) {
      while ($row = $res->fetch_assoc()) {
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['imagetmp'] ).'"/>';
      }
    }
    else {
      $error = "Error: " . $select_images . "<br>" . $conn->error;	
        echo $error;
    }
  }
?>