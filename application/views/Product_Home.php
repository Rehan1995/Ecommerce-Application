<?php include 'template/header.php' ?>



<div class="title" align="center">
	<h1> E-Bookstore </h1>

</div>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="<?php echo base_url('uploads/slide33.jpg') ?>" alt="Picture 1">
			<div class="carousel-caption">
				<h1>Welcome to E-Bookstore</h1>
				<h3>Search what you want !</h3>

			</div>
		</div>
		<div class="item">
			<img src="<?php echo base_url('uploads/slide11.jpg') ?>" alt="Picture 3">
			<div class="carousel-caption">
				<h1>Different kinds of Books !</h1>

			</div>
		</div>

		<div class="item">
			<img src="<?php echo base_url('uploads/slide55.jpeg') ?>" alt="Picture 2">
			<div class="carousel-caption">
				<h1>Unlimited book categories</h1>



			</div>
		</div>
		<div class="item">
			<img src="<?php echo base_url('uploads/slide44.jpg') ?>" alt="Picture 3">
			<div class="carousel-caption">
				<h1>Affordable price !</h1>
				<p>Today Offer !</p>
			</div>
		</div>
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>



<!--<div class="container">-->
<!---->
<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!---->
<!--	<div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!---->
<!---->
<!--	</div>-->
<!--</nav>-->
<!--</div>-->

<br>

<div class="container mar-top-home">

	<div class="row">

		<?php foreach ($books

		as $data) {

		?>

		<div class="col-sm-6 col-md-3 text-center">
			<div class="card cust-card"
			">
			<h5 class="card-title cust-title card-body" style="margin-bottom: -10px"><?php echo $data['title'] ?></h5>
			<img class="card-img-top image<?php echo $data['id'] ?>" style="height:300px; margin-bottom: 20px"
				 rel="<?php echo 'http://localhost/Book_Shop/' . "uploads/" . $data['image_url'] ?>"
				 src="<?php echo base_url() . "uploads/" . $data['image_url'] ?>"
				 alt="<?php echo $data['id'] ?>">
			<div class="card-body">

				<p class="card-text cust-author"> by <?php echo $data['author'] ?></p>
				<p class="card-text cust-price">LKR <?php echo $data['price'] ?></p>
				<?php
				$data['qty'] = 1;
				echo form_open('/Home_Controller/addCart', '', $data); ?>
				<a href="<?php echo base_url('/Display_Controller/index/' . $data['id']) ?>"
				   class="btn btn-default"
				   role="button">Read more</a>
				<button type='submit' class='btn btn-primary'>Add to cart</button>
				<?php echo form_close(); ?>
			</div>
		</div>

	</div>
	<?php }
	if (!empty($links)) {
		echo $links;
	} ?>
</div>

</div>

</div>


<?php include 'template/footer.php' ?>

<style>
	.mar-top-home {
		margin-top: 1px;
	}

	.cust-card {
		border: 1px solid #dedede;
		margin-bottom: 20px;
		padding: 10px 0;
	}

	.cust-title {
		font-size: 15px;
		font-weight: 600;
		margin-bottom: 5px;
		min-height: 60px;
	}

	.cust-author {
		font-size: 14px;
		color: gray;
		margin-bottom: 0;
	}

	.cust-price {
		font-size: 14px;
		font-weight: 600;
	}

	ul{
		list-style-type: none;
	}

	.cust-link a{
		margin: 0px 3px;
		border: 1px solid transparent;
		padding: 4px 5px !important;
		border-radius: 3px;
		background-color: #204d74;
		text-decoration: none;
		color: white;
	}
</style>
