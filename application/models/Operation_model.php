<?php
class Operation_model extends CI_Model{
	function __construct(){
	 parent::__construct();
	}
	public function getProductsThroughApi() {
		$product_data=file_get_contents('https://fakestoreapi.com/products');
        return json_decode($product_data);
    }
    public function getProductDetail($id){
    	$product_data=file_get_contents('https://fakestoreapi.com/products/'.$id);
        return json_decode($product_data);
    }
	public function save($table,$data){
		 $this->db->insert($table,$data);
		 return $this->db->insert_id();
	}
	public function get($table,$id){
		return $this->db->select('*')
				 ->from($table)
				 ->where('id',$id)
				 ->get()->row();

	}
	public function updateData($table,$data, $id,$matchingField){
		return $this->db->where($matchingField,$id)
					 ->update($table,$data);

	}
	public function getUserOrderDetails(){
		return $this->db->select('users.id,users.address,users.name,users.name,users.user_type as role,orders.id as order_id,orders.total,orders.user_type')
						->from('users')
						->join('orders','orders.user_id=users.id')
						->get()->result();

	}
	public function getOrderItemDetails($id){
		return $this->db->select('*')
				 ->from('order_item_details')
				 ->where('order_id',$id)
				 ->get()->result();

	}
	
	
}
?>