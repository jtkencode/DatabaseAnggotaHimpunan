<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_Model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function is_not_complete($id)
	{
		$this->db->where('id_anggota',$id);
		$this->db->group_start();
		$this->db->where('nama_panggilan','-');
		$this->db->or_where('tempat_lahir', '-');
		$this->db->or_where('alamat_sekarang','-');
		$this->db->group_end();
		$query = $this->db->get('anggota');
		$result = $query->result();

		return (count($result) == 1);
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
		$this->db->select('angkatan_himpunan, count(*) as jumlah_anggota');
		$this->db->where('tempat_lahir', '-');
		$this->db->where('alamat_sekarang','-');
		$this->db->group_by('angkatan_himpunan');
		$query = $this->db->get('anggota');
		return $query->result();
	}

	public function get_anggota_angkatan_paging($angkatan,$start)
	{
		$this->db->where('angkatan_himpunan',$angkatan);
		$this->db->limit(10,$start);
		$query = $this->db->get('anggota');
		return  $query->result();

	}

	public function get_count_complete()
	{
		$this->db->select('angkatan_himpunan, count(*) as jumlah_anggota');
		$this->db->where('tempat_lahir <>', '-');
		$this->db->where('alamat_sekarang <>','-');
		$this->db->group_by('angkatan_himpunan');
		$query = $this->db->get('anggota');
		return $query->result();
	}

	public function get_total_not_complete()
	{
		$count_not_complete = $this->get_count_not_complete();
		$result = 0;
		foreach ($count_not_complete as $row) {
			$result += $row->jumlah_anggota;
		}

		return $result;
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

		if ($pass_lama == $pass){
			$this->session->set_flashdata('same_pass', 'Password baru yang dimasukkan harus berbeda dengan password default !');
			return FALSE;
		}

		/*verification success */
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$data = array(
				'password' => $pass
		);

		/*update to db*/
		$this->db->where('id_anggota', $id);
		$query = $this->db->update('anggota',$data);
		return $query;
	}

	public function is_password_changed($id)
	{
		$query = $this->db->where('id_anggota', $id)->get('anggota');
		$result = $query->result();
		$result = reset($result);
		return ($result->password != "$2y$10$4yHnBHYoaBV1KLPXf8K2b.3F4Lzz8XRs5BcG...VCKVLYvCtBR/zG");
	}


	/* 	author : if
		between date(now() - interval (1) day) -> yang ulang tahun hari ini
	*/
	public function get_birthday_of_week()
	{
    	$query = $this->db->query("select nim, nama_lengkap, str_to_date(concat(date_format(tanggal_lahir,'%d/%m/'),date_format(now(),'%y')),'%d/%m/%y') as tanggal
		from anggota
		having date(tanggal)
			between date(now())
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