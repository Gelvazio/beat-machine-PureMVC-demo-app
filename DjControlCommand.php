<?php
class DJControlCommand extends SimpleCommand {
	protected $oDjControlProxy = null;

	public function execute(INotification $oNote) {
		require('DjBpmMediator.php');
		require('DjControlProxy.php');

		/* setup the view */
		$this->facade->registerMediator(new DjBpmMediator());

		/* setup the model*/
		$iAmount = $oNote->getBody();
		$sCommandType = $oNote->getType();
		$oDjControlProxy = new DjControlProxy();
		$this->facade->registerProxy($oDjControlProxy);
		switch($sCommandType) {
			case '<<':
				$oDjControlProxy->decBpm();
				break;
			case '>>':
				$oDjControlProxy->incBpm();
				break;
			case 'set':
				$oDjControlProxy->setBpm($iAmount);
				break;
			default:
				break;
		}

		/* save our changes and the view automatically gets updated! */
		$oDjControlProxy->save();
		$this->oDjControlProxy = $oDjControlProxy;
	}
}
