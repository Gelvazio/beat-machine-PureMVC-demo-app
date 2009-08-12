<?php
class DjControlProxy extends Proxy {
	private $iBpm = 0;
	private $bIsDirty = false;

	public function onRegister() {
		session_start();
		
		if(isset($_SESSION) && isset($_SESSION['iCurBpm']))
			$this->iBpm = $_SESSION['iCurBpm'];
	}

	public function getBpm() {
		return $this->iBpm;
	}

	public function incBpm() {
		$this->setBpm($this->iBpm + 1);
	}

	public function decBpm() {
		$this->setBpm($this->iBpm - 1);
	}

	public function setBpm($iBpm) {
		if($iBpm < 0)
			$iBpm = 0;
		if($iBpm > 100)
			$iBpm = 100;
		$this->iBpm = (int)$iBpm;
		$this->bIsDirty = true;
	}

	public function save() {
		if($this->bIsDirty) {
			$_SESSION['iCurBpm'] = $this->iBpm;
			$this->bIsDirty = false;
		}
		$this->sendNotification(AppFacade::DJ_COMMAND_COMPLETE, $this->iBpm);
	}

	public function onRemove() {
		$this->save();
	}
}
