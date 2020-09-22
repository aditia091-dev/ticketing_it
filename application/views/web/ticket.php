<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IT Asset Management</title>
<link href='<?php echo base_url("assets/img/favicon.ico"); ?>' rel='shortcut icon' type='image/x-icon'/>
<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/web/animate.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/web/admin.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.select2').select2();
    $('#form_pengajuan').hide();
    $("#kategori").change(function(){
      load_inv();
    });  

    $('.select2').change(function(){
       var nama = $('option:selected', this).data('nama');
       $('#nama_pengguna').val(nama);
    });

    $('#btn_perbaikan').on('click',function(){
      $('#form_perbaikan').show();
      $('#list-ticketing').show();
      $('#form_pengajuan').hide();
      $('#list-pengajuan').hide();
    });

    $('#btn_pengajuan').on('click',function(){
      $('#form_pengajuan').show();
      $('#list-pengajuan').show();
      $('#form_perbaikan').hide();
      $('#list-ticketing').hide();
    });

    $("#submitBtn").click(function(e){
        pengajuanSubmit();
    });

    loadDataPengajuan();
});

function pengajuanSubmit(){
  var departemen = $('#departemen').val();
  var jabatan = $('#jabatan').val();
  var nama = $('#nama').val();
  var jnskel = $('#jenis_kelamin').val();
  var email = $('#email').val();
  var jenisinv = $('#jenis_inv').val();
  var jenis = $('#jenis_pengajuan').val();
  var lokasi = $('#lokasi').val();
  var hp = $('#no_hp').val();
  if(departemen==''){
    alert('Departemen tidak boleh kosong');
  }else if(jabatan==''){
    alert('Jabatan tidak boleh kosong');
  }else if(nama==''){
    alert('Nama Pemohon tidak boleh kosong');
  }else if(jenisinv==''){
    alert('Jenis Inventory tidak boleh kosong');
  }else if(lokasi==''){
    alert('Lokasi tidak boleh kosong');
  }else if(email==''){
    alert('Email tidak boleh kosong');
  }else{
    $.ajax({
        type:'POST',
        dataType : 'json',
        url:"<?php echo base_url('web/addpengajuan_ajax');?>",
        data:{
          'departemen': departemen,
          'jabatan': jabatan,
          'nama': nama,
          'jnskel': jnskel,
          'email': email,
          'jenisinv': jenisinv,
          'jenis': jenis,
          'lokasi': lokasi,
          'no_hp':hp
        }, 
        success: function(response) {           
          document.getElementById("myForm").reset();
          alert('Berhasil menyimpan pengajuan');
          loadDataPengajuan();     
        }
    });
  }
}

function loadDataPengajuan(){
  $.ajax({
      type:'GET',
      dataType : 'json',
      url:"<?php echo base_url('web/getdatapengajuan');?>",
      success: function(response) { 
        var res = response;
        var str = '';
        var no = 1;
        for(var t in res) {
            if (res[t].status=="Pengajuan"){
                var status='<span class="label label-danger">'+res[t].status+'</span>';
            }else if(res[t].status =="Approved IT"){
                var status='<span class="label label-warning">'+res[t].status+'</span>';
            }else if(res[t].status=="Approved Assmen"){
                var status='<span class="label label-info">'+res[t].status+'</span>';
            }else{
                var status='<span class="label label-success">'+res[t].status+'</span>';
            } 
          
            str += '<tr>'
                + '<td style="text-align:center">'+no++
                + '<td style="text-align:center">'+res[t].tanggal_pengajuan
                + '<td>'+res[t].nama_pemohon
                + '<td>'+res[t].email
                + '<td>'+res[t].no_hp
                + '<td>'+res[t].nama
                + '<td>'+res[t].jenis_inventory
                + '<td>'+res[t].jenis
                + '<td style="text-align:center">'+status
                + '</tr>';           
        }
        $('#view').html(str);   
      }
  });
}

function load_inv(){ 
    var group = $('#group').val();  
    var kategori=$("#kategori").val();
    $.ajax({
        url:"<?php echo base_url('web/tampil_inv');?>",
        data: "kategori=" + kategori+"&group="+group,        
        type  : 'GET',
        success: function(html) { 
           $("#inventaris").html(html);       
        }
    });
}



</script>
</head>
<body class="light_theme  fixed_header left_nav_fixed">
<div class="wrapper">
  <div class="header_bar">   
    <div class="header_top_bar">
      <div class="top_right_bar">
        <div class="top_right">
         <div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url('web');?>">Home</a></li>
				<li><a href="<?php echo base_url('login');?>">Login</a></li>
			</ul>
		</div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="inner">
    <div class="contentpanel">
        <div class="container clear_both padding_fix">
        <div class="row">
          <div class="col-md-5">			     
            <div class="ticket_form">
              <h3><span class="semi-bold">Sumbit New Ticket</span></h3>
              <div class="btn-group"> <a href="javascript:void(0)" class="btn btn-sm ticket_btn" id="btn_perbaikan">Perbaikan</a> </div>
              <div class="btn-group"> <a href="javascript:void(0)" class="btn btn-sm ticket_btn_2" id="btn_pengajuan">Pengajuan PC</a> </div>
              <br><br>
              <fieldset id="form_perbaikan">
                <?php echo form_open_multipart('web/addticket');?> 
                <h4><span class="semi-bold">Inventory Ticket</span></h4>
                <p>Buat Permohonan Perbaikan untuk Inventaris Anda, Masukan Nomer Inventaris dan berikan informasi keluhan anda</p>
                <div class="ticket_option">
                  <div class="form_ticket_subject"> <span class="semi-bold">Group Inventory</span>
                    <div class="input-group ">
                    <select name="group" class="form-control" id="group">                    
                        <?php
                          if (!empty($group)) {
                            foreach ($group as $row) {
                              echo "<option value='$row->gid'>".strtoupper($row->nama_group)."</option>";
                            }
                          }
                        ?>
                      </select>                             
                      <?php echo form_error('group', '<div class="text-red">', '</div>'); ?>
                    </div>
                  </div>              
                  <div class="form_ticket_subject"> <span class="semi-bold">Type Inventory</span>
                    <div class="input-group">
                    <select name="kategori" class="form-control" id="kategori" >  
                        <option value="" selected="selected">- Jenis Inventaris -</option>                 
                        <option value="Laptop">LAPTOP</option> 
                        <option value="Komputer">KOMPUTER</option> 
                        <option value="Monitor">MONITOR</option> 
                        <option value="Printer">PRINTER</option> 
                        <option value="Network">NETWORK DEVICE</option> 
                      </select>                             
                      <?php echo form_error('kategori', '<div class="text-red">', '</div>'); ?>        
                    </div>
                  </div>
                </div>              
                <div class="ticket_option">
                    <div class="form_ticket_subject"><span class="semi-bold">Nama Pemohon</span>
                      <div class="form-group">
                      <select name="inventaris" class="form-control select2" id="inventaris"> 
                          <option value="" selected="selected">- Nama Pemohon-</option>
                        </select>    
                        <input type="hidden" id="nama_pengguna" name="pemohon" >                    
                      </div> 
                      <?php echo form_error('inventaris', '<div class="text-red">', '</div>'); ?>                      
                    </div> 	
                </div>	              	
                <div class="ticket_option"><span class="semi-bold">Your Problem</span>
                  <div class="input-group">
                  <textarea name="catatan" required oninvalid="setCustomValidity('Catatan Pemohon Harus di Isi !')"
                    oninput="setCustomValidity('')" class="form_ticket_question"></textarea>
                  </div>
                  <?php echo form_error('catatan', '<div class="text-red">', '</div>'); ?>
                </div>
                <div class="ticket_option"><span class="semi-bold">File Lampiran</span>
                    <div class="input-group">
                      <input type="file" name="lampiran" id="lampiran">
                      <p class="help-block">Max 2MB,Type file.jpg/.png/.pdf/.doc/.xls/.rar</p>
                    </div>
                </div>
                <div class="btn-group">
                  <button type="submit" name="submit" class="btn ticket_btn">Kirim</button> 
                </div>
              </div>
            </form>
           </fieldset>
           <div class="ticket_form">
           <fieldset id="form_pengajuan">           
              <form id="myForm" >
                <h4><span class="semi-bold">Pengajuan PC/ Laptop</span></h4>
                <p>Buat pengajuan PC atau laptop dengan mengisi form pengajuan yang akan di proses oleh bagian terkait</p>
                <div class="ticket_option">
                  <div class="form_ticket_subject"> <span class="semi-bold">Jenis Pengajuan</span>
                    <div class="input-group ">
                        <select name="jenis_pengajuan" class="form-control" id="jenis_pengajuan">
                          <option value="" selected="selected">- Jenis Pengajuan -</option>                 
                          <option value="Baru">BARU</option> 
                          <option value="Pinjam">PINJAM</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="ticket_option">
                  <div class="form_ticket_subject"> <span class="semi-bold">Departemen</span>
                    <div class="input-group ">
                      <select name="departemen" class="form-control" id="departemen"> 
                        <option value="" selected="selected">- Pilih Departemen -</option>                    
                        <?php
                          if (!empty($departemen)) {
                            foreach ($departemen as $row) {
                              echo "<option value='$row->id_dept'>".strtoupper($row->nama)."</option>";
                            }
                          }
                        ?>
                      </select>                             
                      <?php echo form_error('group', '<div class="text-red">', '</div>'); ?>
                    </div>
                  </div>   
                  <div class="form_ticket_subject"> <span class="semi-bold">Jabatan</span>
                    <div class="input-group">
                        <input type="text" name="jabatan" id="jabatan" class="form-control" required oninvalid="setCustomValidity('Jabatan')" oninput="setCustomValidity('')" placeholder="Jabatan" >    
                    </div>
                  </div> 
                </div>  
                <div class="ticket_option">
                  <div class="form_ticket_subject"> <span class="semi-bold">Nama</span>
                    <div class="input-group ">
                    <input type="text" name="nama" id="nama" class="form-control" required oninvalid="setCustomValidity('Nama')" oninput="setCustomValidity('')" placeholder="Nama Pengguna" >    
                    </div>
                  </div>   
                  <div class="form_ticket_subject"> <span class="semi-bold">Jenis Kelamin</span>
                    <div class="input-group">
                          <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                    </div>
                  </div> 
                </div>   
                <div class="ticket_option">
                  <div class="form_ticket_subject"> <span class="semi-bold">Alamat Email</span>
                    <div class="input-group ">
                    <input type="email" name="email" id="email" class="form-control" required oninvalid="setCustomValidity('email')" oninput="setCustomValidity('')" placeholder="Email" >    
                    </div>
                  </div>   
                  <div class="form_ticket_subject"> <span class="semi-bold">Lokasi Kantor</span>
                    <div class="input-group">
                        <input type="text" name="lokasi" id="lokasi" class="form-control" required oninvalid="setCustomValidity('Lokasi')" oninput="setCustomValidity('')" placeholder="Lokasi Kantor" >    
                    </div>
                  </div> 
                </div>  
                <div class="ticket_option">
                  <div class="form_ticket_subject"> <span class="semi-bold">Jenis Inventory</span>
                    <div class="input-group ">
                        <select name="jenis_inv" class="form-control" id="jenis_inv">
                          <option value="" selected="selected">- Jenis Inventaris -</option>                 
                          <option value="Laptop">LAPTOP</option> 
                          <option value="Komputer">KOMPUTER</option> 
                          <option value="Monitor">MONITOR</option> 
                          <option value="Printer">PRINTER</option> 
                        </select>
                    </div>
                  </div>   
                  <div class="form_ticket_subject"> <span class="semi-bold">No Hp</span>
                    <div class="input-group">
                        <input type="number" name="no_hp" class="form-control" id="no_hp" required oninvalid="setCustomValidity('No HP')" oninput="setCustomValidity('')" placeholder="No HP" >    
                    </div>
                  </div> 
                </div>                 
                <div class="btn-group">
                  <br><br><br>
                  <button type="button" name="submit" id="submitBtn" class="btn ticket_btn">Submit</button> 
                </div>
                </form>
          </fieldset>
          </div>
          </div>
          
          <div class="col-md-7">
            <fieldset id="list-ticketing">
              <div class="ticket_open">
                <div class="ticket_open_heading">
                  <h3 class="pull-left"><span class="semi-bold">Open Ticket</span></h3>
                  <div class="ticket_open_search">                  
                    <div class="input-group pull-left">
                      <input type="text" placeholder="Search Open Ticket ..." class="form-control">
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="ticket_open_grid"><b class="pull-right">Responded 25</b> <span class="ticket_open_grid_progress">Responded</span> </div>
                <?php 
                if ($ticket->num_rows()>0){
                  foreach ($ticket->result() as $key =>$r) {
                    if($r->status=="OPEN"){
                      $status = '<div class="ticket_action_open">'.$r->status.'</div>';
                    }else{
                      $status = '<div class="ticket_action_proses">'.$r->status.'</div>';
                    }
                    echo '
                        <a href="'.site_url('web/openticket/'.$r->no_permohonan).'" class="ticket_open_comment">
                          <div class="btn-group"><i class="fa fa-user"></i></div>
                          <span>'.strtoupper($r->nama_pemohon),' / ',$r->no_inventaris.'</span>                        
                          <p>'.$r->catatan_pemohon.'</p>
                          <div class="ticket_action"> 
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                            '.$status.'
                          </div>                      
                      </a>
                    ';
                  }
                  echo $paging;
                }else{
                  echo'
                    <div class="alert alert-success alert-dismissable">                
                      <h4><i  class="icon fa fa-check"></i> Status Open Ticket Masih Kosong</h4>
                      
                    </div>
                  ';
                }
                ?>
              </div>
              <div class="ticket_open">
                <div class="ticket_open_heading">
                  <h3 class="pull-left"><span class="semi-bold">Closed Ticket</span></h3>
                  <div class="ticket_open_search">
                    <div class="input-group pull-left">
                      <input type="text" class="form-control" placeholder="Search closed Ticket ...">
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                
                <?php 
                if ($ticketclose->num_rows()>0){
                  foreach ($ticketclose->result() as $key =>$r) {
                    echo '
                        <a href="'.site_url('web/openticket/'.$r->no_permohonan).'" class="ticket_open_comment">
                          <div class="btn-group"><i class="fa fa-user"></i></div>
                          <span>'.strtoupper($r->nama_pemohon),' / ',$r->no_inventaris.'</span>                        
                          <p>'.$r->catatan_pemohon.'</p>
                          <div class="ticket_action"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <div class="ticket_action_view">i</div>
                          </div>                      
                      </a>
                    ';
                  }                
                }else{
                  echo'
                    <div class="alert alert-success alert-dismissable">                
                      <h4><i  class="icon fa fa-check"></i> Data Close Ticket Masih Kosong</h4>
                      
                    </div>
                  ';
                }
                ?>
              </div>
            </fieldset>
            <fieldset id="list-pengajuan">
              <div class="ticket_open">
                  <div class="ticket_open_heading">
                    <h3 class="pull-left"><span class="semi-bold">Pengajuan PC/Laptop</span></h3>                    
                  </div>
              </div>
              <div class="ticket_open">
                  <table class="table table-responsive" style="background-color:#FBFBFB">
                    <tr>
                      <th style="text-align:center">No</th>
                      <th style="text-align:center">Tanggal </th>
                      <th>Nama Pemohon</th>
                      <th>Email</th>
                      <th>No. HP</th>
                      <th>Departemen</th>
                      <th>Jenis Inventory</th>
                      <th>Pengajuan</th>
                      <th style="text-align:center">Status</th>
                    </tr>
                    <tbody id="view">
                    </tbody> 
                  </table>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Compose New Task</h4>
      </div>
      <div class="modal-body"> content </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- sidebar chats -->
<nav class="atm-spmenu atm-spmenu-vertical atm-spmenu-right side-chat">
	<div class="header">
    <input type="text" class="form-control chat-search" placeholder=" Search">
  </div>
  <div href="#" class="sub-header">
    <div class="icon"><i class="fa fa-user"></i></div> <p>Online (4)</p>
  </div>
  <div class="content">
    <p class="title">Family</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Steven Smith</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> John Doe</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Michael Smith</a></li>
      <li class="busy"><a href="#"><i class="fa fa-circle-o"></i> Chris Rogers</a></li>
    </ul>
    
    <p class="title">Friends</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Vernon Philander</a></li>
      <li class="outside"><a href="#"><i class="fa fa-circle-o"></i> Kyle Abbott</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Dean Elgar</a></li>
    </ul>   
    
    <p class="title">Work</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li><a href="#"><i class="fa fa-circle-o"></i> Dale Steyn</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Morne Morkel</a></li>
    </ul>
    
  </div>
  <div id="chat-box">
    <div class="header">
      <span>Richard Avedon</span>
      <a class="close"><i class="fa fa-times"></i></a>    </div>
    <div class="messages nano nscroller has-scrollbar">
      <div class="content" tabindex="0" style="right: -17px;">
        <ul class="conversation">
          <li class="odd">
            <p>Hi John, how are you?</p>
          </li>
          <li class="text-right">
            <p>Hello I am also fine</p>
          </li>
          <li class="odd">
            <p>Tell me what about you?</p>
          </li>
          <li class="text-right">
            <p>Sorry, I'm late... see you</p>
          </li>
          <li class="odd unread">
            <p>OK, call me later...</p>
          </li>
        </ul>
      </div>
    <div class="pane" style="display: none;"><div class="slider" style="height: 20px; top: 0px;"></div></div></div>
    <div class="chat-input">
      <div class="input-group">
        <input type="text" placeholder="Enter a message..." class="form-control">
        <span class="input-group-btn">
        <button class="btn btn-danger" type="button">Send</button>
        </span>      </div>
    </div>
  </div>
</nav>
<!-- /sidebar chats -->   
<script src="<?php echo base_url('assets/js/common-script.js'); ?>"></script>
<script src="<?php echo base_url()?>assets/plugins/select2/js/select2.min.js"></script>

</body>
</html>
