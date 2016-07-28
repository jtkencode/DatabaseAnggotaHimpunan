<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_PKM_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_id($id)
	{
		$query = $this->db->where('nim', $id)->get('riwayat_pkm');
		$result = $query->result();

		return $result;
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('nim', $id);
		$this->db->order_by('no_urut_pkm', 'DESC');
		$query = $this->db->limit(1)->get('riwayat_pkm');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->NO_URUT_PKM;
	}

	public function add_riwayat_pkm($nim)
	{	
		$no_urut = $this->get_last_no($nim) + 1; //append no
		$data = array(
				'NIM' => $nim,
				'NO_URUT_PKM' => $no_urut,
				'NAMA_PKM' => $this->input->post('nama_pkm'),
				'NAMA_PENYELENGGARA_PKM' => $this->input->post('nama_penyelenggara_pkm'),
				'TAHUN_PKM' => $this->input->post('tahun_pkm'),
				'PKM_KEMAHASISWAAN' => $this->input->post('pkm_kemahasiswaan')
			);

		$query = $this->db->insert('riwayat_pkm',$data);
		return $query;
	}

}

?>