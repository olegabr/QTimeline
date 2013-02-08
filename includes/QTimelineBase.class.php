<?php

	/**
	 * Base class for QTimeline plugin
	 *
		Name	Type	Default	Description
	 * @property boolean $Animate When true, events are moved animated when resizing or moving them.
	 * This is very pleasing for the eye, but does require more computational power.
		animateZoom	boolean	true	When true, events are moved animated when zooming the Timeline. This looks cool, but does require more computational power.
		axisOnTop	boolean	false	If false (default), the horizontal axis is drawn at the bottom. If true, the axis is drawn on top.
		box.align	String	"center"	Alignment of items with style "box". Available values are "center" (default), "left", or "right").
		dragAreaWidth	Number	10	The width of the drag areas in pixels. When an event range is selected, it has a drag area on the left and right side, with which the start or end time of the even can be manipulated.
		editable	boolean	false	If true, the events can be edited, created and deleted. Events can only be editable when th option selectable is true (default). When editable is true, the Timeline can fire events change, edit, add, delete.
		end	Date	none	The initial end date for the axis of the timeline. If not provided, the latest date present in the events is taken as end date.
		eventMargin	int	10	The minimal margin in pixels between events.
		eventMarginAxis	int	10	The minimal margin in pixels between events and the horizontal axis.
		groupsChangeable	boolean	true	If true (default), items can be moved from one group to another. Only applicable when groups are used.
		groupsOnRight	boolean	false	If false, the groups legend is drawn at the left side of the timeline. If true, the groups legend is drawn on the right side.
		groupsWidth	string	none	By default, the width of the groups legend is adjusted to the group names. A fixed width can be set for the groups legend by specifying the groupsWidth as a string, for example "200px".
		height	string	"auto"	The height of the timeline in pixels, as a percentage, or "auto". When the height is set to "auto", the height of the timeline is automatically adjusted to fit the contents. If not, it is possible that events get stacked so high, that they are not visible in the timeline. When height is set to "auto", a minimum height can be specified with the option minHeight.
		intervalMax	Number	315360000000000	Set a maximum interval for the visible range in milliseconds. It will not be possible to zoom out further than this maximum. Default value equals about 10000 years.
		intervalMin	Number	10	Set a minimum interval for the visible range in milliseconds. It will not be possible to zoom in further than this minimum.
		max	Date	none	Set a maximum Date for the visible range. It will not be possible to move beyond this maximum.
		min	Date	none	Set a minimum Date for the visible range. It will not be possible to move beyond this minimum.
		minHeight	Number	0	Specifies a minimum height for the Timeline in pixels. Useful when height is set to "auto".
		moveable	boolean	true	If true, the timeline is movable. When the timeline moved, the rangechange events are fired.
		scale	links.StepDate.SCALE	none	Set a custom scale. Automatic scaling will be disabled. Both options scale and step must be set. For example scale=SCALE.MINUTES and step=5 will result in minor steps of 5 minutes, and major steps of an hour. Available scales: MILLISECOND, SECOND, MINUTE, HOUR, DAY, MONTH, YEAR. As step size, choose for example 1, 2, 5, or 10.
		selectable	boolean	true	If true, the events on the timeline are selectable. When an event is selected, the select event is fired.
		snapEvents	boolean	true	If true, the start and end of an event will be snapped nice integer values when moving or resizing the event.
		stackEvents	boolean	true	If true, the events are stacked above each other to prevent overlapping events. This option cannot be used in combination with grouped events.
		start	Date	none	The initial start date for the axis of the timeline. If not provided, the earliest date present in the events is taken as start date.
		step	number	none	See option scale.
		style	string	"box"	Specifies the style for the timeline events. Choose from "dot" or "box". Note that the content of the events may contain additional html formatting.
		showCurrentTime	boolean	true	If true, the timeline shows a red, vertical line displaying the current time. This time can be synchronized with a server via the method setCurrentTime.
		showCustomTime	boolean	false	If true, the timeline shows a blue vertical line displaying a custom time. This line can be dragged by the user. The custom time can be utilized to show a state in the past or in the future. When the custom time bar is dragged by the user, an event is triggered, on which the contents of the timeline can be changed in to the state at that moment in time.
		showMajorLabels	boolean	true	By default, the timeline shows both minor and major date labels on the horizontal axis. For example the minor labels show minutes and the major labels show hours. When showMajorLabels is false, no major labels are shown.
		showMinorLabels	boolean	true	By default, the timeline shows both minor and major date labels on the horizontal axis. For example the minor labels show minutes and the major labels show hours. When showMinorLabels is false, no minor labels are shown. When both showMajorLabels and showMinorLabels are false, no horizontal axis will be visible.
		showNavigation	boolean	false	Show a navigation menu with buttons to move and zoom the timeline.
		zoomable	boolean	true	If true, the timeline is zoomable. When the timeline is zoomed, the rangechange event is fired.
		width	string	"100%"	The width of the timeline in pixels or as a percentage.
	 * 
	 */
	class QTimelineBase extends QTimelineGen {
		
		protected $blnAnimate = true;


		public function  __construct($objParentObject, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);
			$this->AddJavascriptFile("../../plugins/QTimelineJs/timeline/timeline-min.js");
			$this->AddCssFile("../../plugins/QTimelineJs/timeline/timeline.css");
			
			$this->CssClass = 'timeline';
		}
		
		protected function GetControlHtml() {
			$strStyle = $this->GetStyleAttributes();
			if ($strStyle)
				$strStyle = sprintf('style="%s"', $strStyle);

			$strToReturn = sprintf('<div id="%s" %s %s></div>',
				$this->strControlId,
				$this->GetAttributes(),
				$strStyle);

			return $strToReturn;
		}
		
		protected function makeJsProperty($strProp, $strKey) {
			$objValue = $this->$strProp;
			if (null === $objValue) {
				return '';
			}

			return $strKey . ': ' . JavaScriptHelper::toJsObject($objValue) . ', ';
		}

		protected function getDataJson() {
			$strData = '';
			return $strData;
		}
		protected function makeJqOptions() {
			$strJqOptions = '';
			$strJqOptions .= $this->makeJsProperty('Animate', 'animate');
			if ($strJqOptions) $strJqOptions = substr($strJqOptions, 0, -2);
			return $strJqOptions;
		}
		
		public function getJqControlId() {
			return $this->ControlId;
		}

		public function GetControlJavaScript() {
			// timeline = new links.Timeline(document.getElementById('mytimeline'));
			// timeline.draw(data, options);
			return sprintf('qc.controllers["%s"]=new links.Timeline(document.getElementById("%s")); qc.controllers["%s"].draw([%s], {%s});'
				, $this->getJqControlId(), $this->getJqControlId(), $this->getJqControlId()
				, $this->getDataJson(), $this->makeJqOptions());
		}

		public function GetEndScript() {
			return  $this->GetControlJavaScript() . '; ' . parent::GetEndScript();
		}
		
		public function __get($strName) {
			switch ($strName) {
				case 'Animate': return $this->blnAnimate;
				default: 
					try { 
						return parent::__get($strName); 
					} catch (QCallerException $objExc) { 
						$objExc->IncrementOffset(); 
						throw $objExc; 
					}
			}
		}
		public function __set($strName, $mixValue) {
			switch ($strName) {
				case "Animate":
					try {
						$blnAnimate = QType::Cast($mixValue, QType::Boolean);
						$this->blnAnimate = $blnAnimate;
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					break;
			}
		}
	}
?>
