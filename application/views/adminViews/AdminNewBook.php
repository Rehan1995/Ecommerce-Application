<?php include 'Common/Header.php' ?>


<br><br>
<div style="text-align: center"><h2>Add Book</h2> </div>
<br><br><br><br>

<div class="row no-gutters">
	<div class="container">
		<?php if (!empty($error)) {
			echo $error;
		} ?>
		<?php echo form_open_multipart('Admin_Controller/addBookData') ?>
		<?php echo validation_errors(); ?>

		<?php
		if ($this->session->flashdata('msg')) {
			echo $this->session->flashdata('msg');
		} ?>
		<div class="form-group">
			<label for="exampleFormControlInput1">Title</label>
			<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter here" name="title">
		</div>
		<div class="form-group">
			<label for="exampleFormControlInput1">Author</label>
			<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter here"
				   name="author">
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Description</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
		</div>
		<div class="form-group">
			<label for="exampleFormControlInput1">Price</label>
			<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter here"
				   name="price">
		</div>
		<div class="form-group">
			<label for="exampleFormControlSelect1">Category</label>
			<select class="form-control" id="exampleFormControlSelect1" name="category">
				<?php foreach ($displayCategories as $data) {
					echo "<option value='" . $data['id'] . "'>" . $data['name'] . "</option>";
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleFormControlFile1">Input image</label>
			<input type="file" class="form-control-file" name="image">
		</div>

		<div style="text-align: center">
		<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>

<?php include 'Common/Footer.php' ?>


