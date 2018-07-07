<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	 public function userCheckUsername()
	 {
	 	$user = $this->db->where('username',$this->input->post('username'))
	 					 ->get('users')
	 					 ->num_rows();
	 	if($user > 0){
	 		$this->session->set_flashdata('gagal','Username telah terdaftar');
	 		redirect('user/load_register','refresh');
	 	}	
	 }

	 public function userRegister()
	 {
	 	$data = array(
	 		'id_user'   => NULL,
	 		'name' 		=> $this->input->post('name'),
	 		'username'  => $this->input->post('username'),
	 		'password'  => $this->input->post('password')
	 	);

	 	$this->db->insert('users',$data);
	 }

	 public function userLogin()
	 {
	 	$login = $this->db->where('username', $this->input->post('username'))
	 			 		  ->where('password', $this->input->post('password'))
	 					  ->get('users')
	 					  ->num_rows();

	 	$session = $this->db->where('username', $this->input->post('username'))
	 			 		    ->where('password', $this->input->post('password'))
	 					    ->get('users')
	 					    ->row();

	 	if($login > 0){
	 		$data = array(
	 			'id_user' => $session->id_user,
	 			'name'	  => $session->name,
	 			'login'	  => TRUE
	 		);				    
	 		$this->session->set_userdata($data);
	 		redirect('tugas','refresh');
	 	}
	 	else{
	 		$this->session->set_flashdata('gagal', 'Username tidak terdaftar, silahkan mendaftar ');
	 		redirect('user','refresh');
	 	}
	 					    				  
	 }

	 public function getPassword()
	 {
	 	return $this->db->where('username', $this->input->post('username'))
	 	         ->get('users')
	 	         ->row();
	 }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */