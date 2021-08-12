<!-- ======= Intro Section ======= -->
<!-- <section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active" style="background-image: url(assets/dashboard/assets/img/intro-carousel/1.jpg)">
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
                                                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                                            </div>
                                                            <form method="POST" action="<?= base_url('auth/registrasi'); ?>" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                                                                    <?= form_error('name', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                                </div>

                                                                <div class=" form-group">
                                                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                                                    <?= form_error('email', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="file" class="form-control" id="foto" name="foto">
                                                                    <div class="invalid-feedback"></div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                                                        <?= form_error('password1', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                                                    </div>
                                                                </div>


                                                                <button type="submit" name="simpan" class="btn btn-primary btn-user btn-block">
                                                                    Register Account
                                                                </button>

                                                            </form>
                                                            <hr>

                                                            <div class="text-center">
                                                                <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
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
        </div>
</section> -->

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Registrasi</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Register</h2>
                    <form method="POST" action="<?= base_url('auth/registrasi'); ?>" enctype="multipart/form-data">
                         <div class="group-input">
                            <label for="username"> NIK *</label>
                            <input type="text" class="form-control form-control-user" id="no_identitas" name="no_identitas" value="<?= set_value('no_identitas'); ?>">
                            <?= form_error('no_identitas', '<small class="text-danger pl-3" > ', '</small>'); ?>
                        </div>
                        <div class="group-input">
                            <label for="username"> Nama lengkap *</label>
                            <input type="text" class="form-control form-control-user" id="name" name="name" value="<?= set_value('name'); ?>">
                            <?= form_error('name', '<small class="text-danger pl-3" > ', '</small>'); ?>
                        </div>
                        <div class="group-input">
                            <label for="pass">Username or email address *</label>
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger pl-3" > ', '</small>'); ?>
                        </div>
                        <div class="group-input">
                            <label for="con-pass">Foto *</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            <?= form_error('foto', '<small class="text-danger pl-3" > ', '</small>'); ?>
                            <div class="invalid-feedback"></div>

                        </div>
                        <div class="group-input ">
                            <label for="con-pass">Password *</label>
                            <input type="password" class="form-control form-control-user" id="password1" name="password1">
                            <?= form_error('password1', '<small class="text-danger pl-3" > ', '</small>'); ?>
                           
                        </div>
                        <div class="group-input ">
                            <label for="con-pass">Confirm Password *</label>
                            <input type="password" class="form-control form-control-user" id="password2" name="password2">
                        </div>
                          <input type="checkbox" name="cekbox" id="cekbox" class="form-checkbox"> Show password
                        <div class="group-input gi-check">
                            <div class="gi-more">
                             
                            </div>
                        </div>
                        <button type="submit" name="simpan" class="site-btn register-btn">REGISTER</button>
                    </form>
                    <div class="switch-login">
                        <a href="<?= base_url('auth'); ?>" class=" or-login">Or Login</a>
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
				$('#password1').attr('type','text');
					$('#password2').attr('type','text');
			}else{
				$('#password1').attr('type','password');
					$('#password2').attr('type','password');
			}
		});
	});
</script>