<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_PKM_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_id($id)
	{
		$this->db->where('id_anggota', $id);
		$this->db->order_by('tahun_pkm','desc');
		$query = $this->db->get('riwayat_pkm');
		$result = $query->result();

		return $result;
	}

	public function get_no_urut($id,$no_urut)
	{
		$this->db->where('id_anggota', $id);
		$this->db->where('no_urut_pkm', $no_urut);
		$query = $this->db->get('riwayat_pkm');
		$result = $query->result();

		return $result[0];
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('id_anggota', $id);
		$this->db->order_by('no_urut_pkm', 'desc');
		$query = $this->db->limit(1)->get('riwayat_pkm');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->no_urut_pkm;
	}

	public function add_riwayat_pkm($id)
	{	
		$no_urut = $this->get_last_no($id) + 1; //append no
		$data = array(
				'id_anggota' => $id,
				'no_urut_pkm' => $no_urut,
				'nama_pkm' => $this->input->post('nama_pkm'),
				'nama_penyelenggara_pkm' => $this->input->post('nama_penyelenggara_pkm'),
				'tahun_pkm' => $this->input->post('tahun_pkm'),
				'pkm_kemahasiswaan' => $this->input->post('pkm_kemahasiswaan')
			);

		$query = $this->db->insert('riwayat_pkm',$data);
		return $query;
	}

	public function update_riwayat_pkm($id,$no_urut)
	{
		$data = array(
				'nama_pkm' => $this->input->post('nama_pkm'),
				'nama_penyelenggara_pkm' => $this->input->post('nama_penyelenggara_pkm'),
				'tahun_pkm' => $this->input->post('tahun_pkm'),
				'pkm_kemahasiswaan' => $this->input->post('pkm_kemahasiswaan')
			);

		$this->db->where('id_anggota', $id);
		$this->db->where('no_urut_pkm',$no_urut);
		$query = $this->db->update('riwayat_pkm',$data);
		return $query;
	}

	public function delete_riwayat_pkm($id,$no_urut)
	{
		$this->db->where('id_anggota', $id);
		$this->db->where('no_urut_pkm',$no_urut);
		$query = $this->db->delete('riwayat_pkm');
		return $query;
	}

}

?>