<?php
//API Version 0.1

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if($_POST['TASK'] == 1){
		CreateAccount($dbc, $_POST['userName'], $_POST['password']);
	}







function CreateAccount($dbc, $UserName, $Password){
	$stmt = $dbc->prepare('INSERT INTO Users(ComName, Password) VALUES(:UserName ,sha1(:UserPass))');
    $stmt->execute(array(':UserName' => $UserName , ':UserPass' => $pass ) );

}

function UploadImage(){


// require_once('../Includes/image_check.php'); // getExtension Method
// $msg='';
// $outputMessages = 0;
// $name = $_FILES['file']['name'];
// $size = $_FILES['file']['size'];
// $tmp = $_FILES['file']['tmp_name'];
// $ext = getExtension($name);

// if(strlen($name) > 0)
// {
// // File format validation
// 	if(in_array($ext,$valid_formats))
// 	{
// // File size validation
// if($size<(1024*1024 * 10))	//10 Megs is reasonable, cost is based on data don't forget!
// {
// 	require_once('../Includes/s3_config.php');
// //Rename image name. 
// 	$actual_image_name = $_POST['fileName'] . ".".$ext;

// 	if($s3->putObjectFile($tmp,  $bucket , 'EE1EPE/Media/' . $actual_image_name,  S3::ACL_PRIVATE) )
// 	{
// 		$msg = "S3 Upload Successful."; 
// 		$s3file='https://cdn.ro5635.co.uk/'. $actual_image_name ;
// 		$outputMessages = 1;
// 	}
// 	else
// 		$msg = "S3 Upload Fail.";

// }
// else
// 	$msg = "Image size Max 1 MB";

// }
// else
// 	$msg = "Invalid file, please upload image file.";

// }
// else
// 	$msg = "Please select image file.";

 }


}