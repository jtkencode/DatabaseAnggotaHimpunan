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

	public function update_profile()
	{
		//$this->$nama_lengkap = $this->input->post('nama_lengkap');
		$this->$nama_panggilan = $this->input->post('nama_panggilan');
		$this->$tempat_lahir = $this->input->post('tempat_lahir');
		$this->$alamat_asal = $this->input->post('alamat_asal');
		$this->$alamat_sekarang = $this->input->post('alamat_sekarang');

		//echo $this->input->post('nama_lengkap');
		echo $this->input->post('nama_panggilan');
		echo $this->input->post('tempat_lahir');
		echo $this->input->post('alamat_asal');
		echo $this->input->post('alamat_sekarang');


	}

}

?>