<div class="container bg-card-login">
    <div class="row">
        <div class="col-md-6 in-card">
            <h1 class="display-4 login-title text-center mb-5">
                Registrasi
            </h1>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php Flasher::flash(); ?>
                    </div>
                </div>
                <form action="<?= BASEURL; ?>login/tambah_user" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_user" class="form-label">Nama</label>
                                <input type="text" class="form-control input-login" id="nama_user" name="nama_user" value="" required="true">
                            </div>
                            <div class="form-group">
                                <label for="email_user" class="form-label">Email</label>
                                <input type="email" class="form-control input-login" id="email_user" name="email_user" value="" required="true">
                            </div>
                            <div class="form-group">
                                <label for="hp_user" class="form-label">Nomor Handphone</label>
                                <input type="tel" class="form-control input-login" id="hp_user" name="hp_user" aria-describedby="hp_userHelp" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}" required="true">
                                <small id="hp_userHelp" class="form-text text-muted">Contoh : 081-889-990-098</small>
                            </div>
                            <div class="form-group">
                                <label for="tgllahir_user" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control input-login" id="tgllahir_user" name="tgllahir_user" value="">
                            </div>
                            <div class="form-group">
                                <label for="username_user" class="form-label">Username Pengguna</label>
                                <input type="text" class="form-control input-login" id="username_user" name="username_user" required="true">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="password_user" class="form-label">Password Pengguna</label>
                                    <input type="password" class="form-control input-login" id="password_user" name="password_user" required="true">
                                </div>
                                <div class="form-group col-6">
                                    <label for="repeat_password_user" class="form-label">Ulangi Password Pengguna</label>
                                    <input type="password" class="form-control input-login" id="repeat_password_user" name="repeat_password_user" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat_user" class="form-label">Alamat</label>
                                <textarea class="form-control input-login" id="alamat_user" rows="6" name="alamat_user"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success btn-block mt-3 btn-login" name="btnRegisterUser" value="" id="btnRegisterUser">
                                Registrasi
                            </button>
                            <p class="text-center  mt-3">
                                <a href="<?= BASEURL; ?>login/" class="text-createaccount">
                                    Sudah punya akun? Login di sini!
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 pict-card in-card">
            <img src="<?= BASEURL; ?>img/register.jpg" alt="Gambar Register" class="img-portrait">
        </div>
    </div>
</div>