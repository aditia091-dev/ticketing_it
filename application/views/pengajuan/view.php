<section class="content-header">
    <h1>
        Pengajuan Inventaris Baru
        <small> Pengajuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Pengajuan</a></li>
        <li class="active">Pengajuan</li>
    </ol>
</section>
<script src="<?php echo base_url('assets/js/plugins/datatables/jquery-1.11.3.min.js'); ?>"></script>
    <script>
    $(document).ready(function(){ 
		$.fn.dataTable.ext.errMode = 'throw'; 
        $('#tb-stok').dataTable( {                  
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
        "ajax": "<?php echo base_url('pengajuan/view_data');?>",
        "columns": [
                { "mData": "no" },
                { "width":"12%","mData": "no_pengajuan" },
                { "mData": "jenis" }, 
                { "mData": "tanggal" }, 
                { "mData": "jenis_inv" },                           
                { "mData": "nama" },
                { "mData": "jenis_kel" },
                { "mData": "jabatan" },                           
                { "mData": "departemen" },  
                { "mData": "email" }, 
                { "mData": "no_hp" },                                          
                { "className": "dt-center","mData": "status" },                
                { "mData": "aksi" },  
                ]
            } );
        });
</script>
<section class="content">   
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">                
                <div class="box-body table-responsive">
                    <table id="tb-stok" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No Pengajuan</th>
                                <th>Pengajuan</th>
                                <th>Tanggal</th>
                                <th>Jenis Inventory</th>
                                <th>Nama Pemohon</th>
                                <th>Gender</th>
                                <th>Departemen</th>
                                <th>Jabatan</th>
                                <th>Email</th>                                                               
                                <th>No Hp</th>
                                <th style="text-align:center">Status</th> 
                                <th>Aksi</th>                                                                                          
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
