<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 13:57
 */
class Order
{
    public $id;
    public $order_number;
    public $user_id;
    public $user_name;
    public $customer_id;
    public $customer_name;
    public $date_created;

    public $db;

    /**
     * Order constructor.
     * @param $id
     * @param $user_id
     * @param $customer_id
     * @param $date_created
     * @param $db
     */
    public function __construct($id = null, $user_id = null, $customer_id = null, $date_created = null, $order_number = null)
    {
        $this->id = $id;
        $this->order_number = $order_number;
        $this->user_id = $user_id;
        $this->customer_id = $customer_id;
        $this->date_created = $date_created;
    }

    public function create(){
        $db = new DB;

        $query = "INSERT INTO `sales_orders`(`customer_id`, `user_id`, `date_created`, `order_number`) VALUES ( ?, ?, ?, ?);";
        $parameters = array($this->customer_id,$this->user_id, $this->date_created, $this->order_number);

        if($db->run($query, $parameters)){
            return $db->lastId();
        }else{
            return false;
        }
    }


    public static function readOne($id){
        $db = new DB;
        $order = new Order();

        $query = "SELECT *
        FROM `sales_orders`
        WHERE `id` = ?
        LIMIT 0, 1";

        $parameters = array($id);
        $db->run($query, $parameters);

        foreach ($db->result()[0] as $property => $value) {
            $order->$property = $value;
        }

        return $order;

    }

    public static function readAll(){
        $db = new DB;
        $orders = [];
        $query = "SELECT s.`id`, s.`order_number`, s.`user_id`, u.name as user_name,s.`customer_id`, c.name as customer_name, `date_created` 
        FROM `sales_orders` as s 
        JOIN users as u ON u.id = s.`user_id` 
        JOIN customers as c ON c.id = s.`customer_id` 
        ORDER BY `date_created` DESC";
        if($db->run($query)) {
            $results = $db->result();
            foreach($results as $result){
                $order = new Order();
                foreach ($result as $property=>$value){
                    $order->$property = $value;
                }
                $orders[] = $order;
            }
        }
        return $orders;
    }

    public static function getOrdersCountByYear($year){
        $db = new DB;
        
        $query = "SELECT * FROM sales_orders WHERE date_created BETWEEN '".$year."-1-1' AND '".$year."-12-31'";
        $db->run($query) ;
        return $db->count();
    }

    function delete()
    {
        $db = new DB;

        $query = "DELETE FROM `sales_orders` 
        WHERE `id` = ?";

        $parameters = array($this->id);

        $result = $db->run($query, $parameters);

        return $result;
    }


}