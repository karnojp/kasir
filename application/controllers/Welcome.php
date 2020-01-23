<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('admin/login');
		$this->load->view('templates_admin/footer');

	}

	public function proses_login()


	{
		$this->form_validation->set_rules('username','username','required',['required' => 'Username Wajib Diisi !']);
		$this->form_validation->set_rules('password','password','required',['required' => 'Password Wajib Diisi !']);
		if($this->form_validation->run() == FALSE)
		{

			$this->load->view('templates_admin/header');
			$this->load->view('admin/login');
			$this->load->view('templates_admin/footer');
		}

		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');


			$user = $username;
			$pass = MD5($password);


			$cek = $this->login_model->cek_login($user,$pass);

			if($cek->num_rows() > 0)
			{

				foreach ($cek->result() as $ck) 
				{

					$sess_data['username'] = $ck->username;
					$sess_data['email'] = $ck->email;
					$sess_data['level'] = $ck->level;

					$this->session->set_userdata($sess_data);

					# code...
				}
				if($sess_data['level'] == 'admin'){
					redirect('admin/dashboard');

				}else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Username atau Password Salah
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
					redirect('admin/auth');

				}




				
			}	else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Username atau Password Salah
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
					redirect('admin/auth');
				}



		}
		# code...
	}


	public function logout()
	{

		$this->session->sess_destroy();
		redirect('admin/auth');
		# code...
	}
}
