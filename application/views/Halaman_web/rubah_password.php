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
                    <h2>Reset Password For</h2>
                    <?= $this->session->flashdata('message'); ?>

                    <form class="user" method="POST" action="<?= base_url('auth/changepassword'); ?>">
                        <div class="group-input">
                            <label for="username">Masukan Password Baru</label>
                            <input type="password" class="form-control form-control-user" id="password1" name="password1">
                            <?= form_error('password1', '<small class="text-danger pl-3" > ', '</small>'); ?>
                        </div>
                        <div class="group-input">
                            <label for="username">Ulangi Password Baru</label>
                            <input type="password" class="form-control form-control-user" id="password2" name="password2">
                            <?= form_error('password2', '<small class="text-danger pl-3" > ', '</small>'); ?>
                        </div>
                        <input type="checkbox" name="cekbox" id="cekbox" class="form-checkbox"> Show password
                        <button type="submit" class="site-btn login-btn">Ubah Password</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function(){		
		$('#cekbox').click(function(){
			if($(this).is(':checked')){
				$('#password1').attr('type','text');
					$('#password2').attr('type','text');
			}else{
				$('#password1').attr('type','password');
					$('#password2').attr('type','password');
			}
		});
	});
</script>