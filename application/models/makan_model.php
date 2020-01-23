<?php


class Makan_model extends CI_Model {

	public $table = 'makan';
	public $id    = 'id';

	


	function ambil_data($id)

	{
		$this->db->where('username', $id);
		return $this->db->get('user')->row();
	}


	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function insert_data($data,$table)
	{

		$this->db->insert($table,$data);

		# code...
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}


	public function update_data($where,$data,$table)


	{
		$this->db->where($where);
		$this->db->update($table,$data);
		

	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);

	}
			public function kode(){
		  $this->db->select('RIGHT(makan.kode_makan,2) as kode_makan', FALSE);
		  $this->db->order_by('kode_makan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('makan');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->kode_makan) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
			  $tgl=date('dmY'); 
			  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			  $kodetampil = "ERP".$tgl.$batas;  //format kode
			  return $kodetampil;  
		 }

}
