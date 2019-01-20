<?php
class Admin_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	function login($username,$password){
		$this->db->select('*');
		$this->db->from("login");
		$this->db->join('user', 'user_id = log_user');
		$this->db->where('log_username = ', $username);
		$this->db->where('log_password = ', $password);
		$query = $this->db->get();
		$data = $query->result();
		return $data[0];
	}
	function getasset(){
		$this->db->select('*');
		$this->db->from("m_aset");
		$this->db->join('user', 'user_id = aset_user');
		$this->db->join('m_jenis', 'jns_id = aset_jenis');
		$this->db->where('aset_status = ', '1');
		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}
	function getjenis(){
		$this->db->select('*');
		$this->db->from("m_jenis");
		$this->db->where('jns_status = ', '1');
		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}
	function getPerasset($id_aset = '0'){
		$this->db->select('*');
		$this->db->from("detail_aset");
		$this->db->join('m_aset', 'aset_id = da_aset');
		$this->db->where('aset_id = ', $id_aset);
		$this->db->where('da_status = ', '1');
		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}
	function getTransaksi($user_id = '0'){
		$this->db->select('*');
		$this->db->select("DATE_FORMAT(tran_hari, '%d-%m-%Y') AS tran_hari",false);
		$this->db->select("DATE_FORMAT(tran_hari, '%Y-%m-%d') AS tran_hari1",false);
		$this->db->from("transaksi");
		$this->db->join('detail_aset', 'da_id = tran_da');
		$this->db->join('m_aset', 'aset_id = da_aset');
		$this->db->where('aset_user = ', $user_id);
		$this->db->where('aset_status = ', '1');
		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}
	function save($tabel,$data){
		$this->db->insert($tabel, $data);
	  $insert_id = $this->db->insert_id();
   	return  $insert_id;
	}
	function update($tabel,$data,$kolom,$id){
		$this->db->where($kolom, $id);
		$this->db->update($tabel, $data);
	}


}
?>
