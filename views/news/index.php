<div class="row">
	<div class="col-md-12 col-xs-6">
		<?php foreach ($news as $news_item){ ?>

				<h3><?php echo $news_item['title']; ?></h3>
				<div class="main">
						<?php echo word_limiter($news_item['text'], 10); ?>
				</div>
				<br/>
				<a class="btn btn-default" href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a>
				
				<hr/>

		<?php }; ?>
	</div>
</div>