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
    <?php $no = 0;
    foreach ($print as $crud) :

        $foto = $crud->foto_p;


    ?>

        <img src="<?= base_url() ?>application/upload/panti/profil/<?= $foto ?>" style="position: absolute;" width="60px" height="auto">
        <center>
            <span style="line-height: 1.5; font-size: medium; font-weight: bold;">
                SOSIAL SESAMA
                <br> <?= $crud->nama_panti ?>
                <br><?= $crud->alamat ?>,<?= $crud->telpon ?>
                <br><?= $crud->email ?>
            </span>
        </center>
        <hr class="new4">

        <div>
            <center>
                <div> <img src="<?= base_url() ?>application/upload/panti/profil/<?= $foto ?>" width="350px" height="200px"></div>
            </center>
            <br>
            <center>
            <?php endforeach; ?>
            <span style="line-height: 2; font-weight: bold;">
                DATA PROFIL
            </span>
            <hr class="new4">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Penghuni</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($print1 as $crud) :
                            $id_penghni = $crud->id_penghuni;
                            $foto = $crud->foto_penghuni;
                            $no++;

                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $crud->id_penghuni ?></td>
                                <td><?= $crud->nama_penghuni ?></td>
                                <td><?= $crud->jenis_kelamin ?></td>
                                <td><?= $crud->umur ?></td>
                                <td><?= $crud->deskripsi_p ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </center>
        </div>

        <script type="text/javascript">
            window.print();
        </script>
</body>

</html>