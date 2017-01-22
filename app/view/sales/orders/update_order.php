<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 22/01/2017
 * Time: 3:13
 */
?>


<section>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?c=order&a=list_orders">Ventas</a></li>
		<li class="breadcrumb-item"><a href="index.php?c=order&a=list_orders">Ofertas</a></li>
		<li class="breadcrumb-item active">Crear Oferta</li>
	</ol>
	<section class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>Modificar Oferta</h2>

		<form action='index.php?c=order&a=update' method='post' class="col-xs-12 col-md-12">
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
							<select class="form-control selectpicker name" data-live-search="true" id="name"
									name="customer_id">
								<?php foreach ($customers as $customer) : ?>
									<option value="<?= $customer->id ?>"><?= $customer->name ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-12 col-lg-12">
							<label for="description">Persona de Contacto:</label>
							<input id="description" class="form-control" type="text"
								   placeholder="Daniel García" disabled>
						</div>
					</div>
					<div class="col-md-6 section-2">
						<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label for="address">Dirección:</label>
							<input id="address" class="form-control" type="text"
								   placeholder="Calle Ejemplo, 2, 1 B" disabled>
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<label for="postal_code">Código Postal:</label>
							<input id="postal_code" class="form-control" type="number"
								   placeholder="28039" disabled>
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<label for="city">Población:</label>
							<input id="city" class="form-control" type="text"
								   placeholder="Madrid" disabled>
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

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table " id="products_table">
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
									<?php foreach ($order_items as $order_item): ?>
										<tr class="tr_clone">
											<td class="model">
												<select data-width="fit" class="selectpicker" data-live-search="true"
														id="model"
														data-container="body">
													<?php foreach ($products as $product): ?>
														<option value="<?= $product->id ?>"> <?= $product->model ?></option>
													<?php endforeach; ?>
												</select>
											</td>
											<td class="description"><?= $products[0]->description ?></td>
											<td class="sale_price">
												<div class="input-group"><input class="form-control" type="number"
																				min="0"
																				step="any"
																				value="<?= $products[0]->sale_price ?>">
													<span
															class="input-group-addon">€</span></div>
											</td>
											<td class="quantity"><input class="form-control" type="number" step="1"
																		value="1"
																		name="products[<?= $products[0]->id ?>]" min="1"
																		max="<?= $products[0]->quantity ?>"></td>
											<td class="total"><?= $products[0]->sale_price * 1 ?></td>
											<td><a class="btn btn-danger" href="javascript:void(0);"
												   id="remove">Remove</a></td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-8 col-xs-8 col-xs-offset-4">
							<table class="table">
								<tbody>
								<tr>
									<th>Subtotal:</th>
									<td id="order_subtotal"><?= $products[0]->sale_price ?> €</td>
								</tr>
								<tr>
									<th>Total:</th>
									<td id="order_total"><?= round($products[0]->sale_price * 1.21, 2); ?>€</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-success" name="action" value="create">Actualizar Oferta</button>
				</div>
			</div>
		</form>
	</section>
</section>