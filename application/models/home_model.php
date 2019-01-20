<?php

// ****************************
// Created by cakazies
// email : cakazies@gmail.com
// IG : @cakazies
// Github : https://github.com/cakazies
// if you have some question, you can call me in this account
// please suggestion to me in my accunt
// thanksful for download or cloning
// ***************************

class Home_model extends CI_Model {
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
	function save($tabel,$data){
		$this->db->insert($tabel, $data);
	  $insert_id = $this->db->insert_id();
   	return  $insert_id;
	}
	function update($tabel,$data,$kolom,$id){
		$this->db->where($kolom, $id);
		$this->db->update($tabel, $data);
	}

	function getTransaksi($da_id = '0'){
		$this->db->select("CONCAT(tran_jam,':00 ',tran_org) AS title, tran_hari AS start, '#257e4a' AS color",false);
		$this->db->from("transaksi");
		$this->db->join('detail_aset', 'da_id = tran_da');
		$this->db->join('m_aset', 'aset_id = da_aset');
		$this->db->where('aset_status = ', '1');
		$this->db->where('tran_da = ', $da_id);
		$this->db->order_by("tran_hari", "desc");
		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}
	function getasset($user_id = '0'){
		$this->db->select("*");
		$this->db->from("m_aset");
		$this->db->where('aset_status = ', '1');
		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}
	function getperasset($user_id = '0'){
		$this->db->select("*");
		$this->db->from("m_aset");
		$this->db->where('aset_status = ', '1');
		$this->db->where("aset_id", $user_id);
		$query = $this->db->get();
		$data = $query->result();
		return $data[0];
	}

	function getda($aset_id = '0'){
		$this->db->select("*");
		$this->db->from("detail_aset");
		$this->db->where('da_status = ', '1');
		$this->db->where('da_aset = ', $aset_id);
		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}
	function get_click($tgl = '0',$da_id){
		$this->db->select("tran_jam");
		$this->db->from("transaksi");
		$this->db->where('tran_da = ', $da_id);
		$this->db->where('tran_hari = ', $tgl);
		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}

}
?>
