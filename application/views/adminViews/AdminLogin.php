<?php include 'application/views/template/header.php' ?>


<div class="container">
	<div class="row">

		<div class="col-4" style="margin: 10% 30% 0 30%">

				<h1>Admin Login</h1>
				<p>Please enter your username and password</p>

			<?php echo form_open('/Admin_Controller') ?>
			<div class="form-group">
				<input type="text" class="form-control" id="username" name="username" placeholder="Username">
			</div>

			<div class="form-group">
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			</div>

			<button type="submit" class="btn btn-primary">Login</button>
			<?php if ($this->session->flashdata('errmsg')) {
				echo "<p>".$this->session->flashdata('errmsg')."</p>";

			}?>

			<?php echo form_close(); ?>

	</div>
	</div>
</div>


<?php include 'application/views/template/footer.php' ?>
