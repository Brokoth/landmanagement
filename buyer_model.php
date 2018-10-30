<?php
class buyer_model extends CI_model{
 
 
 	public function __construct(){
		parent::__construct();
		$this->load->database();
	}


public function register_user($user){
 
 
$this->db->insert('user', $user);
 
}
    
        
public function landid_check($landid){
 
  $this->db->select('*');
  $this->db->from('land');
  $this->db->where('landid', $landid);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return true;
  }else{
    return false;
  }
}
            
 public function buy ($buy){
 
$this->db->where('landid', $buy['landid']);
$this->db->update('land', $buy);
 
 
}
 
}

    
    ?>