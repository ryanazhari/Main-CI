
	<div class="container" >
		<div class="card mt-5 shadow">
		  <div class="card-header bg-info text-white">
		    Data Siswa
		  </div>
		  <div class="card-body">
		  	<a href="<?= base_url('siswa/tambah') ?>" class="btn btn-primary mb-3">Tambah Data</a>

		  	<div class="row" >
		  		<div class="col-6 mb-2" >
		  			<form action="" method="post">
				  		<div class="input-group mb-3">
							<input type="text" class="form-control" name="katakunci" autocomplete="off" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
							<div class="input-group-append">
								<button class="btn btn-info" type="submit" id="button-addon2">Cari</button>
							</div>
						</div>
				  	</form>
		  		</div>
		  	</div>

		  	<?php if( $this->session->flashdata('berhasil') ) : ?>
		  		<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data <strong>Berhasil</strong> <?= $this->session->flashdata('berhasil') ?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
		  	<?php endif; ?>
		    <table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Jurusan</th>
			      <th scope="col">No HP</th>
			      <th scope="col">Email</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $angka = 1; ?>
			  	<?php foreach( $siswa as $s ) : ?>
			    <tr>
			      <th scope="row"><?= $angka ?></th>
			      <td class="kapital" ><?= $s['nama']; ?></td>
			      <td class="kapital" ><?= $s['jurusan']; ?></td>
			      <td><?= $s['no_hp']; ?></td>
			      <td><?= $s['email']; ?></td>
			      <td>
			      	<a href="<?= base_url('siswa/edit/') . $s['id'] ?>" class="badge badge-primary mr-1">Edit</a>
			      	<a href="<?= base_url('siswa/hapus/') . $s['id'] ?>" onclick="return confirm('Datanya mau dihapus?')" class="badge badge-danger">Hapus</a>
			      </td>
			    </tr>
			    <?php $angka++; ?>
				<?php endforeach; ?>
			  </tbody>
			</table>
			<?php if( empty($siswa) ) : ?>
				<div class="alert alert-danger" role="alert">
				  Data tidak ditemukan :(
				</div>
			<?php endif; ?>
		  </div>
		</div>
	</div>


