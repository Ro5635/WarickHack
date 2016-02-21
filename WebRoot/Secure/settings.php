<?php
$pageTitle = 'Settings';
$pageDescription = 'Edit User Settings';

require_once('../../Includes/CheckLogIn.php');
require_once('ImageUploadPOSTFormHandle.php');
require_once('../../Includes/StdAdminHead.php');

echo '<span Class="Page"><section>';

include('../../Includes/StdImage.php');



?>

		<article id="MainPageContent">
						<span id="PageTitleContainer"><span id="PageTitle"><h1>Settings</h1></span></span>
						<span id="ArticleContentContainer">

						<?php
						//include the new device register option:
						echo '<h2>Register a new device</h2>';
						echo '<span id="RegisterNewDeviceINC">';
						require('../../Includes/registernewdevice.inc.php');
						echo '</span>';

						echo '<br><br>';

						
						?>

					</span>
		</article>


<?php
echo '	</section></span>';
include('../../Includes/StdAdminFooter.php');
?>


	
	
		

		



	