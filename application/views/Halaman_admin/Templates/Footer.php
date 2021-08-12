<!-- awal modal logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda Yakin Ingin logout?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal logout -->


<script type="text/javascript" src="<?= base_url('assets/'); ?>admin/assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>admin/assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>admin/assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>admin/assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?= base_url('assets/'); ?>admin/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?= base_url('assets/'); ?>admin/assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="<?= base_url('assets/'); ?>admin/assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="<?= base_url('assets/'); ?>admin/assets/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="<?= base_url('assets/'); ?>admin/assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="<?= base_url('assets/'); ?>admin/assets/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>admin/assets/js/script.js"></script>
<script type="text/javascript " src="<?= base_url('assets/'); ?>admin/assets/js/SmoothScroll.js"></script>
<script src="<?= base_url('assets/'); ?>admin/assets/js/pcoded.min.js"></script>
<script src="<?= base_url('assets/'); ?>admin/assets/js/demo-12.js"></script>
<script src="<?= base_url('assets/'); ?>admin/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>



<script src="<?= base_url('assets/'); ?>leaflet/leaflet.js"></script>
<script>
    var $window = $(window);
    var nav = $('.fixed-button');
    $window.scroll(function() {
        if ($window.scrollTop() >= 200) {
            nav.addClass('active');
        } else {
            nav.removeClass('active');
        }
    });
</script>
</body>

</html>