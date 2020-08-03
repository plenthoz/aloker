<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Regis_model extends CI_Model {

	//public $table = 'users';

	public function register($user, $pelamar)
	{
		$insert = $this->db->insert('users', $user);
		$insert = $this->db->insert('pelamar', $pelamar);
		return $insert;
	}

	public function getAllUsers()
	{
  		$query = $this->db->get('users');
  		return $query->result(); 
 	}

 	public function getUser($id)
 	{
  		$query = $this->db->get_where('users',array('id'=>$id));
  		return $query->row_array();
 	}

 	public function activate($data, $id)
 	{
  		$this->db->where('users.id', $id);
  		return $this->db->update('users', $data);
 	}



}
?>
