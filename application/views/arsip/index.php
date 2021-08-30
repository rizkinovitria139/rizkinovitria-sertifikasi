		<!-- Begin Page Content -->
		<div class="container-fluid mt-5">

			<div class="container ml-4">
				<h1>Arsip Surat</h1>
				<p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
					Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
			</div>

			<div class="container mt-5">
				<table>
					<tr>
						<?= $this->session->flashdata('pesan') ?>
					</tr>
					<tr>
						<td width='100'>
							<h5>Cari surat</h5>
						</td>
						<td width='800'>
							<div class="input-group rounded">
								<input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
								<span class="input-group-text border-0" id="search-addon">
									<i class="fas fa-search"></i>
								</span>
							</div>
						</td>
					</tr>
				</table>
			</div>

			<div class="container mt-3">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Nomor Surat</th>
							<th scope="col">Kategori</th>
							<th scope="col">Judul</th>
							<th scope="col">Waktu Pengarsipan</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
					<tbody>
						<?php foreach ($arsip as $a) : ?>
							<tr>
								<td><?= $a['no_surat']; ?></td>
								<td><?= $a['kategori']; ?></td>
								<td><?= $a['judul']; ?></td>
								<td><?= $a['waktu_pengarsipan']; ?></td>
								<td>
									<a class="btn btn-danger" href="<?= base_url('arsip/delete_arsip/') . $a['id']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
										Hapus
									</a>
									<button type="button" class="btn btn-warning btn-icon" href="" data-toggle="modal" data-target="#editarsipModal<?= $a['id']; ?>">
										Unduh
									</button>
									<button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editarsipModal<?= $a['id']; ?>">
										Lihat>>
									</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
					<a class="btn btn-warning mb-3" href="<?= base_url('arsip/tambah') ?>">Tambah Arsip</a>

			</div>
		</div>