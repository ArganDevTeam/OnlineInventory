<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 16/01/2017
 * Time: 22:05
 */
?>
<!-- HTML form for creating a sale -->
<div class="row">
	<section class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php?c=order&a=list_orders">Ventas</a></li>
			<li class="breadcrumb-item"><a href="index.php?c=order&a=list_orders">Ofertas</a></li>
			<li class="breadcrumb-item active">Detalles de Oferta</li>
		</ol>
	</section>
</div>

<section class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>Detalles de Oferta</h2>


		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<legend role="button" data-toggle="collapse" href="#form-customer-info" aria-expanded="false"
						aria-controls="form-customer-info">
					Datos del Cliente<span class="pull-right glyphicon glyphicon-chevron-down"></span></legend>
			</div>
			<div id="form-customer-info" class="col-md-12 col-lg-12">
				<div class="col-md-6 section-1">
					<div class="form-group col-xs-6 col-sm-6 col-md-12 col-lg-12">

						<label for="name">Nombre del Cliente:</label>
						<input id="name" class="form-control" type="text" value="<?= $customer->name ?>" disabled>
					</div>
					<div class="form-group col-xs-6 col-sm-6 col-md-12 col-lg-12">
						<label for="description">Persona de Contacto:</label>
						<input id="description" class="form-control" type="text"
							   value="<?= $customer->description ?>" disabled>
					</div>
				</div>
				<div class="col-md-6 section-2">
					<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label for="address">Dirección:</label>
						<input id="address" class="form-control" type="text"
							   value="<?= $customer->address ?>" disabled>
					</div>
					<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<label for="postal_code">Código Postal:</label>
						<input id="postal_code" class="form-control" type="number"
							   value="<?= $customer->postal_code ?>" disabled>
					</div>
					<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<label for="city">Población:</label>
						<input id="city" class="form-control" type="text"
							   value="<?= $customer->city ?>" disabled>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<legend role="button" data-toggle="collapse" href="#form-products-list" aria-expanded="false"
						aria-controls="form-products-list">Artículos<span
						class="pull-right glyphicon glyphicon-chevron-down"></span></legend>
			</div>
			<div id="form-products-list" class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered" id="products_table">
						<thead>
						<tr>
							<th>Modelo</th>
							<th>Descripción</th>
							<th>Precio Venta (€ / ud.)</th>
							<th>Cantidad</th>
							<th>Total</th>
							<th>Acciones</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach($order_items as $order_item): ?>
							<tr>
								<td class="model"><?= $order_item->model ?></td>
								<td class="description"><?= $order_item->description ?></td>
								<td class="sale_price"><?= $order_item->sale_price ?></td>
								<td class="quantity"><?= $order_item->quantity ?></td>
								<td class="total"><?= $order_item->sale_price * 1 ?></td>
								<td><a href='index.php?c=product&a=details&id=<?= $order_item->product_id ?>' class='btn btn-primary left-margin'><span class='glyphicon glyphicon-list'></span> Detalles</a></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="col-md-4 col-md-offset-8 col-xs-8 col-xs-offset-4">
					<table class="table">
						<tbody>
						<tr>
							<th>Subtotal:</th>
							<td id="order_subtotal">  €</td>
						</tr>
						<tr>
							<th>Total:</th>
							<td id="order_total"> €</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
