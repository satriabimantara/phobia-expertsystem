<div class="alert alert-primary" role="alert">
    <h4 class="alert-heading">Daftar Fobia</h4>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped" id="table_fobia">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama Umum</th>
                        <th scope="col">Nama Medis</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Penyembuhan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($data['fobia'] as $index => $fobia) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= $fobia['namaumum_fobia'] ?></td>
                            <td><?= $fobia['namamedis_fobia'] ?></td>
                            <td><?= $fobia['deskripsi_fobia'] ?></td>
                            <td><?= $fobia['solusi_fobia'] ?></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-warning btn-sm btn-ubahFobia" title="Edit Fobia" data-toggle="modal" data-target="#modalFobia" data-id="<?= $fobia['id_fobia'] ?>">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <a class="btn btn-danger btn-sm" href="<?= BASEURL; ?>fobia/hapus/<?= $fobia['id_fobia'] ?>" onclick="return confirm('Hapus Data Fobia ini?');" title="Hapus Fobia">
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

<!-- Modal for Fobia -->
<form action="<?= BASEURL; ?>fobia/tambah" method="post" id="formFobia">
    <div class="modal fade" id="modalFobia" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalFobiaTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFobiaTitle">Tambah Fobia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_fobia" id="id_fobia" value="">
                    <div class="form-group">
                        <label for="namaumum_fobia">Nama Umum</label>
                        <input type="text" class="form-control" id="namaumum_fobia" placeholder="Fobia Laba-laba" name="namaumum_fobia" required="true">
                    </div>
                    <div class="form-group">
                        <label for="namamedis_fobia">Nama Medis</label>
                        <input type="text" class="form-control" id="namamedis_fobia" placeholder="Arachnophobia" name="namamedis_fobia" required="true">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_fobia">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi_fobia" rows="5" name="deskripsi_fobia"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="solusi_fobia">Saran Penyembuhan</label>
                        <textarea class="form-control" id="solusi_fobia" rows="6" name="solusi_fobia" required="true"></textarea>
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