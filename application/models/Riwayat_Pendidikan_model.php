<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Pendidikan_model extends CI_Model{

	public $nim;
	public $no_urut_pendidikan;
	public $jenjang_pendidikan;
	public $nama_institusi_pendidikan;
	public $tahun_masuk_pendidikan;
	public $tahun_lulus_pendidikan;
	public $bidang_pendidikan;
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_id($id)
	{
		$query = $this->db->where('nim', $id)->get('riwayat_pendidikan');
		$result = $query->result();

		if (count($result))
			return $result;

		return FALSE;
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('nim', $id);
		$this->db->order_by('no_urut_pendidikan', 'DESC');
		$query = $this->db->limit(1)->get('riwayat_pendidikan');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->NO_URUT_PENDIDIKAN;
	}

	public function add_riwayat_pendidikan($nim)
	{	

		$no_urut = $this->get_last_no($nim) + 1; //append no
		$data = array(
				'NIM' => $nim,
				'NO_URUT_PENDIDIKAN' => $no_urut,
				'JENJANG_PENDIDIKAN' => $this->input->post('jenjang_pendidikan'),
				'NAMA_INSTITUSI_PENDIDIKAN' => $this->input->post('nama_institusi'),
				'TAHUN_MASUK_PENDIDIKAN' => $this->input->post('tahun_masuk'),
				'TAHUN_LULUS_PENDIDIKAN' => $this->input->post('tahun_lulus'),
				'BIDANG_PENDIDIKAN' => $this->input->post('bidang')
			);

		$query = $this->db->insert('riwayat_pendidikan',$data);
		return $query;
	}

}

?>