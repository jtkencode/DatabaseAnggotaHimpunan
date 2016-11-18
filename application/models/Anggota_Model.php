<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_Model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_nim($nim)
	{
		$query = $this->db->where('nim', $nim)->get('anggota');
		$result = $query->result();

		if (count($result))
			return $result[0];

		return FALSE;
	}

	public function get_id($id)
	{
		$query = $this->db->where('id_anggota', $id)->get('anggota');
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

	public function update_profile($id)
	{
		$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'nama_panggilan' => $this->input->post('nama_panggilan'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'alamat_asal' => $this->input->post('alamat_asal'),
				'alamat_sekarang' => $this->input->post('alamat_sekarang')
		);

		/*Update to DB*/
		$this->db->where('id_anggota', $id);
		$query = $this->db->update('anggota',$data);
		return $query;
	}

	public function update_password($id)
	{
		/* Check old password */
		$pass_lama = $this->input->post('password_lama');
		$account = array('id_anggota' => $id);
		$query = $this->db->where($account)->get('anggota');
		$result = $query->result();
		$result = reset($result);

		if (! password_verify($pass_lama,$result->password) ){
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
		$pass = password_hash($pass, password_default);
		$data = array(
				'password' => $pass
		);

		/*update to db*/
		$this->db->where('id_anggota', $id);
		$query = $this->db->update('anggota',$data);
		return $query;
	}


	/* 	author : if
		between date(now() - interval (1) day) -> yang ulang tahun hari ini
	*/
	public function get_birthday_of_week()
	{
    	$query = $this->db->query("select nim, nama_lengkap, str_to_date(concat(date_format(tanggal_lahir,'%d/%m/'),date_format(now(),'%y')),'%d/%m/%y') as tanggal
		from anggota
		having date(tanggal)
			between date(now() - interval (1) day)
				and date(now() + interval (7 - dayofweek(now())) day)
		order by tanggal");
		return  $query->result();

	}

	public function get_count_anggota_angkatan()
	{	
		$this->db->select('angkatan_himpunan,count(*) as jumlah_anggota');
		$this->db->group_by("angkatan_himpunan");
		$query = $this->db->get('anggota');
		return $query->result();
	}

}
	
?>