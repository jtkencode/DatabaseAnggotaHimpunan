<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model{

	public $nim;
	public $detil_kontak;
	public $jenis_kontak;
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_id($id)
	{
		$query = $this->db->where('id_anggota', $id)->get('kontak');
		$result = $query->result();

		return $result;
	}

	public function get_id_kontak($id_anggota,$id_kontak)
	{
		$this->db->where('id_kontak', $id_kontak);
		$query = $this->db->where('id_anggota', $id_anggota)->get('kontak');
		$result = $query->result();

		return $result[0];
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('id_anggota', $id);
		$this->db->order_by('id_kontak', 'desc');
		$query = $this->db->limit(1)->get('kontak');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->id_kontak;
	}

	public function add_contact($id)
	{
		$id_kontak = get_last_no($id) + 1;
		$data = array(
				'id_anggota' => $id,
				'id_kontak' => $id_kontak,
				'detil_kontak' => $this->input->post('detil_kontak'),
				'jenis_kontak' => $this->input->post('jenis_kontak')
			);

		$query = $this->db->insert('kontak',$data);
		return $query;

	}

	public function add_contacts($id)
	{
		$data = array(
				'id_anggota' => $id,
				'detil_kontak' => $this->input->post('no_hp'),
				'jenis_kontak' => "H"
			);
		$query = $this->db->insert('kontak',$data);

		$data = array(
				'id_anggota' => $id,
				'detil_kontak' => $this->input->post('email_polban'),
				'jenis_kontak' => "E"
			);
		$query = $this->db->insert('kontak',$data);
		
		$data = array(
				'id_anggota' => $id,
				'detil_kontak' => $this->input->post('email_pribadi'),
				'jenis_kontak' => "E"
			);
		$query = $this->db->insert('kontak',$data);
		return $query;
	}

	public function update_contact($id,$id_kontak)
	{	
		$data = array(
				'detil_kontak' => $this->input->post('detil_kontak')
			);
		$this->db->where('id_anggota',$id);
		$this->db->where('id_kontak',$id_kontak);
		
		$query = $this->db->update('kontak',$data);
		return $query;
	}

	public function delete_contact($id,$id_kontak)
	{	
		$this->db->where('id_anggota',$id);
		$this->db->where('id_kontak',$id_kontak);
		
		$query = $this->db->delete('kontak');
		return $query;
	}
	

}

?>