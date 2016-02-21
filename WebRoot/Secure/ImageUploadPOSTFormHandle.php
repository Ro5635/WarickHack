<?php
require_once('../../Includes/CheckLogIn.php');

require_once('/var/www/html/ArduinoWebGUI/EE1EPEDBC.php');
require_once('image_check.php'); // getExtension Method
$msg='';
$outputMessages = 0;
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$name = $_FILES['file']['name'];
	$size = $_FILES['file']['size'];
	$tmp = $_FILES['file']['tmp_name'];
	$ext = getExtension($name);

	if(strlen($name) > 0)
	{
// File format validation
		if(in_array($ext,$valid_formats))
		{
// File size validation
if($size<(1024*1024 * 10))	//10 Megs is reasonable, cost is based on data don't forget!
{
	require_once('s3_config.php');
//Rename image name. 
	$actual_image_name = $_POST['fileName'] . ".".$ext;

	if($s3->putObjectFile($tmp,  'uniprojects', 'WarwickHack/' .  $_SESSION['UserID'] . '/' . $actual_image_name,  S3::ACL_PRIVATE) )
	{
		$msg = "S3 Upload Successful."; 
		$s3file='https://cdn.ro5635.co.uk/'. $actual_image_name ;
		$outputMessages = 1;

		$stmt = $dbc->prepare('INSERT INTO ImageBank(ImageName, ImageAltText) VALUES(:FileName, :AltText) ');
  		$stmt->execute(array(':FileName' => $actual_image_name , ':AltText' => $_POST['altText'] ) );
  		//Need to add this image ID to the Device table...

  		$ImageID = $dbc->lastInsertId();
error_log($ImageID . ' And the s var is : ' . $_SESSION['RegisternewDeviceID']);
  		$stmt = $dbc->prepare('UPDATE Devices SET ImageID = :ImageID WHERE DeviceID = :DeviceID');
  		$stmt->execute(array(':ImageID' => $ImageID , ':DeviceID' => $_SESSION['RegisternewDeviceID'] ) );

  		$_SESSION['RegisternewDeviceID'] = '';

	}
	else
		$msg = "S3 Upload Fail.";

}
else
	$msg = "Image size Max 1 MB";

}
else
	$msg = "Invalid file, please upload image file.";

}
else
	$msg = "Please select image file.";

}



		// <form action="" method='post' enctype="multipart/form-data">
		// 	Upload image file here
		// 	<input type='file' name='file'/>
		// 	<br><br>
		// 	FileName: (Ensure Unique!!)<input type="text" name="fileName">
		// 	<br><br>
		// 	<input type='submit' value='Upload Image'/>
			
		//	echo $msg; 
		//	if($outputMessages == 1){
		//		echo "Image placed at: $s3file";
		//		echo '<br><br>Image:<br><br>';
		//		echo '<img src="' . cloudFrontCannedPolicyURLSign($s3file) . '">';
		//	}
		//	echo '</form>';
			?>
		

