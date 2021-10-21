<div class="alert alert-secondary d-flex justify-content-between" role="alert">
    <h4 class="alert-heading">Daftar Gejala</h4>
    <button class="btn btn-transparent btn-tambahGejala" data-toggle="modal" data-target="#modalGejala" role="button">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Tambah Gejala
    </button>
</div>
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped" id="table_daftargejala">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Nama Gejala</th>
                        <th scope="col">Pertanyaan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['gejala'] as $index => $gejala) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= $gejala['kode_gejala'] ?></td>
                            <td><?= $gejala['nama_tipegejala'] ?></td>
                            <td><?= $gejala['nama_gejala'] ?></td>
                            <td><?= $gejala['pertanyaan_gejala'] ?></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-warning btn-sm btn-ubahGejala" title="Edit Gejala" data-toggle="modal" data-target="#modalGejala" data-id="<?= $gejala['id_gejala'] ?>">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <a class="btn btn-danger btn-sm" href="<?= BASEURL; ?>gejala/hapus_gejala/<?= $gejala['id_gejala'] ?>" onclick="return confirm('Hapus Data Gejala ini?');" title="Hapus Gejala">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for daftar gejala -->
<form action="<?= BASEURL; ?>gejala/tambah_gejala" method="post" id="formGejala">
    <div class="modal fade" id="modalGejala" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalGejalaTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGejalaTitle">Tambah Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_gejala" id="id_gejala" value="" class="form-control">
                    <div class="form-group">
                        <label for="kode_gejala">Kode Gejala</label>
                        <input type="text" class="form-control" id="kode_gejala" aria-describedby="kode_gejalaHelp" maxlength="6" name="kode_gejala" required="true">
                        <small id="kode_gejalaHelp" class="form-text text-muted">GE: Gejala Emosional, GF: Gejala Fisik, GP: Gejala Perubahan Perilaku</small>
                    </div>
                    <div class="form-group">
                        <label for="nama_gejala">Gejala</label>
                        <textarea class="form-control" id="nama_gejala" rows="6" name="nama_gejala" required="true"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pertanyaan_gejala">Pertanyaan Gejala</label>
                        <textarea class="form-control" id="pertanyaan_gejala" rows="6" name="pertanyaan_gejala" required="true"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_tipegejala">Kategori Gejala</label>
                        <select class="form-control" id="id_tipegejala" name="id_tipegejala" required=true>
                            <option value="">-Kategori-</option>
                            <?php foreach ($data['tipegejala'] as $index => $tipegejala) : ?>
                                <option value="<?= $tipegejala['id_tipegejala']; ?>"><?= $tipegejala['nama_tipegejala'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>