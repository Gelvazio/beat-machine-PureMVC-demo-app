<?php
/* essentially the same as index.php, only it lest us
 * specify paramters via the cli
 */

require_once('AppFacade.php');

define('_DEBUG_', false);

/* grab relevant data from the environment */
$sRqUri = $argv[1];
$aRqPieces = explode('|', $sRqUri);

/// set the bpm
/// set the bpm
$iBpm = 0;
if(isset($argv[2]))
	$iBpm = $argv[2];

if(_DEBUG_) {
	die(var_dump(array(
		'sUri' => $sRqUri,
		'iBpm' => $iBpm)));
}

/* load the AppFacade and execDjCommand().. */
$oAppFacade = AppFacade::getInstance();
$oAppFacade->configure($sRqUri);
$oAppFacade->execDjCommand($aRqPieces[0], $iBpm);
