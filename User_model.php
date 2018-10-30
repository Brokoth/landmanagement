<?php
class User_model extends CI_model{
 
 
 	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function register2_user($data){
		$this->db->insert("users", $data);
		$this->load->view('my-account');
	}
public function register_user($user){
 
 
$this->db->insert('user', $user);
 
}
    //COPY FROM HERE
    public function alt_user($alt){
 
 
$this->db->where('username', $alt['username']);
$this->db->update('user', $alt);
 
}
    
        public function username_check($username){
 
  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('username', $username);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return true;
  }else{
    return false;
  }
 
}
    //TO HERE
 
 
public function login_user($username,$password){
 
  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('username',$username);
  $this->db->where('password',$password);
 
  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }
 
 
}
public function email_check($email){
 
  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('email',$email);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }
 
}
    

 
 
}
 
 
?>