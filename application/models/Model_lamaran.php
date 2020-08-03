<?php

class Model_lamaran extends CI_Model {

	public function __construct(){
			$this->load->database();
		}

	function getLamaran(){
		$this ->db->order_by('id_lamaran', 'ASC');
		$this->db->select('pelamar.nama as nama_pelamar, lamaran.id_lamaran, pelamar.ttl, pelamar.alamat, loker.posisi, perusahaan.nama');
		$this->db->from('lamaran')->join('pelamar', 'pelamar.id_pelamar=lamaran.id_pelamar');
		$this->db->join('loker', 'loker.id=lamaran.id_lowongan');
		$this->db->join('perusahaan','perusahaan.id_perusahaan=loker.id_perusahaan');
		return $this->db->get()->result();
	}

	function detail_data($id_lamaran){
		$this->db->select('pelamar.id_pelamar, pelamar.nama as nama_pelamar, pelamar.NIK, pelamar.ttl, pelamar.alamat,  pelamar.status, lamaran.id_lamaran, loker.posisi, perusahaan.nama, pelamar.email, lamaran.status as statuslamaran');
		$this->db->from('lamaran');
		$this->db->where('id_lamaran', $id_lamaran);
		$this->db->join('loker','loker.id=lamaran.id_lowongan');
		$this->db->join('pelamar','pelamar.id_pelamar=lamaran.id_pelamar');
		$this->db->join('perusahaan','perusahaan.id_perusahaan=loker.id_perusahaan');
		//$this->db->join()('users', 'pelamar.username=users.username');
		return $this->db->get()->row();
	}

	function print_data($id_lamaran){
		$this->db->select('pelamar.nama as nama_pelamar, pelamar.NIK, pelamar.ttl, pelamar.alamat,  pelamar.status, lamaran.id_lamaran, loker.posisi, perusahaan.nama, perusahaan.email');
		$this->db->from('lamaran');
		$this->db->where('id_lamaran', $id_lamaran);
		$this->db->join('loker','loker.id=lamaran.id_lowongan');
		$this->db->join('pelamar','pelamar.id_pelamar=lamaran.id_pelamar');
		$this->db->join('perusahaan','perusahaan.id_perusahaan=loker.id_perusahaan');
		return $this->db->get()->row();
	}

	function getLamaranMasuk($username){
		//$this ->db->order_by('id_perusahaan', 'ASC');
		$this->db->select('lamaran.id_lamaran, perusahaan.id_perusahaan, loker.posisi, pelamar.nama as nama_pelamar, pelamar.ttl, pelamar.alamat, lamaran.status');
		$this->db->from('perusahaan');
		$this->db->where('perusahaan.username', $username);
		$this->db->join('loker', 'perusahaan.username=loker.username');
		$this->db->join('lamaran', 'lamaran.id_lowongan=loker.id');
		$this->db->join('pelamar','pelamar.id_pelamar=lamaran.id_pelamar');
		return $this->db->get()->result();
	}

	function getLamaranTerkirim($userId) {
		$this->db->select('perusahaan.nama, loker.posisi, perusahaan.contact, perusahaan.alamat, lamaran.status');
		$this->db->from('lamaran');
		$this->db->where('lamaran.id_pelamar', $userId);
		$this->db->join('loker', 'lamaran.id_lowongan=loker.id');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan=loker.id_perusahaan');
		return $this->db->get()->result();
	}

	function insert($data) {
		$query = $this->db->insert('lamaran', $data);
		return $query;
	}

	public function terimaLamaran($id_lamaran, $data)
    {
      // Jalankan query
    	$this->db->select('lamaran.id_lamaran, perusahaan.id_perusahaan, loker.posisi, pelamar.nama as nama_pelamar, pelamar.ttl, pelamar.alamat, lamaran.status');
      $query = $this->db
        ->where('id_lamaran', $id_lamaran)
        ->update('lamaran', $data);
       
      // Return hasil query
      return $query;
    }
    
    public function get_where($where)
    {
      // Jalankan query
      $query = $this->db
        ->where($where)
        ->get('lamaran');

      // Return hasil query
      return $query;
    }
}

