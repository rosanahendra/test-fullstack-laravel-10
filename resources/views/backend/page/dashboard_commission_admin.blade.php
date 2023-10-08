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
<div class="page-content" style="padding-top: 15px;">
    <section class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <table>
                        <tr>
                            <td>
                                <div class="stats-icon green mb-2">
                                    <i class="fa-solid fa-money-bill-trend-up"></i>
                                </div>
                            </td>
                            <td style="padding-left: 10px;">
                                <h6 class="text-muted font-semibold">Komisi sudah ditransfer</h6>
                                <h6 class="font-extrabold mb-0"><div id="komisi1"></div></h6>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <table>
                        <tr>
                            <td>
                                <div class="stats-icon blue mb-2">
                                    <i class="fa-solid fa-money-bill-transfer"></i>
                                </div>
                            </td>
                            <td style="padding-left: 10px;">
                                <h6 class="text-muted font-semibold">Komisi proses ditransfer</h6>
                                <h6 class="font-extrabold mb-0"><div id="komisi2"></div></h6>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <table>
                        <tr>
                            <td>
                                <div class="stats-icon red mb-2">
                                    <i class="fa-solid fa-file-invoice-dollar"></i>
                                </div>
                            </td>
                            <td style="padding-left: 10px;">
                                <h6 class="text-muted font-semibold">Komisi belum ditransfer</h6>
                                <h6 class="font-extrabold mb-0"><div id="komisi3"></div></h6>
                                <!-- <div>
                                    <a style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalAction"><i class="far fa-money-bill-alt"></i> Pencairan Komisi</a>
                                </div> -->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <?php
                    $bank_id2 = '';
                    $memb_name_account = '';
                    $memb_number_account = '';
                    $bank_name2 = '';
                    foreach($tujuan as $row){
                        $bank_id2 = $row->bank_id;
                        $memb_name_account = $row->memb_name_account;
                        $memb_number_account = $row->memb_number_account;
                        $bank_name2 = $row->bank_name;
                    }    

                    $bank_id1 = '';
                    $acbc_name = '';
                    $acbc_number = '';
                    $acbc_main = '';
                    $bank_name1 = '';
                    foreach($dari as $row){
                        $bank_id1 = $row->bank_id;
                        if($bank_id1 == $bank_id2){
                            $acbc_name = $row->acbc_name;
                            $acbc_number = $row->acbc_number;
                            $acbc_main = $row->acbc_main;
                            $bank_name1 = $row->bank_name;
                        } else {
                            //if($row->acbc_main == 'Transfer Pusat Untuk Bank Lain'){
                            $acbc_name = $row->acbc_name;
                            $acbc_number = $row->acbc_number;
                            $acbc_main = $row->acbc_main;
                            $bank_name1 = $row->bank_name;
                            //}
                        }
                    } 
                        
                    $total = 0;
                    foreach($commission as $row){  
                        $total = $row->total;
                    }
                    ?>
                    <!--
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                            <div style="font-weight:bolder; font-size:16px; ">
                                Komisi yang dapat dicairkan :
                            </div>
                            <div style="font-weight:bold; font-size:20px; margin-top:6px; margin-bottom:7px;">
                                <?php if($total > 0){ if($bank_id1 <> $bank_id2){ echo '<div style="font-size:15px; color:#ff0000;"><strike>Rp. '.str_replace(',', '.', number_format($total)).'</strike></div>'; $total = $total - 6500; echo '<div style=" font-size:13px; "><i class="fas fa-hand-holding-usd"></i> Biaya transfer antar/beda bank</div><div style="font-size:13px; color:#ff0000;">-Rp. 6500</div><div style="color:#009900;">Rp. '.str_replace(',', '.', number_format($total)).'</div>'; } else { echo '<div style="color:#009900;">Rp. '.str_replace(',', '.', number_format($total)).'</div>'; }} else { echo 'Rp. 0'; } ?>
                            </div>      
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div style="font-weight:bolder; font-size:16px; ">
                                Ditransfer dari :
                            </div>
                            <div style=" font-weight:bold; font-size:13px; margin-top:6px; margin-bottom:7px;">
                                <table>
                                    <tr>
                                        <td><?= $acbc_name ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= $bank_name1 ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Rekening : <?= $acbc_number ?></td>
                                    </tr>
                                </table>
                            </div>   
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div style="font-weight:bolder; font-size:16px; ">
                                Tujuan Transfer pada :
                            </div>
                            <div style=" font-weight:bold; font-size:13px; margin-top:4px; margin-bottom:7px;">
                                <table>
                                    <tr>
                                        <td><?= $memb_name_account ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= $bank_name2 ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Rekening : <?= $memb_number_account ?></td>
                                    </tr>
                                </table>
                            </div>   
                        </div>
                        -->
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center" style="padding-top:15px; padding-bottom:15px;">
                            <?php
                            if($bank_id2 <> '' and $bank_id1 <> '' and $memb_name_account <> '' and $memb_number_account <> '' and $acbc_name <> '' and $acbc_number <> ''){
                            ?>
                            <!--
                            <div id="button_save">
                                <?php if($total > 50000){ ?>
                                    <input type="submit" value="Proses pencairan komisi Anda" name="save" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalKomisi" />
                                <?php } else { ?>
                                    <input type="submit" value="Memproses pencairan komisi Anda" name="save" class="btn btn-primary" disabled />
                                    <div style="color: #ff0000; font-size:12px; font-weight:bolder !important;">
                                        Minimal pencairan komisi sebesar Rp. 50.000
                                    </div>
                                <?php } ?>
                            </div>
                            -->
                            <?php } else { ?>
                                <!-- <input type="submit" value="Memproses pencairan komisi Anda" name="save" class="btn btn-primary" disabled />
                                <div style="color: #ff0000; font-size:12px;">
                                    Silakan lengkapi data rekening pada profil Anda dahulu.
                                </div> -->
                            <?php } ?>
                            <div id="pesan"></div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom:15px;">
                            <div style="font-weight:bolder; font-size:18px; ">
                                <center>Detail Komisi</center>
                            </div>    
                            <div class="table_scroll">
                                <table class="table table-bordered table_custom2" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <td class="nomor" align="center">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modalKomisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Pencairan Komisi</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah Anda yakin akan memproses pencairan komisi ini ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal" onclick="komisi()">
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

    function komisi() {
        //var loading = document.getElementById('button_save');
        //loading.innerHTML = '<div id="button_save"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('commission_real'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>'
            },
            success: function(response) {
                response = JSON.parse(response);
                var status = response.info.status;
                var message = response.info.message;
                if(status == true){
                    document.getElementById('messages').innerHTML = '<div id="messages"><div class="alert alert-success alert-dismissible show fade" id="message_box">'+message+' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
                    document.getElementById('pesan').innerHTML = '<div id="pesan"></div>';
                    setTimeout(function() {
                        window.location.href = "<?= url('dashboard_commission'); ?>";
                    }, 1000);
                } else {
                    document.getElementById('pesan').innerHTML = '<div id="pesan">'+message+'</div>';
                }   
            }
        });
    }

    function komisi1() {
        var loading = document.getElementById('komisi1');
        loading.innerHTML = '<div id="komisi1"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('komisi_dashboard1'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': 'Sudah Di Transfer',
            },
            success: function(data) {
                $("#komisi1").html(data);
            }
        });
    }
    
    function komisi2() {
        var loading = document.getElementById('komisi2');
        loading.innerHTML = '<div id="komisi2"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('komisi_dashboard2'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': 'Permintaan Transfer',
            },
            success: function(data) {
                $("#komisi2").html(data);
            }
        });
    }
    
    function komisi3() {
        var loading = document.getElementById('komisi3');
        loading.innerHTML = '<div id="komisi3"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('komisi_dashboard3'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': 'Belum Transfer',
            },
            success: function(data) {
                $("#komisi3").html(data);
            }
        });
    }

    function dashboard(){
        komisi1();
        komisi2();
        komisi3();
    }
    
    $(function () {
	    dashboard();
    });
</script>
@endsection	