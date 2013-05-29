<?php

$objPlugin = new QPlugin();
$objPlugin->strName = "QTimeline";
$objPlugin->strDescription = 'qcubed plugin QTimeline';
$objPlugin->strVersion = "0.1";
$objPlugin->strPlatformVersion = "2.1";
$objPlugin->strAuthorName = "Oleg Abrosimov";
$objPlugin->strAuthorEmail = "olegabr [at] yandex [dot] ru";

$components = array();

$components[] = new QPluginJsFile("timeline/timeline-min.js");
$components[] = new QPluginJsFile("timeline/timeline.js");
$components[] = new QPluginCssFile("timeline/timeline.css");
$components[] = new QPluginImageFile("timeline/img");

$components[] = new QPluginControlFile("includes/QTimeline.class.php");
$components[] = new QPluginControlFile("includes/QTimelineBase.class.php");
$components[] = new QPluginControlFile("includes/QTimelineGen.class.php");
$components[] = new QPluginIncludedClass("QTimeline", "includes/QTimeline.class.php");
$components[] = new QPluginIncludedClass("QTimelineBase", "includes/QTimelineBase.class.php");
$components[] = new QPluginIncludedClass("QTimelineGen", "includes/QTimelineGen.class.php");

$components[] = new QPluginExample("example/timeline.php", "qcubed plugin QTimeline");
$components[] = new QPluginExampleFile("example/timeline.php");
$components[] = new QPluginExampleFile("example/timeline.tpl.php");

$objPlugin->addComponents($components);
$objPlugin->install();

?>
