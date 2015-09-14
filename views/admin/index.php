<div class="row">
	<div class="col-md-12 col-xs-6">
		<br/>
		
		<?php echo form_open(); ?>
			<?php echo form_fieldset('Username:'); ?>
				<?php echo form_input('user'); ?>
			<?php echo form_fieldset_close(); ?>
			<br/>
			
			<?php echo form_fieldset('Password:'); ?>
				<?php echo form_password('pass'); ?>
			<?php echo form_fieldset_close(); ?>
			<br/>
			
			<?php echo form_hidden('remember', 'remember') ?>
			
			<?php echo form_submit('submit', 'Go'); ?>
			
		<?php echo form_close(); ?>
			
	</div>
</div>