<div class="alert alert-primary" role="alert">
    <h4 class="alert-heading">User</h4>
</div>
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped" id="table_user">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor Handphone</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['daftar_user'] as $index => $user) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= $user['nama_user'] ?></td>
                            <td><?= $user['email_user'] ?></td>
                            <td><?= $user['hp_user'] ?></td>
                            <td><?= $user['tgllahir_user'] ?></td>
                            <td><?= $user['alamat_user'] ?></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-warning btn-sm btn-ubahUser" title="Edit User" data-toggle="modal" data-target="#modalUser" data-id="<?= $user['id_user'] ?>">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <a class="btn btn-danger btn-sm" href="<?= BASEURL; ?>user/hapus_user/<?= $user['id_user'] ?>" onclick="return confirm('Hapus data user ini?');" title="Hapus User">
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

<!-- Modal user-->
<form action="<?= BASEURL; ?>user/ubah_user" method="post" id="formUser">
    <div class="modal fade" id="modalUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalUserTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUserTitle">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_user" id="id_user">
                    <div class="form-group">
                        <label for="nama_user">Nama Lengkap user</label>
                        <input type="text" class="form-control" id="nama_user" name="nama_user" required="true">
                    </div>
                    <div class="form-group">
                        <label for="email_user">Email</label>
                        <input type="email" class="form-control" id="email_user" name="email_user" required="true">
                    </div>
                    <div class="form-group">
                        <label for="hp_user">Nomor Handphone</label>
                        <input type="tel" class="form-control" id="hp_user" name="hp_user" aria-describedby="hp_userHelp" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}" required="true">
                        <small id="hp_userHelp" class="form-text text-muted">Contoh : 081-889-990-098</small>
                    </div>
                    <div class="form-group">
                        <label for="tgllahir_user">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgllahir_user" name="tgllahir_user" required="true">
                    </div>
                    <div class="form-group">
                        <label for="alamat_user">Alamat user</label>
                        <textarea class="form-control" id="alamat_user" rows="3" required="true" name="alamat_user"></textarea>
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