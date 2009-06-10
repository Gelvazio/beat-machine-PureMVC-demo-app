<?php
require_once('AppFacade.php');

/* grab relevant data from the environment */
/// set the action
$sAction = 'read';
if(isset($_REQUEST['sAction']) && !empty($_REQUEST['sAction']))
	$sAction = $_REQUEST['sAction'];
/// set the bpm
$iBpm = 0;
if(isset($_REQUEST['iBpm']) && !empty($_REQUEST['iBpm']))
	$iBpm = $_REQUEST['iBpm'];

/* load the AppFacade and execDjCommand().. */
$oAppFacade = AppFacade::getInstance();
$oAppFacade->execDjCommand($sAction, $iBpm);
