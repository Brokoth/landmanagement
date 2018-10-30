<?php
 
class seller extends CI_Controller {
 
public function __construct(){
 
        parent::__construct();
  			$this->load->helper(array('form', 'url'));
  	 		$this->load->model('seller_model');
        $this->load->library('session');
 
}
 
            public function seller_view(){
 
$this->load->view("seller.php");
 
}

public function add(){
 
      $land=array(
      'location'=>$this->input->post('location'),
      'price'=>$this->input->post('price'),
      'acreage'=>$this->input->post('acreage')
      
        );
        
  $this->seller_model->add($land);
  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
  redirect('seller/seller_view');
 
 
}
}