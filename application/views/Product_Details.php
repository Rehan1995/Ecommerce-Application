<?php include 'template/header.php' ?>


<h1> Book Details </h1>

<div class="container">
	<div class="row">


		<div class=" col-sm-6 col-md-4">
			<div class="thumbnail">
				<img class="card-img-top image<?php echo $book['id'] ?>" style="height:300px"
					 rel="<?php echo base_url() . "uploads/" . $book['image_url'] ?>"
					 src="<?php echo base_url() . "uploads/" . $book['image_url'] ?>"
					 alt="<?php echo $book['id'] ?>">
				<h3><?php echo $book['title'] ?></h3>

			</div>
		</div>
		`

		<div class="col-md-8">
			<div class="thumbnail">
				<div class="caption">
					<h3><?php echo $book['title'] ?></h3>
					<p><?php echo $book['description'] ?>

						<?php
						$book['qty'] = 1;
						echo form_open('/Home_Controller/addCart', '', $book); ?>
						<button type='submit' class='btn btn-default'>Add to cart</button>
						<?php echo form_close(); ?>

					</p>
				</div>

			</div>

		</div>
	</div>
	<hr>
	<div class="row no-gutters">
		<div class="col-md-12">

			<h4 class="text-center">Most Viewed Books by Visitors</h4>
			<div class='row no-gutters' style="margin-top:40px">

				<?php
				foreach ($mostViewedByBook as $book) {
					echo "<div class='single-card col-md-4'>";
					echo "<div class='card'>";
					echo "<img class='card-img-top image-cust' src=" . site_url() . "uploads/" . $book['image_url'] . " alt='Card image cap'>";
					echo "<div class='card-body'>";
					echo "<p class='card-title min-title title-align'>" . $book['title'] . "</p>";
					echo "<p class='card-text'>" . $book['author'] . "</p>";
					echo "<p class='card-text'>" . $book['price'] . "</p>";

					echo "<a href='#' class='btn btn-primary'>Add to cart</a>";
					echo "</div></div>";
					echo "</div>";
				}
				?>
			</div>
		</div>
	</div>

<!--				--><?php //foreach ($books
//
//		as $data) {
//
//		?>
<!---->
<!--		<div class="col-sm-6 col-md-3 text-center">-->
<!--			<div class="card cust-card"-->
<!--			">-->
<!--			<img class="card-img-top image--><?php //echo $data['id'] ?><!--" style="height:300px"-->
<!--				 rel="--><?php //echo 'http://localhost/Book_Shop/' . "uploads/" . $data['image_url'] ?><!--"-->
<!--				 src="--><?php //echo base_url() . "uploads/" . $data['image_url'] ?><!--"-->
<!--				 alt="--><?php //echo $data['id'] ?><!--">-->
<!--			<div class="card-body">-->
<!--				<h5 class="card-title cust-title">--><?php //echo $data['title'] ?><!--</h5>-->
<!--				<p class="card-text cust-author"> by --><?php //echo $data['author'] ?><!--</p>-->
<!--				<p class="card-text cust-price">LKR --><?php //echo $data['price'] ?><!--</p>-->
<!--				--><?php
//				$data['qty'] = 1;
//				echo form_open('/Home_Controller/addCart', '', $data); ?>
<!--				<a href="--><?php //echo base_url('/Display_Controller/index/' . $data['id']) ?><!--"-->
<!--				   class="btn btn-default"-->
<!--				   role="button">Read more</a>-->
<!--				<button type='submit' class='btn btn-primary'>Add to cart</button>-->
<!--				--><?php //echo form_close(); ?>
<!--			</div>-->
<!--		</div>-->
<!---->
<!--	</div>-->
<!--	--><?php //}?>




	<div class="row no-gutters">
		<div class="col-md-12">
			<hr>
			<h4 class="text-center">Top Recommend Books</h4>
			<div class='row no-gutters' style="margin-top:20px">
				<?php
				if ($this->session->has_userdata('books')) {

					foreach ($viewedBooks as $book) {
						echo "<div class='single-card col-md-4'>";
						echo "<div class='card'>";
						echo "<img class='card-img-top' src=" . site_url() . "uploads/" . $book['image_url'] . " alt='Card image cap'>";
						echo "<div class='card-body'>";
						echo "<p class='card-title min-title title-align'>" . $book['title'] . "</p>";
						echo "<p class='card-text'>" . $book['author'] . "</p>";
						echo "<p class='card-text'>" . $book['price'] . "</p>";

						echo "<a href='#' class='btn btn-primary'>Add to cart</a>";
						echo "</div></div>";
						echo "</div>";
					}
				}
				?>
			</div>
		</div>
	</div>

</div>

<style>
	.single-card{
		width:20%;
		margin:0 auto;
		padding:5px;
	}
	.single-card img{
		height:300px;
	}
</style>

<?php include 'template/footer.php' ?>
