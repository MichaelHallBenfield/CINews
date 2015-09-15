<br/>
<div class="row">
	<div class="col-md-12 col-xs-6">
		<a class="btn btn-default" href="create">Create news item</a>

		<?php echo form_open(); ?>

			<?php foreach ($news as $news_item){ ?>

				<h3><?php echo $news_item['title']; ?></h3>
				<div class="main">
					<?php echo word_limiter($news_item['text'], 10); ?>
				</div>
				<br/>
				
				<p><a class="btn btn-default" href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>

				<?php echo form_label('Delete:', 'delete'); ?>
				<br/>
				<?php echo form_checkbox('delete[]', $news_item['id']); ?>
				
				<hr/>
				
			<?php }; ?>
		
			<?php if(count($news) > 0){ ?>
					
					<input class="btn btn-default" type="submit" name="submit" value="Delete posts"/>
		
			<?php } else { ?>
				
					<h3>There are currently no news items, why not create one?</h3>
				
			<?php } ?>
			<br/>
			<br/>
			
		<?php echo form_close(); ?>
		
	</div>
</div>