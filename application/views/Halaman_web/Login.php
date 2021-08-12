<!-- ======= Intro Section ======= -->
<!-- <section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">


                <div class="carousel-container">
                    <div class="container">
                        <div class="container">

                        
                            <div class="row justify-content-center">

                                <div class="col-lg-7">

                                    <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
                                        <div class="card-body p-0">
                                          
                                            <div class="row">
                                                <div class="col-lg">
                                                    <div class="p-5">
                                                        <div class="text-center">
                                                            <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                                                        </div>

                                                        <?= $this->session->flashdata('message'); ?>

                                                        <form class="user" method="POST" action="<?= base_url('Auth'); ?>">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                                                <?= form_error('email', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                                                <?= form_error('password', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                                Login
                                                            </button>


                                                        </form>
                                                        <hr>
                                                        <div class="text-center">
                                                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                                                        </div>
                                                        <div class="text-center">
                                                            <a class="small" href="<?= base_url('Auth/tambah'); ?>">Create an Account!</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>






            </div>
        </div>
</section> -->
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
                    <h2>Login</h2>
                    <?= $this->session->flashdata('message'); ?>

                    <form class="user" method="POST" action="<?= base_url('auth/'); ?>">
                        <div class="group-input">
                            <label for="username">Username or email address *</label>
                            <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger pl-3" > ', '</small>'); ?>
                        </div>
                        <div class="group-input">
                            <label for="pass">Password *</label>
                            <input type="password" class="form-control form-control-user" id="password" name="password">
                            <?= form_error('password', '<small class="text-danger pl-3" > ', '</small>'); ?>
                          
                        </div>
                          <input type="checkbox" name="cekbox" id="cekbox" class="form-checkbox"> Show password
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <a href="<?= base_url('auth/lupapassword'); ?>" class="forget-pass">Lupa Password?</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Sign In</button>
                    </form>
                    <div class="switch-login">
                        <a href="<?= base_url('auth/tambah'); ?>" class="or-login">Or Create An Account</a>
                    </div>
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
				$('#password').attr('type','text');
			}else{
				$('#password').attr('type','password');
			}
		});
	});
</script>