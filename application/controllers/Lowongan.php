<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('application/controllers/Lokernganjuk.php');

class Lowongan extends Lokernganjuk {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {

      parent::__construct();

      $this->load->library('pagination');
      $this->load->helper('form');
      $this->load->model('lowongan_model');
        
    }

    public function index() {

      // $data['lowongan'] = $this->lowongan_model->getAll();
      // $this->load->view("main/lowongan_view", $data);

      $config['base_url'] = site_url('lowongan/index'); //site url
      $config['total_rows'] = $this->db->count_all('loker'); //total row
      $config['per_page'] = 2;  //show record per halaman
      $config["uri_segment"] = 3;  // uri parameter
      $choice = $config["total_rows"] / $config["per_page"];
      $config["num_links"] = floor($choice);

      // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
      $config['last_link']        = 'Last';
      $config['next_link']        = 'Berikutnya';
      $config['prev_link']        = 'Sebelumnya';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';

      $this->pagination->initialize($config);
      $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

      //panggil function getPagination yang ada pada mmodel mahasiswa_model. 
      $data['lowongan'] = $this->lowongan_model->getPagination($config["per_page"], $data['page']);           

      $data['pagination'] = $this->pagination->create_links();

      //load view
      $this->load->view('main/lowongan_view', $data);
        
    }


    public function detail_lowongan($id_lowongan) {

      $detail = $this->lowongan_model->get_detaillowongan($id_lowongan);
      $data['detail'] = $detail;
      $this->load->view('main/detail/detaillowongan', $data);
    }

    public function by_kategori($kategori) {

      $bykategori = $this->lowongan_model->get_bykategori(urldecode($kategori));
      $data['kategori'] = $bykategori;
      $data['pagination'] = $this->pagination->create_links();
      $this->load->view('main/bykategori_view', $data);
    }

    public function search(){

      $keyword = $this->input->GET('keyword', TRUE);
      $data['lowongan']=$this->lowongan_model->get_keyword($keyword);
      $data['pagination'] = $this->pagination->create_links();
      $this->load->view('main/lowongan_search', $data);
        $this->load->helper('form');
    }

    public function ajukan_lamaran($id_lowongan = 'id_lowongan') {
      
      if(!$this->session->userdata('username')) {
        $this->load->view('auth/login_apply');
      } else {
        $data['id'] = array(
          'id_lowongan' => $id_lowongan
        );
        $this->load->view('main/formulir_lamaran', $data);
      }

    }
}