<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user','users');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function load_register()
	{
		$this->load->view('register');
	}

	public function register()
	{	
		if($this->input->post('register')){ 

			$this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[10]|max_length[100]');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[12]');
			if ($this->form_validation->run()) {

				$this->users->userCheckUsername();
				if(!$this->users->userCheckUsername()){
					$this->users->userRegister();
					$this->session->set_flashdata('berhasil', 'Berhasil daftar, silahkan login');
					redirect('user','refresh');
				}

			}
			else{
				$this->session->set_flashdata('gagal',validation_errors());
				redirect('user/load_register','refresh');
			}
		}
		else{
			redirect('user/load_register','refresh');
		}	
	}

	public function login()
	{
		if($this->input->post('login')){

			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]');
			$this->form_validation->set_rules('password', 'Username', 'trim|required|min_length[4]|max_length[12]');
			if ($this->form_validation->run()) {
				$this->users->userLogin();

			}
			else{
				$this->session->set_flashdata('gagal',validation_errors());
				redirect('user','refresh');
			}
		}
		else{
			redirect('user','refresh');
		}
	}
	public function userLogout()
	{
		$this->session->sess_destroy();
		redirect('user','refresh');
	}
	public function loadForgot()
	{
		$this->load->view('forgot');
	}
	public function userForgot()
	{
		$pas = $this->users->getPassword();
		if($pas){
			$data = $pas->password;
			$array = array(
				'pass' => $data,
				'username' => $this->input->post('username')
			);
		
		$this->session->set_flashdata($array);
		redirect('user/loadForgot','refresh');
		}
		$this->session->set_flashdata('gagal', 'Username anda salah');
		redirect('user/loadForgot','refresh');

		
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */