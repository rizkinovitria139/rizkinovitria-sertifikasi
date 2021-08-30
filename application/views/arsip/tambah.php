<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <div class="container ml-4">
        <h1>Arsip Surat >> Unggah</h1>
        <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
            Catatan: <br>
            &nbsp; &nbsp;Gunakan file berformat PDF
        </p>
    </div>

    <div class="row ml-5 mt-5">
        <div class="col-lg-8">
            <?php echo form_open_multipart('arsip/tambah') ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputArsip" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_surat" name="no_surat" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputArsip" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kategori" id="kategori">
                            <option value="Undangan">Undangan</option>
                            <option value="Pengumuman">Pengumuman</option>
                            <option value="Nota Dinas">Nota Dinas</option>
                            <option value="Pemberitahuan">Pemberitahuan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputArsip" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputArsip" class="col-sm-2 col-form-label">File Surat (PDF)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="file_surat" name="file_surat">
                    </div>
                </div>

                <a class="btn btn-warning mb-3" href="<?= base_url('arsip') ?>">
                    << Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <?php echo form_close(); ?>
        </div>
    </div>