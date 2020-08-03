  <?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model users
    $this->load->model('model_users');
    $this->load->model('perusahaan_model');
  }

  public function index()
  {
    // Jika form profile di submit jalankan blok kode ini
    if ($this->input->post('submit-information')) {

      // Mengatur validasi data nama,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      // Mengatur validasi data alamat,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');

      // Mengatur validasi data telepon,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('email', 'Email', 'required');
      
      $this->form_validation->set_rules('telp', 'Telepon', 'required');

      $level = $this->session->userdata('level');
      if ($level === 'Pelamar') {
        $this->form_validation->set_rules('nik', 'NIK', 'required');

        $this->form_validation->set_rules('ttl', 'Tempat, Tanggal Lahir', 'required');

        $this->form_validation->set_rules('status', 'Status', 'required');       
      }


      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert">%s tidak boleh kosong!<div>');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {
        // Ambil level & username dari session
        $username = $this->session->userdata('username');

        if ($level === 'Perusahaan') {
          $data['nama'] = $this->input->post('nama');
          $data['alamat'] = $this->input->post('alamat');
          $data['contact'] = $this->input->post('telp');
          $data['email'] = $this->input->post('email');
          $data['deskripsi'] = $this->input->post('deskripsi');
        } elseif ($level === 'Pelamar') {
          $data['nama'] = $this->input->post('nama');
          $data['alamat'] = $this->input->post('alamat');
          $data['contact'] = $this->input->post('telp');
          $data['email'] = $this->input->post('email');
          $data['nik'] = $this->input->post('nik');
          $data['ttl'] = $this->input->post('ttl');
          $data['status'] = $this->input->post('status');
          $data['pendidikan'] = $this->input->post('pendidikan');
        }

        // Jalankan function update data pada model_users
        $query = $this->model_users->update_data($level, $username, $data);

        // cek jika query berhasil
        if ($query) {

          // Set success message
          $message = array('status' => true, 'message' => '<div class="alert alert-success" style="margin: auto; margin-bottom: 2%; margin-top: 0.5%; text-align: center;" role="alert"><i class="fa fa-check-circle" aria-hidden="true">  Berhasil memperbarui profile</i></div>');
          
          // Update session baru
          $this->session->set_userdata($data);

        } else {

          // Set error message
          $message = array('status' => false, 'message' => '<div class="alert alert-danger" role="alert">Gagal memperbarui profile</div>');

        }

        // simpan message sebagai session
        $this->session->set_flashdata('message_profile', $message);

        // refresh page
        redirect('profile', 'refresh');
			} 
    }

   if ($this->input->post('submit-avatar')){
      if (!empty($_FILES['avatar']['name'])) {
        // Konfigurasi library upload codeigniter
        $level = $this->session->userdata('level');
        $path = './assets/images/'.$level.'/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['overwrite'] = TRUE;
        $config['file_name'] = $this->session->userdata('id_user');

        // Load library upload
        $this->load->library('upload', $config);
        
        // Jika terdapat error pada proses upload maka exit
        if (!$this->upload->do_upload('avatar')) {
            exit($this->upload->display_errors());
        }
        $data['avatar'] = $this->upload->data()['file_name'];
        $userId = $this->session->userdata('id_user');
        $query = $this->model_users->update($userId, $data);
        if($this->session->userdata('level') === 'Perusahaan') {
          $data2['logo'] = $this->upload->data()['file_name'];
          $username = $this->session->userdata('username');
          $query = $this->perusahaan_model->update($username, $data2);
        }
 
        if ($query) {

          // Set success message
          $message = array('status' => true, 'message' => '<div class="alert alert-success" role="alert">Berhasil memperbarui profile</div>');
          
          // Update session baru
          $this->session->set_userdata($data);

        } else {

          // Set error message
          $message = array('status' => false, 'message' => '<div class="alert alert-danger" role="alert">Gagal memperbarui profile</div>');

        }

        // simpan message sebagai session
        $this->session->set_flashdata('message_profile', $message);

        // refresh page
        redirect('profile', 'refresh');
      }
    }

    // Jika form password di submit jalankan blok kode ini
    if ($this->input->post('submit-password')) {

      // Mengatur validasi data password_lama,
      // # required = tidak boleh kosong
      // # callback_cekPasswordLama = menjalankan function cekAkun()
      $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|callback_cekPasswordLama');

      // Mengatur validasi data password_baru,
      // # required = tidak boleh kosong
      // # min_length[5] = password_baru harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[5]');

      // Mengatur validasi data konfirmasi_password,
      // # required = tidak boleh kosong
      // # matches = nilai konfirmasi_password harus sama dengan password_baru
      $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password_baru]');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert">%s tidak boleh kosong!</div>');
      $this->form_validation->set_message('min_length', '<div class="alert alert-danger" role="alert">{field} minimal {param} karakter.</div>');
      $this->form_validation->set_message('matches', '<div class="alert alert-danger" role="alert">{field} tidak sama dengan {param}.</div>');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'password' => password_hash($this->input->post('konfirmasi_password'), PASSWORD_DEFAULT)
        );

        // Ambil user ID
        $userId = $this->session->userdata('id_user');

        // Jalankan function update pada model_users
        $query = $this->model_users->update($userId, $data);

        // cek jika query berhasil
        if ($query) {

          // Logout user
          redirect('auth/logout');

        } else {

          // Set error message
          $message = array('status' => false, 'message' => 'Gagal memperbarui profile');

        }

        // simpan message sebagai session
        $this->session->set_flashdata('message_profile', $message);

        // refresh page
        redirect('profile', 'refresh');
			}

    }

    if ($this->input->post('submit-CV')){
      if (!empty($_FILES['CV']['name'])) {
        // Konfigurasi library upload codeigniter
        $level = $this->session->userdata('level');
        $path = './assets/files/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 3024;
        $config['overwrite'] = TRUE;
        $config['file_name'] = $this->session->userdata('id_pelamar') . '_pdf';

        // Load library upload
        $this->load->library('upload', $config);
        
        // Jika terdapat error pada proses upload maka exit
        if (!$this->upload->do_upload('CV')) {
            exit($this->upload->display_errors());
        }
        $data['CV'] = $this->upload->data()['file_name'];
        $userId = $this->session->userdata('id_pelamar');
        // Jalankan function update pada model_users
        $query = $this->model_users->insert_CV($userId, $data);
        if ($query) {

          // Set success message
          $message = array('status' => true, 'message' => '<div class="alert alert-success" role="alert">Berhasil memperbarui profile</div>');
          
          // Update session baru
          $this->session->set_userdata($data);

        } else {

          // Set error message
          $message = array('status' => false, 'message' => '<div class="alert alert-danger" role="alert">Gagal memperbarui profile</div>');

        }

        // simpan message sebagai session
        $this->session->set_flashdata('message_profile', $message);

        // refresh page
        redirect('profile', 'refresh');
      }
    }

    // Data untuk page profile
    $data['pageTitle'] = 'Profile';
    $data['pageContent'] = $this->load->view('profile/profile', $data, TRUE);
    $data['data_table'] = null;

    // Jalankan view template/layout
    $this->load->view('main/dashboard', $data);
  }
  
  public function cekPasswordLama()
  {
    // Ambil userId dari session
    $userId = $this->session->userdata('id_user');
    
    // Ambil data password_lama dari POST
    $password = $this->input->post('password_lama');

    // Jalankan function cekPasswordLama pada model_users
    $query = $this->model_users->cekPasswordLama($userId, $password);

    // Jika query gagal maka return false
    if (!$query) {
      // Mengatur pesan error validasi data
      $this->form_validation->set_message('cekPasswordLama', '<div class="alert alert-danger" role="alert">Password lama tidak sesuai!</div>');
      return false;
    }
    return true;
  }

}