<?php
class seller_model extends CI_model{
 
 
 	public function __construct(){
		parent::__construct();
		$this->load->database();
	}


public function add($land){
 
 
$this->db->insert('land', $land);
 
}
}
    ?>