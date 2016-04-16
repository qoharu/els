<?php include "header.php" ?>
<?php //echo $this->session->userdata('uid') ?>
	<form action="<?php echo site_url('journal/post_new') ?>" method="post" enctype="multipart/form-data">
		<input type="text" name="title" placeholder="title"><br>
		<textarea name="description" id="" cols="30" rows="10" maxlength="500"></textarea><br>
		<select name="directorate" id="">
			<?php foreach ($directorate as $dir): ?>
				<option value="<?php echo $dir->id_directorate ?>"><?php echo $dir->directorate_name ?> </option>
			<?php endforeach ?>
		</select><br>
		<input type="file" name="file"><br>
		<input type="submit">
	</form>
</body>
</html>