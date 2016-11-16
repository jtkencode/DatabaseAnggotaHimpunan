<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Pelatihan_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_id($id)
	{
		$query = $this->db->where('id_anggota', $id)->get('riwayat_pelatihan');
		$result = $query->result();

		return $result;
	}

	public function get_no_urut($id,$no_urut)
	{
		$this->db->where('id_anggota',$id);
		$this->db->where('no_urut_pelatihan', $no_urut);
		$query = $this->db->get('riwayat_pelatihan');
		$result = $query->result();

		return $result[0];
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('id_anggota', $id);
		$this->db->order_by('no_urut_pelatihan', 'desc');
		$query = $this->db->limit(1)->get('riwayat_pelatihan');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->no_urut_pelatihan;
	}

	public function add_riwayat_pelatihan($id)
	{	
		$no_urut = $this->get_last_no($id) + 1; //append no
		$data = array(
				'id_anggota' => $id,
				'no_urut_pelatihan' => $no_urut,
				'nama_pelatihan' => $this->input->post('nama_pelatihan'),
				'nama_penyelenggara_pelatihan' => $this->input->post('nama_penyelenggara_pelatihan'),
				'tahun_pelatihan' => $this->input->post('tahun_pelatihan'),
				'pelatihan_kemahasiswaan' => $this->input->post('pelatihan_kemahasiswaan')
			);

		$query = $this->db->insert('riwayat_pelatihan',$data);
		return $query;
	}

	public function update_riwayat_pelatihan($id,$no_urut)
	{		
		$data = array(
				'nama_pelatihan' => $this->input->post('nama_pelatihan'),
				'nama_penyelenggara_pelatihan' => $this->input->post('nama_penyelenggara_pelatihan'),
				'tahun_pelatihan' => $this->input->post('tahun_pelatihan'),
				'pelatihan_kemahasiswaan' => $this->input->post('pelatihan_kemahasiswaan')
			);

		$this->db->where('id_anggota',$id);
		$this->db->where('no_urut_pelatihan',$no_urut);
		$query = $this->db->update('riwayat_pelatihan',$data);
		return $query;
	}

	public function delete_riwayat_pelatihan($id,$no_urut)
	{
		$this->db->where('id_anggota',$id);
		$this->db->where('no_urut_pelatihan',$no_urut);
		$query = $this->db->delete('riwayat_pelatihan');
		return $query;
	}

}

?>