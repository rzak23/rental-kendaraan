<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= site_url('login') ?>" class="h1">
                <b>Rental Kendaraan</b>
            </a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">
                <?= $this->session->flashdata('msg') ?>
            </p>

            <?= form_open('login') ?>
                <label for="email" class="d-none"></label>
                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email" autocomplete="off" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <label for="pass" class="d-none"></label>
                <?= form_error('pass', '<small class="text-danger">', '</small>') ?>
                <div class="input-group mb-3">
                    <input name="pass" type="password" class="form-control" id="pass" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
<!--                    <div class="col-8">-->
<!--                        <div class="icheck-primary">-->
<!--                            <input type="checkbox" id="remember">-->
<!--                            <label for="remember">-->
<!--                                Remember Me-->
<!--                            </label>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            <?= form_close() ?>

            <hr>

            <div class="social-auth-links text-center mt-2 mb-3">
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fas fa-edit"></i> Daftar Member
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fas fa-question-circle"></i> Lupa Password
                </a>
            </div>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->