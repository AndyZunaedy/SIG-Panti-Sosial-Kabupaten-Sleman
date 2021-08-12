<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-6">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Form Ubah Password</h4>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('admin/index'); ?>">
                                            <i class="icofont icofont-home"></i>Dashboard
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/ubah_password'); ?>">Ubah Password</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Row start -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Form Ubah Password</h5>
                                </div>
                                <div class="col-lg-8">
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                                <div class="card-body">

                                    <form method="POST" action="<?= base_url('admin/ubah_password'); ?>" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-7">
                                                <label for="current_password">Password Lama</label>
                                                <input type="password" class="form-control " id="current_password" name="current_password">
                                                <?= form_error('current_password', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="new_password1">Password Baru</label>
                                                <input type="password" class="form-control " id="new_password1" name="new_password1">
                                                <?= form_error('new_password1', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="new_password2">Password Baru</label>
                                                <input type="password" class="form-control " id="new_password2" name="new_password2">
                                                <?= form_error('new_password2', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>

                                        </div>
                                          <input type="checkbox" name="cekbox" id="cekbox" class="form-checkbox"> Show password
                                           <br>
                                           <br>
                                        <div class="form-row ">

                                            <div class="form-group col-md-10">
                                                <input class="btn btn-success" type="submit" name="simpan" value="Ubah Password" />

                                                <a class="btn btn-success" href="<?php echo site_url('admin') ?>" role="button">Kembali</a>

                                            </div>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                        <!-- Single Open Accordion ends -->
                    </div>
                    <!-- Row end -->
                    <!-- Row start -->

                    <!-- Row end -->
                </div>
                <!-- Page-body end -->
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
				$('#new_password1').attr('type','text');
					$('#new_password2').attr('type','text');
					$('#current_password').attr('type','text');
			}else{
				$('#new_password1').attr('type','password');
					$('#new_password2').attr('type','password');
					$('#current_password').attr('type','password');
			}
		});
	});
</script>