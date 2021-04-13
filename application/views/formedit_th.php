<div class="col-12 mt-5">
                                <div class="card">
                             
                                    <div class="card-body">
                                        <h4 class="header-title">Edit Tahun ajaran</h4>
                                        <?php echo form_open('Admin/edit_th');?>
                                        <?php echo form_hidden('id',$ta->id_tahun_ajaran);?>
                                            <div class="form-group">
                                                <label for="th">Tahun Ajaran</label>

                                                <?php echo form_input("th",$ta->tahun_ajaran, array
                                                ('class'=>'form-control','id'=>'th',
                                                'placeholder'=>'isi tahun ajaran')); ?>
                                            </div>
                                        
                                            <?php echo form_submit('edit','EDIT',array('class'=>'btn btn-primary mt-4 pr-4 pl-4'))?>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>

</div>