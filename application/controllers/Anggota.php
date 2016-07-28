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
		$data['riwayat_pendidikan'] = $this->Riwayat_Pendidikan_model->get_id($nim);
		$data['riwayat_org'] = $this->Riwayat_Org_model->get_id($nim);
		$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
		$data['riwayat_prestasi'] = $this->Riwayat_Prestasi_model->get_id($nim);
		$data['riwayat_kepanitiaan'] = $this->Riwayat_Kepanitiaan_model->get_id($nim);
		$data['riwayat_pelatihan'] = $this->Riwayat_Pelatihan_model->get_id($nim);
		$data['riwayat_pkm'] = $this->Riwayat_PKM_model->get_id($nim);
		$this->load->view('anggota/index',$data);
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
				 echo json_encode(array("status" => TRUE));
			} else echo "Insert Gagal";
		}	
	}

	public function add_riwayat_organisasi()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/add_riwayat_organisasi',$data);
		} else {
			$insert = $this->Riwayat_Org_model->add_riwayat_organisasi($data['nim']);
			if ($insert){
				 echo json_encode(array("status" => TRUE));
			} else echo "Insert Gagal";
		}	
	}

	public function add_riwayat_prestasi()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/add_riwayat_prestasi',$data);
		} else {
			$insert = $this->Riwayat_Prestasi_model->add_riwayat_prestasi($data['nim']);
			if ($insert){
				 echo json_encode(array("status" => TRUE));
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
				 echo json_encode(array("status" => TRUE));
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
				 echo json_encode(array("status" => TRUE));
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
				 echo json_encode(array("status" => TRUE));
			} else echo "Insert Gagal";
		}	
	}


	public function get_contact_ajax()
	{
		$nim = $this->session->userdata('user');
		$data = $this->Kontak_model->get_id($nim);

		$html='';
		foreach ($data as $kontak) {
			$html.= "<tr> <td>".$kontak->JENIS_KONTAK."</td>"."<td>".$kontak->DETIL_KONTAK."</td></tr>";
		}

		echo $html;
	}

	public function get_riwayat_pendidikan_ajax()
	{
		$nim = $this->session->userdata('user');
		$data = $this->Riwayat_Pendidikan_model->get_id($nim);

		$html='';
		foreach ($data as $riwayat_pendidikan) {
			$html.= "<tr>". 
						"<td>".$riwayat_pendidikan->JENJANG_PENDIDIKAN."</td>".
						"<td>".$riwayat_pendidikan->NAMA_INSTITUSI_PENDIDIKAN."</td>".
						"<td>".$riwayat_pendidikan->TAHUN_MASUK_PENDIDIKAN." - ".$riwayat_pendidikan->TAHUN_LULUS_PENDIDIKAN."</td>".
						"<td>".$riwayat_pendidikan->BIDANG_PENDIDIKAN."</td>".
					"</tr>";
		}

		echo $html;
	}

	public function get_riwayat_org_ajax()
	{
		$nim = $this->session->userdata('user');
		$data = $this->Riwayat_Org_model->get_id($nim);

		$html='';
		foreach ($data as $riwayat_org) {
			$html.= "<tr>". 
						"<td>".$riwayat_org->NAMA_ORG."</td>".
						"<td>".$riwayat_org->JABATAN_ORG."</td>".
						"<td>".$riwayat_org->TAHUN_MULAI_ORG." - ".$riwayat_org->TAHUN_SELESAI_ORG."</td>".
						"<td>".$riwayat_org->ORG_KEMAHASISWAAN."</td>".
					"</tr>";
		}

		echo $html;
	}

	public function get_riwayat_prestasi_ajax()
	{
		$nim = $this->session->userdata('user');
		$data = $this->Riwayat_Prestasi_model->get_id($nim);

		$html='';
		foreach ($data as $riwayat_prestasi) {
			$html.= "<tr>". 
						"<td>".$riwayat_prestasi->NAMA_PRESTASI."</td>".
						"<td>".$riwayat_prestasi->ID_TINGKAT_PRESTASI."</td>".
						"<td>".$riwayat_prestasi->PENCAPAIAN_PRESTASI."</td>".
						"<td>".$riwayat_prestasi->LEMBAGA_PRESTASI."</td>".
						"<td>".$riwayat_prestasi->TAHUN_PRESTASI."</td>".
						"<td>".$riwayat_prestasi->JENIS_PRESTASI."</td>".
					"</tr>";
		}

		echo $html;
	}

	public function get_riwayat_kepanitiaan_ajax()
	{
		$nim = $this->session->userdata('user');
		$data = $this->Riwayat_Kepanitiaan_model->get_id($nim);

		$html='';
		foreach ($data as $riwayat_kepanitiaan) {
			$html.= "<tr>". 
						"<td>".$riwayat_kepanitiaan->NAMA_KEGIATAN_KEPANITIAAN."</td>".
						"<td>".$riwayat_kepanitiaan->NAMA_ORG_KEPANITIAAN."</td>".
						"<td>".$riwayat_kepanitiaan->JABATAN_KEPANITIAAN."</td>".
						"<td>".$riwayat_kepanitiaan->TAHUN_KEPANITIAAN."</td>".
						"<td>".$riwayat_kepanitiaan->KEPANITIAAN_KEMAHASISWAAN."</td>".
					"</tr>";
		}

		echo $html;
	}

	public function get_riwayat_pelatihan_ajax()
	{
		$nim = $this->session->userdata('user');
		$data = $this->Riwayat_Pelatihan_model->get_id($nim);

		$html='';
		foreach ($data as $riwayat_pelatihan) {
			$html.= "<tr>". 
						"<td>".$riwayat_pelatihan->NAMA_PELATIHAN."</td>".
						"<td>".$riwayat_pelatihan->NAMA_PENYELENGGARA_PELATIHAN."</td>".
						"<td>".$riwayat_pelatihan->TAHUN_PELATIHAN."</td>".
						"<td>".$riwayat_pelatihan->PELATIHAN_KEMAHASISWAAN."</td>".
					"</tr>";
		}

		echo $html;
	}

	public function get_riwayat_pkm_ajax()
	{
		$nim = $this->session->userdata('user');
		$data = $this->Riwayat_PKM_model->get_id($nim);

		$html='';
		foreach ($data as $riwayat_pkm) {
			$html.= "<tr>". 
						"<td>".$riwayat_pkm->NAMA_PKM."</td>".
						"<td>".$riwayat_pkm->NAMA_PENYELENGGARA_PKM."</td>".
						"<td>".$riwayat_pkm->TAHUN_PKM."</td>".
						"<td>".$riwayat_pkm->PKM_KEMAHASISWAAN."</td>".
					"</tr>";
		}

		echo $html;
	}


	public function success()
	{
		$this->load->view('anggota/success');
	}




}
