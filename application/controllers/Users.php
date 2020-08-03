<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Cek apakah user login sebagai administrator
    $this->isAdmin();

    // Load model users
    $this->load->model('model_users');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Administrator';
    $data['users'] = $this->model_users->get_where(array('level'=>'Administrator'))->result();
    $data['pageContent'] = $this->load->view('users/adminList', $data, TRUE);
    $data['data_table'] = "<script>
  $(document).ready(function(){
      $('#tabel-admin').DataTable();
  });
</script>";

    // Jalankan view template/layout
    $this->load->view('main/dashboard', $data);
  }

  public function user_perusahaan($level = 'Perusahaan')
  {
    $data['pageTitle'] = $level;
    $data['users'] = $this->model_users->get_perusahaan();
   // $data['users'] = $this->model_users->get()->result();
    $data['pageContent'] = $this->load->view('users/perusahaanList', $data, TRUE);
    $data['data_table'] = "<script>
  $(document).ready(function(){
      $('#tabel-perusahaan').DataTable();
  });
</script>";
    // Jalankan view template/layout
    $this->load->view('main/dashboard', $data);
  }

  public function user_pelamar($level = 'Pelamar')
  {
    $data['pageTitle'] = $level;
    $data['users'] = $this->model_users->get_pelamar();
    $data['pageContent'] = $this->load->view('users/pelamarList', $data, TRUE);
    $data['data_table'] = "<script>
  $(document).ready(function(){
      $('#tabel-pelamar').DataTable();
  });
</script>";
    // Jalankan view template/layout
    $this->load->view('main/dashboard', $data);
  }

  public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data username,
      // # required = tidak boleh kosong
      // # min_length[5] = username harus terdiri dari minimal 5 karakter
      // # is_unique[users.username] = username harus bernilai unique, 
      //   tidak boleh sama dengan record yg sudah ada pada tabel users
      $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

       $this->form_validation->set_rules('nama', 'Nama', 'required');

        $this->form_validation->set_rules('contact', 'contact', 'required');

      // Mengatur validasi data level,
      // # required = tidak boleh kosong
      // # in_list[administrator, alumni] = hanya boleh bernilai 
      //   salah satu di antara administrator atau alumni
      $this->form_validation->set_rules('level', 'Level', 'required|in_list[Administrator,Perusahaan,Pelamar]');

      // Mengatur validasi data active,
      // # required = tidak boleh kosong
      // # in_list[0, 1] = hanya boleh bernilai 
      // salah satu di antara 0 atau 1
      $this->form_validation->set_rules('active', 'Active', 'required|in_list[0,1]');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert">%s tidak boleh kosong!</div>');
      $this->form_validation->set_message('min_length', '<div class="alert alert-danger" role="alert">%s minimal %d karakter!</div>');

       $this->form_validation->set_message('is_unique', '<div class="alert alert-danger" role="alert">Maaf, %s sudah ada. Gunakan username lain</div>');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {
        if($this->input->post('level') === 'Perusahaan') {
          $tabel2 = 'perusahaan';
        } elseif ($this->input->post('level') === 'Pelamar') {
          $tabel2 = 'pelamar';
        }

        $data = array(
          'username' => $this->input->post('username'),
          'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'level' => $this->input->post('level'),
          'active' => $this->input->post('active')
        );
        
        $data2 = array(
          'username' => $this->input->post('username'),
          'nama' => $this->input->post('nama'),
          'contact' => $this->input->post('contact')
        );

        $level = $this->input->post('level');
        $query = $this->model_users->insert($level, $data, $data2);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => '<div class="alert alert-success" role="alert">Berhasil menambahkan user</div>');
        else $message = array('status' => true, 'message' => '<div class="alert alert-danger" role="alert">Gagal menambahkan user</div>');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        if ($level === 'Administrator') {
          redirect('users', 'refresh');
        } elseif ($level === 'Perusahaan') {
          redirect('users/user_perusahaan', 'refresh');
        } else {
          redirect('users/user_pelamar', 'refresh');
        }
			} 
    }
    
    // Data untuk page users/add
    $data['pageTitle'] = 'Tambah Data User';
    $data['pageContent'] = $this->load->view('users/userAdd', $data, TRUE);
    $data['data_table'] = null;

    // Jalankan view template/layout
    $this->load->view('main/dashboard', $data);
  }

  public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

      // Mengatur validasi data level,
      // # required = tidak boleh kosong
      // # in_list[administrator, alumni] = hanya boleh bernilai 
      //   salah satu di antara administrator atau alumni
      $this->form_validation->set_rules('level', 'Level', 'required|in_list[Administrator,Perusahaan,Pelamar]');

      // Mengatur validasi data active,
      // # required = tidak boleh kosong
      // # in_list[0, 1] = hanya boleh bernilai 
      // salah satu di antara 0 atau 1
      $this->form_validation->set_rules('active', 'Active', 'required|in_list[0,1]');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert">%s tidak boleh kosong!</div>');
      $this->form_validation->set_message('min_length', '<div class="alert alert-danger" role="alert">%s minimal %d karakter!</div>');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'level' => $this->input->post('level'),
          'active' => $this->input->post('active')
        );

        // Jalankan function insert pada model_users
        $query = $this->model_users->update($id, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => '<div class="alert alert-success" role="alert">Berhasil memperbarui user</div>');
        else $message = array('status' => true, 'message' => '<div class="alert alert-danger" role="alert">Gagal memperbarui user</div>');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('users/edit/'.$id, 'refresh');
			} 
    }
    
    // Ambil data user dari database
    $user = $this->model_users->get_where(array('id' => $id))->row();

    // Jika data user tidak ada maka show 404
    if (!$user) show_404();

    // Data untuk page users/add
    $data['pageTitle'] = 'Edit Data User';
    $data['user'] = $user;
    $data['pageContent'] = $this->load->view('users/userEdit', $data, TRUE);
    $data['data_table'] = null;

    // Jalankan view template/layout
    $this->load->view('main/dashboard', $data);
  }

  public function delete($id)
  {
    // Ambil data user dari database
    $user = $this->model_users->get_where(array('id' => $id))->row();

    // Jika data user tidak ada maka show 404
    if (!$user) show_404();

    // Jalankan function delete pada model_users
    $query = $this->model_users->delete($id, $user->level, $user->username);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => '<div class="alert alert-success" role="alert">Berhasil menghapus user</div>');
    else $message = array('status' => true, 'message' => '<div class="alert alert-danger" role="alert">Gagal menghapus user</div>');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    if ($user->level === 'Administrator') {
      redirect('users', 'refresh');
    } elseif ($user->level === 'Perusahaan') {
      redirect('users/user_perusahaan', 'refresh');
    } else {
      redirect('users/user_pelamar', 'refresh');
    }
    
  }
}