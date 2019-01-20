<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Home_model');
		$this->load->helper(array('form','url','file','download'));
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	}

	public function index(){
		$this->load->view('login/login',$data);
	}
	public function cek(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$data = $this->Home_model->login($username,$password);
		// print_r ($data);
		if($data == ""){
			echo "<script>alert ('Username and Password is Wrong !');window.location.href = '".base_url()."login';</script>";
		}else if($data->log_id != ""){
			$simpan['his_login'] = $data->log_id;
			$simpan['his_ip'] = '';
			$simpan['his_masuk'] = date("Y-m-d h:i");
			$simpan['his_status'] = '1';
			$id_after = $this->Home_model->save('history_login',$simpan);
			$login['log_lastlogin'] = date("Y-m-d h:i");
			$this->Home_model->update('login',$login,'log_id',$data->log_id);
			$this->session->set_userdata('user_nama',$data->user_nama);
			$this->session->set_userdata('user_id',$data->user_id);
			$this->session->set_userdata('username',$data->log_username);
			$this->session->set_userdata('log_id',$data->log_id);
			echo "<script>window.location.href = '".base_url()."admin';</script>";
		}else {
			echo "<script>window.location.href = '".base_url()."';</script>";
		}

	}
	public function logout(){
		// fungsi untuk mengahpus session yang sudah diset sebelumnya
		$this->session->unset_userdata(array('user_nama' => ''));
		$this->session->unset_userdata(array('user_id' => ''));
		$this->session->unset_userdata(array('username' => ''));
		$this->session->unset_userdata(array('log_id' => ''));
		header("location:".base_url());
	}


}
