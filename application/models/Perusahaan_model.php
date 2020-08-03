<?php

class perusahaan_model extends CI_Model {

    public function __construct() 
    {
        $this->load->database();

    }

    public function getAll()
    {
        $this->db->order_by('id_perusahaan', 'ASC');
        return $this->db->get('perusahaan');

    }

    public function detailPerusahaan($id_perusahaan) 
    {
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->where('id_perusahaan', $id_perusahaan);
        $this->db->order_by('id_perusahaan');
        return $this->db->get()->result();

    }

    public function detail($id = null)
    {
        $this->db->select('*');
        $this->db->from('perusahaan');
        // $this->db->join('lowongan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
        $this->db->where('perusahaan.id_perusahaan', $id);
        //$query = $this->db->get_where('perusahaan',['id'=> $id])->row();
        return $this->db->get()->row();
        // return $this->db->from('perusahaan', array('id_perusahaan' => $id_perusahaan))->get()->row();

    }

    public function detail_join($id = null)
    {
        // $this->db->select('*');
        // $this->db->from('perusahaan');
        $this->db->join('loker', 'loker.id_perusahaan = perusahaan.id_perusahaan');
        // $this->db->where('perusahaan.id', $id);
        $query = $this->db->get_where('perusahaan',['id'=> $id])->result();
        // return $this->db->get()->row();
        return $query;

    }

    public function getPagination($limit, $offset)
    {
        $query = $this->db->get('perusahaan', $limit, $offset);
        return $query;
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->like('nama', $keyword);
        return $this->db->get()->result();
        // $this->db->where('nama', 'Bahrata Development');
        /*$result = $this->db->get('perusahaan')->result();
        return $result;*/

    }

    public function update($username, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('username', $username)
        ->update('perusahaan', $data);
      
      // Return hasil query
      return $query;
    }
}