<section class="content-header">
    <h1>
        Maintenance
        <small>Data Maintenance Inventory</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Transaksi</a></li>
        <li class="active">Maintenance</li>
    </ol>
</section>
<script src="<?php echo base_url('assets/js/plugins/datatables/jquery-1.11.3.min.js'); ?>"></script>
    <script>
    $(document).ready(function(){ 
		$.fn.dataTable.ext.errMode = 'throw'; 
        $('#mytable').dataTable( {                  
        "Processing": true, 
        "ServerSide": true,
        "iDisplayLength": 25,
        "oLanguage": {
                    "sSearch": "Search Data :  ",
                    "sZeroRecords": "No records to display",
                    "sEmptyTable": "No data available in table"
                    },
        "dom": 'Bfrtip',
        "select": true,
        "buttons": [
            {
                "extend": 'collection',
                "text": 'Export',
                "buttons": [
                    'copy',
                    'excel',
                    'pdf',
                    'print',
                ]
            }
            ],
        "ajax": "<?php echo base_url('maintenance/view_data');?>",
        "columns": [
                { "mData": "no" },
                { "width":"12%","mData": "no_permohonan" },
                { "mData": "no_inventaris" },
                { "mData": "nama_kategori" },
                { "width":"12%","mData": "tgl_permohonan" },                           
                { "mData": "jenis_permohonan" }, 
                { "mData": "catatan_pemohon"},
                { "mData": "status" },
                { "mData": "view" },
                { "mData": "cetak" },
            ]
        } );
    });

    function tampil_tanggal() {
        var tglawal = $("#datepicker").val();
        var tglakhir = $("#datepicker1").val();
        if (tglawal==''){
            alert('Tanggal Awal Masih Kosong');
        }else if(tglakhir==''){
            alert('Tanggal Akhir Masih Kosong');
        }else{
            $.fn.dataTable.ext.errMode = 'throw';
            $('#mytable').dataTable({
                "Processing": true,
                "ServerSide": true,
                "iDisplayLength": 25,
                "bDestroy": true,
                "oLanguage": {
                    "sSearch": "Search Data :  ",
                    "sZeroRecords": "No records to display",
                    "sEmptyTable": "No data available in table"
                    },
                "dom": 'Bfrtip',
                "select": true,
                "buttons": [
                    {
                        "extend": 'collection',
                        "text": 'Export',
                        "buttons": [
                            'copy',
                            'excel',
                            'pdf',
                            'print',
                        ],                        
                    }
                ],
                "ajax": {
                    "url": "<?php echo base_url('maintenance/view_tanggal'); ?>",
                    "type": "GET",
                    "data": {                   
                        'tglawal': tglawal,
                        'tglakhir': tglakhir,
                    }
                },
                "columns": [
                    { "mData": "no" },
                    { "width":"12%","mData": "no_permohonan" },
                    { "mData": "no_inventaris" },
                    { "mData": "nama_kategori" },
                    { "width":"12%","mData": "tgl_permohonan" },                           
                    { "mData": "jenis_permohonan" }, 
                    { "mData": "catatan_pemohon"},
                    { "mData": "status" },
                    { "mData": "view" },
                    { "mData": "cetak" },               
                ]
            });
        }       
    }
</script>
<section class="content">   
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class='box-header with-border'>
                    <table class="table">
                        <tr>
                            <td colspan="6">
                                <h3 class='box-title'><a href="<?php echo base_url('maintenance/add'); ?>" class="btn btn-primary btn-small">
                                    <i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                                </h3>
                            <label calss='control-label' > <?php echo $this->session->flashdata('result_hapus'); ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%;vertical-align: middle">Tanggal Maintenance</td>
                            <td style="width:15%">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control " required name="tgl_awal" id="datepicker"
                                           value="" placeholder="Dari tanggal">
                                </div>
                            </td>
                            <td width="1%">s/d</td>
                            <td style="width:15%">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control" required name="tgl_akhir" id="datepicker1"
                                           placeholder="Sampai Tanggal">
                                </div>
                            </td>
                            <td width="10%" style="vertical-align: middle;">
                                <a onclick="tampil_tanggal()" class="btn btn-success" data-toggle="tooltip"
                                   title="View Data"><i class="fa fa-search"> Search</i></a>
                            </td>
                            <td width="25%" style="vertical-align: middle;text-align:right">
                                
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="box-body table-responsive">
                    <table id="mytable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No Permohonan</th>
                                <th>No. Inventaris</th>
                                <th>Jenis Inventaris</th> 
                                <th>Tgl. Permohonan</th>
                                <th>Maintenance Type</th>                                   
                                <th>Catatan Permohonan</th>                           
                                <th>Status</th>   
                                <th>View</th> 
                                <th>Print</th>                             
                            </tr>
                        </thead>
                        <body>

                        </body>
                    </Table> 
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
