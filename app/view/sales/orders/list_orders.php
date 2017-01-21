<?php
/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 13:25
 */


?>
<section>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Ventas</a></li>
		<li class="breadcrumb-item"><a href="#">Ofertas</a></li>
        <li class="breadcrumb-item active">Ver Ofertas</li>
    </ol>

    <div class='right-button-margin'>
        <a href='index.php?c=order&a=create' class='btn btn-success pull-right'>Añadir Oferta</a>
    </div>

    <h2>Listado de Ofertas</h2>
    <p>Mostrando <?= count($orders) ?> ofertas(s).</p>
    <div class="table-responsive ">
        <table class="table table-hover table-bordered">
            <thead>
            <th>Nº Oferta</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Vendedor</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <?php foreach ($orders as $order) : ?>
                <tr id='sale<?= $order->id ?>'>
                    <td><?= $order->order_number ?></td>
                    <td><?= $order->date_created ?></td>
                    <td><?= $order->customer_name ?></td>
                    <td><?= $order->user_name?></td>
                    <td style='white-space:nowrap'>
                        <a href='index.php?c=order&a=details&id=<?= $order->id ?>' class='btn btn-primary left-margin'><span class='glyphicon glyphicon-list'></span> Detalles</a>
                        <a href='index.php?c=order&a=update&id=<?= $order->id ?>' class='btn btn-info left-margin'><span class='glyphicon glyphicon-list'></span> Modificar</a>
                        <a href='index.php?c=order&a=delete&id=<?= $order->id ?>' class='btn btn-danger delete-object'><span class='glyphicon glyphicon-list'></span> Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</section>
