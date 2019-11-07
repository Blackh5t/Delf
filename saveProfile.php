<?php
$ti = time();
$t = strval($ti);

$aImage = file_get_contents($_FILES['AImage']['tmp_name']);
$aEmail = $_POST['AEmail'];
$aBio = $_POST['ABio'];
$aWebsite = $_POST['AWebsite'];
$aName = $_POST['AName'];
$aCountry = $_POST['ACountry'];
$aFolk = $_POST['AFolk'];
$aRock = $_POST['ARock'];
$aBlues = $_POST['ABlues'];
$aJamband = $_POST['AJamband'];
$aSongwriter = $_POST['ASongwriter'];
$aAlternative = $_POST['AAlternative'];
$aElectronic = $_POST['AElectronic'];
$aRap = $_POST['ARap'];
$aNotify = $_POST['ANotification'];
$aChange = $_POST['AChange'];
$ImgName = $_POST['AImgSrc'];


if($aChange == 1){
	unlink($ImgName);
	$ImgName = "img/". $t .".png";
	file_put_contents($ImgName, $aImage);

}




$conn = new mysqli("localhost", "u414660191_delf", "delf.horsebattery","u414660191_Delf");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

} 

$stmt = $conn->prepare("UPDATE Artists SET AName = (?), AWebsite = (?) , ABio = (?), ACountry = (?), AFolk = (?), ARock = (?), ABlues = (?), AJamband = (?), ASongwriter = (?), AAlternative = (?), AElectronic =(?), ARap = (?), AImage = (?), ANotification = (?) WHERE AEmail = (?)");
$stmt->bind_param("sssiiiiiiiiisis", $aName, $aWebsite, $aBio, $aCountry, $aFolk, $aRock, $aBlues, $aJamband, $aSongwriter, $aAlternative, $aElectronic, $ARap, $ImgName, $aNotify, $aEmail);
$stmt->execute();



/*$sql = "UPDATE Artists SET AName = '$aName', AWebsite = '$aWebsite', ABio = '$aBio', ACountry = '$aCountry', AFolk = '$aFolk', ARock = '$aRock', ABlues = '$aBlues', AJamband = '$aJamband', ASongwriter = '$aSongwriter', AAlternative = '$aAlternative', AElectronic ='$aElectronic', ARap = '$ARap', AImage = '$ImgName', ANotification = '$aNotify' WHERE AEmail = '$aEmail'";


 if (mysqli_query($conn, $sql)) {
    echo $aChange;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
*/
?>