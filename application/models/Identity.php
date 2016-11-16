<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identity extends CI_Model {

	public function login($username, $password)
	{
		if ($username == "admin"){
			if (!password_verify($password,"$2y$10$1IjkPES8.GIPoKh5hWz1vOEWZRAyZ840zj11kfqnPviYeDqbsM9P.")){
				$this->session->set_flashdata('error', 'username / password salah');
				return FALSE;
			}
		} else {
			$account = array('nim' => $username);
			$query = $this->db->where($account)->get('anggota');
			$result = $query->result();
			if (empty($result)){
				$this->session->set_flashdata('error', 'Username Tidak Ditemukan !');
				return FALSE;
			} else {
				$result = reset($result);
				if (! password_verify($password,$result->password) ){
					$this->session->set_flashdata('error', 'Password Salah !');
					return FALSE;
				}
			}
		}	

		$id = ($username == "admin" ? 1 : 2);
		$this->set_session_data('id',$id);
		$this->set_session_data('user',$username);
		return TRUE;
	}

	private function set_session_data($key, $value)
	{
		$this->session->set_userdata($key, $value);
	}

	private function get_session_data($key)
	{
		return $this->session->userdata($key);
	}

	public function is_admin()
	{
		return $this->get_session_data('id') == 1;
	}

	public function is_anggota()
	{
		return $this->get_session_data('id') == 2;
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}
}

?>