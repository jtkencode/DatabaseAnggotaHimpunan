<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_Model extends CI_Model{
	
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

	public function get_count_not_complete()
	{
		$this->db->where('tempat_lahir', '-');
		$this->db->where('alamat_sekarang','-');
		$this->db->where('angkatan_himpunan >','28');
		$query = $this->db->get('anggota');
		return count($query->result());

	}

	public function get_not_complete($start)
	{
		$this->db->where('tempat_lahir', '-');
		$this->db->where('alamat_sekarang','-');
		$this->db->where('angkatan_himpunan >','28');
		$this->db->limit(10,$start);
		$query = $this->db->get('anggota');
		return  $query->result();
	}

	public function get_count_anggota()
	{
		$this->db->where('angkatan_himpunan >','28');
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

	public function update_password($nim)
	{
		/* Check old password */
		$pass_lama = $this->input->post('password_lama');
		$account = array('nim' => $nim);
		$query = $this->db->where($account)->get('anggota');
		$result = $query->result();
		$result = reset($result);

		if (! password_verify($pass_lama,$result->PASSWORD) ){
			$this->session->set_flashdata('wrong_password', 'Password Lama yang dimasukkan Salah !');
			return FALSE;
		}


		/*Check password verification */
		$pass = $this->input->post('password_baru');
		$pass_verify = $this->input->post('password_baru2');

		if ($pass != $pass_verify){
			$this->session->set_flashdata('not_match', 'Verifikasi Pasword Tidak Sesuai !');
			return FALSE;
		}

		/*verification success */
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$data = array(
				'PASSWORD' => $pass
		);

		/*Update to DB*/
		$this->db->where('NIM', $nim);
		$query = $this->db->update('anggota',$data);
		return $query;
	}

	public function get_birthday_of_week()
	{
    	$query = $this->db->query("SELECT NIM, NAMA_LENGKAP, STR_TO_DATE(concat(DATE_FORMAT(TANGGAL_LAHIR,'%d/%m/'),DATE_FORMAT(now(),'%Y')),'%d/%m/%Y') AS TANGGAL
FROM ANGGOTA
HAVING TANGGAL
BETWEEN NOW()
AND DATE(NOW() + INTERVAL (7 - DAYOFWEEK(NOW())) DAY)
ORDER BY TANGGAL");
		return  $query->result();

	}

}
	
?>