@extends('backend.index_admin')

@section('header')
    @include('backend.component.header')
@endsection	

@section('menu')
    @include('backend.component.menu')
@endsection	

@section('footer')
    @include('backend.component.footer')
@endsection	

@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12 div_table card">
            <div class="table_scroll">
                <table class="table table-bordered table_custom2" id="dataTable" width="100%" cellspacing="0">
    				<thead>
    				  <tr>
                        <td class="nomor" align="center">
                            <?php
                            if($menu_access->meac_C == 1 and $menu_access->menu_C == 1){
                            ?>
                            <a data-bs-toggle="modal" data-bs-target="#myModal_<?php echo $page; ?>" class="btn btn-success" onclick="data_form('')"><i class="fa-solid fa-plus"></i></a>
                            <?php } ?>    
                        </td>
                        <td class="table_header_23"><input type="text" class="form-control" onkeyup="search(this.value, '<?php echo $page; ?>', 1)" placeholder="Pencarian Kolom 1"></td>
                        <td class="table_header_23"><input type="text" class="form-control" onkeyup="search(this.value, '<?php echo $page; ?>', 2)" placeholder="Pencarian Kolom 2"></td>
                        <td class="table_header_23"><input type="text" class="form-control" onkeyup="search(this.value, '<?php echo $page; ?>', 3)" placeholder="Pencarian Kolom 3"></td>
                        <td class="table_header_23">
                            <div class="row">
                              <div class="col-lg-10 col-md-10 col-sm-10 col-10 text-center">
                                <input type="text" id="daterange" class="form-control flatpickr-range-preloaded" onchange="search(this.value, '<?php echo $page; ?>', 4)" placeholder="Interval Tanggal">
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center" style="padding-top:7px;">
                                <div style="margin-left:-15px; cursor:pointer;"><font class="fa-solid fa-xmark" onclick="close_flatpickr();"></font></div>
                              </div>
                            </div>
                        </td>
                      </tr>
                    </thead> 
                </table>    
                <div id="table_<?php echo $page; ?>"></div>   
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal_<?php echo $page; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <font id="title_modal"></font>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="table_id" id="table_id">
            <div id="data_form"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah Anda yakin akan menghapus data ini ?
                </p>
            </div>
            <input type="hidden" id="id_delete" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal" onclick="delete_data_real()">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Ok</span>
                </button>
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Cancel</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    //tambahan
    function akses_menu(a, b) {
        var loading = document.getElementById('akses_menu');
        loading.innerHTML = '<div id="akses_menu"><div style="margin-top:10px; margin-bottom:20px;"><center style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></center></div></div>'; 
        $.ajax({
            url: "<?= url('akses_menu'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
            },
            success: function(data) {
                $("#akses_menu").html(data);
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        $("#form").submit(function(e) {
            
            var table_id = $('#table_id').val();
            var url = "<?= url('create_'.$page); ?>";
            if(table_id > 0){
                var url = "<?= url('edit_'.$page); ?>";    
            }
            
            var loading = document.getElementById('button_save');
            loading.innerHTML = '<div id="button_save"><div style="margin-top:20px;"><center style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></center></div></div>';  
            e.preventDefault();
            $.ajax({
                url: url,
                // dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: new FormData(this),
                type: 'post',
                success: function(response) {
                    response = JSON.parse(response);
                    var status = response.info.status;
                    var message = response.info.message;
                    if(status == true){
                        $('#myModal_<?php echo $page; ?>').modal('hide');
                        document.getElementById('messages').innerHTML = '<div id="messages"><div class="alert alert-success alert-dismissible show fade" id="message_box">'+message+' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
                        document.getElementById('button_save').innerHTML = '<div id="button_save"><input type="submit" value="Simpan" name="save" class="btn btn-primary" /><div class="info_alert"></div></div>';
                        table_<?php echo $page; ?>();
                    } else {
                        //document.getElementById('messages').innerHTML = '<div id="messages"><div class="alert alert-danger alert-dismissible show fade" id="message_box">'+message+' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
                        document.getElementById('button_save').innerHTML = '<div id="button_save"><input type="submit" value="Simpan" name="save" class="btn btn-primary" /><div class="info_alert">'+message+'</div></div>';
                    }
                }
            });
            
            $(function(){
        	    $("#message_box").delay(10000).hide(700);
        	});
        });
    });
    
    function delete_data(a) {
        document.getElementById('id_delete').value = a;
    }
    
    function delete_data_real() {
        var a = document.getElementById('id_delete').value;
        $.ajax({
            url: "<?= url('delete_data_'.$page); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
            },
            success: function(response) {
                response = JSON.parse(response);
                var message = response.info.message;
                document.getElementById('messages').innerHTML = '<div id="messages"><div class="alert alert-info alert-dismissible show fade" id="message_box">'+message+' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
                table_<?php echo $page; ?>();
            }
        });
    }
    
    $(function () {
	    table_<?php echo $page; ?>();
    });
    
    function table_<?php echo $page; ?>() {
        var loading = document.getElementById('table_<?php echo $page; ?>');
        loading.innerHTML = '<div id="table_<?php echo $page; ?>"><div style="margin-top:20px;"><center style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></center></div></div>'; 
        //$(this).parent().find('#table_<?php echo $page; ?>').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('table_'.$page); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': '',
                'b': '',
                'c': '',
                'page': '',
            },
            success: function(data) {
                $("#table_<?php echo $page; ?>").html(data);
            }
        });
    }
    
    function search(a, b, c) {
        if(c == 4){
            var aa = a.search('to');
            if(aa > -1 || a == ''){
                search_result(a, b, c);
            }
        } else {
            search_result(a, b, c);
        }
    }
    
    function search_result(a, b, c) {
        var loading = document.getElementById('table_<?php echo $page; ?>');
        loading.innerHTML = '<div id="table_<?php echo $page; ?>"><div style="margin-top:20px;"><center style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></center></div></div>'; 
        //$(this).parent().find('#table_<?php echo $page; ?>').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('table_'.$page); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'page': '',
            },
            success: function(data) {
                $("#table_<?php echo $page; ?>").html(data);
            }
        });
    }
    
    function paging(a) {
        var loading = document.getElementById('table_<?php echo $page; ?>');
        loading.innerHTML = '<div id="table_<?php echo $page; ?>"><div style="margin-top:20px;"><center style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></center></div></div>'; 
        //$(this).parent().find('#table_<?php echo $page; ?>').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('table_'.$page); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'page': a,
            },
            success: function(data) {
                $("#table_<?php echo $page; ?>").html(data);
            }
        });
    }
    
    function data_form(a) {
        if(a){
            document.getElementById('title_modal').innerHTML = '<font id="title_modal"><font class="fa-solid fa-pencil" style="font-size:20px;"></font> Edit Data <?php echo str_replace('Data', '', $title); ?></font>';
            document.getElementById('table_id').value = a;
        } else {
            document.getElementById('title_modal').innerHTML = '<font id="title_modal"><font class="fa-solid fa-folder-plus" style="font-size:20px;"></font> Tambah Data <?php echo str_replace('Data', '', $title); ?></font>';
            document.getElementById('table_id').value = '';
        }
        var loading = document.getElementById('data_form');
        loading.innerHTML = '<div id="data_form"><div style="margin-top:20px;"><center style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></center></div></div>'; 
        //$(this).parent().find('#table_<?php echo $page; ?>').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('data_form_'.$page); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
            },
            success: function(data) {
                $("#data_form").html(data);
            }
        });
    }
    
    flatpickr('.flatpickr-no-config', {
        enableTime: true,
        dateFormat: "Y-m-d H:i", 
    })
    flatpickr('.flatpickr-always-open', {
        inline: true
    })
    flatpickr('.flatpickr-range', {
        dateFormat: "F j, Y", 
        mode: 'range'
    })
    flatpickr('.flatpickr-range-preloaded', {
        dateFormat: "Y-m-d", 
        mode: 'range',
        defaultDate: ["", ""]
    })
    flatpickr('.flatpickr-time-picker-24h', {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        inline: true
    })
    
    function close_flatpickr(){
        delete_search_date();
        document.getElementById('daterange').value = '';
        flatpickr('.flatpickr-range-preloaded', {
            inline: false,
            dateFormat: "Y-m-d", 
            mode: 'range',
            defaultDate: ["", ""]
        });
        table_<?php echo $page; ?>();
    }
    
    function delete_search_date() {
        $.ajax({
            url: "<?= url('delete_search_date_'.$page); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>'
            },
            success: function(response) {
                response = JSON.parse(response);
                //alert(response);
            }
        });
        $.ajax({
            url: "<?= url('delete_search_date_'.$page); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>'
            },
            success: function(response) {
                response = JSON.parse(response);
                //alert(response);
            }
        });
    }
</script>
@endsection	