<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Home_model');
		$this->load->helper(array('form','url','file','download'));
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	}

	public function index($id_aset,$da_id){
		if ($id_aset == null) {
			$id_aset = 1;
		}
		$data['da'] = $this->Home_model->getda($id_aset);
		if ($da_id == null) {
			$da_id = $data['da'][0]->da_id;
		}
		$data['id_aset'] = $id_aset;
		$data['da_id'] = $da_id;
		$data['aset'] = $this->Home_model->getasset();
		$data['transaksi'] = $this->Home_model->getTransaksi($da_id);
		// print_r ($data['aset']);
		$data['json'] = json_encode($data['transaksi']);
		// echo $simpan;
		$this->load->view('index',$data);
		$this->load->view('modal');
	}
	public function cektoday($tgl_click,$da_id){
		$transaksi = $this->Home_model->get_click($tgl_click,$da_id);
		// print_r ($transaksi);
		$o = 6;
		$p = 1;
		for ($i=7; $i < 25; $i++) {
			// if ($o == 6) {
			// 	echo '<div class="modal-body col-md-12">';
			// 	$p = 1;
			// }
			if ($transaksi == null) {
				$class = 'class="btn btn-primary"';
			}else {
				foreach ($transaksi as $value) {
					$bagi = ($value->tran_jam/$i);
					if ($bagi == 1) {
						$class = 'class="btn" style="background-color:red"';
						break;
					}else {
						$class = 'class="btn btn-primary"';
					}
				}
			}
			if (strlen($i) == 1) {
				echo '<button type="button" '.$class.' name="button">0'.$i.'.00</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}else {
				echo '<button type="button" '.$class.' name="button">'.$i.'.00</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			if ($p == 6) {
				echo "<hr/>";
				$p=0;
			}
			// if ($p == 6) {
			// 	echo '</div>';
			// 	$o = 6;
			// }
			//
			// $o++;
			$p++;
		}

	}
	public function calendar(){
		$this->load->view('calendar',$data);
	}


}
