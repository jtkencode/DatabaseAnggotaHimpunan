<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Org_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_id($id)
	{
		$query = $this->db->where('nim', $id)->get('riwayat_org');
		$result = $query->result();

		return $result;
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('nim', $id);
		$this->db->order_by('no_urut_org', 'DESC');
		$query = $this->db->limit(1)->get('riwayat_org');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->NO_URUT_ORG;
	}

	public function add_riwayat_organisasi($nim)
	{	

		$no_urut = $this->get_last_no($nim) + 1; //append no
		$data = array(
				'NIM' => $nim,
				'NO_URUT_ORG' => $no_urut,
				'NAMA_ORG' => $this->input->post('nama_org'),
				'JABATAN_ORG' => $this->input->post('jabatan_org'),
				'TAHUN_MULAI_ORG' => $this->input->post('tahun_mulai_org'),
				'TAHUN_SELESAI_ORG' => $this->input->post('tahun_selesai_org'),
				'ORG_KEMAHASISWAAN' => $this->input->post('org_kemahasiswaan')
			);

		$query = $this->db->insert('riwayat_org',$data);
		return $query;
	}

}

?>