
	<div class="container">
		<div class="row justify-content-center " >
			<div class="col-6">
				<div class="card mt-5 shadow">
				  <div class="card-header bg-info text-white">
				    Tambah Data
				  </div>
				  <div class="card-body">
				  	<form method="post" action="">
					  <div class="form-group">
					    <label for="exampleFormControlInput1">Nama</label>
					    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama kamu...." name="nama" value="<?= set_value('nama') ?>">
					    <small class="form-text text-danger ml-1" ><?php echo form_error('nama'); ?></small>
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Jurusan</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="jurusan">
					    	<?php foreach( $jurusan as $jr ) : ?>
					      		<option class="kapital" value="<?= $jr; ?>" ><?= $jr; ?></option>
					  		<?php endforeach ?>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlInput1">No HP</label>
					    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="no hp kamu...." name="no_hp" value="<?= set_value('no_hp') ?>">
					    <small class="form-text text-danger ml-1" ><?php echo form_error('no_hp'); ?></small>
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlInput1">Email</label>
					    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email kamu...." name="email" value="<?= set_value('email') ?>">
					    <small class="form-text text-danger ml-1" ><?php echo form_error('email'); ?></small>
					  </div>
					  <button type="submit" class="btn btn-info mr-2">Tambah</button>
					  <a href="<?= base_url('siswa') ?>" class="btn text-white btn-warning">Kembali</a>
					</form>  
				  </div>
				</div>
			</div>
		</div>
	</div>
