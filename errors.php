<?php  if ($errors && count($errors) > 0) : ?>
	<script>
  	<?php foreach ($errors as $error) : ?>
  	 <?php echo "alert('".$error."');" ?>
  	<?php endforeach ?>
  	</script>
<?php  endif ?>