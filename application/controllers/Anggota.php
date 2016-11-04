<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{

		parent::__construct();		
		
		if(empty($this->session->userdata('user'))) {
            redirect('login');
        }

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
		$this->load->model('Riwayat_Pendidikan_model');
		$this->load->model('Riwayat_Org_model');
		$this->load->model('Tingkat_Prestasi_model');
		$this->load->model('Riwayat_Prestasi_model');
		$this->load->model('Riwayat_Kepanitiaan_model');
		$this->load->model('Riwayat_Pelatihan_model');
		$this->load->model('Riwayat_PKM_model');
	}

	public function index()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$data['kontak'] = $this->Kontak_model->get_id($nim);
		$data['riwayat_pendidikan'] = $this->Riwayat_Pendidikan_model->get_nim($nim);
		$data['riwayat_org'] = $this->Riwayat_Org_model->get_nim($nim);
		$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
		$data['riwayat_prestasi'] = $this->Riwayat_Prestasi_model->get_nim($nim);
		$data['riwayat_kepanitiaan'] = $this->Riwayat_Kepanitiaan_model->get_nim($nim);
		$data['riwayat_pelatihan'] = $this->Riwayat_Pelatihan_model->get_nim($nim);
		$data['riwayat_pkm'] = $this->Riwayat_PKM_model->get_nim($nim);
		$this->load->view('anggota/index',$data);
	}

	public function riwayat_pendidikan()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$data['kontak'] = $this->Kontak_model->get_id($nim);
		$data['riwayat_pendidikan'] = $this->Riwayat_Pendidikan_model->get_nim($nim);
		$this->load->view('anggota/riwayat_pendidikan',$data);
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		session_destroy();
		redirect('anggota');
	}

	public function edit_profile()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);

		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/edit_profile',$data);

		} else {
			$update = $this->Anggota_Model->update_profile($nim);

			if ($update){
				redirect('anggota/success');
			} else echo "Update Gagal";
		}
	}

	public function change_password()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);

		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/change_password',$data);
		} else {
			$update = $this->Anggota_Model->change_password($nim);

			if ($update){
				redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}

	public function add_contact()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/add_contact',$data);
		} else {
			$insert = $this->Kontak_model->add_contact($data['nim']);
			if ($insert){
				 echo json_encode(array("status" => TRUE));
			} else echo "Update Gagal";
		}	
	}

	public function add_riwayat_pendidikan()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/add_riwayat_pendidikan',$data);
		} else {
			$insert = $this->Riwayat_Pendidikan_model->add_riwayat_pendidikan($data['nim']);
			if ($insert){
				 redirect('anggota/success');
			} else echo "Insert Gagal";
		}	
	}

	public function add_riwayat_org()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/add_riwayat_org',$data);
		} else {
			$insert = $this->Riwayat_Org_model->add_riwayat_org($data['nim']);
			if ($insert){
				  redirect('anggota/success');
			} else echo "Insert Gagal";
		}	
	}

	public function add_riwayat_prestasi()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
			$this->load->view('anggota/add_riwayat_prestasi',$data);
		} else {
			$insert = $this->Riwayat_Prestasi_model->add_riwayat_prestasi($data['nim']);
			if ($insert){
				redirect('anggota/success');
			} else echo "Insert Gagal";
		}	
	}

	public function add_riwayat_kepanitiaan()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/add_riwayat_kepanitiaan',$data);
		} else {
			$insert = $this->Riwayat_Kepanitiaan_model->add_riwayat_kepanitiaan($data['nim']);
			if ($insert){
				 redirect('anggota/success');
			} else echo "Insert Gagal";
		}	
	}

	public function add_riwayat_pelatihan()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/add_riwayat_pelatihan',$data);
		} else {
			$insert = $this->Riwayat_Pelatihan_model->add_riwayat_pelatihan($data['nim']);
			if ($insert){
				  redirect('anggota/success');
			} else echo "Insert Gagal";
		}	
	}

	public function add_riwayat_pkm()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/add_riwayat_pkm',$data);
		} else {
			$insert = $this->Riwayat_PKM_model->add_riwayat_pkm($data['nim']);
			if ($insert){
				 redirect('anggota/success');
			} else echo "Insert Gagal";
		}	
	}

	public function get_riwayat_pendidikan($id = null)
	{
		if ($id != null) {
			$data = $this->Riwayat_Pendidikan_model->get_id($id);
		} else {
			$nim = $this->session->userdata('user');
			$data = $this->Riwayat_Pendidikan_model->get_nim($nim);
		}
		
		return $data;
	}

	public function get_riwayat_kepanitiaan($id = null)
	{
		if ($id != null) {
			$data = $this->Riwayat_Kepanitiaan_model->get_id($id);
		} else {
			$nim = $this->session->userdata('user');
			$data = $this->Riwayat_Kepanitiaan_model->get_nim($nim);
		}
		
		return $data;
	}

	public function get_riwayat_org($id = null)
	{
		if ($id != null) {
			$data = $this->Riwayat_Org_model->get_id($id);
		} else {
			$nim = $this->session->userdata('user');
			$data = $this->Riwayat_Org_model->get_nim($nim);
		}
		
		return $data;
	}

	public function get_riwayat_pkm($id = null)
	{
		if ($id != null) {
			$data = $this->Riwayat_PKM_model->get_id($id);
		} else {
			$nim = $this->session->userdata('user');
			$data = $this->Riwayat_PKM_model->get_nim($nim);
		}
		
		return $data;
	}

	public function get_riwayat_prestasi($id = null)
	{
		if ($id != null) {
			$data = $this->Riwayat_Prestasi_model->get_id($id);
		} else {
			$nim = $this->session->userdata('user');
			$data = $this->Riwayat_Prestasi_model->get_nim($nim);
		}
		
		return $data;
	}

	public function get_riwayat_pelatihan($id = null)
	{
		if ($id != null) {
			$data = $this->Riwayat_Pelatihan_model->get_id($id);
		} else {
			$nim = $this->session->userdata('user');
			$data = $this->Riwayat_Pelatihan_model->get_nim($nim);
		}
		
		return $data;
	}


	public function update_riwayat_pendidikan($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pendidikan']= $this->get_riwayat_pendidikan($id);
			$this->load->view('anggota/update_riwayat_pendidikan',$data);
		} else {
			//$id = $this->input->post('no_urut_pendidikan');
			$update = $this->Riwayat_Pendidikan_model->update_riwayat_pendidikan($id);
			if ($update){
				  redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}

	public function update_riwayat_kepanitiaan($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_kepanitiaan']= $this->get_riwayat_kepanitiaan($id);
			$this->load->view('anggota/update_riwayat_kepanitiaan',$data);
		} else {
			$update = $this->Riwayat_Kepanitiaan_model->update_riwayat_kepanitiaan($id);
			if ($update){
				  redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}

	public function update_riwayat_org($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_org']= $this->get_riwayat_org($id);
			$this->load->view('anggota/update_riwayat_org',$data);
		} else {
			$update = $this->Riwayat_Org_model->update_riwayat_org($id);
			if ($update){
				  redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}

	public function update_riwayat_pkm($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pkm']= $this->get_riwayat_pkm($id);
			$this->load->view('anggota/update_riwayat_pkm',$data);
		} else {
			$update = $this->Riwayat_PKM_model->update_riwayat_pkm($id);
			if ($update){
				  redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}

	public function update_riwayat_prestasi($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
			$data['riwayat_prestasi']= $this->get_riwayat_prestasi($id);
			$this->load->view('anggota/update_riwayat_prestasi',$data);
		} else {
			$update = $this->Riwayat_Prestasi_model->update_riwayat_prestasi($id);
			if ($update){
				  redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}

	public function update_riwayat_pelatihan($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pelatihan']= $this->get_riwayat_pelatihan($id);
			$this->load->view('anggota/update_riwayat_pelatihan',$data);
		} else {
			$update = $this->Riwayat_Pelatihan_model->update_riwayat_pelatihan($id);
			if ($update){
				  redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}


	public function delete_riwayat_pendidikan($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pendidikan']= $this->get_riwayat_pendidikan($id);
			$this->load->view('anggota/delete_riwayat_pendidikan',$data);
		} else {
			$delete = $this->Riwayat_Pendidikan_model->delete_riwayat_pendidikan($id);
			if ($delete){
				 redirect('anggota/success');
			} else echo "Delete Gagal";
		}	
	}

	public function delete_riwayat_kepanitiaan($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_kepanitiaan']= $this->get_riwayat_kepanitiaan($id);
			$this->load->view('anggota/delete_riwayat_kepanitiaan',$data);
		} else {
			$delete = $this->Riwayat_Kepanitiaan_model->delete_riwayat_kepanitiaan($id);
			if ($delete){
				 redirect('anggota/success');
			} else echo "Delete Gagal";
		}	
	}

	public function delete_riwayat_org($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_org']= $this->get_riwayat_org($id);
			$this->load->view('anggota/delete_riwayat_org',$data);
		} else {
			$delete = $this->Riwayat_Org_model->delete_riwayat_org($id);
			if ($delete){
				 redirect('anggota/success');
			} else echo "Delete Gagal";
		}	
	}

	public function delete_riwayat_pkm($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pkm']= $this->get_riwayat_pkm($id);
			$this->load->view('anggota/delete_riwayat_pkm',$data);
		} else {
			$delete = $this->Riwayat_PKM_model->delete_riwayat_pkm($id);
			if ($delete){
				 redirect('anggota/success');
			} else echo "Delete Gagal";
		}	
	}


	public function delete_riwayat_prestasi($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_prestasi']= $this->get_riwayat_prestasi($id);
			$this->load->view('anggota/delete_riwayat_prestasi',$data);
		} else {
			$delete = $this->Riwayat_Prestasi_model->delete_riwayat_prestasi($id);
			if ($delete){
				 redirect('anggota/success');
			} else echo "Delete Gagal";
		}	
	}

	public function delete_riwayat_pelatihan($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pelatihan']= $this->get_riwayat_pelatihan($id);
			$this->load->view('anggota/delete_riwayat_pelatihan',$data);
		} else {
			$delete = $this->Riwayat_Pelatihan_model->delete_riwayat_pelatihan($id);
			if ($delete){
				 redirect('anggota/success');
			} else echo "Delete Gagal";
		}	
	}


	public function success()
	{
		$this->load->view('anggota/success');
	}

}
