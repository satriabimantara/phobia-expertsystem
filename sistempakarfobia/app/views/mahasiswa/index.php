<div class="container">
    <div class="row">
        <col-lg-6>
            <?php Flasher::flash(); ?>
        </col-lg-6>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btnTambahMahasiswa" data-toggle="modal" data-target="#modalDataMahasiswa">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>mahasiswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari data mahasiswa" autocomplete="off" name="cari_mhs" id="cari_mhs">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="btnCariMahasiswa">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item ">
                        <?= $mhs['nama'] ?>
                        <a class="badge badge-primary badge-pill float-right ml-1" href="<?= BASEURL; ?>mahasiswa/detail/<?= $mhs['id'] ?>">Detail</a>
                        <a class="badge badge-success badge-pill float-right ml-1 btnUbahMahasiswa" href="<?= BASEURL; ?>mahasiswa/ubah/" data-toggle="modal" data-target="#modalDataMahasiswa" data-id="<?= $mhs['id']; ?>">Ubah</a>
                        <a class="badge badge-danger badge-pill float-right ml-1" href="<?= BASEURL; ?>mahasiswa/hapus/<?= $mhs['id'] ?>" onclick="return confirm('Yakin?');">Hapus</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<form action="<?= BASEURL; ?>mahasiswa/tambah" method="post" id="formMahasiswa">
    <div class="modal fade" id="modalDataMahasiswa" tabindex="-1" aria-labelledby="modal_title_mahasiswa" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title_mahasiswa">Tambah Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Hidden id mahasiswa -->
                    <input type="hidden" name="id_mhs" id="id_mhs">
                    <!-- Nama -->
                    <div class="form-group">
                        <label for="nama_mhs">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="" required="true">
                    </div>
                    <!-- NIM -->
                    <div class="form-group">
                        <label for="nim_mhs">NIM Mahasiswa</label>
                        <input type="number" class="form-control" id="nim_mhs" name="nim_mhs" value="" required="true">
                    </div>
                    <!-- Jurusan -->
                    <div class="form-group">
                        <label for="jurusan_mhs">Jurusan Mahasiswa</label>
                        <select class="form-control" id="jurusan_mhs" required="true" name="jurusan_mhs">
                            <option value="">- Jurusan -</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Antropologi">Antropologi</option>
                        </select>
                    </div>
                    <!-- Angkatan -->
                    <div class="form-group">
                        <label for="angkatan_mhs">Tahun Angkatan</label>
                        <select class="form-control" id="angkatan_mhs" name="angkatan_mhs">
                            <option value="">- Tahun Angkatan -</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </div>
        </div>
    </div>
</form>