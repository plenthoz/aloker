<?php
  class Model_loker extends CI_Model {

    public $table = 'loker';

    public function get()
    {
      // Jalankan query
      $query = $this->db->get($this->table);

      // Return hasil query
      return $query;
    }

    public function get_offset($limit, $offset)
    {
      // Jalankan query
      $query = $this->db
        ->limit($limit, $offset)
        ->get($this->table);

      // Return hasil query
      return $query;
    }

    public function get_where($where)
    {
      // Jalankan query
      $this->db->select('loker.id, loker.tanggal_berakhir, loker.posisi, loker.kategori, loker.deskripsi, loker.username, perusahaan.nama, perusahaan.contact');
      $this->db->join('perusahaan', 'perusahaan.id_perusahaan=loker.id_perusahaan');
      $query = $this->db
        ->where($where)
        ->get($this->table);

      // Return hasil query
      return $query;
    }

    public function insert($id, $data)
    {
      // Jalankan query
      $query = $this->db->insert($this->table, $data);
      $this->db->where('id_perusahaan', $this->session->userdata('id_perusahaan'));

      // Return hasil query
      return $query;
    }

    public function update($id, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('id', $id)
        ->update($this->table, $data);
      
      // Return hasil query
      return $query;
    }

    public function delete($id)
    {
      // Jalankan query
      $query = $this->db
        ->where('id', $id)
        ->delete($this->table);
      
      // Return hasil query
      return $query;
    }

    public function get_loker() {
      $this->db->select('*');
      $this->db->join('perusahaan', 'loker.id_perusahaan=perusahaan.id_perusahaan');
      return $this->db->get($this->table);
    }
  }