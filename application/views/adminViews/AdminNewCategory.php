<?php include 'Common/Header.php' ?>


<br><br>
<div style="text-align: center"><h2>Add a category </h2> </div>
<br><br><br><br>

<div class="container">
	<h4>Categories</h4>
	<?php

	echo form_open('/Admin_Controller/addCategory');
	?>

	<div class="form-group">
		<input type="text" class="form-control" id="category" name="category" placeholder="Category" required>
	</div>
<br>
	<div style="text-align: center">
	<button type="submit" class="btn btn-primary">Add new category</button>
	</div>
	<?php echo form_close(); ?>


<?php include 'Common/Footer.php' ?>
