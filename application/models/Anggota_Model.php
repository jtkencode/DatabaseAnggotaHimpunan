<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_Model extends CI_Model{

	public $nim;
	public $angkatan_himpunan;
	public $id_ps;
	public $nama_kelas;
	public $angkatan_kelas;
	public $id_agama;
	public $npa;
	public $password;
	public $nama_lengkap;
	public $nama_panggilan;
	public $nama_bagus;
	public $jenis_kelamin;
	public $tempat_lahir;
	public $tanggal_lahir;
	public $alamat_sekarang;
	public $alamat_asal;
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_id($id)
	{
		$query = $this->db->where('nim', $id)->get('anggota');
		$result = $query->result();

		if (count($result))
			return $result[0];

		return FALSE;
	}

	public function get_all()
	{
		$query = $this->db->get('anggota');
		return $query->result();
	}

	public function get_all_not_complete()
	{
		$this->db->where('tempat_lahir', '-');
		$this->db->where('angkatan_himpunan', '30');
		$this->db->or_where('angkatan_himpunan', '29');
		$query = $this->db->get('anggota');
		return  $query->result();

	}

	public function get_count_anggota()
	{
		$this->db->where('angkatan_himpunan', '30');
		$this->db->or_where('angkatan_himpunan', '29');
		$this->db->from('anggota'); 
		return $this->db->count_all_results();
	}

	public function update_profile($nim)
	{
		$data = array(
				'NAMA_LENGKAP' => $this->input->post('nama_lengkap'),
				'NAMA_PANGGILAN' => $this->input->post('nama_panggilan'),
				'TEMPAT_LAHIR' => $this->input->post('tempat_lahir'),
				'ALAMAT_ASAL' => $this->input->post('alamat_asal'),
				'ALAMAT_SEKARANG' => $this->input->post('alamat_sekarang')
		);

		/*Update to DB*/
		$this->db->where('NIM', $nim);
		$query = $this->db->update('anggota',$data);
		return $query;
	}

	public function add_contact($nim)
	{
		$data = array(
				'NIM' => $nim,
				'DETIL_KONTAK' => $this->input->post('detil_kontak'),
				'JENIS_KONTAK' => $this->input->post('jenis_kontak')
			);

		$query = $this->db->update('kontak',$data);

		if ($query) {
			return $this->db->insert_id();
		} else return $query;

	}

}

?>