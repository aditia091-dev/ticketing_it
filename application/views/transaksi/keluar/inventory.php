<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $(".combobox").combobox();
    });
</script>
<section class="content-header">
    <h1>
        Tambah
        <small>Inventaris Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Inventaris</a></li>
        <li class="active">Barang</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                <div class="col-md-5">
                <?php
                    echo form_open('keluar/add_inv');
                ?>                   
                    <div class="box-body">                        
                        <div class="form-group">
                            <label>Jenis Inventory</label>
                            <?= form_dropdown('jns_inv',[''=>'Kategori Non Inventory','Laptop' => 'Laptop','Komputer'=>'Komputer','Monitor'=>'Monitor','Printer'=>'Printer','Network Device'=>'Network Device'],$data->nama_kategori, 'class="form-control" id="kategori"');?>
                            <?php echo '<div class="text-red">'.$this->session->flashdata('error').'</div>'; ?>
                        </div>
                        <div class="form-group">
                            <label for="example">Merek Barang</label>
                            <input type="text" name="merek" class="form-control" value="<?= $data->merek_barang;?>" required oninvalid="setCustomValidity('Merek/brand Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="ex : ASUS, LENOVO" >
                                   <?php echo form_error('merek', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Spesifikasi</label>
                            <textarea name="spesifikasi" class="form-control" rows="3" required oninvalid="setCustomValidity('Spesifikasi Laptop Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Spesifikasi"><?= $data->spesifikasi?></textarea>
                            <?php echo form_error('spek', '<div class="text-red">', '</div>'); ?>
                        </div>     
                        <div class="form-group">
                            <label>Pengguna Laptop</label>
                            <select name="pengguna" class="combobox form-control" id="dept">
                            <option value='' selected="selected">- Pilih Pengguna -</option>
                                <?php
                                if (!empty($pengguna)) {
                                    foreach ($pengguna as $row) {
                                        echo "<option value=".$row->id_pengguna.">".strtoupper($row->nama_pengguna)."</option>";                                        
                                    }
                                }
                                ?>
                            </select> 
                            <?php echo form_error('pengguna', '<div class="text-red">', '</div>'); ?>                           
                        </div>    
                        
                        <div class="form-group">
                            <label>Tgl. Inventaris</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>                              
                                 <input type="text" name="tgl_inv" class="form-control datepicker" value="<?=$data->tgl_transaksi;?>"  data-date-format="yyyy-mm-dd" required oninvalid="setCustomValidity('Tgl. Inventaris harus di isi')"
                                   oninput="setCustomValidity('')" placeholder="yyyy-mm-dd" >
                            
                            </div><!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label for="example">Harga Beli</label>
                            <input type="number" name="harga" class="form-control"  value="<?=$data->harga;?>" required oninvalid="setCustomValidity('Harga Beli Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Harga Beli Laptop" >
                                   <?php echo form_error('harga', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3" required oninvalid="setCustomValidity('Keterangan Inventory')"
                                   oninput="setCustomValidity('')" placeholder="Keterangan"></textarea>
                            <?php echo form_error('keterangan', '<div class="text-red">', '</div>'); ?>
                        </div>  
                                                
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$data->id_trans_detail;?>">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
