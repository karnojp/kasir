<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Form Tambah Data Makanan

	</div>

				<form action="<?php echo base_url('admin/data_makan/tambah_makan_aksi') ?>" method="post">
				<div class="form-group">
				<label>Kode Makanan</label>
				 <input type="text" class="form-control" name="kode_makan"  placeholder="Masukkan Kode Makanan" >
				 <?php echo form_error('kode_makan','<div class ="text-danger small ml-3">','</div>'); ?>
				</div>
				<div class="form-group">
				<label>Nama Makanan</label>
				 <input type="text" class="form-control" name="nama_makan" placeholder="Masukkan Nama Makanan" >
				 <?php echo form_error('nama_makan','<div class ="text-danger small ml-3">','</div>'); ?>
				</div>

				<div class="form-group">
				<label>Harga Makanan</label>
				 <input type="number" class="form-control" name="harga_makan" placeholder="Masukkan Harga Makanan" >
				 <?php echo form_error('harga_makan','<div class ="text-danger small ml-3">','</div>'); ?>
				</div>

				<div class="form-group">
				<label>Status</label>
				 <select name="status_makan" class="form-control">

				 	<?php 

				 		if($status_makan == 'Y') {
				 	 ?>
				 	<option value="Y" selected>Tersedia</option>
				 	<option value="N">Tidak Tersedia</option>
				 	
				 	<?php 
				 	} elseif ($status_makan == 'N') {
				 		# code...
				 	 ?>
				 	 <option value="Y" >Tersedia</option>
				 	<option value="N" selected>Tidak Tersedia</option>

					 <?php 
					} else {
					 ?>
					<option value="Y" >Tersedia</option>
				 	<option value="N" >Tidak Tersedia</option>
					<?php } ?>


				 </select>
				 <?php echo form_error('status_makan','<div class ="text-danger small ml-3">','</div>'); ?>

				</div>

				<div class="form-group">
				<label>Gambar</label>
				 <input type="file" class="form-control" name="gambar_makan" placeholder="Masukkan Kode" >
				 <?php echo form_error('gambar_makan','<div class ="text-danger small ml-3">','</div>'); ?>
				</div>

				<button type="submit" class="btn btn-primary">Simpan</button>
				<button type="reset" class="btn btn-danger">Reset</button>

				</form>
	







</div>