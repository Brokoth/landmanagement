<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buyer extends CI_Controller {

    public function __construct(){
 
        parent::__construct();
  			$this->load->helper(array('form', 'url'));
  	 		$this->load->model('buyer_model');
        $this->load->library('session');
 
}
    
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
	public function index()
	{
		$this->load->view('table');
	}
    
        public function buyer_view(){
 
$this->load->view("buyer.php");
 
}    
    
 public function buy(){
   
 $buy=array(
     'username'=>$this->input->post('username'),
      'status'=>'Pending',
      'landid'=>$this->input->post('landid'));
      $landid_check=$this->buyer_model->landid_check($buy['landid']);
 
    if($landid_check){
  $this->buyer_model->buy($buy);
    $this->session->set_flashdata('success_msg', 'Request Successfull! Now Pending');
redirect('buyer/buyer_view');
        
}
else{
$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
 redirect('user/buyer_view');
    
}
    
}
}
