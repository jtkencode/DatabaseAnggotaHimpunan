<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Pendidikan_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_nim($nim)
	{
		$query = $this->db->where('nim', $nim)->get('riwayat_pendidikan');
		$result = $query->result();

		return $result;
	}

	public function get_id($nim,$id)
	{	
		$this->db->where('NIM',$nim);
		$this->db->where('no_urut_pendidikan', $id);
		$query = $this->db->get('riwayat_pendidikan');
		$result = $query->result();

		return $result[0];
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('nim', $id);
		$this->db->order_by('no_urut_pendidikan', 'DESC');
		$query = $this->db->limit(1)->get('riwayat_pendidikan');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->NO_URUT_PENDIDIKAN;
	}

	public function add_riwayat_pendidikan($nim)
	{	

		$no_urut = $this->get_last_no($nim) + 1; //append no
		$data = array(
				'NIM' => $nim,
				'NO_URUT_PENDIDIKAN' => $no_urut,
				'JENJANG_PENDIDIKAN' => $this->input->post('jenjang_pendidikan'),
				'NAMA_INSTITUSI_PENDIDIKAN' => $this->input->post('nama_institusi'),
				'TAHUN_MASUK_PENDIDIKAN' => $this->input->post('tahun_masuk'),
				'TAHUN_LULUS_PENDIDIKAN' => $this->input->post('tahun_lulus'),
				'BIDANG_PENDIDIKAN' => $this->input->post('bidang')
			);

		$query = $this->db->insert('riwayat_pendidikan',$data);
		return $query;
	}

	public function update_riwayat_pendidikan($nim,$id)
	{
		$data = array(
				'JENJANG_PENDIDIKAN' => $this->input->post('jenjang_pendidikan'),
				'NAMA_INSTITUSI_PENDIDIKAN' => $this->input->post('nama_institusi'),
				'TAHUN_MASUK_PENDIDIKAN' => $this->input->post('tahun_masuk'),
				'TAHUN_LULUS_PENDIDIKAN' => $this->input->post('tahun_lulus'),
				'BIDANG_PENDIDIKAN' => $this->input->post('bidang')
			);

		$this->db->where('NIM', $nim);
		$this->db->where('NO_URUT_PENDIDIKAN', $id);
		$query = $this->db->update('riwayat_pendidikan', $data);
		return $query;
	}

	public function delete_riwayat_pendidikan($nim,$id)
	{
		$this->db->where('NIM', $nim);
		$this->db->where('no_urut_pendidikan', $id);
		$query = $this->db->delete('riwayat_pendidikan');
		return $query;
	}

}

?>