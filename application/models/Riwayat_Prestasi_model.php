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

	public function get_id($id)
	{
		$query = $this->db->where('no_urut_prestasi', $id)->get('riwayat_prestasi');
		$result = $query->result();

		return $result[0];
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('nim', $id);
		$this->db->order_by('no_urut_prestasi', 'DESC');
		$query = $this->db->limit(1)->get('riwayat_prestasi');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->NO_URUT_PRESTASI;
	}

	public function add_riwayat_prestasi($nim)
	{	
		$no_urut = $this->get_last_no($nim) + 1; //append no
		$data = array(
				'NIM' => $nim,
				'NO_URUT_PRESTASI' => $no_urut,
				'ID_TINGKAT_PRESTASI' => $this->input->post('tingkat_prestasi'),
				'NAMA_PRESTASI' => $this->input->post('nama_prestasi'),
				'PENCAPAIAN_PRESTASI' => $this->input->post('pencapaian_prestasi'),
				'LEMBAGA_PRESTASI' => $this->input->post('lembaga_prestasi'),
				'TAHUN_PRESTASI' => $this->input->post('tahun_prestasi'),
				'JENIS_PRESTASI' => $this->input->post('jenis_prestasi')
			);

		$query = $this->db->insert('riwayat_prestasi',$data);
		return $query;
	}

	public function update_riwayat_prestasi($id)
	{	
		$data = array(
				'ID_TINGKAT_PRESTASI' => $this->input->post('tingkat_prestasi'),
				'NAMA_PRESTASI' => $this->input->post('nama_prestasi'),
				'PENCAPAIAN_PRESTASI' => $this->input->post('pencapaian_prestasi'),
				'LEMBAGA_PRESTASI' => $this->input->post('lembaga_prestasi'),
				'TAHUN_PRESTASI' => $this->input->post('tahun_prestasi'),
				'JENIS_PRESTASI' => $this->input->post('jenis_prestasi')
			);

		$this->db->where('NO_URUT_PRESTASI',$id);
		$query = $this->db->update('riwayat_prestasi',$data);
		return $query;
	}

	public function delete_riwayat_prestasi($id)
	{
		$this->db->where('NO_URUT_PRESTASI',$id);
		$query = $this->db->delete('riwayat_prestasi');
		return $query;
	}


}

?>