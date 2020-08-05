<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Regis_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
	}

	public function register()
	{
		$this->load->view('auth/registrasi');
	}

	private function update_data($where,$data){
      $this->load->database();
      $this->db->where($where);
      $this->db->update('users',$data);
      return true;
    }

	public function proses_register()
	{
		//form validation table users
		$this->form_validation->set_rules('username', 'username','required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'password','required');
		$this->form_validation->set_rules('password_conf','password','required|matches[password]');
		$this->form_validation->set_rules('email', 'email','required|is_unique[pelamar.email]');
        // Mengatur pesan error validasi data
		$this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert">%s tidak boleh kosong!</div>');
		$this->form_validation->set_message('min_length', '<div class="alert alert-danger" role="alert">%s minimal %d karakter!</div>');
		$this->form_validation->set_message('is_unique', '<div class="alert alert-danger" role="alert">Maaf, %s sudah ada. Gunakan %s lain.</div>');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('auth/registrasi');

		}
		else {
			$user = [
				'username'=> $this->input->post('username'),
				'password'=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'level' => 'Pelamar',
				'active' => '0',
			];

			$pelamar = [
				'username'=> $this->input->post('username'),
				'email' => $this->input->post('email'),
			];

			$insert = $this->Regis_model->register($user, $pelamar);
			if ($insert){
				$this->send_mail($this->input->post('username'),$this->input->post('email'));
				$this->load->view('auth/pesan_informasi');
			}else {
				echo "Registrasi Gagal!!! Silakan lakukan registrasi kembali!";
			}

		}	
	}

	private function send_mail($username,$mail) {
		$this->load->library('email');
		$this->load->helper('url_encode_helper');
		// 
		$from_email = "handito.pu@gmail.com"; 
		// $to_email = "plentuus@gmail.com";
		$enkrip_username = encode_url($username);

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_timeout' =>30,
			'smtp_user' => 'handito.pu@gmail.com',
			'smtp_pass' => '251089han',
			'mailtype'  => 'html', 
			'charset'   => 'utf-8'
		);

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");      
		//Email content
		$htmlContent = '<h1>Aktivasi Akun Anda</h1>';
		$htmlContent .= '<p>'.base_url().'activate/'.$enkrip_username.'</p>';

		$this->email->to($mail);
		$this->email->from('handito.pu@gmail.com','handito');
		$this->email->subject('Aktivasi Akun Anda');
		$this->email->message($htmlContent);

         //Send mail 
		if ( ! $this->email->send()) {
			show_error($this->email->print_debugger());
		}
	}

	public function activate($id)
	{
		$this->load->helper('url_encode_helper');
		
		$mail_dekrip = decode_url($this->uri->segment(2));
		$status = "";
		$msg = "";

		$where = array(
			'username'    => $mail_dekrip
		);

		$data = array(
			'active'      => 1
		);

		$update = $this->update_data($where,$data);
		if($update == true)
		{
			$status = "success";
			$msg = "Success activated item";
		}
		else
		{
			$status = "error";
			$msg = "Error activated item";    
		}
		echo json_encode(array('status' => $status, 'msg' => $msg));
	}	

}
?>
