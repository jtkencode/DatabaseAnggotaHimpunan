<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Org_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_nim($nim)
	{
		$query = $this->db->where('nim', $nim)->get('riwayat_org');
		$result = $query->result();

		return $result;
	}

	public function get_id($id)
	{
		$query = $this->db->where('no_urut_org', $id)->get('riwayat_org');
		$result = $query->result();

		return $result[0];
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

	public function add_riwayat_org($nim)
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

	public function update_riwayat_org($id)
	{	
		$data = array(
				'NAMA_ORG' => $this->input->post('nama_org'),
				'JABATAN_ORG' => $this->input->post('jabatan_org'),
				'TAHUN_MULAI_ORG' => $this->input->post('tahun_mulai_org'),
				'TAHUN_SELESAI_ORG' => $this->input->post('tahun_selesai_org'),
				'ORG_KEMAHASISWAAN' => $this->input->post('org_kemahasiswaan')
			);

		$this->db->where('NO_URUT_ORG',$id);
		$query = $this->db->update('riwayat_org',$data);
		return $query;
	}

	public function delete_riwayat_org($id)
	{
		$this->db->where('NO_URUT_ORG',$id);
		$query = $this->db->delete('riwayat_org');
		return $query;
	}

}

?>