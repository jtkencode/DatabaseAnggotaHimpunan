<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identity extends CI_Model {

	public function login($username, $password)
	{
		if ($username == "admin"){
			if ($password != "birukandunia"){
				$this->session->set_flashdata('error', 'username / password salah');
				return FALSE;
			}
		} else {
			$account = array('nim' => $username,'password'=>$password);
			$query = $this->db->where($account)->get('anggota');
			$result = $query->result();
			if (empty($result)){
				$this->session->set_flashdata('error', 'username / password salah');
				return FALSE;
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