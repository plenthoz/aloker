<?php

class Lokernganjuk extends MY_controller
{
	
	public function __construct() {
		parent::__construct();

	    // Load model users
	    $this->load->model('model_users');
	}

	public function index() {
		$this->load->view("main/home");
	}

	public function pesan() {
		# memanggil database loker
		$this->load->view("auth/pesan_informasi");
	}

	// public function list_perusahaan() {
		
	// 	$this->load->view("main/perusahaan_view");
	// }

	public function list_lamaran() {
		
		$this->load->view("main/lamaran_view");
	}

	public function registrasi() {
		
		$this->load->view("main/registrasi");
	}

	public function form_lamaran() {
		$this->load->view("main/formulir_lamaran");
	}

}