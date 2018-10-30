<?php
 
class User extends CI_Controller {
 
public function __construct(){
 
        parent::__construct();
  			$this->load->helper(array('form', 'url'));
  	 		$this->load->model('user_model');
        $this->load->library('session');
 
}
 
public function index()
{
$this->load->view("register.php");
}
    //COPY FROM HERE
    
        public function admin_view(){
 
$this->load->view("admin.php");
 
}
    
 public function alt_user(){
  $alt=array(
      'username'=>$this->input->post('username'),
      'status'=>$this->input->post('status'));
    
      $username_check=$this->user_model->username_check($alt['username']);
 
    if($username_check){
  $this->user_model->alt_user($alt);
  $this->session->set_flashdata('success_msg', 'Altered successfully!');
redirect('user/admin_view');
}
else{
 
  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
 redirect('user/admin_view');
}
    
}
    
//TO HERE
    
public function register_user(){
 
      $user=array(
      'username'=>$this->input->post('username'),
      'fname'=>$this->input->post('fname'),
      'sname'=>$this->input->post('sname'),
      'email'=>$this->input->post('email'),
      'phone'=>$this->input->post('phone'),
      'password'=>md5($this->input->post('password'))
      
        );
        print_r($user);
 
$email_check=$this->user_model->email_check($user['email']);
 
if($email_check){
  $this->user_model->register_user($user);
  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
  redirect('user/login_view');
 
}
else{
 
  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  redirect('user');
 
 
}
 
}
 
public function login_view(){
 
$this->load->view("login.php");
 
}

 
 
function login_user(){
 // $user_login=array(
 
  //'username'=>$this->input->post('username'),
 // 'password'=>md5($this->input->post('password'))
$status = $this->input->post('status');
    if ($status == "buyer")
        $this->load->view('buyer.php');
    else if ($status == "seller")
        $this->load->view('seller.php');
        else
     redirect('User/admin_view');
    //);
 /*
    $data=$this->user_model->login_user($user_login['username'],$user_login['password']);
      if($data)
      {
        $this->session->set_userdata('fname',$data['fname']);
        $this->session->set_userdata('email',$data['email']);
        $this->session->set_userdata('username',$data['username']);
        $this->session->set_userdata('sname',$data['sname']);
        $this->session->set_userdata('phone',$data['phone']);
 
        $this->load->view('user_profile.php');
 
      }
      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
          redirect('user/login_view');
       // $this->load->view("login.php");
 
      }*/
 
 
}
 
 
    
function user_profile(){
 
$this->load->view('user_profile.php');
 
}
public function user_logout(){
 
  $this->session->sess_destroy();
  redirect('user/login_view', 'refresh');
}
 
}
 
?>