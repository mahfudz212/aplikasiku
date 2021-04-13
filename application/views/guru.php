
  <!-- Progress Table start -->
    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">
                                <?php echo anchor('Admin/tambah_guru','Tambah Data guru',array('class' =>'btn btn-danger mb-3 fa fa-database'));?>
                                </h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center" id="guru">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">NO</th>
                                                    <th scope="col">NIP</th>
                                                    <th scope="col">Nama guru</th>
                                                    <th scope="col">jenis kelamin</th>
                                                    <th scope="col">foto</th>
                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no=1;
                                            foreach($gr->result_object()  as $r) {
                                                  # code...
                                             
                                            ?>
                                                <tr>
                                                    <th scope="row"><?=$no?></th>
                                                    <td><?=$r->nip?></td>
                                                    <td><?=$r->nama_guru?></td>
                                                    <td>
                                                    <?php
                                                        if($r->jk_guru=='L'){
                                                            $jk="laki-laki";
                                                        }else{
                                                           $jk="perempuan";
                                                        
                                                        }
                                                        echo$jk
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php
                                                      if (!$r->foto_guru) {
                                                          ?>
                                                           <img src="<?=base_url('assets/guru/mahfudz.jpg')?>" alt="" width="50">
                                                          <?php
                                                      } else {
                                                          ?>
                                                        <img src="<?=base_url('assets/guru/'.$r->foto_guru)?>" alt="" width="50">
                                                        <?php
                                                      }
                                                      
                                                    ?>
                                                    </td>
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="<?=base_url('Admin/formedit_guru/'.$r->id_guru)?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                            <li><a href="<?=base_url('Admin/hapus_guru/'.$r->id_guru)?>" class="text-danger" onclick="return confirm('apakah data guru mau dihapus?')"><i class="ti-trash"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no++;
                                         }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Progress Table end -->


</div>