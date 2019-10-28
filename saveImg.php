<?php
$aImage = $_FILES['aBlob'];
$checkv = $_POST['test'];

$conn = new mysqli("localhost", "u414660191_delf", "delf.horsebattery","u414660191_Delf");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

} 

$stmt = $conn->prepare("UPDATE Artists SET ABlob = ? WHERE AEmail = 'joshua.schuessler@gmail.com'");
$null = null;
$stmt->bind_param("b", $null);
$stmt->send_long_data(0, $aImage);

$stmt->execute();

// if (mysqli_query($conn, $sql)) {
  echo $aImage;
//} else {
 ///  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//}


?>