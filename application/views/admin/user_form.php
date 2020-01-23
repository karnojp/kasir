<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Form Tambah User

	</div>

				<form action="<?php echo base_url('admin/users/tambah_users_aksi') ?>" method="post">
				<div class="form-group">
				<label>Username</label>
				 <input type="text" class="form-control" name="username" placeholder="Masukkan Kode" >
				 <?php echo form_error('username','<div class ="text-danger small ml-3">','</div>'); ?>
				</div>

				<div class="form-group">
				<label>Password</label>
				 <input type="text" class="form-control" name="password" placeholder="Masukkan Kode" >
				 <?php echo form_error('password','<div class ="text-danger small ml-3">','</div>'); ?>
				</div>

				<div class="form-group">
				<label>Email</label>
				 <input type="text" class="form-control" name="email" placeholder="Masukkan Kode" >
				  <?php echo form_error('email','<div class ="text-danger small ml-3">','</div>'); ?>
				</div>

				<div class="form-group">
				<label>Level</label>
				 <select name="level" class="form-control">

				 	<?php 

				 		if($level == 'admin') {
				 	 ?>
				 	<option value="admin" selected>Admin</option>
				 	<option value="pelayan">Pelayan</option>
				 	
				 	<?php 
				 	} elseif ($level == 'pelayan') {
				 		# code...
				 	 ?>
				 	 <option value="admin" >Admin</option>
				 	<option value="pelayan" selected>Pelayan</option>

					 <?php 
					} else {
					 ?>
					<option value="admin" >Admin</option>
				 	<option value="pelayan" >Pelayan</option>
					<?php } ?>


				 </select>
				 <?php echo form_error('level','<div class ="text-danger small ml-3">','</div>'); ?>

				</div>

				<div class="form-group">
				<label>Blokir</label>
				 <select name="blokir" class="form-control">

				 	<?php 

				 		if($blokir == 'Y') {
				 	 ?>
				 	<option value="Y" selected>Ya</option>
				 	<option value="N">Tidak</option>
				 	
				 	<?php 
				 	} elseif ($blokir == 'N') {
				 		# code...
				 	 ?>
				 	 <option value="Y" >Ya</option>
				 	<option value="N" selected>Tidak</option>

					 <?php 
					} else {
					 ?>
					<option value="Y" >Ya</option>
				 	<option value="N" >Tidak</option>
					<?php } ?>


				 </select>
				 <?php echo form_error('blokir','<div class ="text-danger small ml-3">','</div>'); ?>

				</div>

				<button type="submit" class="btn btn-primary">Simpan</button>

				</form>
	







</div>