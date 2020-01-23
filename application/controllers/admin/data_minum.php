<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_minum extends CI_Controller {

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
		
		$data['minums'] = $this->minum_model->tampil_data('minum')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_minum', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_minum()
	{

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_minum', $data);
		$this->load->view('templates_admin/footer');
	}



	public function tambah_minum_aksi()
	{

		$this->_rules();

		if ($this->form_validation->run() == FALSE) 
		{
			$this->tambah_minum();

		} else {

			$kode_minum               = $this->input->post('kode_minum');
			$harga_minum               = $this->input->post('harga_minum');
			$nama_minum                = $this->input->post('nama_minum');
			$status_minum             = $this->input->post('status_minum');
			$gambar_minum              = $_FILES['gambar_minum']['name'];
			if($gambar_minum=''){}else{
				$config ['upload_path']   = './assets/upload/';
				$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar_minum')){
					echo "Gambar Makan Gagal Diupload!";


				}else{
					$gambar_minum = $this->upload->data('file_name');

				}
			}

			$data = array(
				'kode_minum'    	 => $kode_minum,
				'nama_minum'  		 => $nama_minum,
				'harga_minum'        => $harga_minum,
				'status_minum'       => $status_minum,
				'gambar_minum'       => $gambar_minum


			);
		

		$this->minum_model->insert_data($data,'minum');

		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data Makan Berhasil DiTambahkan !
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

		redirect('admin/data_minum');

	}
}

	public function _rules()
	{

		$this->form_validation->set_rules('kode_minum','Kode_minum','required',['required' => 'Kode Makan Wajib Diisi!']);
		$this->form_validation->set_rules('harga_minum','Harga_minum','required',['required' => 'Harga Makan Wajib Diisi!']);
		$this->form_validation->set_rules('nama_minum','Nama_minum','required',['required' => 'Nama Makanan Wajib Diisi!']);
		$this->form_validation->set_rules('status_minum','Status_minum','required',['required' => 'Status Makanan Wajib Diisi!']);
	}

	public function update($id)

	{
		$where = array('kode_minum' => $id);

		$data['minums'] = $this->minum_model->edit_data($where,'minum')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/minum_update', $data);
		$this->load->view('templates_admin/footer');


		# code...
	}
	
	public function update_aksi()
	{

		$this->_rules();

		if ($this->form_validation->run() == FALSE) 
		{
			$this->minum_update();

		} else {

			$kode_minum               = $this->input->post('kode_minum');
			$harga_minum               = $this->input->post('harga_minum');
			$nama_minum                = $this->input->post('nama_minum');
			$status_minum              = $this->input->post('status_minum');
			$gambar_minum              = $_FILES['gambar_minum']['name'];
			if($gambar_minum){
				$config ['upload_path']   = './assets/upload/';
				$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);
				if($this->upload->do_upload('gambar_minum')){
					echo "Gambar Makan Gagal Diupload!";


				}else{
					$gambar_minum = $this->upload->data('file_name');

				}
			}

			$data = array(
				
				'nama_minum'  		 => $nama_minum,
				'harga_minum'        => $harga_minum,
				'status_minum'       => $status_minum

			);$where = array(
				'kode_minum'    	 => $kode_minum,
			);
			$this->minum_model->update_data($where,$data,'minum');

		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data Minum Berhasil Diupdate !
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

		redirect('admin/data_minum');

	}
}
		
	public function hapus($id)

	{
		$where =array(
			'kode_minum' => $id);

		$this->minum_model->hapus_data($where,'minum');

		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data minum Berhasil DiHapus !
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

		redirect('admin/data_minum');



	}
}
