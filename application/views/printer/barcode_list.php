<section class="content-header">
    <h1>
        Data Printer
        <small>Inventaris Printer</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Inventaris</a></li>
        <li class="active">printer</li>
    </ol>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $("input[name='checkAll']").click(function () {
            var checked = $(this).attr("checked");
            $("#myTable tr td input:checkbox").attr("checked", checked);
        });
    });
    function toggle(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>  
                <div class='box-header with-border'>                
                    <div class="col-md-4">
                        <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('printer/barcode'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                        ?>
                                        <a href="<?php echo site_url('printer/barcode'); ?>" class="btn btn-default">Reset</a>
                                        <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <form action="<?php echo site_url('printer/pdf_barcode'); ?>"  target="_blank" method="post">
                    <div class='box-body table-responsive'>
                        <table class="table table-bordered table-striped" id="mytable">                         
                            <tr>
                                <th><input type="checkbox" onclick="toggle(this);" /></th> 
                                <th>Barcode</th>   
                                <th>Kode Printer</th>
                                <th>Jenis</th>
                                <th>Spesifikasi</th> 
                                <th>Aksi</th> 
                            </tr>
                            <?php
                            foreach ($inv_printer_data as $inv_printer) {
                                $barcode = $inv_printer->barcode;
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="msg[]" value="<?php echo $inv_printer->barcode; ?>"></td>
                                    <td><img width="80" heigth="80" src="<?php echo base_url('barcode/' . $barcode); ?>"></td>
                                    <td><?php echo $inv_printer->kode_printer ?></td>              
                                    <td><?php echo $inv_printer->jenis_printer ?></td>
                                    <td><?php echo $inv_printer->spesifikasi ?></td>                  
                                    <td>
                                        <?php 
                                        echo anchor('printer/get_barcode/' . $inv_printer->kode_printer, '<i class="btn btn-info btn-sm glyphicon glyphicon-barcode" data-toggle="tooltip" title="Generate Barcode"></i>');
                                        ?>
                                    </td>
                                </tr>
                                        <?php
                                    }
                                    ?>
                        </table> 
                        <br>            
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                                <input class="btn btn-primary" type="submit" name="submit" value="Print Barcode">                
                            </div>
                            <div class="col-md-6 text-right">
                                <?php echo $pagination ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
