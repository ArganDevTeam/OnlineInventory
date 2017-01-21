<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 10/01/2017
 * Time: 22:34
 */
class Customer
{

    public $id;
    public $name;
    public $description;
    public $contact_num;
    public $email;
    public $city;
    public $address;
    public $postal_code;
    public $db;

    /**
     * Customer constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $contact_num
     * @param $email
     * @param $city
     * @param $address
     * @param $postal_code
     */
    public function __construct($id = null, $name = null, $description = null, $contact_num = null,
                                $email = null, $city = null, $address = null, $postal_code = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->contact_num = $contact_num;
        $this->email = $email;
        $this->city = $city;
        $this->postal_code = $postal_code;
        $this->address = $address;

    }


    function create()
    {
        $db = new DB;
        //Query para INSERT nuevo Producto

        $query = "INSERT INTO `customers`(`name`, `description`, `contact_num`, `email`, `address`, `city`, `postal_code`)
		          VALUES (?,?,?,?,?,?,?)";

        $parameters = array($this->name, $this->description, $this->contact_num, $this->email, $this->address, $this->city, $this->postal_code);

        return $db->run($query, $parameters);
    }



    function update()
    {
        $db = new DB;

        $query = "UPDATE `customers` 
                  SET `name` = ?, `description`= ?, `contact_num`= ?, `email`= ?, `city`= ?, `address` = ?, `postal_code` = ?
                  WHERE `id` = ?";

        $parameters = array($this->name, $this->description, $this->contact_num, $this->email, $this->city, $this->address, $this->postal_code, $this->id);

        $result = $db->run($query, $parameters);

        return $result;
    }

    function delete()
    {
        $db = new DB;

        $query = "DELETE FROM `customers` 
                  WHERE `id` = ?";

        $parameters = array($this->id);

        $result = $db->run($query, $parameters);

        return $result;
    }

    public static function readOne($id)
    {
        $db = new DB;

        $query = "SELECT *
                  FROM `customers`
                  WHERE `id` = ?
                  LIMIT 0, 1";

        $parameters = array($id);
        $db->run($query, $parameters);

        $customer = new Customer();

        foreach ($db->result()[0] as $property => $value) {
            $customer->$property = $value;
        }

        return $customer;
    }



    public static function readAll($from_record_num = null, $records_per_page = null)
    {
        $db = new DB;

        $customers = [];

        $query = "SELECT * FROM `customers`
		ORDER BY `id` ASC ";

        if ($db->run($query)) {
            $results = $db->result();
            foreach ($results as $result) {
                $customer = new Customer();
                foreach ($result as $property => $value) {
                    $customer->$property = $value;
                }
                $customers[] = $customer;
            }
        }
        return $customers;
    }

    public function countAll()
    {
        $db = new DB;

        $query = "SELECT id 
                  FROM `customers`";

        $db->run($query);

        $num = $db->count();

        return $num;
    }

}