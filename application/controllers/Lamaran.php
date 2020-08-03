<?php

class Lamaran extends CI_controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model("Model_lamaran");
	}

	public function index() {
		$this->load->view("main/home");
	}

	public function list_lamaran() {
		$data['pageTitle'] = 'List Lamaran';
		$data["result"] = $this->Model_lamaran->getLamaran();
		$data['pageContent'] = $this->load->view('lamaran/lamaran_view', $data, TRUE);
		$data['data_table'] = "<script> $(document).ready(function(){ $('#tabel-lamaran').DataTable();
	});
	</script>";
		$this->load->view("main/dashboard", $data);
	}

	public function detail($id_lamaran){
		if ($this->input->post('submit-aksi')) { 
			
			$this->form_validation->set_rules('status', 'status', 'in_list[Diterima,Ditolak]');

			if ($this->form_validation->run() === TRUE) { 
				$data = array(
		          'status' => $this->input->post('status')     
        		);

        		$query = $this->Model_lamaran->terimaLamaran($id_lamaran, $data);

        		if ($this->session->userdata('level') == 'Perusahaan') {
		          redirect('lamaran/lamaran_masuk', 'refresh');
		        }
			}
		}
		
		$data['pageTitle'] = 'Detail Lamaran';
		$data["detail"] = $this->Model_lamaran->detail_data($id_lamaran);
		$data['pageContent'] = $this->load->view('lamaran/detail', $data, TRUE);
		$data['data_table'] = null;
		$this->load->view("main/dashboard", $data);
	}

	public function print($id_lamaran){
		$data["detail"] = $this->Model_lamaran->print_data($id_lamaran);
		$this->load->view("lamaran/print", $data);
	}

	public function lamaran_masuk() {
		$data['pageTitle'] = 'Lamaran Masuk';
		$username = $this->session->userdata('username');
		$data["result"] = $this->Model_lamaran->getLamaranMasuk($username);
		$data['pageContent'] = $this->load->view('lamaran/lamaranmasuk_view', $data, TRUE);
		$data['data_table'] = "<script> $(document).ready(function(){ $('#tabel-lamaran-masuk').DataTable();
	});
	</script>";
		$this->load->view("main/dashboard", $data);
	}

	public function lamaran_terkirim() {
		$data['pageTitle'] = 'Lamaran Terkirim';
		$userId = $this->session->userdata('id_pelamar');
		$data["result"] = $this->Model_lamaran->getLamaranTerkirim($userId);
		$data['pageContent'] = $this->load->view('lamaran/lamaran_terkirim', $data, TRUE);
		$data['data_table'] = "<script> $(document).ready(function(){ $('#tabel-lamaran').DataTable();}); </script>";
		$this->load->view("main/dashboard", $data);
	}

	public function apply($id_lowongan) {
		$data = array (
			'id_lowongan' => $id_lowongan,
			'id_pelamar' => $this->session->userdata('id_pelamar'),
			'status' => 'Diajukan'
		);
		$query = $this->Model_lamaran->insert($data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => '<div class="alert alert-success" role="alert">Berhasil Mengajukan Lamaran</div>');
        else $message = array('status' => false, 'message' => '<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-circle fa-2">  Gagal Mengajukan Lamaran</div>');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('lamaran/lamaran_terkirim', 'refresh');
	}


}
