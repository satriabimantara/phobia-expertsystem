<div class="container bg-card-login">
    <!-- Start Row -->
    <div class="row">
        <!-- Start First COlumn -->
        <div class="col-md-6 pict-card in-card">
            <img src="<?= BASEURL; ?>img/login.jpg" alt="Gambar Login" class="img img-fluid">
        </div>
        <!-- End First Column -->
        <!-- Start Second Column -->
        <div class="col-md-6 in-card">
            <h1 class="display-4 login-title text-center mb-5">
                Signin
            </h1>
            <div class="container">
                <form action="<?= BASEURL; ?>login/validate_login" method="post">
                    <div class="form-group">
                        <label for="username_user" class="form-label">Username</label>
                        <input type="text" class="form-control input-login" id="username_user" value="" name="username_user" required="true" autofocus="true">
                    </div>
                    <div class="form-group">
                        <label for="password_user" class="form-label">Password</label>
                        <input type="password" class="form-control input-login" id="password_user" value="" name="password_user" required="true">
                    </div>
                    <button class="btn btn-success btn-block btn-login mt-5" value="" type="submit" name="btnLogin">
                        Login
                    </button>
                </form>
                <p class="text-center  mt-5">
                    <a href="<?= BASEURL; ?>login/register" class="text-createaccount">
                        Daftar Pengguna Baru
                    </a>
                </p>
            </div>
            <div class="row ">
                <div class="col">
                    <?php Flasher::flash(); ?>
                </div>
            </div>
        </div>
        <!-- End Second Columns -->
    </div>
    <!-- End Row -->
</div>