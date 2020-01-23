<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$data['users'] = $this->user_model->tampil_data('user')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/daftar_users', $data);
		$this->load->view('templates_admin/footer');
	}


	public function tambah_user()
	{
		$data = array(
			'username' => set_value('username'),
			'password' => set_value('password'),
			'email' => set_value('email'),
			'level' => set_value('level'),
			'blokir' => set_value('blokir'),

		);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/user_form', $data);
		$this->load->view('templates_admin/footer');
	}



	public function tambah_users_aksi($value='')
	{

		$this->_rules();

		if ($this->form_validation->run() == FALSE) 
		{
			$this->tambah_user();

			# code...
		} else {
			$data = array(
				'username'   => $this->input->post('username',TRUE),
				'password'   => MD5($this->input->post('password',TRUE)),
				'email'      => $this->input->post('email',TRUE),
				'level'      => $this->input->post('level',TRUE),
				'blokir'     => $this->input->post('blokir',TRUE),
				'id_session' => MD5($this->input->post('id_session',TRUE)),


			);
		

		$this->user_model->insert_data($data,'user');

		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data User Berhasil DiTambahkan !
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

		redirect('admin/users');

	}
}

	public function _rules()
	{

		$this->form_validation->set_rules('username','Username','required',['required' => 'Username Wajib Diisi!']);
		$this->form_validation->set_rules('password','Password','required',['required' => 'Password Wajib Diisi!']);
		$this->form_validation->set_rules('email','Email','required',['required' => 'Level Wajib Diisi!']);
		$this->form_validation->set_rules('blokir','Blokir','required',['required' => 'Blokir Wajib Diisi!']);
	}

	public function update($id)

	{
		$where = array('id' => $id);

		$data['users'] = $this->user_model->edit_data($where,'user')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/users_update', $data);
		$this->load->view('templates_admin/footer');


		# code...
	}
	
	public function update_aksi()

	{

		$id          = $this->input->post('id');
		$username    = $this->input->post('username');
		$password    = $this->input->post('password');
		$email       = $this->input->post('email');
		$level       = $this->input->post('level');
		$blokir      = $this->input->post('blokir');
		$id_session   = $this->input->post('id_session');



		$data = array(
				'username'   => $username,
				'password'   => $password,
				'email'      => $email,
				'level'      => $level,
				'blokir'     => $blokir,
				);

		$where =array(
			'id' => $id);



		$this->user_model->update_data($where,$data,'user');

		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data User Berhasil Diupdate !
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

		redirect('admin/users');


	}
	public function hapus($id)

	{
		$where =array(
			'id' => $id);

		$this->user_model->hapus_data($where,'user');

		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data User Berhasil DiHapus !
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

		redirect('admin/users');



	}
}
