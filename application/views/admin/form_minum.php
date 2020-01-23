<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Form Tambah Data Minuman

	</div>

				<form action="<?php echo base_url('admin/data_minum/tambah_minum_aksi') ?>" method="post">
				<div class="form-group">
				<label>Kode Minuman</label>
				 <input type="text" class="form-control" name="kode_minum"  placeholder="Masukkan Kode Miuman" >
				 <?php echo form_error('kode_makan','<div class ="text-danger small ml-3">','</div>'); ?>
				</div>
				<div class="form-group">
				<label>Nama Makanan</label>
				 <input type="text" class="form-control" name="nama_minum" placeholder="Masukkan Nama Minuman" >
				 <?php echo form_error('nama_makan','<div class ="text-danger small ml-3">','</div>'); ?>
				</div>

				<div class="form-group">
				<label>Harga Makanan</label>
				 <input type="number" class="form-control" name="harga_minum" placeholder="Masukkan Harga Minuman" >
				 <?php echo form_error('harga_makan','<div class ="text-danger small ml-3">','</div>'); ?>
				</div>

				<div class="form-group">
				<label>Status</label>
				 <select name="status_minum" class="form-control">

				 	<?php 

				 		if($status_minum == 'Y') {
				 	 ?>
				 	<option value="Y" selected>Tersedia</option>
				 	<option value="N">Tidak Tersedia</option>
				 	
				 	<?php 
				 	} elseif ($status_minum == 'N') {
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
				 <?php echo form_error('status_minum','<div class ="text-danger small ml-3">','</div>'); ?>

				</div>

				<div class="form-group">
				<label>Gambar</label>
				 <input type="file" class="form-control" name="gambar_minum" placeholder="Masukkan Kode" >
				 <?php echo form_error('gambar_minum','<div class ="text-danger small ml-3">','</div>'); ?>
				</div>

				<button type="submit" class="btn btn-primary">Simpan</button>
				<button type="reset" class="btn btn-danger">Reset</button>

				</form>
	







</div>