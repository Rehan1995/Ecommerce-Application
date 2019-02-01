<?php include 'template/header.php' ?>

<br>
<div style="text-align: center">
	<h1>Shopping cart</h1>
</div>

<br><br><br>

<div class="container">


	<table id="cart" class="table table-hover table-condensed">
		<thead>
		<tr>
			<th style="width:50%">Product</th>
			<th style="width:10%">Price</th>
			<th style="width:8%">Quantity</th>
			<th style="width:22%" class="text-center">Subtotal</th>
			<th style="width:10%"></th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($this->cart->contents() as $items) { ?>
		</thead>
		<tbody>
		<tr>
			<td data-th="Product">
				<div class="row">

					<div class="col-sm-10">
						<h4 class="nomargin"><?php echo $items['name']; ?></h4>

					</div>
				</div>
			</td>
			<td data-th="Price"><?php echo $this->cart->format_number($items['price']); ?></td>
			<td data-th="Quantity">
				<?php echo form_open('Cart_Controller/update'); ?>
				<?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
				<input type="number" name="<?php echo $i . '[qty]'; ?>" class="form-control text-center"
					   value="<?php echo $items['qty']; ?>">
			</td>
			<td data-th="Subtotal"
				class="text-center"><?php echo $this->cart->format_number($items['subtotal']); ?></td>
			<td class="actions" data-th="">
				<button type="submit" class="btn btn-default btn-sm"></i>update</button>
				<?php echo form_close() ?>
				<a href="<?php echo base_url().'Cart_Controller/delete/'. $items['rowid']?>"><i class="fas fa-trash" style="margin-right: 20px;"></i><i
						class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		<?php $i++; ?>

		<?php } ?>
		</tbody>
		<tfoot>

		<tr>

			<td colspan="2" class="hidden-xs"></td>
			<td class="hidden-xs text-center">
				<strong>Total <?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
			<td><a href="<?php echo base_url('Cart_Controller/endSession') ?>" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
		</tr>
		</tfoot>
	</table>


</div>



<?php include 'template/footer.php' ?>
