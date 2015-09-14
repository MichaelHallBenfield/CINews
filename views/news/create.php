<div class="row">
	<div class="col-md-12 col-xs-6">
		<br/>

		<?php echo validation_errors(); ?>
			
		<?php echo form_open('news/create'); ?>

			<?php echo form_fieldset('Title'); ?>
				<?php echo form_input('title'); ?>
				<br/>
			<?php echo form_fieldset_close(); ?>
			<br/>

			<?php echo form_fieldset('Text'); ?>
				<?php echo form_textarea('text'); ?>
				<br/>
			<?php echo form_fieldset_close(); ?>
			<br/>

			<input class="btn btn-default" type="submit" name="submit" value="Create news item"/>

		<?php echo form_close(); ?>
	</div>
</div>