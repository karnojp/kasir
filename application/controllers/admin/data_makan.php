<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_makan extends CI_Controller {

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
		
		$data['makans'] = $this->makan_model->tampil_data('makan')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_makan', $data);
		$this->load->view('templates_admin/footer');
	}


	public function tambah_makan()
	{
		$data = array(
			'kode_makan' => set_value('username'),
			'nama_makan' => set_value('password'),
			'harga_makan' => set_value('email'),
			'status' => set_value('level'),
			'gambar' => set_value('blokir'),

		);
		$data['makans'] = $this->makan_model->kode();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_makan', $data);
		$this->load->view('templates_admin/footer');
	}



	public function tambah_makan_aksi()
	{

		$this->_rules();

		if ($this->form_validation->run() == FALSE) 
		{
			$this->tambah_makan();

		} else {

			$kode_makan                = $this->input->post('kode_makan');
			$harga_makan               = $this->input->post('harga_makan');
			$nama_makan                = $this->input->post('nama_makan');
			$status_makan              = $this->input->post('status_makan');
			$gambar_makan              = $_FILES['gambar_makan']['name'];
			if($gambar_makan=''){}else{
				$config ['upload_path']   = './assets/upload/';
				$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar_makan')){
					echo "Gambar Makan Gagal Diupload!";


				}else{
					$gambar_makan = $this->upload->data('file_name');

				}
			}

			$data = array(
				'kode_makan'    	 => $kode_makan,
				'nama_makan'  		 => $nama_makan,
				'harga_makan'        => $harga_makan,
				'status_makan'       => $status_makan,
				'gambar_makan'       => $gambar_makan


			);
		

		$this->makan_model->insert_data($data,'makan');

		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data Makan Berhasil DiTambahkan !
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

		redirect('admin/data_makan');

	}
}

	public function _rules()
	{

		$this->form_validation->set_rules('kode_makan','Kode_makan','required',['required' => 'Kode Makan Wajib Diisi!']);
		$this->form_validation->set_rules('harga_makan','Harga_makan','required',['required' => 'Harga Makan Wajib Diisi!']);
		$this->form_validation->set_rules('nama_makan','Nama_makan','required',['required' => 'Nama Makanan Wajib Diisi!']);
		$this->form_validation->set_rules('status_makan','Status_makan','required',['required' => 'Status Makanan Wajib Diisi!']);
	}

	public function update($id)

	{
		$where = array('kode_makan' => $id);

		$data['makans'] = $this->makan_model->edit_data($where,'makan')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/makan_update', $data);
		$this->load->view('templates_admin/footer');


		# code...
	}
	
	public function update_aksi(){

		$this->_rules();

		if ($this->form_validation->run() == FALSE) 
		{
			$this->makan_update();

		} else {

			$kode_makan                = $this->input->post('kode_makan');
			$harga_makan               = $this->input->post('harga_makan');
			$nama_makan                = $this->input->post('nama_makan');
			$status_makan              = $this->input->post('status_makan');
			$gambar_makan              = $_FILES['gambar_makan']['name'];
			if($gambar_makan){
				$config ['upload_path']   = './assets/upload/';
				$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar_makan')){
					echo "Gambar Makan Gagal Diupload!";


				}else{
					$gambar_makan = $this->upload->data('file_name');

				}
			}

			$data = array(
				
				'nama_makan'  		 => $nama_makan,
				'harga_makan'        => $harga_makan,
				'status_makan'       => $status_makan

			);$where = array(
				'kode_makan'    	 => $kode_makan,
			);
		

		$this->makan_model->update_data($where,$data,'makan');

		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data Makan Berhasil Diupdate !
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

		redirect('admin/data_makan');

	}
}
	public function hapus($id)

	{
		$where =array(
			'kode_makan' => $id);

		$this->makan_model->hapus_data($where,'makan');

		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data User Berhasil DiHapus !
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

		redirect('admin/data_makan');



	}
}
