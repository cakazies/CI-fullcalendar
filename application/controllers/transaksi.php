<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {
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
		$user_id = $this->session->userdata('user_id');
		$data['transaksi'] = $this->Admin_model->getTransaksi($user_id);
		$data['assets'] = $this->Admin_model->getasset();
		// print_r ($data['transaksi']);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/transaksi',$data);
		$this->load->view('admin/footer',$data);
	}
	public function cekda($aset_id){
		$this->db->select('*');
		$this->db->from("detail_aset");
		$this->db->where('da_aset = ', $aset_id);
		$query = $this->db->get();
		$data = $query->result();
		if ($data == null) {
			echo "<option value='0'>Aset Tidak Mempunyai Detail</option>";
		}else {
			foreach($data as $op){
				print_r ("<option value='".$op->da_id."'>".$op->da_nama."</option>");
			}

		}
	}

	public function add_transaksi(){
		$data['tran_id'] = str_replace("'","",$this->input->post('da_id'));
		$data['tran_da'] = str_replace("'","",$this->input->post('tran_da'));
		$data['tran_hari'] = str_replace("'","",$this->input->post('tran_hari'));
		$data['tran_jam'] = str_replace("'","",$this->input->post('tran_jam'));
		$data['tran_nama'] = str_replace("'","",$this->input->post('tran_nama'));
		$data['tran_org'] = str_replace("'","",$this->input->post('tran_org'));
		$data['tran_hp'] = str_replace("'","",$this->input->post('tran_hp'));

		if ($data['tran_id'] == null) {
			$id_after = $this->Admin_model->save('transaksi',$data);
			$note = "Penambahan Sukses";
		}else {
			$this->Admin_model->update('transaksi',$data,"tran_id",$data['tran_id']);
			$id_after = $data['tran_id'];
			$note = "Perubahan Sukses";
		}
		if ($id_after == null) {
			$this->session->set_userdata('status','0');
			$this->session->set_userdata('note',"Terjadi Kesalahan Silahkan Ulangi Kembali.");
		}else {
			$this->session->set_userdata('status','1');
			$this->session->set_userdata('note',$note);
		}
		header("location:".base_url()."transaksi");
	}


}
