<?php
class Login_Model extends CI_Model {

	function validate($username, $password)
	{
		$account = array('nim' => $username,'password'=>$password);
		$query = $this->db->where($account)->get('anggota');
		$result = $query->result();

		if (count($result))
			return $result[0];

		return FALSE;
	}
}