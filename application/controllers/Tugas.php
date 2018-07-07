<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tugas','tug');
	}
  
	public function index()
	{
		$data['konten']="v_tugas";
		$data['t_active']="active";
		$data['tt_active']="";
		$data['bt_active']="";
		$data['capt']="Daftar Tugas";
		$data['tugas']=$this->db->where('id_user',$this->session->userdata('id_user'))
								->join('mapel','tugas.id_mapel=mapel.id_mapel')
								->get('tugas')
								->result();

		$data['mapel'] = $this->db->get('mapel')->result();
		$this->load->view('index', $data);
	}

	public function addTugas()
	{
		if($this->input->post('tambah')){
			$this->tug->m_addTugas();
		}
	}
	public function editTugas($id_tugas)
	{
		$this->tug->m_editTugas($id_tugas);
	}
	public function asDone($id_tugas)
	{
		$this->tug->m_asDone($id_tugas);
		redirect('tugas','refresh');
	}

	public function deleteTugas($id_tugas)
	{
		$this->tug->m_deleteTugas($id_tugas);
	}

	public function ttugas()
	{
		$data['konten']="v_ttugas";
		$data['t_active']="";
		$data['tt_active']="active";
		$data['bt_active']="";
		$data['capt']="Daftar Tugas Tuntas";

		$data['tugas']=$this->db->where('id_user',$this->session->userdata('id_user'))
								->where('status','Tuntas')
								->join('mapel','tugas.id_mapel=mapel.id_mapel')
								->get('tugas')
								->result();

		$data['mapel'] = $this->db->get('mapel')->result();

		$this->load->view('index', $data);
	}
	public function btugas()
	{
		$data['konten']="v_btugas";
		$data['t_active']="";
		$data['tt_active']="";
		$data['bt_active']="active";
		$data['capt']="Daftar Tugas Tuntas";

		$data['tugas']=$this->db->where('id_user',$this->session->userdata('id_user'))
								->where('status','Belum Tuntas')
								->join('mapel','tugas.id_mapel=mapel.id_mapel')
								->get('tugas')
								->result();

		$data['mapel'] = $this->db->get('mapel')->result();

		$this->load->view('index', $data);
	}

}

/* End of file Tugas.php */
/* Location: ./application/controllers/Tugas.php */