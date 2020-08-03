<?php
  class Model_users extends CI_Model {

    public $table = 'users';


    public function cekAkun($username, $password)
    {
      // Get data user yang mempunyai username == $username dan active == 1
			$this->db->where('username', $username);
			$this->db->where('active', '1');
			
      // Jalankan query
      $query = $this->db->get($this->table)->row();
      
      // Jika query gagal atau tidak menemukan username yang sesuai 
      // maka return false
			if (!$query) return false;
			
      // Ambil data password dari database
      $hash = $query->password;
      
      // Jika $hash tidak sama dengan $password maka return false
      if (!password_verify($password, $hash)) return false;
      
      // Update last_login user
      $last_login = $this->update($query->id, array('last_login' => date('Y-m-d H:i:s')));
      
      // Jika username dan password benar maka return data user
      if ($query->level=='Perusahaan'){
        $this->db->select('*');
        $this->db->where('users.username', $username);
        $this->db->where('active', '1');
        $this->db->join('perusahaan', 'users.username = perusahaan.username');
        $sesi = $this->db->get($this->table)->row();
        return $sesi;
      }
      else if ($query->level=='Pelamar'){
        $this->db->select('*');
        $this->db->where('users.username', $username);
        $this->db->where('active', '1');
        $this->db->join('pelamar', 'users.username = pelamar.username');
        $sesi = $this->db->get($this->table)->row();
        return $sesi;
      }
      else{
        $this->db->where('users.username', $username);
        $this->db->where('active', '1');
        $sesi = $this->db->get($this->table)->row();
        return $sesi;
      } 
    }

    public function cekPasswordLama($id, $password)
    {
      // Get data user yang mempunyai id == $id dan active == 1
			$this->db->where('id', $id);
			$this->db->where('active', '1');
			
      // Jalankan query
      $query = $this->db->get($this->table)->row();
      
      // Jika query gagal atau tidak menemukan data yang sesuai 
      // maka return false
			if (!$query) return false;
			
      // Ambil data password dari database
      $hash = $query->password;
      
      // Jika $hash tidak sama dengan $password maka return false
      if (!password_verify($password, $hash)) return false;
      
      // Jika username dan password benar maka return data user
      return $query;        
    }

    public function get()
    {
      // Jalankan query
      $query = $this->db->get('perusahaan', $this->table);

      // Return hasil query
      return $query;
    }

    public function get_where($where)
    {
      // Jalankan query
      $query = $this->db
        ->where($where)
        ->get($this->table);

      // Return hasil query
      return $query;
    }

    function get_perusahaan(){
      $this->db->select('users.id, users.username, users.level, users.active, users.last_login, perusahaan.nama, perusahaan.contact');
      $this->db->from($this->table);
      $this->db->join('perusahaan','users.username=perusahaan.username');
      return $this->db->get()->result();
    }

    function get_pelamar(){
      $this->db->select('users.id, users.username, users.level, users.active, users.last_login, pelamar.nama, pelamar.contact');
      $this->db->from($this->table);
      $this->db->join('pelamar','users.username=pelamar.username');
      return $this->db->get()->result();
    }

    public function insert($level, $data, $data2)
    {
      // Jalankan query
      if ($level === "Administrstor") {
        $query = $this->db->insert($this->table, $data);
      } elseif ($level === "Perusahaan") {
        $query = $this->db->insert($this->table, $data);
        $query = $this->db->insert('perusahaan', $data2);
      } else {
        $query = $this->db->insert($this->table, $data);
        $query = $this->db->insert('pelamar', $data2);
      }

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

    public function update_data($level, $username, $data) {
      if ($level === 'Perusahaan') {
        $query = $this->db
          ->where('username', $username)
          ->update('Perusahaan', $data);
      } elseif ($level === 'Pelamar') {
        $query = $this->db
          ->where('username', $username)
          ->update('Pelamar', $data);
      }
      return $query;
    }

    public function delete($id, $level, $username)
    {
      // Jalankan query
      if ($level === 'Perusahaan') {
        $query = $this->db
          ->where('username', $username)
          ->delete('perusahaan');
      } elseif ($level === 'Pelamar') {
        $query = $this->db
          ->where('username', $username)
          ->delete('pelamar');
      }
      $query = $this->db
        ->where('id', $id)
        ->delete($this->table);
      
      // Return hasil query
      return $query;
    }
    
    public function insert_CV($id, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('id_pelamar', $id)
        ->update('pelamar', $data);
      
      // Return hasil query
      return $query;
    }
  }