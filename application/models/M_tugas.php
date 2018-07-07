<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tugas extends CI_Model {

	public function m_addTugas()
	{
		$data = array(
				'id_tugas'	=> NULL,
				'id_user'	=> $this->session->userdata('id_user'),
				'id_mapel'	=> $this->input->post('mapel'),
				'tugas'		=> $this->input->post('tugas'),
				'deadline'	=> $this->input->post('deadline'),
				'status'	=> 'Belum Tuntas'
			);

		$tambah = $this->db->insert('tugas',$data);
		if($tambah){
			redirect('tugas','refresh');
		}
	}

	public function m_editTugas($id)
	{
		$data = array(
				'id_mapel'	=> $this->input->post('mapel'),
				'tugas'		=> $this->input->post('tugas'),
				'deadline'	=> $this->input->post('deadline'),
			);

		$edit = $this->db->where('id_tugas',$id)
						 ->update('tugas',$data);
		if($edit){
			redirect('tugas','refresh');
		}
	}
	public function m_asDone($id)
	{
		$data = array(
			'status'	=> 'Tuntas'
		);
		$this->db->where('id_tugas',$id)
				 ->update('tugas',$data);
	}
	public function m_deleteTugas($id)
	{
		$data = array(
			'id_tugas'	=> $id
		);
		$delete = $this->db->delete('tugas',$data);
		if($delete){
			redirect('tugas','refresh');
		}
	}
}

/* End of file M_tugas.php */
/* Location: ./application/models/M_tugas.php */