<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		error_reporting(0);
		$this->load->model('Operation_model','operations');
	}
	public function index()
	{
	    $products=$this->operations->getProductsThroughApi();
		$data['products']=$products;
		$data['title']='Product Listing';
		$this->load->view('products',$data);
	}
	public function product_details($product_id){
		$product=$this->operations->getProductDetail($product_id);
		
		$data['product']=$product;
		$data['title']='Product Details';
		$this->load->view('product_details',$data);
	}
	public function add_products($product_id){
		
		error_reporting(0);
		if($product_id!=''){
			if($this->input->post()){
				//echo "<pre>";
				//print_r($this->input->post());
				//$this->session->sess_destroy();
				
				if($this->session->userdata['cart_session_data']!='' && $this->session->userdata['session_cart_id']!=''){
					//echo "YES DATA PRESENT";die;
					    $getCartData=$this->operations->get('carts',$this->session->userdata['session_cart_id']);
					    $dataBase64Decode=base64_decode($getCartData->cart_data);
						$unserializeData=unserialize($dataBase64Decode);
					    $cart_data=$unserializeData;
						$cart_data['order_item_details'][]=[
						'title'=>$this->input->post('title'),
						'image'=>$this->input->post('image'),
						'description'=>$this->input->post('description'),
						'price'=>$this->input->post('price'),

					];
					//echo "<pre><br>===OLD CART=====";
					//print_r($oldCart);
					//echo "<pre>NEW CART====";
					//print_r($cart_data);
					//$final_cart=array_merge($oldCart, $cart_data);
					//$cart_data['order_item_details'][]=
					//$oldCart[]=$cart_data;;
					
					$cartData=serialize($cart_data);
					$cart_date_with_decode=(base64_encode($cartData));
					$cartsTableData=[
						'cart_data'=>$cart_date_with_decode,
						'user_id'=>1,
					];

					$this->session->set_userdata('cart_session_data',$cart_date_with_decode);
					//$this->session->set_userdata('session_cart_id',$lastInsertId);

					$this->operations->updateData('carts',$cartsTableData,$this->session->userdata['session_cart_id'],'id');
					
		
				}else{
						$cart_data['order_item_details'][]=[
						'title'=>$this->input->post('title'),
						'image'=>$this->input->post('image'),
						'description'=>$this->input->post('description'),
						'price'=>$this->input->post('price'),

						];

						$cartData=serialize($cart_data);
						$cart_date_with_decode=(base64_encode($cartData));
						$cartsTableData=[
							'cart_data'=>$cart_date_with_decode,
							'user_id'=>1,
						];
						
						
						$lastInsertId=$this->operations->save('carts',$cartsTableData);
						$this->session->set_userdata('cart_session_data',$cart_date_with_decode);
						$this->session->set_userdata('session_cart_id',$lastInsertId);			


				}
				
				redirect(base_url('products/cart'));
				
			}
		}else{
			echo "Please provide product Id";
		}

	}
	public function cart(){
			error_reporting(0);
			$dataBase64Decode=base64_decode($this->session->userdata['cart_session_data']);
			$unserializeData=unserialize($dataBase64Decode);
			
			$data['title']='Carts';
			$data['carts']=$unserializeData;
			$this->load->view('carts',$data);
		//if($this->session->userdata)
	}
	public function clearCart(){
		error_reporting(0);
		$this->session->unset_userdata('cart_session_data');
		$this->session->unset_userdata('session_cart_id');
		$dataBase64Decode=base64_decode($this->session->userdata['cart_session_data']);
		$unserializeData=unserialize($dataBase64Decode);

		$data['title']='Carts';
		$data['carts']=$unserializeData;
		$this->load->view('carts',$data);
	}
	public function placeorder(){
		$dataBase64Decode=base64_decode($this->session->userdata['cart_session_data']);
		$unserializeData=unserialize($dataBase64Decode);
		
		$ordersData=[
			'user_id'=>$this->session->userdata['user_data']['id'],
			'user_type'=>$this->session->userdata['user_data']['role'],
			'total'=>$this->session->userdata['order_total'],
			
		];
		$lastInsertId=$this->operations->save('orders',$ordersData);
		foreach($unserializeData['order_item_details'] as $order_item_details){
			$orderItemDetailsData=[
				'order_id'=>$lastInsertId,
				'title'=>$order_item_details['title'],
				'description'=>$order_item_details['description'],
				'image'=>$order_item_details['image'],
				'price'=>$order_item_details['price'],
			];
			$this->operations->save('order_item_details',$orderItemDetailsData);

		}
	    $this->session->unset_userdata('cart_session_data');
	    $this->session->unset_userdata('session_cart_id');

        if($this->session->userdata['user_data']['role']==1){
        	//If user =guest then disrecy user_data sesssion
        	$this->session->unset_userdata('user_data');
        }

		echo "<h1>You Have Successully Place The Order With COD<h1>";
		echo "<a href=".base_url().">Please Go To The Home </a>";

		exit;

	}
	
}
