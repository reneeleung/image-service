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

$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

$imagetext=$_POST["mytext"];

//Insert the image name and image content in image_table
$insert_image="INSERT INTO images(imagename, imagetmp, imagetext) VALUES('$imagename','$imagetmp','$imagetext')";

if ($conn->query($insert_image) === TRUE) {
  echo "Image $imagename uploaded successfully";
} 
else {
 $error = "Error: " . $insert_image . "<br>" . $conn->error;	
   echo $error;
}

?>