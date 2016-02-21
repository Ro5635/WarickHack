<?php
$pageTitle = 'Control a remote Arduino';
$pageDescription = 'Control a remote Arduino';

require_once('../../Includes/CheckLogIn.php');
require_once('../../Includes/StdAdminHead.php');

echo '<span Class="Page"><section>';

include('../../Includes/StdImage.php');

?>

		<article id="MainPageContent">
						<span id="PageTitleContainer"><span id="PageTitle"><h1>Control</h1></span></span>
						<span id="ArticleContentContainer">

						<?php
						//include the new device register option:
							
							function GetDevicesForUserID($dbc, $UserID){
								$stmt = $dbc->prepare('SELECT DeviceID, SimpleName, JoinDate FROM Devices Where UserID = :UserID');
  								$stmt->execute(array(':UserID' => $UserID ) );
  								$Data = $stmt->fetchAll(PDO::FETCH_ASSOC);	
  								return $Data;
							}

							$DataBaseData = GetDevicesForUserID($dbc, $_SESSION['UserID']);

							foreach ($DataBaseData as $key => $SingleDevice) {
								echo '<span id="' . $SingleDevice['DeviceID'] . '" class="DeviceButton">' . $SingleDevice['SimpleName'] . '<br> Created: ' . $SingleDevice['JoinDate'] . '</span>';
							}

						?>



					</span>
		</article>


<?php
echo '	</section></span>';
include('../../Includes/StdAdminFooter.php');
?>


	
	
		

		



	