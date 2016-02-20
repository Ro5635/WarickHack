<?php
$pageTitle = 'Register an Arduino';
$pageDescription = 'Register your arduino';

require_once('../../Includes/CheckLogIn.php');
require_once('../../Includes/StdAdminHead.php');

echo '<span Class="Page"><section>';

include('../../Includes/StdImage.php');



?>

		<article id="MainPageContent">
						<span id="PageTitleContainer"><span id="PageTitle"><h1>Register an Arduino</h1></span></span>
						<span id="ArticleContentContainer">

													<?php //echo '<span id="PageHeadImage"> <img src="' .  cloudFrontCannedPolicyURLSign('https://cdn.ro5635.co.uk/Cone.jpg') . '"></span>'; 
						//Allow the user to create an account and upload an image to assosiate with the GUI:
						?>
						<form action="http://api.arduinowebgui.com/api.php" method='post' id="NameNewArduino">
							Simple name
							<br>
							<input type='text' name='simpleName'/>
							<input type = 'hidden' name = "TASK" value = 2/>
							<br>
							<input type="submit" value="Submit">
							
						</form>
						<form action="http://api.arduinowebgui.com/api.php" method='post' id="HashNewArduino">
							Hash value
							<br>
							<input type='hash' name='HashValue'/>
							<br>
							<input type="submit" value="Submit">
							

						</form>


					</span>
		</article>


<?php
echo '	</section></span>';
include('../../Includes/StdFooter.php');
?>


	
	
		

		



	