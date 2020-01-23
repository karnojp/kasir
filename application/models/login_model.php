<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

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
	public function cek_login($username,$password)
	{
		$this->db->where("username",$username);
		$this->db->where("password",$password);
		return $this->db->get('user');
	}

	public function getLoginData($user,$pass)
	{

		$u = $user;
		$p = MD5($pass);


		$query_cekLogin = $this->db->get_where('user', array('username' => $u, 'password' => $p));

		if(count($query_cekLogin->result()) > 0) {
			foreach ($query_cekLogin->result() as $qck) {
				foreach ($query_cekLogin->result() as $ck) {
					$sess_data ['logged_in'] = TRUE;
					$sess_data ['username'] = $ck->username;
					$sess_data ['password'] = $ck->password;
					$sess_data ['level'] = $ck->level;

					$this->session->set_userdata($sess_data);

					# code...
				}
				redirect('admin/dashboard');

				# code...
			}

		}else{


			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Username atau Password Salah
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('admin/auth');

		}



		# code...
	}












}