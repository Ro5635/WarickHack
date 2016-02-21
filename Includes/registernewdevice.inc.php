            <?php
            require_once('CheckLogIn.php');
            ?>
            <span class="FormPartOne">
            	<form method='post' id="registerNewDevice">
            		<p>Please name the device that you wish to create a GUI for, this name is a referance for you only.</p>
            		Device Name:
            		<br>
            		<input type='text' name='simpleName'/>
            		<input type = 'hidden' name = "TASK" value = "2"/>
            		<br>
            		<input type="submit" value="Submit">

            	</form>
            </span>
            <span class="FormSecondStage">
            	<p><h2>Success!</h2><br><span id="NewDeviceName"></span> has been succesfuly created.</p>
            	<p>In order to use your Arduino GUI please copy and paste this bellow tocken in to your local client application.</p>
            	<textarea id="DeviceHashValue"></textarea>
            </span>

            <span class="UploadDeviceImage">
            	<form method='post'  id="UploadDeviceImageForm"  enctype="multipart/form-data">
            		<p>Please provide an image to identify this device, this image will be securly uploaded and used to represent your device</p>
            		<br>
            		<?php 
            			if(isset($msg)){
            			echo $msg;
            			if($outputMessages == 1){
            				//echo "Image placed at: $s3file";
            				//echo '<br><br>Image:<br><br>';
            				//echo '<img src="' . cloudFrontCannedPolicyURLSign($s3file) . '">';
            			}
            		} 
            		?>
            		Name Image: <input type="text" name="fileName">
            		<input type = 'hidden' name = "TASK" value = "3"/>
            		<br>
            		File:<input type='file' name='file'/>
            		<br><br>
            		<textarea name="altText"></textarea>
            		<input type="submit" value="Submit">
            		
            	</form>
            </span>
        </span>
    </article>





