<div class="alert alert-warning d-flex justify-content-between" role="alert">
    <h4 class="alert-heading">Tipe Gejala</h4>
    <button class="btn btn-transparent btn-tambahTipeGejala" data-toggle="modal" data-target="#modalTipeGejala" role="button">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Tambah Tipe Gejala
    </button>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped" id="table_daftargejala">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama Gejala</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['tipe_gejala'] as $index => $tipegejala) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= $tipegejala['nama_tipegejala'] ?></td>
                            <td><?= $tipegejala['deskripsi_tipegejala'] ?></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-warning btn-sm btn-ubahTipeGejala" title="Edit Tipe Gejala" data-toggle="modal" data-target="#modalTipeGejala" data-id="<?= $tipegejala['id_tipegejala'] ?>">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <a class="btn btn-danger btn-sm" href="<?= BASEURL; ?>gejala/hapus_tipegejala/<?= $tipegejala['id_tipegejala'] ?>" onclick="return confirm('Hapus Data Tipe Gejala ini?');" title="Hapus Tipe Gejala">
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

<!-- Modal for tipe gejala -->
<form action="<?= BASEURL; ?>gejala/tambah_tipegejala" method="post" id="formTipeGejala">
    <div class="modal fade" id="modalTipeGejala" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalTipeGejalaTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTipeGejalaTitle">Tambah Tipe Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_tipegejala" id="id_tipegejala" value="">
                    <div class="form-group">
                        <label for="nama_tipegejala">Nama Tipe Gejala</label>
                        <input type="text" class="form-control" id="nama_tipegejala" placeholder="Gejala Emosional" name="nama_tipegejala" required="true">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_tipegejala">Deskripsi Tipe</label>
                        <textarea class="form-control" id="deskripsi_tipegejala" rows="6" name="deskripsi_tipegejala"></textarea>
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