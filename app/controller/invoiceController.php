<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 22/01/2017
 * Time: 0:35
 */
class invoiceController extends  Controller {



	public function delete() {
		$id = $_GET['id'];
		extract($_GET);
		if ($id != 0 && !is_null($id) && isset($id)) {
			$order = Order::readOne($id);
			if ($order->delete()) {
				$render_data['info'] = "Factura eliminada.";
			} else {
				$render_data['error'] = "No se ha podido eliminar la Factura.";
			}
		}
		$this->list_orders($render_data);
	}
	public function list_invoices() {
		$render_data['title'] = "Facturas";

		$render_data['invoices'] = Invoice::readAll();
		$render_data['customers'] = Customer::readAll();
		$render_data['products'] = Product::readAll();

		$this->render('sales/invoices/list_invoices', $render_data);
	}

}