<?php
require_once('AppFacade.php');

/* grab relevant data from the environment */
/// parse the request uri
$sRqUri = trim($_SERVER['REQUEST_URI'], '/');
$aRqPieces = explode('|', $sRqUri);
/// set the bpm
$iBpm = 0;
if(isset($_REQUEST['iBpm']) && !empty($_REQUEST['iBpm']))
	$iBpm = $_REQUEST['iBpm'];

/* load the AppFacade and execDjCommand().. */
$oAppFacade = AppFacade::getInstance();
$oAppFacade->configure($sRqUri);
$oAppFacade->execDjCommand($aRqPieces[0], $iBpm);
