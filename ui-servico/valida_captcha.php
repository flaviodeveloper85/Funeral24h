<?php
session_start();
if(($_REQUEST['code_captcha'] == $_SESSION['random_number']) || @strtolower($_REQUEST['code_captcha']) == strtolower($_SESSION['random_number']) )
{	
	echo 1;// submitted
}
else
{
	echo 0; // invalid code_captcha
}
?>
