<?php
foreach($records as $row) ; ?>

<h2> <?php echo $row->title; ?> <h2/>

	<div> <?php echo $row->content; ?>

	<?php endforeach; ?>
		<?php else  : ?>
		

		<h2> No records were returned. <h2/>

		<?php endif; ?>