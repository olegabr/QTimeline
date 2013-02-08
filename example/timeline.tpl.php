<?php require(__CONFIGURATION__ . '/header.inc.php'); ?>
<?php $this->RenderBegin(); ?>

<div class="instructions">
	<h1 class="instruction_title">Displaying a timeline with a QTimeline</h1>
</div>
<div style="margin-left: 100px">
	<?php $this->pnlTimeline->Render(); ?>
</div>

<?php $this->RenderEnd(); ?>
<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>
