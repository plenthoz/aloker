<?php

class lowongan_model extends CI_Model {

	public function __construct() {

		$this->load->database();

	}

    public function getAll() {

        $this->db->order_by('id_perusahaan', 'DESC');
        return $this->db->get('loker');

    }

    public function get_detaillowongan($id) {
        $this->db->select('loker.id, loker.posisi, loker.kategori, loker.deskripsi, loker.id_perusahaan, loker.tanggal_berakhir,  perusahaan.id_perusahaan, perusahaan.nama, perusahaan.alamat, perusahaan.contact, perusahaan.email, perusahaan.logo');
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan = loker.id_perusahaan'); 
        $query = $this->db->get_where('loker',['id' => $id])->row();
        return $query;

    }

    public function get_kategori() {

        $this->db->select('kategori');
        $this->db->distinct('kategori');
        $this->db->from('loker');
        $query = $this->db->get();
        return $query->result();
        
    }

    public function get_bykategori($kategori) {

        $this->db->select('loker.id, loker.posisi, loker.kategori, loker.deskripsi, loker.id_perusahaan, loker.tanggal_berakhir,  perusahaan.id_perusahaan, perusahaan.nama, perusahaan.alamat, perusahaan.contact, perusahaan.email, perusahaan.deskripsi as deskripsi_perusahaan, perusahaan.logo');
        $this->db->join('perusahaan', 'loker.id_perusahaan = perusahaan.id_perusahaan');
        $this->db->where('kategori', $kategori);
        $query = $this->db->get('loker');
        return $query->result();

    }

    public function getPagination($limit, $start) {

        $this->db->select('loker.id, loker.posisi, loker.kategori, loker.deskripsi, loker.id_perusahaan, loker.tanggal_berakhir,  perusahaan.id_perusahaan, perusahaan.nama, perusahaan.alamat, perusahaan.contact, perusahaan.email, perusahaan.logo');
        $this->db->join('perusahaan', 'loker.id_perusahaan = perusahaan.id_perusahaan');
        $this->db->order_by('loker.tanggal_berakhir', 'DESC');
        $query = $this->db->get('loker', $limit, $start);
        return $query;  

    }

    public function get_keyword($keyword) {

        $this->db->select('loker.id, loker.posisi, loker.kategori, loker.deskripsi, loker.id_perusahaan, loker.tanggal_berakhir,  perusahaan.id_perusahaan, perusahaan.nama, perusahaan.alamat, perusahaan.contact, perusahaan.email, perusahaan.deskripsi, perusahaan.logo');
        $this->db->from('loker');
        $this->db->join('perusahaan', 'loker.id_perusahaan = perusahaan.id_perusahaan');
        $this->db->like('posisi', $keyword);
        return $this->db->get()->result();

    }
}