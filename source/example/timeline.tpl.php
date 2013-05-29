<?php require(__DOCROOT__ . __EXAMPLES__ . '/includes/header.inc.php'); ?>
<?php $this->RenderBegin(); ?>
    <script type="text/javascript">
        function drawVisualization() {
            // Create a JSON data table
            var data = [
                {
                    'start': new Date(2013,4,29),
						'content': 'Conversation<br><img src="http://almende.github.io/chap-links-library/js/timeline/examples/img/comments-icon.png" style="width:32px; height:32px;">'
                },
                {
                    'start': new Date(2013,4,29,23,0,0),
                    'content': 'Mail from boss<br><img src="http://almende.github.io/chap-links-library/js/timeline/examples/img/mail-icon.png" style="width:32px; height:32px;">'
                },
                {
                    'start': new Date(2013,4,30,16,0,0),
                    'content': 'Report'
                },
                {
                    'start': new Date(2013,5,1),
                    'end': new Date(2013,6,3),
                    'content': 'Traject A'
                },
                {
                    'start': new Date(2013,5,2),
                    'content': 'Memo<br><img src="http://almende.github.io/chap-links-library/js/timeline/examples/img/notes-edit-icon.png" style="width:48px; height:48px;">'
                },
                {
                    'start': new Date(2013,5,3),
                    'content': 'Phone call<br><img src="http://almende.github.io/chap-links-library/js/timeline/examples/img/Hardware-Mobile-Phone-icon.png" style="width:32px; height:32px;">'
                },
                {
                    'start': new Date(2013,5,5),
                    'end': new Date(2013,6,5),
                    'content': 'Traject B'
                },
                {
                    'start': new Date(2013,5,4,12,0,0),
                    'content': 'Report<br><img src="http://almende.github.io/chap-links-library/js/timeline/examples/img/attachment-icon.png" style="width:32px; height:32px;">'
                }
            ];

            // Draw our timeline with the created data and options
			$j('#QTimelineId').timeline('draw', data);
        }
    </script>
	
	<div class="instructions">
		<h1 class="instruction_title">Timeline JSON data</h1>
		<p>
			This demo shows how to feed the Timeline with JSON data.
			It mimics the original example from here: <a href="http://almende.github.io/chap-links-library/js/timeline/examples/example17_json_data.html">Timeline JSON data</a>
		</p>
	</div>
	
	<?php $this->btnDraw->Render(); ?>
	<?php $this->pnlTimeline->Render(); ?>

<!-- Information about where the used icons come from -->
<p style="color:gray; font-size:10px; font-style:italic;">
    Icons by <a href="http://dryicons.com" target="_blank" title="Aesthetica 2 Icons by DryIcons" style="color:gray;" >DryIcons</a>
    and <a href="http://www.tpdkdesign.net" target="_blank" title="Refresh Cl Icons by TpdkDesign.net" style="color:gray;" >TpdkDesign.net</a>
</p>

<?php $this->RenderEnd(); ?>
<?php require(__DOCROOT__ . __EXAMPLES__ . '/includes/footer.inc.php'); ?>
