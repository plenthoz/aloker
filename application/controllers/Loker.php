<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loker extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model loker
    $this->load->model('model_loker');
  }

  public function index()
  {
    //Load library pagination
    $this->load->library('pagination');

    // Pengaturan pagination
    $config['base_url'] = base_url('loker/index/');

    // Data untuk page index
    $data['pageTitle'] = 'Lowongan Kerja';
    //$data['loker'] = $this->model_loker->get_offset($config['per_page'], $config['offset'])->result();
    $data['loker'] = $this->model_loker->get_loker()->result();
    $data['pageContent'] = $this->load->view('loker/lokerList', $data, TRUE);
    $data['data_table'] = "<script>
  $(document).ready(function(){
      $('#tabel-loker').DataTable();
  });
</script>";

    // Jalankan view 
    $this->load->view('main/dashboard', $data);
  }

  public function add($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {

      // Mengatur validasi data tanggal berakhir,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('tanggal_berakhir', 'Tanggal Berakhir', 'required');

      // Mengatur validasi data posisi,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('posisi', 'Posisi', 'required');

      $this->form_validation->set_rules('kategori', 'Kategori', 'in_list[Akuntansi/Keuangan,Administrasi,Seni/Media/Komunikasi,Bangunan/Konstruksi,Komputer/IT,Pendidikan,Teknik,Kesehatan,Hotel/Restoran,Manufaktur,Marketing,Lainnya]');

      // Mengatur validasi data deskripsi,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert">%s tidak boleh kosong!</div>');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'id_perusahaan' => $this->session->userdata('id_perusahaan'),
          'tanggal_berakhir' => date_format(date_create($this->input->post('tanggal_berakhir')), 'Y-m-d'),
          'posisi' => $this->input->post('posisi'),
          'kategori' => $this->input->post('kategori'),
          'deskripsi' => $this->input->post('deskripsi'),
          'username' => $this->session->userdata('username')
        );

        // Jalankan function insert pada model_loker
        $query = $this->model_loker->insert($id, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => '<div class="alert alert-success">Berhasil menambahkan lowongan kerja</div>');
        else $message = array('status' => false, 'message' => '<div class="alert alert-danger">Gagal menambahkan lowongan kerja</div');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        if ($this->session->userdata('level') == 'Perusahaan') {
          redirect('loker/loker_perusahaan', 'refresh');
        }
        redirect('loker', 'refresh');
			} 
    }
    $loker = $this->model_loker->get_where(array('loker.id_perusahaan' => $id))->row();

    // Data untuk page loker/add
    $data['pageTitle'] = 'Tambah Data Lowongan Kerja';
    $data['pageContent'] = $this->load->view('loker/lokerAdd', $data, TRUE);
    $data['data_table'] = null;

    // Jalankan view 
    $this->load->view('main/dashboard', $data);
  }

  public function detail($id = null)
  {
    // Ambil data loker dari database
    $loker = $this->model_loker->get_where(array('id' => $id))->row();
    
    // Jika data loker tidak ada maka show 404
    if (!$loker) show_404();

    // Data untuk page loker/detail
    $data['pageTitle'] = 'Detail Lowongan Kerja';
    $data['loker'] = $loker;
    $data['pageContent'] = $this->load->view('loker/lokerDetail', $data, TRUE);
    $data['data_table'] = null;

    // Jalankan view 
    $this->load->view('main/dashboard', $data);
  }

  public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {

      // Mengatur validasi data tanggal berakhir,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('tanggal_berakhir', 'Tanggal Berakhir', 'required');

      // Mengatur validasi data posisi,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('posisi', 'Posisi', 'required');

      // Mengatur validasi data kategori,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('kategori', 'Kategori', 'required');

      // Mengatur validasi data deskripsi,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert">%s tidak boleh kosong!</div>');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          
          'tanggal_berakhir' => date_format(date_create($this->input->post('tanggal_berakhir')), 'Y-m-d'),
          'posisi' => $this->input->post('posisi'),
          'kategori' => $this->input->post('kategori'),
          'deskripsi' => $this->input->post('deskripsi')
        );

        // Jalankan function update pada model_loker
        $query = $this->model_loker->update($id, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => '<div class="alert alert-success"><center>Berhasil memperbarui lowongan kerja</center><div>');
        else $message = array('status' => true, 'message' => '<div class="alert alert-danger">Gagal memperbarui lowongan kerja<div>');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        //redirect('loker/detail/'.$id, 'refresh');
        if ($this->session->userdata('level') == 'Perusahaan') {
          redirect('loker/loker_perusahaan', 'refresh');
        }
        redirect('loker', 'refresh');
			} 
    }
    
    // Ambil data loker dari database
    $loker = $this->model_loker->get_where(array('id' => $id))->row();
    
    // Mengubah format tanggal dari database
    $loker->tanggal_berakhir = date_format(date_create($loker->tanggal_berakhir), 'd-m-Y');

    // Jika data loker tidak ada maka show 404
    if (!$loker) show_404();

    // Jika data loker diedit oleh user lain maka show 404
    //if ($loker->username !== $this->session->userdata('username')) show_404();

    // Data untuk page loker/add
    $data['pageTitle'] = 'Edit Data Lowongan Kerja';
    $data['loker'] = $loker;
    $data['pageContent'] = $this->load->view('loker/lokerEdit', $data, TRUE);
    $data['data_table'] = null;

    // Jalankan view 
    $this->load->view('main/dashboard', $data);
  }

  public function delete($id)
  {
    // Ambil data loker dari database
    $loker = $this->model_loker->get_where(array('id' => $id))->row();

    // Jika data loker tidak ada maka show 404
    if (!$loker) show_404();

    // Jika data loker didelete oleh user lain maka show 404
    if ($loker->username !== $this->session->userdata('username')) show_404();

    // Jalankan function delete pada model_loker
    $query = $this->model_loker->delete($id);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => '<div class="alert alert-success" role="alert">Berhasil menghapus lowongan kerja</div>');
    else $message = array('status' => true, 'message' => '<div class="alert alert-danger" role="alert">Gagal menghapus lowongan kerja</div>');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    if ($this->session->userdata('level') === 'Perusahaan') {
      redirect('loker/loker_perusahaan', 'refresh');
    } else {
      redirect('loker', 'refresh');
    }
    
  }

  public function loker_perusahaan() {

    $data['pageTitle'] = 'Lowongan Kerja';
    $data['loker'] = $this->model_loker->get_where(array('perusahaan.username'=>$this->session->userdata('username')))->result();
    $data['pageContent'] = $this->load->view('loker/lokerPerusahaan', $data, TRUE);
    $data['data_table'] = "<script>
  $(document).ready(function(){
      $('#tabel-loker-perusahaan').DataTable();
  });
</script>";
    // Jalankan view 
    $this->load->view('main/dashboard', $data);
  }
}
