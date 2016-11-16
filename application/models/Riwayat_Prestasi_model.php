<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Prestasi_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_nim($nim)
	{
		$query = $this->db->where('nim', $nim)->get('riwayat_prestasi');
		$result = $query->result();

		return $result;
	}

	public function get_id($nim,$id)
	{
		$this->db->where('nim',$nim);
		$this->db->where('no_urut_prestasi', $id);
		$query = $this->db->get('riwayat_prestasi');
		$result = $query->result();

		return $result[0];
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('nim', $id);
		$this->db->order_by('no_urut_prestasi', 'desc');
		$query = $this->db->limit(1)->get('riwayat_prestasi');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->no_urut_prestasi;
	}

	public function add_riwayat_prestasi($nim)
	{	
		$no_urut = $this->get_last_no($nim) + 1; //append no
		$data = array(
				'nim' => $nim,
				'no_urut_prestasi' => $no_urut,
				'id_tingkat_prestasi' => $this->input->post('tingkat_prestasi'),
				'nama_prestasi' => $this->input->post('nama_prestasi'),
				'pencapaian_prestasi' => $this->input->post('pencapaian_prestasi'),
				'lembaga_prestasi' => $this->input->post('lembaga_prestasi'),
				'tahun_prestasi' => $this->input->post('tahun_prestasi'),
				'jenis_prestasi' => $this->input->post('jenis_prestasi')
			);

		$query = $this->db->insert('riwayat_prestasi',$data);
		return $query;
	}

	public function update_riwayat_prestasi($nim,$id)
	{	
		$data = array(
				'id_tingkat_prestasi' => $this->input->post('tingkat_prestasi'),
				'nama_prestasi' => $this->input->post('nama_prestasi'),
				'pencapaian_prestasi' => $this->input->post('pencapaian_prestasi'),
				'lembaga_prestasi' => $this->input->post('lembaga_prestasi'),
				'tahun_prestasi' => $this->input->post('tahun_prestasi'),
				'jenis_prestasi' => $this->input->post('jenis_prestasi')
			);

		$this->db->where('nim',$nim);
		$this->db->where('no_urut_prestasi',$id);
		$query = $this->db->update('riwayat_prestasi',$data);
		return $query;
	}

	public function delete_riwayat_prestasi($nim,$id)
	{
		$this->db->where('nim',$nim);
		$this->db->where('no_urut_prestasi',$id);
		$query = $this->db->delete('riwayat_prestasi');
		return $query;
	}


}

?>