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
                            <a data-bs-toggle="modal" data-bs-target="#myModal_<?php echo $page; ?>" class="btn btn-success" onclick="data_form('');"><i class="fa-solid fa-plus"></i></a>
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

<div class="modal fade" id="modalAction" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Konversi Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah Anda yakin akan memproses data work order ini menjadi invoice ?
                </p>
            </div>
            <input type="hidden" id="id_sf" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal" onclick="to_invoice_real()">
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

<div class="modal fade" id="modaldelete_acceptance_device" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Konversi Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah Anda yakin akan menghapus data Tipe Device ini ?
                </p>
            </div>
            <input type="hidden" id="acde_id" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal" onclick="delete_acceptance_device_real()">
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

<div class="modal fade" id="modaldelete_acceptance_photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Konversi Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah Anda yakin akan menghapus data dokumentasi foto ini ?
                </p>
            </div>
            <input type="hidden" id="acph_id" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal" onclick="delete_acceptance_photo_real()">
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

<input type="hidden" id="number" name="jum" value="1"/>
<input type="hidden" id="number2" name="jum" value="1"/>
<script>
    function to_invoice(a) {
        document.getElementById('id_sf').value = a;
    }

    function to_invoice_real() {
        var a = document.getElementById('id_sf').value;
        $.ajax({
            url: "<?= url('to_invoice'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
            },
            success: function(response) {
                response = JSON.parse(response);
                var status = response.info.status;
                var message = response.info.message;
                if(status == true){
                    $('#modalAction').modal('hide');
                    document.getElementById('messages').innerHTML = '<div id="messages"><div class="alert alert-success alert-dismissible show fade" id="message_box">'+message+' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
                    table_<?php echo $page; ?>();
                }    
            }
        });
    }

    function tanggal_selesai(a){
      if(a == 'Selesai'){
        document.getElementById('tanggal_selesai').innerHTML = '<div id="tanggal_selesai" class="row"><input type="hidden" name="acce_notes2"><div class="col-md-12"><div class="form-group"><label for="exampleInputEmail1" class="label-input">Tanggal Selesai Aktivasi <font class="font-required">Wajib</font></label><div><input class="form-control datepicker" placeholder="Tanggal Selesai" type="text" required="required" name="acca_finish_date" value=""></div></div></div></div>';    
        $('.datepicker').datepicker({
        	  format: 'yyyy-mm-dd'
        });
      } else if(a == 'Proses Instalasi'){
        document.getElementById('tanggal_selesai').innerHTML = '<div id="tanggal_selesai" class="row"><input type="hidden" name="acce_notes2"><input class="form-control datepicker" placeholder="Tanggal Selesai" type="hidden" name="acca_finish_date"></div>';
      } else {
        document.getElementById('tanggal_selesai').innerHTML = '<div id="tanggal_selesai" class="row"><div class="col-md-12"><div class="form-group"><label for="exampleInputEmail1" class="label-input">Alasan <font class="font-required">Wajib</font></label><div><input class="form-control" placeholder="Tanggal Selesai" type="text" required="required" name="acce_notes2"></div></div></div><input class="form-control datepicker" placeholder="Tanggal Selesai" type="hidden" name="acca_finish_date"></div>';  
      }
    }

    function delete_acceptance_device(a) {
        var r = confirm('Anda yakin akan menghapus data ini ?');	
        if (r == true) {
            delete_acceptance_device_real(a);
            return true;
        } else {
            return false;
        }
    }

    function delete_acceptance_device_real(a) {
        //var a = document.getElementById('acde_id').value;
        $.ajax({
            url: "<?= url('delete_acceptance_device'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
            },
            success: function(response) {
                response = JSON.parse(response);
                var status = response.info.status;
                var message = response.info.message;
                if(status == true){
                    //$('#modaldelete_acceptance_device').modal('hide');
                    document.getElementById('acde_id'+a).innerHTML = '<div id="acde_id'+a+'"></div>';
                    document.getElementById('messages').innerHTML = '<div id="messages"><div class="alert alert-success alert-dismissible show fade" id="message_box">'+message+' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
                }    
            }
        });
    }

    function add_patient() {
        var patient = 0;
        patient++;
        var jml = document.getElementById('number').value;
        var no = parseInt(jml);
        
        $.ajax({
            url: "<?= url('acceptance_detail'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'no': no,
            },
            success: function(data) {
                var add = document.createElement('patientdiv');
                add.innerHTML += '<div id="removepatient'+no+'">'+data+'</div>';
                document.getElementById('patientdiv').appendChild(add);
            }
        });
        
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
        return false;
    }

    function removepatient(a){
        document.getElementById("more_fields").disabled = false;
        var elem = document.getElementById('removepatient'+a);
        elem.parentNode.removeChild(elem);
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value--;
        document.getElementById('number').value = value;
        return false;
    }

    function delete_acceptance_photo(a) {
        var r = confirm('Anda yakin akan menghapus data ini ?');	
        if (r == true) {
            delete_acceptance_photo_real(a);
            return true;
        } else {
            return false;
        }
    }

    function delete_acceptance_photo_real(a) {
        //var a = document.getElementById('acph_id').value;
        $.ajax({
            url: "<?= url('delete_acceptance_photo'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
            },
            success: function(response) {
                response = JSON.parse(response);
                var status = response.info.status;
                var message = response.info.message;
                if(status == true){
                    //$('#modaldelete_acceptance_photo').modal('hide');
                    document.getElementById('acph_id'+a).innerHTML = '<div id="acph_id'+a+'"></div>';
                    document.getElementById('messages').innerHTML = '<div id="messages"><div class="alert alert-success alert-dismissible show fade" id="message_box">'+message+' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
                }    
            }
        });
    }

    function add_patient2() {
        var patient = 0;
        patient++;
        var jml = document.getElementById('number2').value;
        var no = parseInt(jml);
        
        $.ajax({
            url: "<?= url('acceptance_photo'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'no': no,
            },
            success: function(data) {
                var add = document.createElement('patientdiv2');
                add.innerHTML += '<div id="removepatiente'+no+'">'+data+'</div>';
                document.getElementById('patientdiv2').appendChild(add);
            }
        });
        
        var value = parseInt(document.getElementById('number2').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number2').value = value;
        return false;
    }

    function removepatient2(a){
        document.getElementById("more_fields2").disabled = false;
        var elem = document.getElementById('removepatiente'+a);
        elem.parentNode.removeChild(elem);
        var value = parseInt(document.getElementById('number2').value, 10);
        value = isNaN(value) ? 0 : value;
        value--;
        document.getElementById('number2').value = value;
        return false;
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
            
            //var loading = document.getElementById('button_save');
            //loading.innerHTML = '<div id="button_save"><div style="margin-top:20px;"><center style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></center></div></div>';  
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
                'mode': '<?= $mode ?>',
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
                'mode': '<?= $mode ?>',
            },
            success: function(data) {
                $("#data_form").html(data);
        
                flatpickr('.datepicker', {
                    enableTime: true,
                    dateFormat: "Y-m-d"
                });
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