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
    foreach ($nama as $crud) :




    ?>


        <center>
            <span style="line-height: 1.5; font-size: medium; font-weight: bold;">
                SOSIAL SESAMA
                <br>Ketua Yayasan : <?= $crud->name ?>
                <br><?= $crud->alamat_admin ?>
                <br><?= $crud->email ?>
            </span>
        </center>
        <hr class="new4">

        <div>

            <br>
            <center>
            <?php endforeach; ?>
            <span style="line-height: 2; font-weight: bold;">
                DATA PROFIL
            </span>
            <hr class="new4">
            <div class="table-responsive">
                <table class="table table-hover">
                   
                        <tr>
                            <th>No.</th>
                            <th>Nama Panti</th>
                            <th>Jenis Panti</th>
                            <th>Alamat</th>
                           
                        </tr>
                   
                        <?php $no = 0;
                        foreach ($id_admin as $crud) :
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                               
                                <td><?= $crud->nama_panti ?></td>
                                <td><?= $crud->jenis_panti ?></td>
                                <td><?= $crud->alamat ?></td>
                                

                            </tr>
                        <?php endforeach; ?>
                    
                </table>
            </div>
            </center>
        </div>

        <script type="text/javascript">
            window.print();
        </script>
</body>

</html>