<?php

/**
 * Created by PhpStorm.
 * User: markc
 * Date: 14/01/2017
 * Time: 13:57
 */
class orderController extends Controller
{

    public function create() {
        $render_data = array();

        $order = new Order();
        $order_item = new OrderItem();
        $customer = new Customer();
        $product = new Product();

        $customers = Customer::readAll();
        $products = Product::readAll();
        $sale_order_items = [];

        $injection = ["customers" => $customers, "products" => $products];

        $render_data['customers'] = $customers;
        $render_data['products'] = $products;

        $render_data['injection'] = $injection;

        $orders_count = 0;

        if ($this->checkAction("create")) {
            //var_dump($_POST);
            extract($_POST);

            $order->user_id = $this->currentUser()->id;
            $order->customer_id = $customer_id;
            $order->date_created = date('Y-m-d');
            
            $order->order_number = "OF-".date('Ymd')."-".$orders_count;
            $result = $order->create();

            if ($result !== false) {
                foreach ($products as $product_id => $quantity) {
                    $order_item->order_id = $result;
                    $order_item->product_id = $product_id;
                    $order_item->quantity = $quantity;
                    $sale_order_items[] = $order_item;
                    //crea cada item que se ha escogido en la venta
                    $order_item->create();
                    //actualizar el producto en la tabla products restando a la cantidad actual la cantidad de venta
                    $product = Product::readOne($product_id);
                    $product->quantity = $product->quantity - $quantity;

                    $product->update();

                }
                $render_data['sale_order_items'] = $sale_order_items;
                $render_data['info'] = "Oferta creada.";
                //  header('Refresh: 1; url="index.php?c=order&a=list_orders');
            } else {
                $render_data['error'] = "No se ha podido crear la Oferta.";
            }
        }
        $render_data['title'] = "Añadir Oferta";
        $this->render('sales/orders/create_order', $render_data);
    }

    public function delete() {
        $id = $_GET['id'];
        extract($_GET);
        if ($id != 0 && !is_null($id) && isset($id)) {
            $order = Order::readOne($id);
            if ($order->delete()) {
                $render_data['info'] = "Oferta eliminada.";
            } else {
                $render_data['error'] = "No se ha podido eliminar la Oferta.";
            }
        }
        $this->list_orders($render_data);
    }

    public function update(){
    	$id = $_GET['id'];
    	$render_data = array();
    	$render_data['title'] = "Actualizar Oferta";

    	$order = Order::readOne($id);
    	$customer = Customer::readOne($order->customer_id);
    	$customers = Customer::readAll();
    	$products = Product::readAll();
    	$order_items = OrderItem::readAllByOrderID($id);

    	if($this->checkAction("update")){
    		extract($_POST);
		}

    	$render_data['order'] = $order;
    	$render_data['customer'] = $customer;
    	$render_data['customers'] = $customers;
    	$render_data['products'] = $products;
    	$render_data['order_items'] = $order_items;
    	$this->render('sales/orders/update_order', $render_data);
	}

    public function details() {
		$id = $_GET['id'];
    	$render_data = array();
        $render_data['title'] = "Detalles de Oferta";

        $order = Order::readOne($id);
        $customer = Customer::readOne($order->customer_id);
        $order_items = OrderItem::readAllByOrderID($id);

        $render_data['order'] = $order;
		$render_data['customer'] = $customer;
        $render_data['order_items'] = $order_items;
        $this->render('sales/orders/read_one_order', $render_data);
    }


    public function list_orders() {
        $render_data['title'] = "Ofertas";

        $render_data['orders'] = Order::readAll();
        $render_data['customers'] = Customer::readAll();
        $render_data['products'] = Product::readAll();

        $this->render('sales/orders/list_orders', $render_data);
    }

}