<h1>Tarzz Theme Options</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" >
  <?php settings_fields('tarzz-setting-group');?>
  <?php do_settings_sections( 'zaheercena' )?>
  <?php submit_button()?>
</form>
