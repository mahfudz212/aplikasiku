<div class="col-12 mt-5">
                                <div class="card">
                               
                                    <div class="card-body">
                                        <h4 class="header-title">Tambah kelas</h4>
                                        <?php echo form_open('Admin/simpan_kelas');?>
                                            <div class="form-group">
                                                <label for="kk">kode kelas</label>

                                                <?php echo form_input("kode_kelas", set_value('kode_kelas'), array
                                                ('class'=>'form-control','id'=>'kk',
                                                'placeholder'=>'isi kode kelas')); ?>
                                                <small class="text-danger">
                                                <?php echo form_error('kode_kelas',' ');?>
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="nk">nama kelas</label>

                                                <?php echo form_input("nama_kelas",set_value('nama_kelas'), array
                                                ('class'=>'form-control','id'=>'nk',
                                                'placeholder'=>'isi nama kelas')); ?>
                                                 <small class="text-danger">
                                                <?php echo form_error('nama_kelas',' ');?>
                                                </small>
                                            </div>
                                        
                                            <?php echo form_submit('save','SIMPAN',array('class'=>'btn btn-primary mt-4 pr-4 pl-4'))?>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>

</div>