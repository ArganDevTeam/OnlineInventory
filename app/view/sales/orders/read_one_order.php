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
			<li class="breadcrumb-item"><a href="index.php?c=sale&a=list_sales">Ventas</a></li>
			<li class="breadcrumb-item active">Ver Venta</li>
		</ol>
	</section>
</div>

<div class="row">
	<section class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>Crear Venta</h2>
	</section>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<legend role="button" data-toggle="collapse" href="#form-customer-info" aria-expanded="false"
						aria-controls="form-customer-info">
					Datos del Cliente<span class="pull-right glyphicon glyphicon-chevron-down"></span></legend>
			</div>
			<div id="form-customer-info" class="col-md-12">
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
				<a class="btn btn-success add-row">Añadir Producto</a>

				<br/>
				<br/>
				<div style="overflow-x: scroll">
					<table class="table table-responsive table-bordered" id="products_table">
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
						<tr class="tr_clone">
							<td class="model">
								<select data-width="fit" class="selectpicker" data-live-search="true" id="model"
										data-container="body">
									<?php foreach ($products as $product): ?>
										<option value="<?= $product->id ?>"> <?= $product->model ?></option>
									<?php endforeach; ?>
								</select>
							</td>
							<td class="description"><?= $sale_items[0]->description ?></td>
							<td class="sale_price"><input class="form-control" type="number" min="0" step="any"
														  value="<?= $products[0]->sale_price ?>"></td>
							<td class="quantity"><input class="form-control" type="number" step="1" value="1"
														name="products[<?= $products[0]->id ?>]"
														min="1" max="<?= $products[0]->quantity ?>"></td>
							<td class="total"><?= $products[0]->sale_price * 1 ?></td>
							<td><a class="btn btn-danger" href="javascript:void(0);" id="remove">Remove</a></td>
						</tr>

						</tbody>
					</table>
				</div>
				<div class="pull-right">
					<caption id="sale_subtotal"><strong>Subtotal:</strong></caption>
					<caption>249,11 E</caption>
					<br>
					<caption id="sale_total"><strong>Total:</strong></caption>
					<caption> 983,52 E</caption>
				</div>
				<button type="submit" class="btn btn-success" name="action" value="create">Crear Venta</button>
			</div>
		</div>
</div>
