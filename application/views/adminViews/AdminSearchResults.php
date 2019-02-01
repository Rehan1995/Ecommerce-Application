<?php include 'Common/Header.php' ?>
<br><br>
<div style="text-align: center"><h2> Search results </h2> </div>
<br><br><br><br>
<div class="container">

	<?php
	if (!empty($searchResults)) { ?>

	<table class="table table-hover">

		<thead>
		<tr>

			<th scope="col">Title</th>
			<th scope="col">Author</th>
			<th scope="col">Category</th>
			<th scope="col">Price</th>

		</tr>
		</thead>
		<tbody>
		<?php

		foreach ($searchResults as $data) {
			echo '<td>' . $data['title'] . '</td>';
			echo '<td>' . $data['author'] . '</td>';
			echo '<td>' . $data['category'] . '</td>';
			echo '<td>' . $data['price'] . '</td>';
			echo '</tr>';

		}
		?>
		</tbody>
	</table>

	<?php  } ?>

</div>







<?php include 'Common/Footer.php' ?>
