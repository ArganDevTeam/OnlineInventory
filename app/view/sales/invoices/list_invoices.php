<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 22/01/2017
 * Time: 0:09
 */
?>
<section>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Ventas</a></li>
		<li class="breadcrumb-item"><a href="#">Facturas</a></li>
		<li class="breadcrumb-item active">Ver Facturas</li>
	</ol>

	<div class='right-button-margin'>
		<a href='index.php?c=invoice&a=create' class='btn btn-success pull-right'>Añadir Factura</a>
	</div>

	<h2>Listado de Facturas</h2>
	<p>Mostrando <?= count($invoices) ?> factura(s).</p>
	<div class="table-responsive ">
		<table class="table table-hover table-bordered">
			<thead>
			<th>Nº Factura</th>
			<th>Fecha</th>
			<th>Cliente</th>
			<th>Vendedor</th>
			<th>Acciones</th>
			</thead>
			<tbody>
			<?php foreach ($invoices as $invoice) : ?>
				<tr id='invoice<?= $invoice->id ?>'>
					<td><?= $invoice->invoice_number ?></td>
					<td><?= $invoice->date_created ?></td>
					<td><?= $invoice->customer_name ?></td>
					<td><?= $invoice->user_name?></td>
					<td style='white-space:nowrap'>
						<a href='index.php?c=invoice&a=details&id=<?= $invoice->id ?>' class='btn btn-primary left-margin'><span class='glyphicon glyphicon-list'></span> Detalles</a>
						<a href='index.php?c=invoice&a=update&id=<?= $invoice->id ?>' class='btn btn-info left-margin'><span class='glyphicon glyphicon-list'></span> Modificar</a>
						<a href='index.php?c=invoice&a=delete&id=<?= $invoice->id ?>' class='btn btn-danger delete-object'><span class='glyphicon glyphicon-list'></span> Eliminar</a>
					</td>
				</tr>
			<?php endforeach; ?>

			</tbody>
		</table>
	</div>
</section>

