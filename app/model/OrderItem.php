<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 15/01/2017
 * Time: 7:44
 */
class OrderItem
{
    public $id;
    public $order_id;
    public $model;
    public $sale_price;
    public $product_id;
    public $quantity;
    public $db;
    /**
     * OrderItem constructor.
     * @param $id
     * @param $order_id
     * @param $product_id
     * @param $quantity
     */
    public function __construct($id = null, $order_id= null, $product_id= null, $quantity= null)
    {
        $this->id = $id;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function create(){
        $this->db = new DB;

        $query = "INSERT INTO `sales_order_item`(`order_id`, `product_id`, `quantity`) VALUES (?,?,?);";
        $parameters = array($this->order_id,$this->product_id,$this->quantity);


        if($this->db->run($query, $parameters)){
            return $this->db->lastId();
        }else{
            return false;
        }
    }

    public static function readAllByOrderID($order_id){
        $db = new DB;

        $sale_items = [];
		/*
        $query = "SELECT * FROM `sales_order_item` WHERE `order_id` = ".$order_id."
		ORDER BY `id` ASC ";
*/
	$query = "SELECT i.id, i.order_id, i.product_id, i.quantity, p.description, p.model, p.sale_price 
				FROM `sales_order_item` as i 
				JOIN `products` as p ON i.product_id = p.id 
				WHERE `order_id` = ".$order_id." 
				ORDER BY i.`id` ASC";
        if ($db->run($query)) {
            $results = $db->result();
            foreach ($results as $result) {
                $sale_item = new OrderItem();
                foreach ($result as $property => $value) {
                    $sale_item->$property = $value;
                }
                $sale_items[] = $sale_item;
            }
        }

        return $sale_items;
    }

}