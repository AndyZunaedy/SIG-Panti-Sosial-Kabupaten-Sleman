           <!-- Begin Page Content -->

           <section class="ftco-section">
               <div class="container">
                   <div class="row d-flex">
                       <?php foreach ($profil_keyword as $r) { ?>
                           <div class="col-md-6 col-lg-3 ftco-animate">
                               <div class="staff">
                                   <div class="blog-entry align-self-stretch">
                                       <a class="block-20 rounded" style="background-image: url('<?= base_url() . 'application/upload/penghuni/' . $r['foto'] ?>');"></a>
                                       <div class="text pt-3 px-3 pb-4 text-center">
                                           <h3> <?php echo $r['nama'] ?></h3>
                                           <span class="position mb-2"> <?php echo $r['nama_panti']  ?></span>
                                           <div class="faded">
                                               <p>
                                                   <?php echo $r['deskripsi_p']  ?>
                                               </p>

                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       <?php } ?>
                   </div>
                   <div class="row">
                       <div class="col">
                           <?= $pagination ?>
                       </div>
                   </div>
               </div>
           </section>