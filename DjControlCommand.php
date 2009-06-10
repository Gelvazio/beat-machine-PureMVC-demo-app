<?php
class DJControlCommand extends SimpleCommand {
	public function execute(INotification $oNote) {
		/* setup the view */
		$this->facade->registerMediator(new DjBpmMediator());
		/* setup the model*/
		$iAmount = $oNote->getBody();
		$sCommandType = $oNote->getType();
		$oDjControlProxy = new DjControlProxy();
		$oDjControlProxy->$sCommandType($iAmount);

		/* save our changes and the view automatically gets updated! */
		$oDjControlProxy->save();
	}
}
