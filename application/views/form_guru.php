<div class="col-12 mt-5">
                                <div class="card">
                               
                                    <div class="card-body">
                                        <h4 class="header-title">Form guru</h4>
                                        <?php echo form_open_multipart('Admin/simpan_guru');?>
                                            <div class="form-group">
                                                <label for="nip">NIP</label>

                                                <?php echo form_input("nip", set_value('nip'), array
                                                ('class'=>'form-control','id'=>'nip',
                                                'placeholder'=>'isi nip')); ?>
                                                <small class="text-danger">
                                                <?php echo form_error('nip',' ');?>
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="ng">nama guru</label>
                                                <?php echo form_input("nama_guru",set_value('nama_guru'), array
                                                ('class'=>'form-control','id'=>'nk',
                                                'placeholder'=>'isi nama guru')); ?>
                                                 <small class="text-danger">
                                                <?php echo form_error('nama_guru',' ');?>
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="jk">Jenis kelamin</label>
                                                <?php echo form_radio('jk','L','')?>laki-laki
                                                <?php echo form_radio('jk','P','')?>perempuan
                                                 <small class="text-danger"><?php echo $error;?>
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="tlp">Telp guru</label>
                                                <?php echo form_input("tlp_guru",set_value('telp_guru'), array
                                                ('class'=>'form-control','id'=>'telp',
                                                'placeholder'=>'isi telp guru')); ?>
                                                 <small class="text-danger">
                                                <?php echo form_error('telp_guru',' ');?>
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="ng">Alamat Guru</label>
                                                <?php echo form_textarea('alamat_guru',set_value('alamat_guru'),array('class'=>'form-control','placeholder'=>'isi alamat guru'))
                                                ?>
                                                 <small class="text-danger">
                                                <?php echo form_error('alamat_guru',' ');?>
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="ng">Foto Guru</label>
                                                <?php echo form_upload('foto','',array('class'=>'form-control')) ?>
                                                 <small class="text-danger">
                                                <?php echo form_error('alamat_guru',' ');?>
                                                </small>
                                            </div>
                                            <?php echo form_submit('save','SIMPAN',array('class'=>'btn btn-primary mt-4 pr-4 pl-4'))?>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>

</div>