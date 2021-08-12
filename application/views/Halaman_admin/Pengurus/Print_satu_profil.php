<style>
    hr.new4 {
        border: 1px solid black;
    }
</style>
<html>

<head>
    <title><?= $title; ?></title>
    <link rel="icon" href="<?= base_url('assets/'); ?>admin/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>admin/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>admin/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>admin/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>admin/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>admin/assets/css/jquery.mCustomScrollbar.css">
</head>

<body>

    <?php foreach ($id_profil as $crud) :
        $id_penghni = $crud->id_profil;

        $nama_panti = $crud->nama_panti;

    ?>

        <center>
            <span style="line-height: 2; font-weight: bold;">
                SOSIAL SESAMA
                <br> <?php echo  $nama_panti ?>
                <br><?= $crud->alamat ?>,<?= $crud->telpon ?>
                <br><?= $crud->email ?>
            </span>
        </center>
        <hr class="new4">

        <div>
            <center>
                <div> <img src="<?= base_url() ?>application/upload/panti/profil/<?= $crud->foto_p ?>" width="350px" height="200px"></div>
            </center>
            <br>
            <center>
                <span style="line-height: 2; font-weight: bold;">
                    PROFIL
                </span>
                <hr class="new4">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nomor Izin</th>
                                <th>Nama Ketua Yayasan</th>
                                <th>Nama Panti</th>
                                <th>Jenis Panti</th>
                                <th>Alamat</th>
                                <th>No Telpon</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $crud->nomor_izin ?></td>
                                <td><?= $crud->name ?></td>
                                <td><?= $crud->nama_panti ?></td>
                                <td><?= $crud->jenis_panti ?></td>
                                <td><?= $crud->alamat ?></td>
                                <td><?= $crud->telpon ?></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </center>
        </div>
    <?php endforeach; ?>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>