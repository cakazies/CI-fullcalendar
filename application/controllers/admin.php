<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Admin_model');
		$this->load->helper(array('form','url','file','download'));
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$user_nama = $this->session->userdata('user_nama');
		if ($user_nama == "") {
			header("location:".base_url()."login");
		}

	}

	public function index(){
		$this->load->view('admin/header',$data);
		$this->load->view('admin/admin',$data);
		$this->load->view('admin/footer',$data);
	}
	public function form(){
		$this->load->view('admin/header',$data);
		$this->load->view('admin/form',$data);
		$this->load->view('admin/footer',$data);
	}
	public function detail_assets(){
		$assets_id = $this->input->post('assets_id');
		$data['assets'] = $this->Admin_model->getPerasset($assets_id);
		$data['assets_id'] = $assets_id;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/detail_assets',$data);
		$this->load->view('admin/footer',$data);
	}
	public function delete_status(){
		$this->session->set_userdata('status','');
		$this->session->set_userdata('note',"");
	}
	public function assets(){
		$data['assets'] = $this->Admin_model->getasset();
		$data['jenis'] = $this->Admin_model->getjenis();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/assets',$data);
		$this->load->view('admin/footer',$data);
		$this->delete_status();
	}
	public function add_aset(){
		$data['aset_id'] = str_replace("'","",$this->input->post('aset_id'));
		$data['aset_nama'] = str_replace("'","",$this->input->post('aset_nama'));
		$data['aset_alamat'] = str_replace("'","",$this->input->post('aset_alamat'));
		$data['aset_desa'] = str_replace("'","",$this->input->post('aset_desa'));
		$data['aset_jenis'] = $this->input->post('jns_id');
		$data['aset_status'] = '1';
		$data['aset_user'] = $this->session->userdata('user_id');
		if ($data['aset_id'] == null) {
			$id_after = $this->Admin_model->save('m_aset',$data);
			$detail['da_aset'] = $id_after;
			$detail['da_nama'] = 	$data['aset_nama'];
			$detail['da_status'] = 1;
			$id_after = $this->Admin_model->save('detail_aset',$detail);
			$note = "Penambahan Sukses";
		}else {
			$this->Admin_model->update('m_aset',$data,"aset_id",$data['aset_id']);
			$id_after = $data['aset_id'];
			$note = "Perubahan Sukses";
		}
		if ($id_after == null) {
			$this->session->set_userdata('status','0');
			$this->session->set_userdata('note',"Terjadi Kesalahan Silahkan Ulangi Kembali.");
		}else {
			$this->session->set_userdata('status','1');
			$this->session->set_userdata('note',$note);
		}
		header("location:".base_url()."admin/assets");

	}
	public function add_da(){
		$data['da_id'] = str_replace("'","",$this->input->post('da_id'));
		$data['da_aset'] = str_replace("'","",$this->input->post('da_aset'));
		$data['da_nama'] = str_replace("'","",$this->input->post('da_nama'));
		$data['da_ket'] = str_replace("'","",$this->input->post('da_ket'));
		$data['da_harga'] = $this->input->post('da_harga');
		// $data['da_foto'] = $this->input->post('jns_id');
		$data['da_status'] = '1';
		if ($data['da_id'] == null) {
			$id_after = $this->Admin_model->save('detail_aset',$data);
			$note = "Penambahan Sukses";
		}else {
			$this->Admin_model->update('detail_aset',$data,"da_id",$data['da_id']);
			$id_after = $data['da_id'];
			$note = "Perubahan Sukses";
		}
		if ($id_after == null) {
			$this->session->set_userdata('status','0');
			$this->session->set_userdata('note',"Terjadi Kesalahan Silahkan Ulangi Kembali.");
		}else {
			$this->session->set_userdata('status','1');
			$this->session->set_userdata('note',$note);
		}
		header("location:".base_url()."admin/assets");

	}

	public function delete_aset($id_hapus = 0){
		$data['aset_status'] = '2';
		$this->Admin_model->update('m_aset',$data,"aset_id",$id_hapus);
		header("location:".base_url()."admin/assets");

	}
	public function delete_da($id_hapus = 0){
		$data['da_status'] = '2';
		$this->Admin_model->update('detail_aset',$data,"da_id",$id_hapus);
		header("location:".base_url()."admin/assets");

	}

}
