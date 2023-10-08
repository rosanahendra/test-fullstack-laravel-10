<html moznomarginboxes mozdisallowselectionprint>
<head>
    <?php
    $name = 'Template';
    if($ID){
        $query = DB::select("select a.acce_code as acce_code, b.memb_name as memb_name, b.memb_company_name as memb_company_name from acceptance a, member b where a.memb_code = b.memb_code and a.acce_id = '$ID'");
        foreach($query as $row){
            $name = $row->memb_name.' '.str_replace('/','',$row->acce_code);
            if($row->memb_company_name){
                $name = $row->memb_company_name.' '.str_replace('/','',$row->acce_code);
            }
        }
    }
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo 'ASF '.$name; ?></title>
    <style>
        td, th{
            font-family:calibri;
        }
        @media print {
            @page { margin: 0; }
            body { margin: 0.8cm; }
        }
		
		@media print {
		    @page :footer {
				display: none
			}
		 
			@page :header {
				display: none
			}
		}
		@page :footer {color: #fff }
		@page :header {color: #fff}
    </style>
    <style type="text/css" media="print">
        @page { size: portrait; }
    </style>
    <?php
    $angka = array("-01-", "-02-", "-03-", "-04-", "-05-", "-06-", "-07-", "-08-", "-09-", "-10-", "-11-", "-12-");     
    $huruf = array(" Januari ", " Februari ", " Maret ", " April ", " Mei ", " Juni ", " Juli ", " Agustus ", " September ", " Oktober ", " November ", " Desember ");
    ?>
</head>
<body>
    <?php if(!$ID){ ?>
    <table style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px;">
        <tr>
            <td><img src="<?php echo url('assets/image/logogading.png'); ?>"></td>
            <td valign="top" align="center" valign="middle">
                <!--
                <div style="font-size:25px; font-weight:bold;">PT. GADING BHAKTI UTAMA</div>
                <div style="font-size:15px; font-weight:bold;">Telecomunication & Infrastructure Provider</div></div>
                -->
                <div style="font-size:20px; text-decoration:underline; font-weight:bold;">ACCEPTANCE SERVICE FORM</div>
            </td>
            <td align="right" valign="bottom">
                <table>
                    <tr>
                        <td>Tanggal</td>
                        <td width="10" align="center">:</td>
                        <td>........................</td>
                    </tr>
                    <tr>
                        <td>No. ASF</td>
                        <td width="10" align="center">:</td>
                        <td>........................</td>
                    </tr>
                    <tr>
                        <td>No. SF Ref.</td>
                        <td width="10" align="center">:</td>
                        <td>........................</td>
                    </tr>
                </table>    
            </td>
        </tr>
        <tr>
            <td colspan="3">_________________________________________________________________________________________________</td>
        </tr>  
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    A. Type of Services
                </div>
                <div style="margin-top:5px;">
                    <div style="margin-bottom:5px;">
                        <table>
                            <tr>
                                <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                                <td style="padding-left:5px;">Internet</td>
                                <td width="15"></td>
                                <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                                <td style="padding-left:5px;">Localloop</td>
                                <td width="15"></td>
                                <td style="padding-left:5px;">Others..................................................................................................................</td>
                            </tr>    
                        </table>
                    </div>
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    B. Type of Order
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;">Activation</td>
                            <td width="15"></td>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;">Installation</td>
                            <td width="15"></td>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;">Maintenance</td>
                            <td width="15"></td>
                            <td style="padding-left:5px;">Others............................................................................</td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>  
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    C. Company/Institution Information
                </div>
                <div style="margin-top:5px;">
                    <table style="width:100%;">
                        <tr>
                            <td style="width:100%;" valign="top">
                                <table>
                                    <tr>
                                        <td valign="top" width="200">Company/Institution Name</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td valign="top">........................................................................................................................</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Name</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td valign="top">........................................................................................................................</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Title / Position</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td valign="top">........................................................................................................................</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Handphone</td>
                                        <td width="20" valign="top" align="center">:</td>
                                        <td>
                                            ........................................................................................................................
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Email</td>
                                        <td width="20" valign="top" align="center">:</td>
                                        <td>
                                            ........................................................................................................................
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:100%;" valign="top">
                                <table>
                                    <tr>
                                        <td valign="top" width="200">Company/Institution Address</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td valign="top">........................................................................................................................</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Technical PIC</td>
                                        <td width="20" valign="top" align="center">:</td>
                                        <td valign="top">
                                            ........................................................................................................................
                                        </td>
                                        <td valign="top">
                                        </td>    
                                    </tr>
                                    <tr>
                                        <td valign="top">Handphone</td>
                                        <td width="20" valign="top" align="center">:</td>
                                        <td>
                                            ........................................................................................................................
                                        </td>
                                        <td valign="top">
                                        </td>    
                                    </tr>
                                    <tr>
                                        <td valign="top">Email</td>
                                        <td width="20" valign="top" align="center">:</td>
                                        <td valign="top">
                                            ........................................................................................................................
                                        </td>
                                        <td valign="top">
                                        </td>    
                                    </tr>
                                </table>
                            </td>
                        <tr>
                    </table>   
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    D. Type of Service
                </div>
                <div style="margin-top:5px;">
                    <table style="width:100%;">
                        <tr>
                            <td style="width:100%;" valign="top">
                                <table>
                                    <!--
                                    <tr>
                                        <td valign="top" width="200">Capacity</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td>........................................................................................................................</td>
                                    </tr>
                                    -->
                                    <tr>
                                        <td valign="top">IP Public</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td>........................................................................................................................</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">IP Address</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td>........................................................................................................................</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:100%;" valign="top">
                                <table>
                                    <tr>
                                        <td valign="top" width="200">Vlan</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td>........................................................................................................................</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Others</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td>........................................................................................................................</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>    
                    </table> 
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:27px;">
                    E. Type of Device
                </div>
                <div style="margin-top:5px;">
                    ........................................................................................................................................................................
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    F. Result
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top" width="200">Existing Circuit ID</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>........................................................................................................................</td>
                        </tr>
                        <tr>
                            <td valign="top">Electrical/E2E Test</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td>
                                ........................................................................................................................
                            </td>    
                        </tr>
                        <tr>
                            <td valign="top">Speedtest</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>
                                ........................................................................................................................
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">Total Cable Length</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>........................................................................................................................</td>
                        </tr>
                        <tr>
                            <td valign="top">Type of Cable</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>........................................................................................................................</td>
                        </tr>
                        <tr>
                            <td valign="top">OPM Test</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td>
                                ........................................................................................................................ dBm
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    G. Note
                </div>
                <div style="margin-top:5px;">
                    ................................................................................................................................................
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <br/><br/><br/><br/><br/>
                <div style="font-weight:bold; margin-top:20px;">
                    H. Your Authorization <i>(Sign by Authorized and Company Stamp)</i>
                </div>
                <div style="margin-top:5px;">
                    <table style="width:100%;">
                        <tr>
                            <td style="width:50%;">
                                <table style="width:100%;">
                                    <tr>
                                        <td>Company</td>
                                        <td width="10" align="center">:</td>
                                        <td>........................</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="80" style="padding-top:55px;" align="center">
                                            <div style="color:#cccccc">(TTD)</div>
                                            ......................................
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td width="10" align="center">:</td>
                                        <td>........................</td>
                                    </tr>
                                    <tr>
                                        <td>Position/Title</td>
                                        <td width="10" align="center">:</td>
                                        <td>........................</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td width="10" align="center">:</td>
                                        <td>........................</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width:20%;"></td>
                            <td style="width:40%;">
                                <table style="width:100%;">
                                    <tr>
                                        <td>Company</td>
                                        <td width="10" align="center">:</td>
                                        <td>PT. Gading Bhakti Utama</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="80" style="padding-top:10px;" align="center">
                                            <img src="<?php echo url('public/source/assets/image/ttd_asf.jpeg'); ?>" height="80">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td width="10" align="center">:</td>
                                        <td>Fahmi</td>
                                    </tr>
                                    <tr>
                                        <td>Position/Title</td>
                                        <td width="10" align="center">:</td>
                                        <td>Project</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td width="10" align="center">:</td>
                                        <td>........................</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <?php 
    } else {
    $query = DB::select("select * from acceptance where acce_id = '$ID'");
    foreach($query as $row){
    ?>
    <table style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px;">
        <tr>
            <td><img src="<?php echo url('assets/image/logogading.png'); ?>"></td>
            <td valign="top" align="center" valign="middle" style="padding-top:30px;">
                <!--
                <div style="font-size:25px; font-weight:bold;">PT. GADING BHAKTI UTAMA</div>
                <div style="font-size:15px; font-weight:bold;">Telecomunication & Infrastructure Provider</div></div>
                -->
                <div style="font-size:20px; text-decoration:underline; font-weight:bold;">ACCEPTANCE SERVICE FORM</div>
            </td>
            <td align="right" valign="bottom" style="padding-right:10px; font-size:13px;">
                <table style="font-size:14px;">
                    <tr>
                        <td>Tanggal</td>
                        <td width="10" align="center">:</td>
                        <td><?php echo substr($row->acce_date, 8, 2).'/'.substr($row->acce_date, 5, 2).'/'.substr($row->acce_date, 0, 4); ?></td>
                    </tr>
                    <tr>
                        <td>No. ASF</td>
                        <td width="10" align="center">:</td>
                        <td><?php echo $row->acce_code; ?></td>
                    </tr>
                    <tr>
                        <td>No. SF Ref.</td>
                        <td width="10" align="center">:</td>
                        <td><?php echo $row->subc_code; ?></td>
                    </tr>
                </table>    
            </td>
        </tr>
        <tr>
            <td colspan="3">______________________________________________________________________________________________</td>
        </tr>  
        <!--
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    A. Type of Customer
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top"></td>
                            <td><?php echo $row->acce_type; ?></td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
        -->
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    A. Type of Services
                </div>
                <div style="margin-top:5px;">
                    <?php 
                    $i = 1;
                    $total = 0;
                    $qty = 0;
                    $query3 = DB::select("select sude_type, sude_num_periode, prod_code, prde_id, sude_qty, sude_subtotal, sude_total from subcription_detail where subc_code = '$row->subc_code' order by sude_id asc");
                    foreach($query3 as $row3){
                        $prod = '';
                        $unit = '';
                        $query4 = DB::select("select a.prun_id as prun_id, b.size_id as size_id, b.colo_id as colo_id, b.flav_id as flav_id, a.prod_name as prod_name from product a, product_detail b where a.prod_code = b.prod_code and b.prde_id = '$row3->prde_id'");
                        foreach($query4 as $row4){
                            $size = '';
        				    $colo = '';
        				    $flav = '';
        				    $prod = '<font>'.$row4->prod_name.'</font> <font>'.$size.$colo.$flav.'</font>'; 
                            
                            $query5 = DB::select("select prun_name from product_unit where prun_id = '$row4->prun_id'");
                            foreach($query5 as $row5){
                                $unit = $row5->prun_name;
                            }
                        }
                    ?>
                    <div style="margin-bottom:5px; padding-left:5px;">
                        <table style="width:100%; font-size:13px;">
                            <tr>
                                <!--
                                <td width="180">Name of Service</td>
                                <td width="10" align="center">:</td>
                                -->
                                <td width="10"><?php echo $i; ?>.</td>
                                <td><?php echo $prod; ?></td>
                            </tr>
                        </table>
                    </div>
                    <?php $i++; } ?>
                    <!--
                    <table style="width:100%;" border="1" cellpadding="0" cellspacing="0">
                        <tr style="font-weight:bold;">
                            <td style="width:5%; height:45px;" align="center">No.</td>
                            <td style="width:42%;" align="center">Item</td>
                            <td style="width:15%;" align="center">Kontrak</td>
                            <td style="width:15%;" align="center">Qty</td>
                            <td style="width:13%;" align="center">Unit</td>
                            <td style="width:20%;" align="center">Harga</td>
                        </tr>
                        <?php 
                        $i = 1;
                        $total = 0;
                        $qty = 0;
                        $query3 = DB::select("select sude_type, sude_num_periode, prod_code, prde_id, sude_qty, sude_total from subcription_detail where subc_code = '$row->subc_code'");
                        foreach($query3 as $row3){
                            $prod = '';
                            $unit = '';
                            $query4 = DB::select("select a.prun_id as prun_id, b.size_id as size_id, b.colo_id as colo_id, b.flav_id as flav_id, a.prod_name as prod_name from product a, product_detail b where a.prod_code = b.prod_code and b.prde_id = '$row3->prde_id'");
                            foreach($query4 as $row4){
                                $size = '';
            				    $colo = '';
            				    $flav = '';
            				    $prod = '<div>'.$row4->prod_name.'</div><div>'.$size.$colo.$flav.'</div>'; 
                                
                                $query5 = DB::select("select prun_name from product_unit where prun_id = '$row4->prun_id'");
                                foreach($query5 as $row5){
                                    $unit = $row5->prun_name;
                                }
                            }
                            $total = $total + $row3->sude_total;
                            $qty = $qty + $row3->sude_qty;
                        ?>
                        <tr>
                            <td align="center"><?php echo $i; ?></td>
                            <td style="padding-left:5px; padding-right:5px;"><?php echo $prod; ?></td>
                            <td align="center"><?php if($row3->sude_num_periode > 0){ echo $row3->sude_num_periode; } ?></td>
                            <td align="center"><?php echo $row3->sude_qty; ?></td>
                            <td align="center"><?php echo $unit; ?></td>
                            <td align="right" style="padding-left:5px; padding-right:5px;">Rp. <?php if($row3->sude_total){ echo str_replace(',', '.', number_format($row3->sude_total)); } else { echo 0; } ?></td>
                        </tr>
                        <?php $i++; } ?>
                    </table>
                    -->
                    <!--
                    <table>
                        <tr>
                            <?php 
                            $i = 1;
                            $query3 = DB::select("select prod_code, prde_id, sude_qty, sude_total from subcription_detail where subc_code = '$row->subc_code'");
                            foreach($query3 as $row3){
                                $prod = '';
                                $unit = '';
                                $query4 = DB::select("select a.prun_id as prun_id, b.size_id as size_id, b.colo_id as colo_id, b.flav_id as flav_id, a.prod_name as prod_name from product a, product_detail b where a.prod_code = b.prod_code and b.prde_id = '$row3->prde_id'");
                                foreach($query4 as $row4){
                                    $size = '';
                				    $colo = '';
                				    $flav = '';
                				    $prod = '<div>'.$row4->prod_name.'</div><div style="font-size:13px;">'.$size.$colo.$flav.'</div>'; 
                                    
                                    $query5 = DB::select("select prun_name from product_unit where prun_id = '$row4->prun_id'");
                                    foreach($query5 as $row5){
                                        $unit = $row5->prun_name;
                                    }
                                }
                            ?>
                            <td valign="top"></td>
                            <td style="padding-right:15px;"><?php echo $prod; ?></td>
                            <?php $i++; } ?>
                        </tr>
                    </table>
                    -->
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    B. Type of Order
                </div>
                <div style="margin-top:5px;">
                    <table style="font-size:13px;">
                        <tr>
                            <td valign="top"></td>
                            <td><?php echo $row->acce_type; ?></td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>  
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    C. Company/Institution Information
                </div>
                <div style="margin-top:5px;">
                    <table style="width:100%; font-size:13px;">
                        <tr>
                            <td style="width:100%; font-size:13px;" valign="top">
                                <table style="font-size:13px;">
                                    <tr>
                                        <td valign="top" width="200">Company/Institution Name</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td valign="top"><?php echo $row->acce_company_name; ?></td>
                                        <td></td>
                                    </tr>
                                    <?php 
                                    $query2 = DB::select("select memb_name, memb_phone, memb_position, memb_email from member where memb_code = '$row->memb_code'");
                                    foreach($query2 as $row2){
                                    ?>
                                    <tr>
                                        <td valign="top">Name</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td valign="top"><?php echo $row2->memb_name; ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Title / Position</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td valign="top"><?php echo $row2->memb_position; ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Handphone</td>
                                        <td width="20" valign="top" align="center">:</td>
                                        <td>
                                            <?php echo $row2->memb_phone; ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Email</td>
                                        <td width="20" valign="top" align="center">:</td>
                                        <td>
                                            <?php echo $row2->memb_email; ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:100%; font-size:13px;" valign="top">
                                <table style="font-size:13px;">
                                    <tr>
                                        <td valign="top" width="200">Company/Institution Address</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td valign="top"><?php echo $row->acce_company_address; ?></td>
                                        <td></td>
                                    </tr>
                                    <?php 
                                    $query2 = DB::select("select * from member where memb_code = '$row->memb_code'");
                                    foreach($query2 as $row2){
                                    ?>
                                    <tr>
                                        <td valign="top">Technical PIC</td>
                                        <td width="20" valign="top" align="center">:</td>
                                        <td valign="top">
                                            <?php echo $row2->memb_name_technical; ?>
                                        </td>
                                        <td valign="top">
                                        </td>    
                                    </tr>
                                    <tr>
                                        <td valign="top">Handphone</td>
                                        <td width="20" valign="top" align="center">:</td>
                                        <td>
                                            <?php echo $row2->memb_handphone_technical; ?>
                                        </td>
                                        <td valign="top">
                                        </td>    
                                    </tr>
                                    <tr>
                                        <td valign="top">Email</td>
                                        <td width="20" valign="top" align="center">:</td>
                                        <td valign="top">
                                            <?php echo $row2->memb_email_technical; ?>
                                        </td>
                                        <td valign="top">
                                        </td>    
                                    </tr>
                                    <?php } ?>
                                </table>
                            </td>
                        <tr>
                    </table>   
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    D. Technical Information
                </div>
                <div style="margin-top:5px;">
                    <table style="width:100%; font-size:13px;">
                        <tr>
                            <td style="width:100%;" valign="top">
                                <table style="font-size:13px;">
                                    <!--
                                    <tr>
                                        <td valign="top" width="200">Capacity</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td><?php echo $row->acce_capacity; ?></td>
                                    </tr>
                                    -->
                                    <tr>
                                        <td valign="top">IP Public</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td><?php echo $row->acce_ip_public; ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">IP Address</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td><?php echo $row->acce_ip_address; ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">VLAN</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td><?php echo $row->acce_vlan; ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">ODP ID</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td><?php echo $row->acce_odpid; ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">SLA</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td>99,5 %</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Tanggal Aktivasi</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td><?php echo substr($row->acca_finish_date, 8, 2).'/'.substr($row->acca_finish_date, 5, 2).'/'.substr($row->acca_finish_date, 0, 4); ?></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:100%;" valign="top">
                                <table style="font-size:13px;">
                                    <tr>
                                        <td valign="top">Others</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td><?php echo $row->acce_others_service; ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>    
                    </table> 
                </div>
            </td>
        </tr>
        <?php 
        $query2 = DB::select("select * from subcription where subc_code = '$row->subc_code'");
        foreach($query2 as $row2){
        ?>
        <tr>
            <td colspan="3" align="center" style="padding-top:10px;">
                <table style="width:90%;font-size:13px;" border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width:35%; height:30px; font-weight:bold;" align="center">A-End</td>
                        <td style="width:25%; font-weight:bold;" align="center">Point Location</td>
                        <td style="width:35%; font-weight:bold;" align="center">B-End</td>
                    </tr>
                    <tr>
                        <td style="height:30px;" align="center"><?php echo $row2->subc_institution_A; ?></td>
                        <td align="center">Site Name</td>
                        <td align="center"><?php echo $row2->subc_institution_B; ?></td>
                    </tr>
                    <tr>
                        <td style="height:30px;" align="center"><?php echo $row2->subc_building_A; ?></td>
                        <td align="center">Building Floor</td>
                        <td align="center"><?php echo $row2->subc_building_B; ?></td>
                    </tr>
                    <tr>
                        <td style="height:30px;" align="center"><?php echo $row2->subc_address_floor_A; ?></td>
                        <td align="center">Address</td>
                        <td align="center"><?php echo $row2->subc_address_floor_B; ?></td>
                    </tr>
                    <tr>
                        <td style="height:30px;" align="center"><?php echo $row2->subc_contact_person_A; ?></td>
                        <td align="center">Contact Person</td>
                        <td align="center"><?php echo $row2->subc_contact_person_B; ?></td>
                    </tr>
                    <tr>
                        <td style="height:30px;" align="center"><?php echo $row2->subc_title_position_A; ?></td>
                        <td align="center">Title/Position</td>
                        <td align="center"><?php echo $row2->subc_title_position_B; ?></td>
                    </tr>
                    <tr>
                        <td style="height:30px;" align="center"><?php echo $row2->subc_handphone_A; ?></td>
                        <td align="center">Mobile Number</td>
                        <td align="center"><?php echo $row2->subc_handphone_B; ?></td>
                    </tr>
                    <tr>
                        <td style="height:30px;" align="center"><?php if($row2->subc_distance_A > 0){ echo $row2->subc_distance_A; } ?></td>
                        <td align="center">Estimation Distance (meter)</td>
                        <td align="center"><?php if($row2->subc_distance_B > 0){ echo $row2->subc_distance_B; } ?></td>
                    </tr>
                    <tr>
                        <td style="height:30px;" align="center"><?php echo $row2->subc_latlon_technical; ?></td>
                        <td align="center">Koordinat</td>
                        <td align="center"><?php echo $row2->subc_latlon_billing; ?></td>
                    </tr>
                    <tr>
                        <td style="height:30px;" align="center"><?php echo $row2->subc_notes_A; ?></td>
                        <td align="center">Notes</td>
                        <td align="center"><?php echo $row2->subc_notes_B; ?></td>
                    </tr>
                </table>
            </td>
        </tr>  
        <?php } ?>
	</table>
	<br /><br /><br /><br />
	<table style="font-size:13px;">
        <tr>
            <td colspan="3">
                <div style="font-weight:bold;">
                    E. Type of Device
                </div>
            <td>
        </tr> 
        <tr>
            <td colspan="3" align="center" style="padding-top:10px;">
                <div style="margin-top:5px;">
                    <table style="width:90%;font-size:13px;" border="1" cellpadding="0" cellspacing="0">
                        <tr style="font-weight:bold;">
                            <td style="height:30px;" align="center">Device</td>
                            <td align="center">Merek / Jenis</td>
                            <td align="center">Serial Number</td>
                            <td align="center">MAC Address</td>
                        </tr>
                        <?php 
                        $i = 1;
                        $query3 = DB::select("select * from acceptance_device where acce_code = '$row->acce_code'");
                        foreach($query3 as $row3){
                        ?>
                        <tr>
                            <td style="height:25px;" align="center"><?php echo $row3->acde_type; ?></td>
                            <td align="center"><?php echo $row3->acde_brand; ?></td>
                            <td align="center"><?php echo $row3->acde_serial; ?></td>
                            <td align="center"><?php echo $row3->acde_mac_address; ?></td>
                        </tr>
                        <?php $i++; } ?>
                    </table>
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    F. Result
                </div>
                <div style="margin-top:5px;">
                    <table style="font-size:13px;">
                        <!--
                        <tr>
                            <td valign="top" width="200">Existing Circuit ID</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td><?php echo $row->acce_cable_installation; ?></td>
                        </tr>
                        -->
                        <tr>
                            <td valign="top">Electrical / E2E Test</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td>
                                <?php echo $row->acce_cable_installation; ?>
                            </td>    
							<td></td>
							<td></td>
							<td></td>
                        </tr>
                        <tr>
                            <td valign="top">OPM Test</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>
                                <?php echo $row->acce_opm_test; ?> dBm
                            </td>
							<td></td>
							<td></td>
							<td></td>
                        </tr>
                        <tr>
                            <td valign="top">Foto OPM</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td valign="top">
                                <?php 
                                if($row->acce_opm_file){
                                ?>
                                <img src="<?php echo url($row->acce_opm_file); ?>" width="160">
                                <?php 
                                }
                                ?>
                            </td> 
							<td valign="top" style="padding-left:20px;">Foto Speed Test</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td valign="top">
                                <?php 
                                if($row->acce_upload){
                                ?>
                                <img src="<?php echo url($row->acce_upload); ?>" width="160">
                                <?php 
                                }
                                ?>
                            </td> 
                        </tr>
                        <tr>
                            <td valign="top">Connection</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>
                                <?php echo $row->acce_speedtest; ?>
                            </td>
							<td valign="top" style="padding-left:20px;">Total Cable Length</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td><?php echo $row->acce_cable_length; ?> meter</td>
                        </tr>
                        <tr>
                            <td valign="top">Speed Test</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td>
                                <?php echo $row->acce_speed_test; ?> Mbps
                            </td>
							<td valign="top" style="padding-left:20px;">Type of Cable</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td><?php echo $row->acce_cable_type; ?></td>  
                        </tr>
                    </table>
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    G. Note
                </div>
                <div style="margin-top:5px; font-size:13px;">
                    <?php echo str_replace(' ', '', $row->acce_notes); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:20px; font-size:13px;">
                    H. Your Authorization <i>(Sign by Authorized and Company Stamp)</i>
                </div>
                <div style="margin-top:5px;">
                    <table style="width:100%; font-size:13px;">
                        <tr>
                            <td style="width:50%;">
                                <table style="font-size:13px;">
                                    <tr>
                                        <td>Company</td>
                                        <td width="10" align="center">:</td>
                                        <td><?php echo $row->acce_company_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="80" style="padding-top:55px;" align="center">
                                            <div style="color:#cccccc">(TTD)</div>
                                            ...........................................................
                                        </td>
                                    </tr>
                                    <?php 
                                    $query2 = DB::select("select * from subcription where subc_code = '$row->subc_code'");
                                    foreach($query2 as $row2){
                                    ?>
                                    <tr>
                                        <td>Name</td>
                                        <td width="10" align="center">:</td>
                                        <td><?php echo $row2->subc_name_technical; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Position/Title</td>
                                        <td width="10" align="center">:</td>
                                        <td><?php echo $row2->subc_position_technical; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>Date</td>
                                        <td width="10" align="center">:</td>
                                        <td><?php echo substr($row->acce_date, 8, 2).'/'.substr($row->acce_date, 5, 2).'/'.substr($row->acce_date, 0, 4); ?></td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width:10%;"></td>
                            <td style="width:50%;">
                                <table style="font-size:13px;">
                                    <tr>
                                        <td>Company</td>
                                        <td width="10" align="center">:</td>
                                        <td>PT. Gading Bhakti Utama</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="80" style="padding-top:0px;" align="center">
                                            <img src="<?php echo url('source/assets/image/ttd_asf.jpeg'); ?>" height="80">
                                        </td>
                                    </tr>
                                    <?php 
                                    $query2 = DB::select("select * from member where memb_code = '$row->acce_update_by '");
                                    foreach($query2 as $row2){
                                    ?>
                                    <tr>
                                        <td>Name</td>
                                        <td width="10" align="center">:</td>
                                        <td><?php //echo $row2->memb_name; ?>Fahmi</td>
                                    </tr>
                                    <tr>
                                        <td>Position/Title</td>
                                        <td width="10" align="center">:</td>
                                        <td><?php //echo $row2->memb_position; ?>Project</td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>Date</td>
                                        <td width="10" align="center">:</td>
                                        <td><?php echo substr($row->acce_date, 8, 2).'/'.substr($row->acce_date, 5, 2).'/'.substr($row->acce_date, 0, 4); ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <?php }} ?>
</body>
</html>

<script type="text/javascript">window.print();</script>
