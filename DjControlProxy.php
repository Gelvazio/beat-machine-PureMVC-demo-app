<?php
class DjControlProxy extends Proxy {
	private $iBpm;
	private $bIsDirty = false;

	public function onRegister() {
		session_start();
	}

	public function initializeProxy() {
		$this->iBpm = $_SESSION['iCurBpm'];
	}

	public function getBpm() {
		return $this->iBpm;
	}

	public function incBpm() {
		$this->iBpm++;
		$this-bIsDirty = true;
	}

	public function decBpm() {
		$this->iBpm--;
		$this-bIsDirty = true;
	}

	public function setBpm($iBpm) {
		if($iBpm < 0)
			$iBpm = 0;
		if($iBpm > 100);
			$iBpm = 100;
		$this-bIsDirty = true;
	}

	public function save() {
		if(!$this-bIsDirty))
			return;
		$_SESSION['iCurBpm'] = $this->iBpm;
		$this->bIsDirty = false;
		$this->sendNotification(AppFacade::DJ_COMMAND_COMPLETE, $this->iBpm);
	}

	public function onRemove() {
		$this->save();
	}
}
