<div class="container bg-card-login">
    <div class="row justify-content-center align-middle">
        <div class="col-6 in-card">
            <h1 class="display-4 login-title text-center mb-5">
                Administrator
            </h1>
            <div class="container">
                <form action="<?= BASEURL; ?>login/validate_login" method="post">
                    <div class="form-group">
                        <label for="username_admin" class="form-label">Username</label>
                        <input type="text" class="form-control input-login" id="username_admin" aria-describedby="emailHelp" required="true" name="username_admin" autofocus="true">
                    </div>
                    <div class="form-group">
                        <label for="password_admin" class="form-label">Password</label>
                        <input type="password" class="form-control input-login" id="password_admin" required="true" name="password_admin">
                    </div>
                    <button class="btn btn-success btn-block mt-5 btn-login" name="btnLoginAdmin" value="" type="submit">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

</div>