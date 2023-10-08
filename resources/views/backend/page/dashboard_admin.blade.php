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
            <?php
            if($menu_access->user_id <> 4 and $menu_access->user_id <> 5 and $menu_access->user_id <> 7 and $menu_access->user_id <> 8 and $menu_access->user_id <> 9){
            ?>
             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center" style="margin-bottom: 10px;">
                <select class="form-control" id="web" style="width:100%; font-weight:bold;">
                    <option value="">Semua Web Portal</option>
                    <?php
                    $web = '';
                    foreach($query_web_portal as $row){
                    ?>
                    <option value="<?php echo $row->acca_code; ?>" <?php //if($this->input->get('web') == $row['acca_code']){ echo 'selected'; } ?>><?php echo $row->acca_url; ?></option>
                    <?php } ?>
                </select>          
              </div>
              <?php } else { ?> 
              <input type="hidden" id="web">
              <?php } ?>          
              <div 
              <?php
              if($menu_access->user_id <> 4 and $menu_access->user_id <> 5 and $menu_access->user_id <> 7 and $menu_access->user_id <> 8 and $menu_access->user_id <> 9){  
              ?>
              class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center" 
              <?php } else { ?> 
              class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center" 
              <?php } ?> 
              style="margin-bottom: 10px;">
                <center>
                <?php 
                $month_name1 = '';
            		$month_name2 = '';
            		$month_name3 = '';
            		$month_name4 = '';
            		$month_name5 = '';
            		$month_name6 = '';
            		$month_name7 = '';
            		$month_name8 = '';
            		$month_name9 = '';
            		$month_name10 = '';
            		$month_name11 = '';
            		$month_name12 = '';
            		$month = date('m');
                    // if($this->input->get('blns')){
                    //     $month = $this->input->get('blns');
                    // }
            	    if($month == '01'){
                        $month_name1 = 'selected="selected"';    
                    } else if($month == '02'){
                        $month_name2 = 'selected="selected"';    
                    } else if($month == '03'){
                        $month_name3 = 'selected="selected"';    
                    } else if($month == '04'){
                        $month_name4 = 'selected="selected"';    
                    } else if($month == '05'){
                        $month_name5 = 'selected="selected"';    
                    } else if($month == '06'){
                        $month_name6 = 'selected="selected"';    
                    } else if($month == '07'){
                        $month_name7 = 'selected="selected"';    
                    } else if($month == '08'){
                        $month_name8 = 'selected="selected"';    
                    } else if($month == '09'){
                        $month_name9 = 'selected="selected"';    
                    } else if($month == 10){
                        $month_name10 = 'selected="selected"';    
                    } else if($month == 11){
                        $month_name11 = 'selected="selected"';    
                    } else if($month == 12){
                        $month_name12 = 'selected="selected"';    
                    }
                  $table = '<select class="form-control" id="blns" style="width:100%; font-weight:bold;">
                                    <option value="01" '.$month_name1.'>Januari</option>
                                    <option value="02" '.$month_name2.'>Februari</option>
                                    <option value="03" '.$month_name3.'>Maret</option>
                                    <option value="04" '.$month_name4.'>April</option>
                                    <option value="05" '.$month_name5.'>Mei</option>
                                    <option value="06" '.$month_name6.'>Juni</option>
                                    <option value="07" '.$month_name7.'>Juli</option>
                                    <option value="08" '.$month_name8.'>Agustus</option>
                                    <option value="09" '.$month_name9.'>September</option>
                                    <option value="10" '.$month_name10.'>Oktober</option>
                                    <option value="11" '.$month_name11.'>November</option>
                                    <option value="12" '.$month_name12.'>Desember</option>
                                </select>';
                  echo $table;
                  ?>
                  </center>  
              </div>
    
              <div
              <?php
              if($menu_access->user_id <> 4 and $menu_access->user_id <> 5 and $menu_access->user_id <> 7 and $menu_access->user_id <> 8 and $menu_access->user_id <> 9){  
              ?>
              class="col-lg-3 col-md-3 col-sm-3 col-xs-10 text-center" 
              <?php } else { ?> 
              class="col-lg-5 col-md-5 col-sm-5 col-xs-10 text-center" 
              <?php } ?> style="margin-bottom: 10px;">
                <center>
                <?php 
                  $table = '<select class="form-control" id="thns" style="font-weight:bold;">';
                                $start = date('Y') - 1;
                                $last = date('Y') + 5;
                                for($i = $start;$i <= $last;$i++){
                                    $sel = '';
                                    // if($this->input->get('thns') == $i){ 
                                    //     $sel = 'selected'; 
                                    // } else 
                                    if(date('Y') == $i){
                                        $sel = 'selected';    
                                    }
                                    $table .= '<option value="'.$i.'" '.$sel.'>'.$i.'</option>';
                                }
                                $table .= '</select>';
                  echo $table;
                  ?>
                  </center>  
              </div>
              
              <div class="col-lg-1 col-md-1 col-sm-1 col-2 text-center">
                    <a class="btn btn-success" onclick="searching()" style="padding-top:3px; padding-bottom:3px;"><font class="fa fa-search"></font></a>
              </div>
            <script>
                function searching(){
                    dashboard();
                }
            </script>
            <div class="col-xs-12 col-lg-12" style="margin-top: 20px;">
                <div class="row">
                    <?php
                    if($menu_access->user_id <> 4 and $menu_access->user_id <> 9){  
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon purple mb-2">
                                                <i class="fa-solid fa-users"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Data Customer</h6>
                                            <h6 class="font-extrabold mb-0"><div id="total_customer_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <style>
                        #product_pusat{
                            width:100%;
                        }
                    </style>
                    <?php
                    if($menu_access->user_id <> 9){  
                    ?>
                    <div class="col-xs-12 col-lg-12 col-md-12" style="padding-left:12px; padding-right:0px;">
                        <div id="product_pusat" class="row"></div>
                    </div>
                    <?php } ?>
                    <?php
                    if($menu_access->user_id <> 4 and $menu_access->user_id <> 9){  
                    ?>
        			<div class="col-md-12 text-left">
        				<h5 style="font-size:17px;"><i class="fa-solid fa-calendar-days"></i> Data Sales Hari ini</h5>
        			</div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon purple mb-2">
                                                <i class="fa-solid fa-hand-holding-dollar"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Jumlah Sales</h6>
                                            <h6 class="font-extrabold mb-0"><div id="jumlah_sales_hari_ini_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon blue mb-2">
                                                <i class="fa-solid fa-calculator"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Jumlah Closing</h6>
                                            <h6 class="font-extrabold mb-0"><div id="total_closing_hari_ini_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon green mb-2">
                                                <i class="fa-solid fa-money-bill"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Total Omset</h6>
                                            <h6 class="font-extrabold mb-0"><div id="total_omset_hari_ini_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon red mb-2">
                                                <i class="fa-solid fa-comments-dollar"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Total Komisi</h6>
                                            <h6 class="font-extrabold mb-0"><div id="total_komisi_hari_ini_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
        			<div class="col-md-12 text-left">
        				<h5 style="font-size:17px;"><i class="fa-solid fa-sack-dollar"></i> Data Sales Bulan ini</h5>
        			</div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon purple mb-2">
                                                <i class="fa-solid fa-hand-holding-dollar"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Jumlah Sales</h6>
                                            <h6 class="font-extrabold mb-0"><div id="jumlah_sales_bulan_ini_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon blue mb-2">
                                                <i class="fa-solid fa-calculator"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Jumlah Closing</h6>
                                            <h6 class="font-extrabold mb-0"><div id="total_closing_bulan_ini_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon green mb-2">
                                                <i class="fa-solid fa-money-bill"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Total Omset</h6>
                                            <h6 class="font-extrabold mb-0"><div id="total_omset_bulan_ini_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon red mb-2">
                                                <i class="fa-solid fa-comments-dollar"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Total Komisi</h6>
                                            <h6 class="font-extrabold mb-0"><div id="total_komisi_bulan_ini_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
        			<div class="col-md-12 text-left">
        				<h5 style="font-size:17px;"><i class="fa-solid fa-money-bill-trend-up"></i> Komisi</h5>
        			</div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
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
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
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
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
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
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
        			<div class="col-md-12 text-left">
        				<h5 style="font-size:17px;"><i class="fa-solid fa-filter-circle-dollar"></i> Semua Data Sales</h5>
        			</div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon purple mb-2">
                                                <i class="fa-solid fa-hand-holding-dollar"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Jumlah Sales</h6>
                                            <h6 class="font-extrabold mb-0"><div id="jumlah_sales_all_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon blue mb-2">
                                                <i class="fa-solid fa-calculator"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Jumlah Closing</h6>
                                            <h6 class="font-extrabold mb-0"><div id="total_closing_all_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon green mb-2">
                                                <i class="fa-solid fa-money-bill"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Total Omset</h6>
                                            <h6 class="font-extrabold mb-0"><div id="total_omset_all_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="stats-icon red mb-2">
                                                <i class="fa-solid fa-comments-dollar"></i>
                                            </div>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <h6 class="text-muted font-semibold">Total Komisi</h6>
                                            <h6 class="font-extrabold mb-0"><div id="total_komisi_all_pusat"></div></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                    if($menu_access->user_id == 1 and $menu_access->user_id == 2 and $menu_access->user_id == 4 and $menu_access->user_id == 5){  
                    ?>
        			<div class="col-md-12 text-left">
        				<h5 style="font-size:17px;"><i class="fa-solid fa-filter-circle-dollar"></i> Semua Data Instalasi</h5>
        			</div>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <div id="status_instalasi" class="row"></div>
                    </div>
                    <?php } ?>
                </div>
                
                <!--<div class="row">-->
                <!--    <div class="col-xs-12">-->
                <!--        <div class="card">-->
                <!--            <div class="card-header">-->
                <!--                <h4>Profile Visit</h4>-->
                <!--            </div>-->
                <!--            <div class="card-body">-->
                <!--                <div id="grafik_sales"></div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                
                
            </div>
        </section>
    </div>
<script>
    var optionsgrafik_sales = {
    	annotations: {
    		position: 'back'
    	},
    	dataLabels: {
    		enabled:false
    	},
    	chart: {
    		type: 'bar',
    		height: 300
    	},
    	fill: {
    		opacity:1
    	},
    	plotOptions: {
    	},
    	series: [{
    		name: 'sales',
    		data: [90,20,30,20,10,20,30,20,10,20,30,20]
    	}],
    	colors: '#435ebe',
    	xaxis: {
    		categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"],
    	},
    }

    var grafik_sales = new ApexCharts(document.querySelector("#grafik_sales"), optionsgrafik_sales);
    
    grafik_sales.render();
    

    $(function () {
	    dashboard();
    });
    
    function total_customer_pusat(a, b, c, d) {
        var loading = document.getElementById('total_customer_pusat');
        loading.innerHTML = '<div id="total_customer_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#total_customer_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('total_customer_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#total_customer_pusat").html(data);
            }
        });
    }
    
    function product_pusat(a, b, c, d) {
        var loading = document.getElementById('product_pusat');
        loading.innerHTML = '<div id="product_pusat"><center><div style="color:#ff0000; margin-bottom:20px;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></center></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('product_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#product_pusat").html(data);
            }
        });
    }
    
    function jumlah_sales_hari_ini_pusat(a, b, c, d) {
        var loading = document.getElementById('jumlah_sales_hari_ini_pusat');
        loading.innerHTML = '<div id="jumlah_sales_hari_ini_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('jumlah_sales_hari_ini_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#jumlah_sales_hari_ini_pusat").html(data);
            }
        });
    }
    
    function total_closing_hari_ini_pusat(a, b, c, d) {
        var loading = document.getElementById('total_closing_hari_ini_pusat');
        loading.innerHTML = '<div id="total_closing_hari_ini_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('total_closing_hari_ini_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#total_closing_hari_ini_pusat").html(data);
            }
        });
    }
    
    function total_omset_hari_ini_pusat(a, b, c, d) {
        var loading = document.getElementById('total_omset_hari_ini_pusat');
        loading.innerHTML = '<div id="total_omset_hari_ini_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('total_omset_hari_ini_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#total_omset_hari_ini_pusat").html(data);
            }
        });
    }
    
    function total_komisi_hari_ini_pusat(a, b, c, d) {
        var loading = document.getElementById('total_komisi_hari_ini_pusat');
        loading.innerHTML = '<div id="total_komisi_hari_ini_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('total_komisi_hari_ini_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#total_komisi_hari_ini_pusat").html(data);
            }
        });
    }
    
    function jumlah_sales_bulan_ini_pusat(a, b, c, d) {
        var loading = document.getElementById('jumlah_sales_bulan_ini_pusat');
        loading.innerHTML = '<div id="jumlah_sales_bulan_ini_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('jumlah_sales_bulan_ini_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#jumlah_sales_bulan_ini_pusat").html(data);
            }
        });
    }
    
    function total_closing_bulan_ini_pusat(a, b, c, d) {
        var loading = document.getElementById('total_closing_bulan_ini_pusat');
        loading.innerHTML = '<div id="total_closing_bulan_ini_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('total_closing_bulan_ini_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#total_closing_bulan_ini_pusat").html(data);
            }
        });
    }
    
    function total_omset_bulan_ini_pusat(a, b, c, d) {
        var loading = document.getElementById('total_omset_bulan_ini_pusat');
        loading.innerHTML = '<div id="total_omset_bulan_ini_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('total_omset_bulan_ini_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#total_omset_bulan_ini_pusat").html(data);
            }
        });
    }
    
    function total_komisi_bulan_ini_pusat(a, b, c, d) {
        var loading = document.getElementById('total_komisi_bulan_ini_pusat');
        loading.innerHTML = '<div id="total_komisi_bulan_ini_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('total_komisi_bulan_ini_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#total_komisi_bulan_ini_pusat").html(data);
            }
        });
    }
    
    function jumlah_sales_all_pusat(a, b, c, d) {
        var loading = document.getElementById('jumlah_sales_all_pusat');
        loading.innerHTML = '<div id="jumlah_sales_all_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('jumlah_sales_all_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#jumlah_sales_all_pusat").html(data);
            }
        });
    }
    
    function total_closing_all_pusat(a, b, c, d) {
        var loading = document.getElementById('total_closing_all_pusat');
        loading.innerHTML = '<div id="total_closing_all_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('total_closing_all_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#total_closing_all_pusat").html(data);
            }
        });
    }
    
    function total_omset_all_pusat(a, b, c, d) {
        var loading = document.getElementById('total_omset_all_pusat');
        loading.innerHTML = '<div id="total_omset_all_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('total_omset_all_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#total_omset_all_pusat").html(data);
            }
        });
    }
    
    function total_komisi_all_pusat(a, b, c, d) {
        var loading = document.getElementById('total_komisi_all_pusat');
        loading.innerHTML = '<div id="total_komisi_all_pusat"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('total_komisi_all_pusat'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#total_komisi_all_pusat").html(data);
            }
        });
    }
    
    function status_instalasi(a, b, c, d) {
        var loading = document.getElementById('status_instalasi');
        loading.innerHTML = '<div id="status_instalasi"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('status_instalasi'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
            },
            success: function(data) {
                $("#status_instalasi").html(data);
            }
        });
    }
    
    function komisi1(a, b, c, d) {
        var loading = document.getElementById('komisi1');
        loading.innerHTML = '<div id="komisi1"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('komisi'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
                'e': 'Sudah Di Transfer',
            },
            success: function(data) {
                $("#komisi1").html(data);
            }
        });
    }
    
    function komisi2(a, b, c, d) {
        var loading = document.getElementById('komisi2');
        loading.innerHTML = '<div id="komisi2"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('komisi'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
                'e': 'Permintaan Transfer',
            },
            success: function(data) {
                $("#komisi2").html(data);
            }
        });
    }
    
    function komisi3(a, b, c, d) {
        var loading = document.getElementById('komisi3');
        loading.innerHTML = '<div id="komisi3"><div><div style="color:#ff0000;" style="font-size:12px; color:#ff0000;"><i class="fa fa-circle-o-notch fa-pulse"></i></div></div></div>'; 
        //$(this).parent().find('#product_pusat').css('opacity', '0.5');
        $.ajax({
            url: "<?= url('komisi'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
                'e': 'Belum Transfer',
            },
            success: function(data) {
                $("#komisi3").html(data);
            }
        });
    }
    
    function dashboard(){
        var a = document.getElementById('blns').value;  
        var b = document.getElementById('thns').value;  
        var c = document.getElementById('web').value; 
        var d = '';
        <?php
        if($menu_access->user_id <> 4 and $menu_access->user_id <> 9){  
        ?>
        total_customer_pusat(a, b, c, d);
        <?php } ?>
        <?php
        if($menu_access->user_id <> 9){  
        ?>
        product_pusat(a, b, c, d);
        <?php } ?>
        <?php
        if($menu_access->user_id <> 4 and $menu_access->user_id <> 9){  
        ?>
        jumlah_sales_hari_ini_pusat(a, b, c, d);
        total_closing_hari_ini_pusat(a, b, c, d);
        total_omset_hari_ini_pusat(a, b, c, d);
        total_komisi_hari_ini_pusat(a, b, c, d);
        
        jumlah_sales_bulan_ini_pusat(a, b, c, d);
        total_closing_bulan_ini_pusat(a, b, c, d);
        total_omset_bulan_ini_pusat(a, b, c, d);
        total_komisi_bulan_ini_pusat(a, b, c, d);
        
        jumlah_sales_all_pusat(a, b, c, d);
        total_closing_all_pusat(a, b, c, d);
        total_omset_all_pusat(a, b, c, d);
        total_komisi_all_pusat(a, b, c, d);

        komisi1(a, b, c, d);
        komisi2(a, b, c, d);
        komisi3(a, b, c, d);
        <?php } ?>
        <?php
        if($menu_access->user_id == 1 and $menu_access->user_id == 2 and $menu_access->user_id == 4 and $menu_access->user_id == 5){  
        ?>
        status_instalasi(a, b, c, d);
        <?php } ?>
        
    }
</script>
@endsection	