<?php
class Login_model extends CI_Model{
	function __construct(){
	parent::__construct();
	}
	public function validate(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$result=$this->db->select("*")
						 ->where('email',$email)
						 ->where('password',md5($password))
						 ->where('user_type',0)
						  ->get('users')->row();
	
	if(empty($result)){
			return 0;}
	else{
		$data=array(
		'id'=>$result->id,
		'email'=>$result->email
		);
		
		$data = array(
							'is_login' => true,
							'id' => $result->id,
							'name' => $result->name,
							'phone' => $result->phone,
							'email' => $result->email,
							'role' => $result->user_type,
						);
		
		
		$this->session->set_userdata('user_data',$data);	
		return $result;
	}
	}
	
	
}
?>