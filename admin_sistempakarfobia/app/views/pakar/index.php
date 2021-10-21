<div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Pakar</h4>
</div>
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped" id="table_pakar">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Spesialis</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor Handphone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['daftar_pakar'] as $index => $pakar) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= $pakar['nama_pakar'] ?></td>
                            <td><?= $pakar['spesialis_pakar'] ?></td>
                            <td><?= $pakar['pendidikan_pakar'] ?></td>
                            <td><?= $pakar['alamat_pakar'] ?></td>
                            <td><?= $pakar['hp_pakar'] ?></td>
                            <td><?= $pakar['email_pakar'] ?></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-warning btn-sm btn-ubahPakar" title="Edit Pakar" data-toggle="modal" data-target="#modalPakar" data-id="<?= $pakar['id_pakar'] ?>">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <a class="btn btn-danger btn-sm" href="<?= BASEURL; ?>pakar/hapus_pakar/<?= $pakar['id_pakar'] ?>" onclick="return confirm('Hapus data pakar ini?');" title="Hapus Pakar">
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

<!-- Modal Pakar-->
<form action="<?= BASEURL; ?>pakar/tambah" method="post" id="formPakar">
    <div class="modal fade" id="modalPakar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalPakarTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPakarTitle">Tambah Pakar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_pakar" id="id_pakar">
                    <div class="form-group">
                        <label for="nama_pakar">Nama Lengkap Pakar</label>
                        <input type="text" class="form-control" id="nama_pakar" name="nama_pakar" aria-describedby="nama_pakarHelp" required="true">
                        <small id="nama_pakarHelp" class="form-text text-muted">Masukkan nama lengkap dengan gelar</small>
                    </div>
                    <div class="form-group">
                        <label for="spesialis_pakar">Spesialis</label>
                        <input type="text" class="form-control" id="spesialis_pakar" name="spesialis_pakar" aria-describedby="spesialis_pakarHelp">
                        <small id="spesialis_pakarHelp" class="form-text text-muted">Misalnya: Spesialis Kejiwaan, Spesialis Psikiater</small>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_pakar">Pendidikan Terakhir Pakar</label>
                        <select class="form-control" id="pendidikan_pakar" name="pendidikan_pakar" required="true">
                            <option value="">-Pendidikan-</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <option value="Profesor">Profesor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hp_pakar">Nomor Handphone</label>
                        <input type="tel" class="form-control" id="hp_pakar" name="hp_pakar" aria-describedby="hp_pakarHelp" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}">
                        <small id="hp_pakarHelp" class="form-text text-muted">Contoh : 081-889-990-098</small>
                    </div>
                    <div class="form-group">
                        <label for="email_pakar">Email</label>
                        <input type="email" class="form-control" id="email_pakar" name="email_pakar" required="true">
                    </div>
                    <div class="form-group">
                        <label for="alamat_pakar">Alamat Pakar</label>
                        <textarea class="form-control" id="alamat_pakar" rows="3" required="true" name="alamat_pakar"></textarea>
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