<?php
$conn=mysqli_connect("localhost","root","","passwordmanager");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "";
?>