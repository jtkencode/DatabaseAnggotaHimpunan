<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_PKM_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_nim($nim)
	{
		$query = $this->db->where('nim', $nim)->get('riwayat_pkm');
		$result = $query->result();

		return $result;
	}

	public function get_id($nim,$id)
	{
		$this->db->where('nim', $nim);
		$this->db->where('no_urut_pkm', $id);
		$query = $this->db->get('riwayat_pkm');
		$result = $query->result();

		return $result[0];
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('nim', $id);
		$this->db->order_by('no_urut_pkm', 'desc');
		$query = $this->db->limit(1)->get('riwayat_pkm');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->no_urut_pkm;
	}

	public function add_riwayat_pkm($nim)
	{	
		$no_urut = $this->get_last_no($nim) + 1; //append no
		$data = array(
				'nim' => $nim,
				'no_urut_pkm' => $no_urut,
				'nama_pkm' => $this->input->post('nama_pkm'),
				'nama_penyelenggara_pkm' => $this->input->post('nama_penyelenggara_pkm'),
				'tahun_pkm' => $this->input->post('tahun_pkm'),
				'pkm_kemahasiswaan' => $this->input->post('pkm_kemahasiswaan')
			);

		$query = $this->db->insert('riwayat_pkm',$data);
		return $query;
	}

	public function update_riwayat_pkm($nim,$id)
	{
		$data = array(
				'nama_pkm' => $this->input->post('nama_pkm'),
				'nama_penyelenggara_pkm' => $this->input->post('nama_penyelenggara_pkm'),
				'tahun_pkm' => $this->input->post('tahun_pkm'),
				'pkm_kemahasiswaan' => $this->input->post('pkm_kemahasiswaan')
			);

		$this->db->where('nim', $nim);
		$this->db->where('no_urut_pkm',$id);
		$query = $this->db->update('riwayat_pkm',$data);
		return $query;
	}

	public function delete_riwayat_pkm($nim,$id)
	{
		$this->db->where('nim', $nim);
		$this->db->where('no_urut_pkm',$id);
		$query = $this->db->delete('riwayat_pkm');
		return $query;
	}

}

?>