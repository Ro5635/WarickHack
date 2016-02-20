<?php
require_once('../Includes/image_check.php'); // getExtension Method
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
	require_once('../Includes/s3_config.php');
//Rename image name. 
	$actual_image_name = $_POST['fileName'] . ".".$ext;

	if($s3->putObjectFile($tmp,  $bucket , 'EE1EPE/Media/' . $actual_image_name,  S3::ACL_PRIVATE) )
	{
		$msg = "S3 Upload Successful."; 
		$s3file='https://cdn.ro5635.co.uk/'. $actual_image_name ;
		$outputMessages = 1;
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



$pageTitle = 'Create Account';
$pageDescription = 'Create an account';
$InsertGoogleSpamCatch = 1;

require_once('../Includes/StdHead.php');

echo '<span Class="Page"><section>';

include('../Includes/StdImage.php');



?>

<article id="MainPageContent">
	<span id="PageTitleContainer"><span id="PageTitle"><h1>Create and Account</h1></span></span>
	<span id="ArticleContentContainer">
						<?php //echo '<span id="PageHeadImage"> <img src="' .  cloudFrontCannedPolicyURLSign('https://cdn.ro5635.co.uk/Cone.jpg') . '"></span>'; 
						//Allow the user to create an account and upload an image to assosiate with the GUI:
						?>
						<form action="http://api.arduinowebgui.com/api.php" method='post' enctype="multipart/form-data">
							User name
							<input type='text' name='userName'/>
							<br>
							Password
							<input type='password' name='password'/>
							<br>
							<input type = 'hidden' name = "TASK" value = 1/>
							<input type="submit" value="Submit">
							
						</form>

						
					</span>
				</article>


				<?php
				echo '	</section></span>';
				include('../Includes/StdFooter.php');
				?>



