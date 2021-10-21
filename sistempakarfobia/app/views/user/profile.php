<div class="container content">

    <div class="card service-panel">
        <div class="d-flex justify-content-between card-header">
            <h5 class="">Informasi Profile Pengguna</h5>
            <button class="btn btn-transparent btn-editUser" data-toggle="modal" data-target="#modalUser" role="button">
                <i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp;<strong>Edit Profile</strong>
            </button>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($_SESSION['data_user'] as $key => $value) : ?>
                    <div class="col-lg-4 mb-3">
                        <h5 class="card-title"><?= $key; ?></h5>
                        <p class="card-text"><?= $value; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="card-footer">
            <?php Flasher::flash(); ?>
        </div>
    </div>
</div>

<!-- Modal for edit profile user -->
<form action="<?= BASEURL; ?>user/ubah_user" method="post" id="formUser">
    <div class="modal fade" id="modalUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalUserTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUserTitle">Edit Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['login_user']['id_user']; ?>" class="form-control">
                    <div class="form-group">
                        <label for="nama_user">Nama Pengguna</label>
                        <input type="text" class="form-control" id="nama_user" name="nama_user" required="true" value="<?= $_SESSION['data_user']['Nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email_user">Email Pengguna</label>
                        <input type="email" class="form-control" id="email_user" name="email_user" required="true" value="<?= $_SESSION['data_user']['Email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="hp_user">Nomor Handphone</label>
                        <input type="tel" class="form-control" id="hp_user" name="hp_user" aria-describedby="hp_userHelp" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}" value="<?= $_SESSION['data_user']['Nomor Handphone']; ?>">
                        <small id="hp_userHelp" class="form-text text-muted">Contoh : 081-889-990-098</small>
                    </div>
                    <div class="form-group">
                        <label for="tgllahir_user">Tanggal Lahir Pengguna</label>
                        <input type="date" class="form-control" id="tgllahir_user" name="tgllahir_user" required="true" value="<?= $_SESSION['data_user']['Tanggal Lahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat_user">Alamat Pengguna</label>
                        <textarea class="form-control" id="alamat_user" rows="6" name="alamat_user" required="true"><?= $_SESSION['data_user']['Alamat']; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-info">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>