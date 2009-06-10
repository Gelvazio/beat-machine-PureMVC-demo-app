<div id="bpmView">
	<p id="bpmViewTitle">
		BPM View
	</p>
	<p id="bpmGraphic">
	<?php
		if(!is_string($this->sBpmGraphic) || empty($this->sBpmGraphic))
			echo 'N/A';
		else
			echo $this->sBpmGraphic;
	?>
	</p>
	<p>
	<?php
		/// display 0 by default
		$iBpm = 0;
		if(is_integer($this->iBpm) && $this->iBpm > 0)
			$iBpm = $this->iBpm;
	?>
	Current BPM: <?=$iBpm?>
	</p>
</div>
