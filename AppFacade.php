<?php
class AppFacade extends Facade {
	const SEND_DJ_COMMAND = 0;
	const DJ_COMMAND_COMPLETE = 1;

	protected $sRqUri = '';
	protected static $oInstance = null;

	public static function getInstance() {
		if(self::$oInstance == null)
			self::$oInstance = new self();
		return self::$oInstance;
	}

	public function configure($sRqUri) {
		$this->sRqUri = $sRqUri;
	}

	public function execDjCommand($sCommandType, $iAmount=1) {
		$this->sendNotification(self::SEND_DJ_COMMAND,
								$iAmount, $sCommandType);
	}
	
	public function initializeFacade() {
		parent::initializeFacade();
		$sCommandName = 'DjControlCommand';
		require_once("$sCommandName.php");
		$this->registerCommand(self::SEND_DJ_COMMAND, $sCommandName);
	}
}
