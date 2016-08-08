<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Kepanitiaan_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_id($id)
	{
		$query = $this->db->where('NO_URUT_KEPANITIAAN', $id)->get('riwayat_kepanitiaan');
		$result = $query->result();

		return $result[0];
	}

	public function get_nim($nim)
	{
		$query = $this->db->where('nim', $nim)->get('riwayat_kepanitiaan');
		$result = $query->result();

		return $result;
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('nim', $id);
		$this->db->order_by('no_urut_kepanitiaan', 'DESC');
		$query = $this->db->limit(1)->get('riwayat_kepanitiaan');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->NO_URUT_KEPANITIAAN;
	}

	public function add_riwayat_kepanitiaan($nim)
	{	
		$no_urut = $this->get_last_no($nim) + 1; //append no
		$data = array(
				'NIM' => $nim,
				'NO_URUT_KEPANITIAAN' => $no_urut,
				'NAMA_KEGIATAN_KEPANITIAAN' => $this->input->post('nama_kegiatan_kepanitiaan'),
				'NAMA_ORG_KEPANITIAAN' => $this->input->post('nama_org_kepanitiaan'),
				'JABATAN_KEPANITIAAN' => $this->input->post('jabatan_kepanitiaan'),
				'TAHUN_KEPANITIAAN' => $this->input->post('tahun_kepanitiaan'),
				'KEPANITIAAN_KEMAHASISWAAN' => $this->input->post('kepanitiaan_kemahasiswaan')
			);

		$query = $this->db->insert('riwayat_kepanitiaan',$data);
		return $query;
	}


	public function update_riwayat_kepanitiaan($id)
	{	
		$data = array(
				'NAMA_KEGIATAN_KEPANITIAAN' => $this->input->post('nama_kegiatan_kepanitiaan'),
				'NAMA_ORG_KEPANITIAAN' => $this->input->post('nama_org_kepanitiaan'),
				'JABATAN_KEPANITIAAN' => $this->input->post('jabatan_kepanitiaan'),
				'TAHUN_KEPANITIAAN' => $this->input->post('tahun_kepanitiaan'),
				'KEPANITIAAN_KEMAHASISWAAN' => $this->input->post('kepanitiaan_kemahasiswaan')
			);

		$this->db->where('NO_URUT_KEPANITIAAN',$id);
		$query = $this->db->update('riwayat_kepanitiaan',$data);
		return $query;
	}


	public function delete_riwayat_kepanitiaan($id)
	{
		$this->db->where('no_urut_kepanitiaan', $id);
		$query = $this->db->delete('riwayat_kepanitiaan');
		return $query;
	}

}

?>