<div>
	<ul>
		<?php foreach($results as $result): ?>
			<li>
				<?php $id = $result->id; ?>
				<?php echo anchor('home/load_blog/'.$id, $result->title , array('title' => 'The best news!')); ?>
			</li>
		<?php endforeach; ?>
	</ul>
</div> 