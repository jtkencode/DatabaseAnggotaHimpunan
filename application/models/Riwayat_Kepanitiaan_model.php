<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Kepanitiaan_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_no_urut($id,$no_urut)
	{	
		$this->db->where('id_anggota',$id);
		$this->db->where('no_urut_kepanitiaan', $no_urut);
		$query = $this->db->get('riwayat_kepanitiaan');
		$result = $query->result();

		return $result[0];
	}

	public function get_id($id)
	{	
		$this->db->where('id_anggota', $id);
		$this->db->order_by('tahun_kepanitiaan','desc');
		$query = $this->db->get('riwayat_kepanitiaan');
		$result = $query->result();

		return $result;
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('id_anggota', $id);
		$this->db->order_by('no_urut_kepanitiaan', 'desc');
		$query = $this->db->limit(1)->get('riwayat_kepanitiaan');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->no_urut_kepanitiaan;
	}

	public function add_riwayat_kepanitiaan($id)
	{	
		$no_urut = $this->get_last_no($id) + 1; //append no
		$data = array(
				'id_anggota' => $id,
				'no_urut_kepanitiaan' => $no_urut,
				'nama_kegiatan_kepanitiaan' => $this->input->post('nama_kegiatan_kepanitiaan'),
				'nama_org_kepanitiaan' => $this->input->post('nama_org_kepanitiaan'),
				'jabatan_kepanitiaan' => $this->input->post('jabatan_kepanitiaan'),
				'tahun_kepanitiaan' => $this->input->post('tahun_kepanitiaan'),
				'kepanitiaan_kemahasiswaan' => $this->input->post('kepanitiaan_kemahasiswaan')
			);

		$query = $this->db->insert('riwayat_kepanitiaan',$data);
		return $query;
	}


	public function update_riwayat_kepanitiaan($id,$no_urut)
	{	
		$data = array(
				'nama_kegiatan_kepanitiaan' => $this->input->post('nama_kegiatan_kepanitiaan'),
				'nama_org_kepanitiaan' => $this->input->post('nama_org_kepanitiaan'),
				'jabatan_kepanitiaan' => $this->input->post('jabatan_kepanitiaan'),
				'tahun_kepanitiaan' => $this->input->post('tahun_kepanitiaan'),
				'kepanitiaan_kemahasiswaan' => $this->input->post('kepanitiaan_kemahasiswaan')
			);

		$this->db->where('no_urut_kepanitiaan',$no_urut);
		$this->db->where('id_anggota',$id);
		$query = $this->db->update('riwayat_kepanitiaan',$data);
		return $query;
	}


	public function delete_riwayat_kepanitiaan($id,$no_urut)
	{
		$this->db->where('id_anggota',$id);
		$this->db->where('no_urut_kepanitiaan', $no_urut);
		$query = $this->db->delete('riwayat_kepanitiaan');
		return $query;
	}

}

?>