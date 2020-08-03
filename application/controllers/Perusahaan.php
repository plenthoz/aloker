<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('application/controllers/Lokernganjuk.php');

class perusahaan extends lokernganjuk {

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
    public function __construct()
    {
        parent::__construct();
        //load perusahaan_model
        $this->load->model("perusahaan_model");
        //load library helper
        $this->load->helper('form');
        //load libary pagination
        $this->load->library('pagination');


    }

    public function index()
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('perusahaan/index/'); //site url
        $config['total_rows'] = $this->perusahaan_model->getAll()->num_rows(); //total row
        $config['per_page'] = 2;  //show record per halaman
        /*$config['use_page_numbers'] = true;*/
        $config['offset'] = $this->uri->segment(3);
        // $choice = $config["total_rows"] / $config["per_page"];
        // $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = false;
        $config['last_link']        = false;
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
        // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_perusahaan_list yang ada pada model perusahaan_model. 
        $data['perusahaan'] = $this->perusahaan_model->getPagination($config["per_page"], $config['offset'])->result();           
        // $data['data1'] =  $this->perusahaan_model->getAll() ;
 
        $data['pagination'] = $this->pagination->create_links();
 
        //load view perusahaan view
        $this->load->view('main/perusahaan_view',$data);

    }

    public function detail_perusahaan($id)
    {
        $data['detail'] = $this->perusahaan_model->detail($id);
        $data['detail_join'] = $this->perusahaan_model->detail_join($id);
        $this->load->view('main/detail/detailperusahaan', $data);
        
    }

    public function search()
    {
        $keyword = $this->input->GET('keyword', TRUE);
        $data['perusahaan']=$this->perusahaan_model->get_keyword($keyword);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('main/perusahaan_search', $data);
        $this->load->helper('form');

    }

}