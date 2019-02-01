<?php include 'Common/Header.php' ?>

<br><br>
<div style="text-align: center"><h2>Display all Books</h2> </div>
<br><br><br><br>


<div class="container">

	<table class="table table-hover">

		<thead>
		<tr>
			<th scope="col">Title</th>
			<th scope="col">Author</th>
			<th scope="col">Category</th>
			<th scope="col">Price</th>
			<th scope="col">Count</th>
		</tr>
		</thead>
		<?php

		foreach ($allBooks as $data) {
			echo '<td>' . $data['title'] . '</td>';
			echo '<td>' . $data['author'] . '</td>';
			echo '<td>' . $data['category'] . '</td>';
			echo '<td>' . $data['price'] . '</td>';
			echo '<td>' . $data['count'] . '</td>';
			echo '</tr>';

		}
		?>
		<tbody>


</div>

<!--<div class="card" style="width: 18rem;">
	<div class="card-body custom-card-stats">
		<h5 class="card-title">Amount of books that have been viewed</h5>
		<?php /*echo $sumView[1];*/?>
		<p class="card-text"><?php /*echo $sumView[0]->count; */?></p>


	</div>
</div>

<div class="card" style="width: 18rem;">
	<div class="card-body custom-card-stats">
		<h5 class="card-title">Most viewed book</h5>
		<p class="card-text"><?php /*echo $mostViewedBook[0]->title; */?></p>
	</div>
</div>-->



<?php include 'Common/Footer.php' ?>
