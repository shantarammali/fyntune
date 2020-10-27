<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	public function signup()
	{
		$data['reset']=false;
		
		if($this->input->post()){
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('phone','Phone','required|numeric|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
			$this->form_validation->set_rules('address','Address','required');

			if($this->form_validation->run()==false){
				
				$data['reset'] = false;
	     	}else{
	     				$data=[
			     		'name'	=>$this->input->post('name'),
			     		'phone'	=>$this->input->post('phone'),
			     		'email'	=>$this->input->post('email'),
			     		'password'	=>md5($this->input->post('password')),
			     		'address'=>$this->input->post('address'),
			     		'user_type'	=>0,
			     		];
			     		$this->operations->save('users',$data);
		     			$this->session->set_flashdata('success','Record Added Successfully');
		     			$data['reset']=true;
			 		
	     		}
		}
			$data['page']='signup';
			$data['title']='Register';
			
			$this->load->view('index',$data);

	}


	public function login()
	{
		$data['reset']=false;
		$this->load->model('login_model');
		if($this->input->post()){
			$this->form_validation->set_rules('email','email','required|valid_email');
			$this->form_validation->set_rules('password','password','required');
			if($this->form_validation->run()==false){
				$data['reset'] = false;					
			}
			else{	
				
					$validate=$this->login_model->validate();
					
					if(empty($validate) && $validate==0 ){
						$data['reset'] = false;	
					
					}
					else{						
						redirect(base_url('products/cart'));
					}
			}					
		}	
		
			$data['page']='login';
			$data['title']='Login user';
			$this->load->view('index',$data);
	}

	public function guestUser(){
		$data['reset']=false;
		$dataBase64Decode=base64_decode($this->session->userdata['cart_session_data']);
		$unserializeData=unserialize($dataBase64Decode);

		if($this->input->post()){
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('phone','Phone','required|numeric|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('address','Address','required');


			if($this->form_validation->run()==false){
				
				$data['reset'] = false;
	     	}else{
	     				$data=[
			     		'name'	=>$this->input->post('name'),
			     		'phone'	=>$this->input->post('phone'),
			     		'email'	=>$this->input->post('email'),
			     		'address'=>$this->input->post('address'),
			     		'user_type'	=>1,
			     		];
			     		$lastInsertId=$this->operations->save('users',$data);
		     			//$this->session->set_flashdata('success','Record Added Successfully');
		     			$data = array(
							'id' => $lastInsertId,
							'name' => $this->input->post('name'),
							'phone' => $this->input->post('phone'),
							'email' => $this->input->post('email'),
							'role' => 1,
						);
		
					  $this->session->set_userdata('user_data',$data);

		     			redirect(base_url('products/placeorder'));
		     			$data['reset']=true;
			 		
	     		}
		}
			$data['order_total']=$this->session->userdata['order_total'];
			$data['page']='guest_user';
			$data['title']='GuestUser';
			
			$this->load->view('index',$data);
	}

	public function logout(){
		$this->session->unset_userdata('user_data');
		redirect(base_url());
	}
	public function order_listing(){
		$userProductDetails=$this->operations->getUserOrderDetails();
		
		$data['userProductDetails']=$userProductDetails;
		$data['title']='Order Details';
		$this->load->view('order_listing',$data);
	}

	public function item_details($id){
		$itemDetails=$this->operations->getOrderItemDetails($id);
		
		$data['itemDetails']=$itemDetails;
		$data['title']='Order Details';
		$this->load->view('order_item_details',$data);
	}
}
