<?php
	require('../../../../includes/configuration/prepend.inc.php');

	class ExampleForm extends QForm {
		/** @var QSimpleTable */
		protected $pnlTimeline;

		protected function Form_Create() {
			// Define the DataGrid
			$this->pnlTimeline = new QTimeline($this, 'QTimelineId');
		}
	}

	ExampleForm::Run('ExampleForm');
?>