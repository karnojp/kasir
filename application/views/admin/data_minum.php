<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Daftar Minuman
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<?php echo anchor('admin/data_minum/tambah_minum','<button class="btn btn-sm btn-primary mb-3"><i class ="fas fa-plus fa-sm"></i> Tambah Data  </button>') ?>



	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>No</th>
			<th>Gambar</th>
			<th>Nama Minum</th>
			<th>Harga</th>
			<th>Status</th>
			<th colspan="2">Aksi</th>


		</tr>
		<?php 
		$no=1;

		foreach ($minums as $minum) : ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td>
					<img src="<?php echo base_url().'assets/upload/'. $minum->gambar_minum ?>">
					
				</td>
				<td><?php echo $minum->nama_minum ?></td>
				<td><?php echo $minum->harga_minum ?></td>
				<td><?php 
					if($minum->status_minum == "N")
					{
						echo "<span class ='badge badge-danger'> Tidak Tersedia </span>";

					}else{
						echo "<span class ='badge badge-primary'>Tersedia </span>";

					}


				  ?></td>

				<td width="20px"><?php echo anchor('admin/data_minum/update/'.$minum->kode_minum,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('admin/data_minum/hapus/'.$minum->kode_minum,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>


			</tr>


		<?php endforeach; ?>

	</table>


</div>