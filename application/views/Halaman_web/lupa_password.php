<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Login</span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Lupa Password</h2>
                    <?= $this->session->flashdata('message'); ?>

                    <form class="user" method="POST" action="<?= base_url('auth/lupapassword'); ?>">
                        <div class="group-input">
                            <label for="username">Username or email address *</label>
                            <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger pl-3" > ', '</small>'); ?>
                        </div>

                        <button type="submit" class="site-btn login-btn">Reset Password</button>
                    </form>
                    <div class="switch-login">
                        <a href="<?= base_url('auth/'); ?>" class="or-login">Kembali ke login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>