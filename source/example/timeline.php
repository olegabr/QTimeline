<?php
	require('../../../../includes/configuration/prepend.inc.php');

	class ExampleForm extends QForm {
		/** @var QSimpleTable */
		protected $pnlTimeline;
		/**
		 * @var QJqButton
		 */
		protected $btnDraw;

		protected function Form_Create() {
			$this->pnlTimeline = new QTimeline($this, 'QTimelineId');
			$this->pnlTimeline->ShowNavigation = true;
			$this->pnlTimeline->AxisOnTop = true;
			
			$this->btnDraw = new QJqButton($this);
			$this->btnDraw->Text = QApplication::Translate("Draw events");
			$this->btnDraw->AddAction(new QClickEvent, new QJavaScriptAction("drawVisualization();"));
		}
	}

	ExampleForm::Run('ExampleForm');
?>