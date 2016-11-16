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

	public function get_id($nim,$id)
	{
		$this->db->where('no_urut_org', $id);
		$this->db->where('nim', $nim);
		$query = $this->db->get('riwayat_org');
		$result = $query->result();

		return $result[0];
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('nim', $id);
		$this->db->order_by('no_urut_org', 'desc');
		$query = $this->db->limit(1)->get('riwayat_org');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->no_urut_org;
	}

	public function add_riwayat_org($nim)
	{	

		$no_urut = $this->get_last_no($nim) + 1; //append no
		$data = array(
				'nim' => $nim,
				'no_urut_org' => $no_urut,
				'nama_org' => $this->input->post('nama_org'),
				'jabatan_org' => $this->input->post('jabatan_org'),
				'tahun_mulai_org' => $this->input->post('tahun_mulai_org'),
				'tahun_selesai_org' => $this->input->post('tahun_selesai_org'),
				'org_kemahasiswaan' => $this->input->post('org_kemahasiswaan')
			);

		$query = $this->db->insert('riwayat_org',$data);
		return $query;
	}

	public function update_riwayat_org($nim,$id)
	{	
		$data = array(
				'nama_org' => $this->input->post('nama_org'),
				'jabatan_org' => $this->input->post('jabatan_org'),
				'tahun_mulai_org' => $this->input->post('tahun_mulai_org'),
				'tahun_selesai_org' => $this->input->post('tahun_selesai_org'),
				'org_kemahasiswaan' => $this->input->post('org_kemahasiswaan')
			);
		$this->db->where('nim',$nim);
		$this->db->where('no_urut_org',$id);
		$query = $this->db->update('riwayat_org',$data);
		return $query;
	}

	public function delete_riwayat_org($nim,$id)
	{
		$this->db->where('nim',$nim);
		$this->db->where('no_urut_org',$id);
		$query = $this->db->delete('riwayat_org');
		return $query;
	}

}

?>