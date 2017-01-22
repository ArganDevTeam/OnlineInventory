<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 22/01/2017
 * Time: 0:41
 */
class Invoice {

	public $id;
	public $order_id;
	public $date_created;
	public $invoice_number;

	public $db;

	public static function readAll(){
		$db = new DB;
		$invoices = [];
		$query = "SELECT * FROM ";
		return $invoices;
	}

}