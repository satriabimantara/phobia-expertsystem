<div class="alert alert-secondary d-flex justify-content-between" role="alert">
    <h4 class="alert-heading">Daftar Administrator</h4>
    <button class="btn btn-transparent btn-tambahAdmin" data-toggle="modal" data-target="#modalAdmin" role="button">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Tambah Administrator
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
            <table class="table table-striped" id="table_daftaradmin">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor Handphone</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($data['daftar_admin'] as $index => $admin) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= $admin['nama_admin'] ?></td>
                            <td><?= $admin['email_admin'] ?></td>
                            <td><?= $admin['hp_admin'] ?></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-warning btn-sm btn-ubahAdmin" title="Edit admin" data-toggle="modal" data-target="#modalAdmin" data-id="<?= $admin['id_admin'] ?>">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <a class="btn btn-danger btn-sm" href="<?= BASEURL; ?>admin/hapus_admin/<?= $admin['id_admin'] ?>" onclick="return confirm('Hapus Data Admin ini?');" title="Hapus Admin">
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
<form action="<?= BASEURL; ?>admin/tambah_admin" method="post" id="formAdmin">
    <div class="modal fade" id="modalAdmin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalAdminTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdminTitle">Tambah Administrator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_admin" id="id_admin" value="" class="form-control">
                    <div class="form-group">
                        <label for="nama_admin">Nama Admin</label>
                        <input type="text" class="form-control" id="nama_admin" name="nama_admin" required="true">
                    </div>
                    <div class="form-group">
                        <label for="email_admin">Email Admin</label>
                        <input type="email" class="form-control" id="email_admin" name="email_admin" required="true">
                    </div>
                    <div class="form-group">
                        <label for="hp_admin">Nomor Handphone</label>
                        <input type="tel" class="form-control" id="hp_admin" name="hp_admin" aria-describedby="hp_adminHelp" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}">
                        <small id="hp_adminHelp" class="form-text text-muted">Contoh : 081-889-990-098</small>
                    </div>
                    <div class="form-group">
                        <label for="username_admin">Username Admin</label>
                        <input type="text" class="form-control" id="username_admin" name="username_admin" required="true">
                    </div>
                    <div class="form-group">
                        <label for="password_admin">Password Admin</label>
                        <input type="password" class="form-control" id="password_admin" name="password_admin" required="true">
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