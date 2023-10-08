<html>
<head>
    <?php
    $name = 'Template';
    if($ID){
        $query = DB::select("select * from subcription where subc_id = '$ID'");
        foreach($query as $row){
            $name = $row->subc_customer_name.' '.str_replace('/','',$row->subc_code);
            if($row->subc_company_name){
                $name = $row->subc_company_name.' '.str_replace('/','',$row->subc_code);
            }
        }
    }
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo 'SF '.$name; ?></title>
    <?php 
    if(!$ID){
    ?>
    <style>
        td, th{
            font-family:calibri;
        }
        @media print {
            @page { margin: 0.3cm 0.3cm 0.5cm 0.3cm; }
        }
    </style>
    <?php } else { ?>
    <style>
        td, th{
            font-family:calibri;
        }
        @media print {
            @page { margin: 0.3cm 0.3cm 0.2cm 0.3cm; }
        }
    </style>
    <?php } ?>
    <style type="text/css" media="print">
        @page { size: portrait; }
    </style>
    <?php
    $angka = array("-01-", "-02-", "-03-", "-04-", "-05-", "-06-", "-07-", "-08-", "-09-", "-10-", "-11-", "-12-");     
    $huruf = array(" Januari ", " Februari ", " Maret ", " April ", " Mei ", " Juni ", " Juli ", " Agustus ", " September ", " Oktober ", " November ", " Desember ");
    ?>
</head>
<body>
    <?php 
    if(!$ID){
    ?>
    <div>
        <img src="<?php echo url('source/assets/mat/kopsurat.png'); ?>" style="width:780px;">
    </div>
    <div style="padding-left:75px; padding-right:15px; margin-top:-540px;">
    <table style="font-family:Verdana, Arial, Helvetica, sans-serif; width:100%;">    
        <tr>
            <td valign="top" align="left" colspan="2" style="padding-top:13px;">
                <div style="font-size:20px; font-weight:bold;">SUBSCRIPTION FORM</div>
            </td>
            <td align="right">
                <table>
                    <tr>
                        <td>Tanggal</td>
                        <td width="10" align="center">:</td>
                        <td width="100">............................</td>
                    </tr>
                    <tr>
                        <td>No. SF</td>
                        <td width="10" align="center">:</td>
                        <td width="180">............................</td>
                    </tr>
                </table>    
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    A. Type of Request
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;  text-align:justify;">New</td>
                            <td width="15"></td>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;  text-align:justify;">Upgrade</td>
                            <td width="15"></td>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;  text-align:justify;">Downgrade</td>
                            <td width="15"></td>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;  text-align:justify;">Update</td>
                            <td width="15"></td>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;  text-align:justify;">Relocation</td>
                            <td width="15"></td>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;  text-align:justify;">Others : ..............</td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>  
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    B. Type of Customer
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;  text-align:justify;">ISP Company</td>
                            <td width="15"></td>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;  text-align:justify;">Institution / Company</td>
                            <td width="15"></td>
                            <td valign="top"><img src="<?php echo url('source/assets/mat/cube.png'); ?>" width="15"></td>
                            <td style="padding-left:5px;  text-align:justify;">Personal</td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:5px;">
                    C. Type of Service and Commercial
                </div>
                <div style="margin-top:5px; z-index:100; margin-bottom:5px;">
                    <table>
                        <tr>
                            <td>Name of Service</td>
                            <td width="10" align="center">:</td>
                            <td width="10" align="center">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td>Service Price</td>
                            <td width="10" align="center">:</td>
                            <td width="10" align="center">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td>Instalation Fee</td>
                            <td width="10" align="center">:</td>
                            <td width="10" align="center">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td>Tax Status</td>
                            <td width="10" align="center">:</td>
                            <td width="10" align="center">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td>Contract Periode</td>
                            <td width="10" align="center">:</td>
                            <td width="10" align="center">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td>Start Date of Service</td>
                            <td width="10" align="center">:</td>
                            <td width="10" align="center">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td>End Date of Service</td>
                            <td width="10" align="center">:</td>
                            <td width="10" align="center">................................................................................................................</td>
                        </tr>
                    </table>
                    <!--
                    <table>
                        <tr>
                            <?php 
                            /*$i = 1;
                            $query3 = DB::select("select prod_code, prde_id, sude_qty, sude_total from subcription_detail where subc_code = '$row->subc_code'");
                            foreach($query3 as $row3){
                                $prod = '';
                                $unit = '';
                                $query4 = DB::select("select a.prun_id as prun_id, b.size_id as size_id, b.colo_id as colo_id, b.flav_id as flav_id, a.prod_name as prod_name from product a, product_detail b where a.prod_code = b.prod_code and b.prde_id = '$row3->prde_id'");
                                foreach($query4 as $row4){
                                    $size = '';
                				    $query5 = $this->subcription_model->select_size($row4->size_id);
                				    foreach($query5 as $row5){
                				        $size = $row5->size_name;    
                				    }
                				    $colo = '';
                				    $query5 = $this->subcription_model->select_colour($row4->colo_id);
                				    foreach($query5 as $row5){
                				        $colo = ' / '.$row5->colo_name;    
                				    }
                				    $flav = '';
                				    $query5 = $this->subcription_model->select_flavour($row4->flav_id);
                				    foreach($query5 as $row5){
                				        $flav = ' / '.$row5->flav_name;    
                				    }
                				    $prod = '<div>'.$row4->prod_name.'</div><div style="font-size:13px;">'.$size.$colo.$flav.'</div>'; 
                                    
                                    $query5 = DB::select("select prun_name from product_unit where prun_id = '$row4->prun_id'");
                                    foreach($query5 as $row5){
                                        $unit = $row5->prun_name;
                                    }
                                }*/
                            ?>
                            <td valign="top"><img src="<?php //echo url('source/assets/mat/truee.png'); ?>" width="20"></td>
                            <td style="padding-right:15px;"><?php //echo $prod; ?></td>
                            <?php //$i++; } ?>
                        </tr>
                    </table>
                    -->
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:0px;">
                    D. Company/Institution Information
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top">Company/Institution Name</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td colspan="2">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td valign="top">Company/Institution Address</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td colspan="2">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td valign="top">City/Prov/Zip code</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td colspan="2">
                                ............................
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">Country</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td width="150">
                                ............................
                            </td>
                            <td valign="top">
                                <table>
                                    <tr>
                                        <td>NPWP Number</td>
                                        <td width="20" align="center">:</td>
                                        <td>............................</td>
                                    </tr>
                                </table>
                            </td>    
                        </tr>
                        <tr>
                            <td valign="top">Office Number</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>
                                ............................
                            </td>
                            <td valign="top">
                                <table>
                                    <tr>
                                        <td valign="top">NPWP Address</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td>............................</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">Website</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>
                                ............................
                            </td>
                            <td valign="top">
                                <table>
                                    <tr>
                                        <td>NIB</td>
                                        <td width="20" align="center">:</td>
                                        <td>............................</td>
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
                <div style="font-weight:bold; margin-top:0px;">
                    E. Contact Details
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top">Name</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td colspan="2">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td valign="top">Title / Position</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td colspan="2">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td valign="top">Email</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td colspan="2">
                                ................................................................................................................
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">Handphone</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td width="150">
                                ............................
                            </td>
                            <td valign="top">
                                <table>
                                    <tr>
                                        <td>Office Number</td>
                                        <td width="20" align="center">:</td>
                                        <td>............................</td>
                                    </tr>
                                </table>
                            </td>    
                        </tr>
                        <tr>
                            <td valign="top">ID Document Type</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>
                                <table>
                                    <tr>
                                        <td valign="top"></td>
                                        <td>............................</td>
                                    </tr>
                                </table>
                            </td>
                            <td valign="top">
                                <table>
                                    <tr>
                                        <td valign="top">ID Document Number</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td>............................</td>
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
                <div style="font-weight:bold; margin-top:0px;">
                    F. Contact Person Details
                </div>
                <table style="width:100%;">
                    <tr style="width:100%;">
                        <td style="width:50%;">
                            <table>
                                <tr>
                                    <td style="font-weight:bold;">Technical</td>
                                    <td width="10" align="center"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td width="10" align="center">:</td>
                                    <td>........................................................</td>
                                </tr>
                                <tr>
                                    <td>Title/Position</td>
                                    <td width="10" align="center">:</td>
                                    <td>........................................................</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td width="10" align="center">:</td>
                                    <td>........................................................</td>
                                </tr>
                                <tr>
                                    <td>Handphone</td>
                                    <td width="10" align="center">:</td>
                                    <td>........................................................</td>
                                </tr>
                                <tr>
                                    <td>Office Number</td>
                                    <td width="10" align="center">:</td>
                                    <td>........................................................</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td width="10" align="center"></td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                        <td style="width:50%;">
                            <table>
                                <tr>
                                    <td style="font-weight:bold;">Billing</td>
                                    <td width="10" align="center"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td width="10" align="center">:</td>
                                    <td>........................................................<?php //echo $row->subc_name_billing; ?></td>
                                </tr>
                                <tr>
                                    <td>Title/Position</td>
                                    <td width="10" align="center">:</td>
                                    <td>........................................................</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td width="10" align="center">:</td>
                                    <td>........................................................</td>
                                </tr>
                                <tr>
                                    <td>Handphone</td>
                                    <td width="10" align="center">:</td>
                                    <td>........................................................</td>
                                </tr>
                                <tr>
                                    <td>Office Number</td>
                                    <td width="10" align="center">:</td>
                                    <td>........................................................</td>
                                </tr>
                                <!--
                                <tr>
                                    <td>Billing Address</td>
                                    <td width="10" align="center">:</td>
                                    <td><?php //echo $row->subc_address_billing; ?></td>
                                </tr>
                                -->
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr> 
        <!--
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; padding-top:10px;">
                    G. Type of Subscription
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top">Existing Circuit ID</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td colspan="2">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td valign="top">Current Capacity</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td width="150">
                                ............................
                            </td>
                            <td valign="top">
                                <table>
                                    <tr>
                                        <td>New Capacity</td>
                                        <td width="20" align="center">:</td>
                                        <td>............................</td>
                                    </tr>
                                </table>
                            </td>    
                        </tr>
                        <!--
                        <tr>
                            <td valign="top">Monthly Recurring Fee</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>
                                ............................
                            </td>
                            <td valign="top">
                                <table>
                                    <tr>
                                        <td valign="top">Installing Fee</td>
                                        <td valign="top" width="20" align="center">:</td>
                                        <td>............................</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">Term of Contract</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>
                                <table>
                                    <tr>
                                        <td valign="top"></td>
                                        <td>............................</td>
                                    </tr>
                                </table>
                            </td>
                            <td></td>
                        </tr>
                        -->
                        <!--
                        <tr>
                            <td valign="top">SLA</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>98,5 %</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td valign="top">Notes</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td colspan="2">................................................................................................................</td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr> 
        -->
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:5px;">
                    G. Technical Information
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top">Existing Circuit ID</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td colspan="2">................................................................................................................</td>
                        </tr>
                        <tr>
                            <td valign="top">Interface</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>
                                <table>
                                    <tr>
                                        <td valign="top"></td>
                                        <td>................................................................................................................</td>
                                    </tr>
                                </table>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td valign="top">IP Public</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>................................................................................................................</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td valign="top">SLA</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>98,5 %</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td valign="top">Others</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>................................................................................................................</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3" align="center" style="padding-top:10px;">
                <table style="width:90%;" border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width:35%; height:35px; font-weight:bold;" align="center">A-End</td>
                        <td style="width:25%; font-weight:bold;" align="center">Point Location</td>
                        <td style="width:35%; font-weight:bold;" align="center">B-End</td>
                    </tr>
                    <tr>
                        <td style="height:35px;" align="center">........................................................</td>
                        <td align="center">Site Name</td>
                        <td align="center">........................................................</td>
                    </tr>
                    <tr>
                        <td style="height:35px;" align="center">........................................................</td>
                        <td align="center">Building Floor</td>
                        <td align="center">........................................................</td>
                    </tr>
                    <tr>
                        <td style="height:35px;" align="center">........................................................</td>
                        <td align="center">Address</td>
                        <td align="center">........................................................</td>
                    </tr>
                    <tr>
                        <td style="height:35px;" align="center">........................................................</td>
                        <td align="center">Contact Person</td>
                        <td align="center">........................................................</td>
                    </tr>
                    <tr>
                        <td style="height:35px;" align="center">........................................................</td>
                        <td align="center">Title/Position</td>
                        <td align="center">........................................................</td>
                    </tr>
                    <tr>
                        <td style="height:35px;" align="center">........................................................</td>
                        <td align="center">Mobile Number</td>
                        <td align="center">........................................................</td>
                    </tr>
                    <tr>
                        <td style="height:35px;" align="center">........................................................</td>
                        <td align="center">Notes</td>
                        <td align="center">........................................................</td>
                    </tr>
                    <tr>
                        <td style="height:35px;" align="center">........................................................</td>
                        <td align="center">Coordinate</td>
                        <td align="center">........................................................</td>
                    </tr>
                </table>
            </td>
        </tr> 
        <!--
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:5px;">
                    H. Required document
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top">KTP</td>
                            <td>..................................................</td>
                            <td valign="top" width="10"></td>
                            <td valign="top">Passport</td>
                            <td>..................................................</td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
        -->
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:5px;">
                    H. Your Authorization
                </div>
                <div style="margin-top:5px;">
                    <table style="width:100%;">
                    <tr style="width:100%;">
                        <td style="width:50%;">
                            <table>
                                <tr>
                                    <td>Company/Institution</td>
                                    <td width="10" align="center">:</td>
                                    <td>.......................................</td>
                                </tr>
                                <tr>
                                    <td colspan="3" valign="bottom" align="center" style="padding-top:55px;">
                                        <div style="color:#cccccc">(TTD)</div>
                                        ...................................................................................
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td width="10" align="center">:</td>
                                    <td>.......................................</td>
                                </tr>
                                <tr>
                                    <td>Title/Position</td>
                                    <td width="10" align="center">:</td>
                                    <td>.......................................</td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td width="10" align="center">:</td>
                                    <td>.......................................</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width:50%;">
                            <table>
                                <tr>
                                    <td>Company</td>
                                    <td width="10" align="center">:</td>
                                    <td>PT. Gading Bhakti Utama</td>
                                </tr>
                                <tr>
                                    <td colspan="3" valign="bottom" align="center" style="padding-top:55px;">
                                        <div style="color:#cccccc">(TTD)</div>
                                        ...................................................................................
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td width="10" align="center">:</td>
                                    <td>Dendin Syihabudin</td>
                                </tr>
                                <tr>
                                    <td>Title/Position</td>
                                    <td width="10" align="center">:</td>
                                    <td>Direktur</td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td width="10" align="center">:</td>
                                    <td>.......................................</td>
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
                <div style="font-weight:bold; margin-top:5px;">
                    I. For Official Use Only
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top">GBU Representative</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>................................................................................................................</td>
                        </tr>
                        <tr>
                            <td valign="top">Position/Title</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>................................................................................................................</td>
                        </tr>
                        <tr>
                            <td valign="top">Handphone</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>................................................................................................................</td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style=" margin-top:30px;">
                    <div>1. Pendahuluan</div>
                    <div style="padding-left:15px;">
                        <table>
                            <tr>
                                <td valign="top">1.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Syarat   dan  ketentuan   ini  ("Syarat   dan  Ketentuan")    akan mengatur  penyediaan   layanan  (Layanan"  sesuai  definisi  di bawah ini) oleh dan antara Gading Bhakti Utama ("GBU") dan PELANGGAN (sesuai syarat yang didefinisikan  di bawah ini. Syarat  dan  Ketentuan  ini   merupakan   bagian  dari  Formulir Berlangganan  (sesuai  syarat yang didefinisikan  di bawah  ini), Jika  Formulir  Berlangganan telah berjalan, PELANGGAN dianggap telah  membaca,  memahami, dan menerima  Syarat dan Ketentuan ini.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>2. Definisi - definisi</div>
                    <div style="padding-left:15px;">Dalam  Syarat dan Ketentuan  ini:</div>
                    <div style="padding-left:15px;">
                        <table>
                            <tr>
                                <td valign="top">2.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Layanan: berarti  layanan GBU yang ditentukan oleh PELANGGAN dalam Formulir Berlangganan.
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">2.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN: Pihak yang melakukan Kontrak Layanan dengan GBU untuk menggunakan Layanan GBU.
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">2.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Kontrak Layanan: Formulir Berlangganan GBU yang ditandatangani oleh PELANGGAN atau perwakilan resmi dari PELANGGAN  bersama dengan Syarat dan Ketentuan ini. Biaya Layanan dan setiap peraturan terkait lainnya, pedoman, dan batasan penggunaan / larangan yang berlaku untuk Layanan sebagaimana diberitahukan kepada PELANGGAN dari waktu ke waktu.
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">2.4</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Biaya: adalah biaya instalasi, biaya berlangganan dan biaya lain yang dikenakan oleh GBU sehubungan dengan penyediaan Layanan.
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">2.5</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Jangka Waktu Minimum: Jangka waktu minimum berlangganan yaitu 1 (satu) tahun sebagaimana   tercantum.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>3.  Periode Berlangganan</div>
                    <div style="padding-left:15px;">
                        <table>
                            <tr>
                                <td valign="top">3.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Periode Berlangganan
                                </td>
                            </tr>
                        </table>
                        <div style="padding-left:20px;">
                            <table>    
                                <tr>
                                    <td valign="top">a.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Jangka waktu Layanan akan dimulai pada Tanggal Aktivasi Layanan dan akan berakhir pada   akhir masa tahun pertama, sesuai dengan “Jangka Waktu Minimum".
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">b.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Setelah jangka waktu minimum,  Kontrak Layanan akan diperbarui secara otomatis, kecuali jika diakhiri sesuai dengan klausul 7, 8, 9, 10, atau  14.8 dari Syarat dan Ketentuan ini.
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">c.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Permintaan peningkatan kapasitas Layanan (Upgrade) selama dan setelah Jangka Waktu  Minimum diperbolehkan.
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">d.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Peningkatan kapasitas layanan (Upgrade) tidak akan merubah Jangka  Waktu  Minimum.
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">e.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Penurunan kapasitas layanan (Downgrade) tidak dapat dilakukan oleh PELANGGAN sebelum  berakhirnya Jangka Waktu  Minimum.
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">f.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        PELANGGAN dapat mengalihkan Layanan dari satu titik ke titik lain, secara internal dan eksternal, setelah memberikan pemberitahuan tertulis kepada GBU  minimal empat belas (14) hari kalender. Biaya pemindahan  layanan internal / eksternal akan dikenakan kepada PELANGGAN. Pemindahan layanan eksternal  tergantung pada ketersediaan Layanan di area yang diminta oleh PELANGGAN.
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">g.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Biaya berlangganan  bulanan  akan ditagih  sesuai  dengan klausul 14. Biaya berlangganan bulanan akan dihitung secara prorata mulai dari tanggal di mana terjadi peningkatan   kapasitas layanan  atau penurunan kapasitas layanan terjadi, sebagaimana berlaku, jika dilakukan  tidak di awal  bulan tagihan.
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div style="padding-left:15px;">3.2 Syarat dan Ketentuan untuk Pembaruan Otomatis:</div>
                    <div style="padding-left:40px;">Diperbaharui  secara otomatis sesuai dengan klausul 3.4.b, Syarat dan Ketentuan yang sama akan berlaku, termasuk setiap perubahan terhadap Syarat dan Ketentuan ini yang telah dikeluarkan  sesuai dengan klausul 12.4 hingga tanggal pembaruan.</div>
                    <br/>
                    <div>4.	Aktivasi  Layanan</div>
                    <div style="padding-left:15px;">Layanan akan diaktivasikan sesuai dengan persyaratan yang ditetapkan dalam pasal 4 ini atau bagian lain dari Syarat dan Ketentuan ini.</div>
                    <div style="padding-left:20px;">4.1 Layanan yang ditawarkan tergantung pada ketersediaan layanan GBU di area tempat PELANGGAN.</div>
                    <div style="padding-left:17px;">
                        <table>
                            <tr>
                                <td valign="top">4.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Untuk  memastikan bahwa Layanan GBU tersedia dan berkualitas, survey harus dilakukan oleh   GBU sebelum menyediakan Layanan.
                                </td>
                            </tr>
                        </table>   
                    </div>
                    <div style="padding-left:20px;">4.3 Jalur akses akan dipasang untuk PELANGGAN oleh GBU.</div>
                    <div style="padding-left:20px;">4.4 PELANGGAN harus memiliki perangkat agar dapat menerima Layanan.</div>
                    <div style="padding-left:17px;">
                        <table>
                            <tr>
                                <td valign="top">4.5</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Perangkat PELANGGAN yang digunakan atau dipasang oleh PELANGGAN sehubungan dengan Layanan harus:
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:48px;">a. Secara teknis kompatibel dengan Layanan dan tidak membahayakan jaringan GBU atau jaringan lain;</div>
                    <div style="padding-left:48px;">b. terhubung dan digunakan sesuai dengan instruksi, standar dan hukum yang relevan.</div>
                    <div style="padding-left:17px;">
                        <table>
                            <tr>
                                <td valign="top">4.6</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Layanan akan diaktivsi dan efektif setelah layanan dan fasilitas GBU siap dioperasikan dan dikonfirmasi dengan Berita Acara Aktivasi oleh para pihak.
                                </td>
                            </tr>
                        </table>    
                    </div>
                    <br/>
                    <div>5. Persiapan dan Akes di lokasi PELANGGAN</div>
                	<div style="padding-left:15px;">5.1	PELANGGAN setuju untuk menyiapkan tempat dan memberikan GBU akses ke tempat tersebut.</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">5.2</td>
                                <td>
                                    PELANGGAN wajib, bilamana disyaratkan  oleh GBU, memastikan bahwa personil yang berwenang dari GBU dizinkan untuk memusuki setiap tempat milik PELANGGAN pada saat yang ditentukan oleh GBU dan tetap berada di tempat tersebut untuk periode yang mungkin diperlukan untuk tujuan pemeriksaan, perbaikan, atau pengujian apa pun yang relevan dengan ketentuan Layanan.
                                </td>
                            </tr>
                        </table>  
                    </div>
                    <br/>
                    <div>6.	Penyalahgunaan Layanan</div>
                	<div style="padding-left:15px;">6.1 Melakukan perubahan terhadap perangkat dan/atau konfigurasi Layanan tanpa sepengetahuan GBU,</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">6.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Memindahkan Layanan selain di lokasi yang telah di tetapkan sebelumnya dan/atau  memindahkan titik  interkoneksi  tanpa sepengetahuan dan persetujuan tertulis GBU,
                                </td>
                            </tr>
                        </table> 
                	</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">6.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Menggunakan  Layanan  untuk  tindakan-tindakan  yang bertentangan dengan SARA, nilai moral, etika, kesusilaan, kepatutan, serta hukum, hacking dan/atau spamming dan/atau flooding dan/atau spoofing dan/atau hoax dan/atau pemalsuan e-mail dan/atau pelanggaran Hak Atas Kekayaan  Intelektual (HAKI), dalam arti seluas-luasnya.
                                </td>
                            </tr>
                        </table> 
                    </div>
                    <br/>
                    <div>7.	Interupsi Jaringan</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">7.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN memahami bahwa dari waktu ke waktu GBU dapat melakukan pemeliharaan atau pengujian, atau memperbaiki kerusakan jaringan milik GBU, atau mungkin ada pemadaman yang  tidak direncanakan karena alasan apa pun yang dapat menyebabkan gangguan pada Layanan.  GBU akan menggunakan upaya yang  wajar untuk  segera  memperbaiki kesalahan yang terjadi di dalam jaringannya, dan untuk meminimalkan periode pemadaman yang tidak direncanakan. PELANGGAN memahami bahwa GBU dapat mengubah spesifikasi teknis Layanan, dan setiap perubahan  tidak mempengaruhi secara material substansi atau kinerja Layanan. GBU akan berusaha untuk  menjaga stabilitas Layanan atau gangguan seminimal mungkin dan akan memberikan pemberitahuan  terlebih  dahulu  kepada  PELANGGAN  jika dapat dilakukan sasuai  ketentuan dari GBU,
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">7.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dalam hal GBU gagal memenuhi tingkat Layanan (Service Level Agreement)  yang tercantum dalam Formulir Berlangganan ini, sedangkan PELANGGAN telah memenuhi semua kewajibannya yang dinyatakan dalam Formulir Berlangganan ini, maka GBU akan memberikan restitusi kepada PELANGGAN.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">7.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Jumlah  ganti rugi yang diberikan kepada PELANGGAN akan dikompensasi sebagai penyesuaian biaya pada faktur  bulanan berikutnya dengan rumus sebagai berikut
                                </td>
                            </tr>
                        </table>
                    </div>
            		<div style="padding-left:40px;">Restitusi  = (SLA - SLM)*MF</div>
            		<div style="padding-left:40px;">SLM = (a-b)/ a * 100%</div>
            		<div style="padding-left:40px;" >SLA = Tingkat Layanan</div>
            		<div style="padding-left:40px;">SLM = Tingkat Layanan Aktual per bulan</div>
            		<div style="padding-left:40px;">MF = Biaya Bulanan</div>
            		<div style="padding-left:40px;">a = Jam per bulan</div>
            		<div style="padding-left:40px;">b = Waktu downtime per bulan</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">7.4</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Restitusi dapat diberikan jika  PELANGGAN  mengusulkan selambat-lambatnya dalam kurun waktu 3 bulan setelah gangguan.  Dalam hal restitusi diusulkan melebihi dari batas waktu, restitusi tidak dapat diberikan,
                                </td>
                            </tr>
                        </table>
                	</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">7.5</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Tingkat layanan tidak berlaku untuk peristiwa force majeure sebagaimana ditentukan dalam ayat 9.
                                </td>
                            </tr>
                        </table>
                	</div>
                    <br/>
                    <div>8. Pembatalan Layanan oleh GBU</div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">8.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dengan  mengacu  pada klausul 14.1 di bawah ini, GBU dapat menghentikan Layanan apabila ada tagihan yang belum dibayar dari PELANGGAN, 
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">8.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN tunduk pada penghentian Layanan, tanpa aturan, peraturan atau kebijakan dari otoritas pemerintah yang memiliki yurisdiksi atas Layanan, atau  karena alasan suatu perintah atau keputusan pengadilan atau lainnya, otoritas pemerintah yang memiliki yurisdiksi melarang GBU memberikan Layanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>9.	Pembatalan Berlangganan</div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">9.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Jika PELANGGAN membatalkan berlangganan untuk Layanan sebelum dimulainya pemasangan, GBU dapat menagih Biaya tertentu yang dianggap sesuai oleh GBU untuk menutupi biaya awal yang sudah dikeluarkan tetapi tidak melebihi Biaya Instalasi yang tercantum di dalam Formulir Berlangganan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">9.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Saat pemasangan Layanan (rencana jalur, peralihan, pemrograman, konfigurasi peralatan) telah dimulai sebelum pembatalan, GBU dapat menagih biaya instalasi tetapi tidak melebihi Biaya Instalasi yang tercantum di dalam Formulir Berlangganan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>10. Penghentian oleh PELANGGAN</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">10.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN dapat mengakhiri Kontrak Layanan setelah memberikan pemberitahuan tertulis selambat-lambatnya tiga puluh (30) hari kalender kepada GBU.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">10.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dalam hal kontrak Layanan dihentikan sebelum akhir jangka waktu minimum, PELANGGAN harus membayar biaya berlangganan untuk sisa bulan dari jangka waktu minimum 1 (satu) tahun.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>11. Tanggung jawab PELANGGAN</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN harus membayar kepada GBU biaya berlangganan tepat waktu sebagaimana ditentukan dalam tagihan bulanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN harus bertanggung jawab atas kehilangan atau kerusakan, dengan atau tanpa sepengetahuan atau izin mereka, terhadap perangkat apa pun di tempat mereka yang dimiliki atau disediakan / dipasang oleh GBU.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN akan membayar kepada GBU biaya perbaikan perangkat tersebut dan harus memberikan pernyataan secara tertulis untuk tidak merusak atau menyalahgunakan perangkat di kemudian hari.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.4</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN setuju untuk mematuhi semua hukum, aturan, dan peraturan yang berlaku sehubungan dengan Layanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.5</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN setuju untuk memberi tahu GBU jika pindah tempat kedudukannya dan apabila ada perubahan informasi alamat, detail kontak dan / atau nomor telepon.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.6</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN sepenuhnya bertanggung jawab atas data yang diambil, disimpan, atau dikirim melalui Layanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>12. Tanggung jawab GBU</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">12.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU berkewajiban melakukan pengujian awal pada fisik jaringan untuk memastikan bahwa Layanan yang diberikan kepada tempat PELANGGAN dapat diaktivasi.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>

                            <tr>
                                <td valign="top">12.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU berkewajiban menjaga kualitas Layanan sesuai dengan Service Level Agreement yang tercantum di dalam Formulir Berlangganan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">12.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU berkewajiban untuk menghentikan atau membatasi Layanan ketika diharuskan oleh kondisi di luar kendalinya, atau ketika Layanan digunakan melanggar ketentuan-ketentuan Syarat dan Ketentuan ini, kebijakan dan prosedur GBU atau hukum.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">12.4</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU berkewajiban untuk mengubah parameter Layanan yang dianggap diperlukan untuk memenuhi peningkatan, penyempurnaan atau perluasan teknologi.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">12.5</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU dapat mengubah Syarat dan Ketentuan ini sebagaimana dianggap perlu PELANGGAN akan diberikan pemberitahuan tentang setiap perubahan pada Syarat dan Ketentuan ini.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>13. Batasan Liabilitas GBU</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">13.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Kewajiban. Layanan disediakan sebagaimana adanya. Sejauh yang diizinkan oleh hukum, GBU tidak bertanggung jawab kepada PELANGGAN atas kehilangan atau kerusakan baik langsung, tidak langsung atau konsekuensial, yang dihasilkan dari penyediaan Layanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">13.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Ganti rugi. PELANGGAN tidak dapat menuntut GBU dari dan terhadap setiap kerugian, kewajiban, termasuk, tanpa batasan biaya dan biaya pengacara yang diakibatkan dari klaim atau tuntutan pihak ketiga (termasuk, tanpa batasan, untuk cedera atau kematian) yang disebabkan oleh atau timbulnya dari kelalaian atau kesalahan yang disengaja dan pelanggaran PELANGGAN, staf, karyawan, mitra, dan afiliasinya.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>14. Penagihan</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">14.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU akan memberikan tagihan bulanan kepada PELANGGAN, termasuk biaya layanan lain yang digunakan PELANGGAN, bersama dengan tunggakan dan biaya sebelumnya jika ada.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">14.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Biaya berlangganan bulanan akan ditagihkan diawal (advance payment).
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">14.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN setuju untuk membayar semua tagihan layanan dalam batas waktu yang ditentukan sesuai tagihan yang dikeluarkan oleh GBU menggunakan salah satu metode
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>15. Force Majeure</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">15.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Yang dimaksud Keadaan Kahar dalam perjanjian ini adalah kejadian-kejadian di luar kekuasaan  Para Pihak yang mengakibatkan terhentinya atau tertundanya pelaksanaan perjanjian ini seperti  gempa bumi, banjir, kebakaran, tanah longsor, pemogokan umum, huru-hara, perang, pemberontakan, dan lain-lain yang menyebabkan salah satu Pihak tidak dapat  memenuhi kewajibannya.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">15.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dalam hal Keadaan Kahar seperti dimaksud ayat 15.1 Pasal  ini menimpa salah satu Pihak, maka  Pihak yang terkena Keadaan Kahar  wajib  memberitahukan  kepada  Pihak  lainnya  dalam waktu selambat-lambatnya 7 (tujuh)  hari kalender  sejak mulai terkena Keadaan Kahar yang dibenarkan  oleh yang berwenang.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">15.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Semua kerugian dan biaya yang diderita oleh salah satu pihak sebagai akibat terjadinya Keadaan  Kahar bukan merupakun tanggung jawab pihak yang lain.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>16 Penyelesaian Perselisihan</div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">16.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Apabila terjadi perselisihan terkait dengan kontrak ini, Para Pihak setuju untuk menyelesaikan perselisihan melalui musyawarah untuk mufakat.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">16.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dalam hal sengketa tidak dapat di selesaikan melalui musyawarah, Badan Arbitrase Nasional Indonesia (BANI) diminta untuk menyelesaikan sengketa oleh para arbiternya sesuai dengan  aturan prosedural BANI pada tingkat pertama dan terakhir.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">16.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Selama perselisihan masih dalam penyelesaian, Para Pihak tetap melaksanakan hak dan kewajiban masing-musing sesuai yang diatur dalam Perjanjian ini.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">16.4</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Pelaksanaan Syarat dan Ketentuan Kontrak Layanan ini tunduk dan diatur berdasarkan  hukum  Negara Republik Indonesia, termasuk peraturan serta kebijakan pemerintah lain nya mengenai telekomunikasi yang berlaku di Indonesia.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>17. Kerahasiaan</div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">17.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Para pihak harus mematuhi untuk menjaga kerahasiaan semua data, informasi, atau dokumen  dalam bentuk apa pun yang diperoleh dalam pelaksanaan Kontrak Layanan ini.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">17.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dokumen dalam bentuk data, laporan, dan informasi lain yang diterima oleh  Para  Pihak  milik  Para Pihak dan  tidak  akan disampaikan  kepada  pihak  lain baik secara lisan maupun tertulis tanpa persetujuan dari pihak lain untuk  masa berlaku Kontrak Layanan serta setelah pengakhiran Kontrak Layanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>18. Penutup</div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">18.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Pengakhiran Layanan ini sesuai dengan ketentuan yang termuat di dalamnya dapat dilakukan  tanpa  harus didasarkan pada surat perintah pengadilan dan Para Pihak dengan ini sepakat untuk  mengesampingkan  keberlakuan Pasal 1266 dan 1267 dari  Kitab Undang-Undang Hukum   Perdata sejauh mengenai kewajiban untuk mendapatkan persetujuan dari pengadilan untuk   melakukan  pengakhiran  terhadup  Layanan ini.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">18.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Formulir Berlangganan dan Lampiran Syarat dan Ketentuan ini adalah bagian yang tidak terpisahkan dari Kontrak Layanan dan memiliki kekuatan hukum yang sama.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">18.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Formulir Berlangganan dibuat dalam 2 (dua) rangkap asli masing-masing memiliki isi dan susunan kata yang sama  dan memiliki penegakan  hukum yang sama ketika  ditandatangani oleh kedua belah pihak.
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr> 
    </table>
    </div>
    <?php } else { ?>
    <div style="padding-left:15px; padding-right:15px;">
    <?php 
    $query = DB::select("select * from subcription where subc_id = '$ID'");
    foreach($query as $row){
    ?>
    <table style="font-family:Verdana, Arial, Helvetica, sans-serif; width:100%;">
        <tr>
            <td><img src="<?php echo 'https://reseller.gbu.net.id/source/assets/mat/kopsurat2.png'; ?>" width="130"></td>
            <td valign="top" align="center" valign="middle" style="padding-top:50px;">
                <div style="font-size:27px; font-weight:bold;">SUBSCRIPTION FORM</div>
            </td>
            <td align="right" valign="bottom">
                <table>
                    <tr>
                        <td>Date</td>
                        <td width="10" align="center">:</td>
                        <td><?php echo substr($row->subc_date, 8, 2).'/'.substr($row->subc_date, 5, 2).'/'.substr($row->subc_date, 0, 4); ?></td>
                    </tr>
                    <tr>
                        <td>SF Number</td>
                        <td width="10" align="center">:</td>
                        <td><?php echo $row->subc_code; ?></td>
                    </tr>
                </table>    
            </td>
        </tr>
    </table>
        <!--
        <tr>
            <td colspan="3">___________________________________________________________________________________________________</td>
        </tr>
        -->
    <table style="font-family:Verdana, Arial, Helvetica, sans-serif; width:100%;">    
        <!--
        <tr>
            <td align="center" colspan="3">
                <table>
                    <tr>
                        <td>Tanggal</td>
                        <td width="10" align="center">:</td>
                        <td><?php echo substr($row->subc_date, 8, 2).'/'.substr($row->subc_date, 5, 2).'/'.substr($row->subc_date, 0, 4); ?></td>
                        <td width="10"></td>
                        <td>No. SF</td>
                        <td width="10" align="center">:</td>
                        <td><?php echo $row->subc_code; ?></td>
                    </tr>
                </table>    
            </td>
        </tr>
        -->
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    A. Type of Request
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top"></td>
                            <td><?php echo $row->subc_type; ?></td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>  
        <!--
		<tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    B. Type of Customer
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top"></td>
                            <td>
                                <?php 
                                if($row->subc_customer_type == 'ISP (Internet Service Provider)'){
                                    echo $row->subc_customer_type; 
                                } else if($row->subc_customer_type == 'Instansi / Perusahaan'){
                                    echo 'Company';
                                } else if($row->subc_customer_type == 'Perorangan'){
                                    echo 'Personal';
                                }
                                
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>  
		-->
        <tr>
            <td colspan="3" style="padding-bottom:10px;">
                <div style="font-weight:bold; margin-top:7px;">
                    B. Type of Service and Commercial
                </div>
                <div style="margin-top:5px; z-index:100;">
                    <table style="width:100%;" border="1" cellpadding="0" cellspacing="0">
					  <tr style="font-weight:bold; height:30px;">
						<td width="25">No</td>
						<td>Name of Service</td>
						<td>Service Price</td>
						<td width="100">Tax Status</td>
						<td>Contract Periode</td>
						<td>Start Date of Service</td>
						<td>End Date of Service</td>
					  </tr>
					<?php 
                    $i = 1;
                    $total = 0;
                    $qty = 0;
					$no = 1;
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
                        $total = $total + $row3->sude_total;
                        $qty = $qty + $row3->sude_qty;
                        $last = date('Y-m-d', strtotime("+".$row3->sude_num_periode." months", strtotime($row->subc_start)));
                    ?>
						  <tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $prod; ?></td>
							<td>
								Rp. <?php if($row3->sude_subtotal){ if($row3->sude_type == 'Berlangganan setiap bulan'){ echo str_replace(',', '.', number_format($row3->sude_subtotal)).' / '.$unit; } else { echo str_replace(',', '.', number_format($row3->sude_subtotal)).' / '.$unit; } } else { echo 0; } ?>
							</td>
							<td><?php echo $row->subc_tax_type; ?></td>
							<td><?php if($row3->sude_num_periode > 0){ echo $row3->sude_num_periode.' month'; } else { echo '-'; } ?></td>
							<td><?php if($row3->sude_num_periode > 0){echo substr($row->subc_start, 8, 2).'/'.substr($row->subc_start, 5, 2).'/'.substr($row->subc_start, 0, 4); } else { echo '-'; } ?></td>
							<td><?php if($row3->sude_num_periode > 0){echo substr($last, 8, 2).'/'.substr($last, 5, 2).'/'.substr($last, 0, 4); } else { echo '-'; } ?></td>
						  </tr>
						<!--
						<table style="width:100%;">
                            <tr>
                                <td width="200">Name of Service</td>
                                <td width="10" align="center">:</td>
                                <td ><?php echo $prod; ?></td>
                            </tr>
                            <tr>
                                <td>Service Price</td>
                                <td width="10" align="center">:</td>
                                <td>
                                    Rp. <?php if($row3->sude_subtotal){ if($row3->sude_type == 'Berlangganan setiap bulan'){ echo str_replace(',', '.', number_format($row3->sude_subtotal)).' / '.$unit; } else { echo str_replace(',', '.', number_format($row3->sude_subtotal)).' / '.$unit; } } else { echo 0; } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Tax Status</td>
                                <td width="10" align="center">:</td>
                                <td><?php echo $row->subc_tax_type; ?></td>
                            </tr>
                            <tr>
                                <td>Contract Periode</td>
                                <td width="10" align="center">:</td>
                                <td><?php if($row3->sude_num_periode > 0){ echo $row3->sude_num_periode.' month'; } else { echo '-'; } ?></td>
                            </tr>
                            <tr>
                                <td>Start Date of Service</td>
                                <td width="10" align="center">:</td>
                                <td><?php if($row3->sude_num_periode > 0){echo substr($row->subc_start, 8, 2).'/'.substr($row->subc_start, 5, 2).'/'.substr($row->subc_start, 0, 4); } else { echo '-'; } ?></td>
                            </tr>
                            <tr>
                                <td>End Date of Service</td>
                                <td width="10" align="center">:</td>
                                <td><?php if($row3->sude_num_periode > 0){echo substr($last, 8, 2).'/'.substr($last, 5, 2).'/'.substr($last, 0, 4); } else { echo '-'; } ?></td>
                            </tr>
                        </table>
						-->
                    <?php $no++; } ?>
					</table>
                    <!--
                    <table style="width:95%;" border="1" cellpadding="0" cellspacing="0">
                        <tr style="font-weight:bold;">
                            <td style="width:5%; height:45px;" align="center">No.</td>
                            <td style="width:37%;" align="center">Item</td>
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
                            <td align="center" style="padding:5px 5px 5px 5px;"><?php echo $i; ?></td>
                            <td style="padding:5px 5px 5px 5px;"><?php echo $prod; ?></td>
                            <td align="center" style="padding:5px 5px 5px 5px;"><?php if($row3->sude_num_periode > 0){ echo $row3->sude_num_periode; } ?></td>
                            <td align="center" style="padding:5px 5px 5px 5px;"><?php echo $row3->sude_qty; ?></td>
                            <td align="center"><?php echo $unit; ?></td>
                            <td align="right" style="padding:5px 5px 5px 5px;">Rp. <?php if($row3->sude_total){ if($row3->sude_type == 'Berlangganan setiap bulan'){ echo str_replace(',', '.', number_format($row3->sude_total)); } else { echo str_replace(',', '.', number_format($row3->sude_total)); } } else { echo 0; } ?></td>
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
		<?php 
		$prov_name = '';
		$query3 = DB::select("select prov_name from province where prov_id = '$row->subc_province'");
		foreach($query3 as $row3){
			$prov_name = ' / '.$row3->prov_name;
		}
		
		$city_name = '';
		$query3 = DB::select("select city_name from city where city_id = '$row->subc_city'");
		foreach($query3 as $row3){
			$city_name = $row3->city_name;
		}
		
		$keca_name = '';
		$query3 = DB::select("select keca_name from kecamatan where keca_id = '$row->subc_kecamatan'");
		foreach($query3 as $row3){
			$keca_name2 = ' - '.$row3->keca_name;
		}
		
		$subc_postal_code = '';
		if($row->subc_postal_code){
			$subc_postal_code = ' / '.$row->subc_postal_code;
		}
		echo $city_name.$prov_name.$keca_name.$subc_postal_code;
		$query3 = DB::select("select * from member where memb_code = '$row->memb_code'");
		foreach($query3 as $row3){
			echo $row3->memb_company_office_phone; 
		}
		?>
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    C. Contact Details
                </div>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top" width="200">Name</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td><?php echo $row3->memb_name; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td valign="top">Title / Position</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td><?php echo $row3->memb_position; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td valign="top">Email</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td>
                                <?php echo $row3->memb_email; ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td valign="top">Handphone</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td>
                                <?php echo $row3->memb_phone; ?>
                            </td>
                            <td valign="top">
                            </td>    
                        </tr>
                        <!--
                        <tr>
                            <td valign="top">Office Number</td>
                            <td width="20" valign="top" align="center">:</td>
                            <td>
                                <?php echo $row3->memb_company_office_phone; ?>
                            </td>
                            <td valign="top">
                            </td>    
                        </tr>
                        -->
                        <tr>
                            <td valign="top">ID Document Type</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>
                               <?php echo $row->subc_customer_identity_type; ?>
                            </td>
                            <td valign="top">
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">ID Document Number</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td>
                                <?php 
                                echo $row3->memb_ktp_number; 
                                ?>
                            </td>
                            <td valign="top">
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:15px;">
                    D. For Official Use Only
                </div>
				<?php
				$subc_gbu_representative = '';
				$subc_position_title = '';
				$subc_handphone = '';
				$query3 = DB::select("select memb_name, memb_position, memb_phone from member where memb_code = '$row->subc_update_by'");
				foreach($query3 as $row3){
					$subc_gbu_representative = $row3->memb_name;
					$subc_position_title = $row3->memb_position;
					$subc_handphone = $row3->memb_phone;
				}
				?>
                <div style="margin-top:5px;">
                    <table>
                        <tr>
                            <td valign="top" width="200">GBU Representative</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td><?php echo $subc_gbu_representative; ?></td>
                        </tr>
                        <tr>
                            <td valign="top">Handphone</td>
                            <td valign="top" width="20" align="center">:</td>
                            <td><?php echo $subc_handphone; ?></td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style=" margin-top:30px;">
                    <div>1. Pendahuluan</div>
                    <div style="padding-left:15px;">
                        <table>
                            <tr>
                                <td valign="top">1.1</td>
                                <td style="padding-left:5px; text-align:justify;">
                                    Syarat   dan  ketentuan   ini  ("Syarat   dan  Ketentuan")    akan mengatur  penyediaan   layanan  (Layanan"  sesuai  definisi  di bawah ini) oleh dan antara Gading Bhakti Utama ("GBU") dan PELANGGAN (sesuai syarat yang didefinisikan  di bawah ini. Syarat  dan  Ketentuan  ini   merupakan   bagian  dari  Formulir Berlangganan  (sesuai  syarat yang didefinisikan  di bawah  ini), Jika  Formulir  Berlangganan telah berjalan, PELANGGAN dianggap telah  membaca,  memahami, dan menerima  Syarat dan Ketentuan ini.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>2. Definisi - definisi</div>
                    <div style="padding-left:15px;">Dalam  Syarat dan Ketentuan  ini:</div>
                    <div style="padding-left:15px;">
                        <table>
                            <tr>
                                <td valign="top">2.1</td>
                                <td style="padding-left:5px; text-align:justify;">
                                    Layanan: berarti  layanan GBU yang ditentukan oleh PELANGGAN dalam Formulir Berlangganan.
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">2.2</td>
                                <td style="padding-left:5px; text-align:justify;">
                                    PELANGGAN: Pihak yang melakukan Kontrak Layanan dengan GBU untuk menggunakan Layanan GBU.
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">2.3</td>
                                <td style="padding-left:5px; text-align:justify;">
                                    Kontrak Layanan: Formulir Berlangganan GBU yang ditandatangani oleh PELANGGAN atau perwakilan resmi dari PELANGGAN  bersama dengan Syarat dan Ketentuan ini. Biaya Layanan dan setiap peraturan terkait lainnya, pedoman, dan batasan penggunaan / larangan yang berlaku untuk Layanan sebagaimana diberitahukan kepada PELANGGAN dari waktu ke waktu.
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">2.4</td>
                                <td style="padding-left:5px; text-align:justify;">
                                    Biaya: adalah biaya instalasi, biaya berlangganan dan biaya lain yang dikenakan oleh GBU sehubungan dengan penyediaan Layanan.
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">2.5</td>
                                <td style="padding-left:5px; text-align:justify;">
                                    Jangka Waktu Minimum: Jangka waktu minimum berlangganan yaitu 1 (satu) tahun sebagaimana   tercantum.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>3.  Periode Berlangganan</div>
                    <div style="padding-left:15px;">
                        <table>
                            <tr>
                                <td valign="top">3.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Periode Berlangganan
                                </td>
                            </tr>
                        </table>
                        <div style="padding-left:20px;">
                            <table>    
                                <tr>
                                    <td valign="top">a.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Jangka waktu Layanan akan dimulai pada Tanggal Aktivasi Layanan dan akan berakhir pada   akhir masa tahun pertama, sesuai dengan “Jangka Waktu Minimum".
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">b.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Setelah jangka waktu minimum,  Kontrak Layanan akan diperbarui secara otomatis, kecuali jika diakhiri sesuai dengan klausul 7, 8, 9, 10, atau  14.8 dari Syarat dan Ketentuan ini.
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">c.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Permintaan peningkatan kapasitas Layanan (Upgrade) selama dan setelah Jangka Waktu  Minimum diperbolehkan.
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">d.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Peningkatan kapasitas layanan (Upgrade) tidak akan merubah Jangka  Waktu  Minimum.
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">e.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Penurunan kapasitas layanan (Downgrade) tidak dapat dilakukan oleh PELANGGAN sebelum  berakhirnya Jangka Waktu  Minimum.
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">f.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        PELANGGAN dapat mengalihkan Layanan dari satu titik ke titik lain, secara internal dan eksternal, setelah memberikan pemberitahuan tertulis kepada GBU  minimal empat belas (14) hari kalender. Biaya pemindahan  layanan internal / eksternal akan dikenakan kepada PELANGGAN. Pemindahan layanan eksternal  tergantung pada ketersediaan Layanan di area yang diminta oleh PELANGGAN.
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">g.</td>
                                    <td style="padding-left:5px;  text-align:justify;">
                                        Biaya berlangganan  bulanan  akan ditagih  sesuai  dengan klausul 14. Biaya berlangganan bulanan akan dihitung secara prorata mulai dari tanggal di mana terjadi peningkatan   kapasitas layanan  atau penurunan kapasitas layanan terjadi, sebagaimana berlaku, jika dilakukan  tidak di awal  bulan tagihan.
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div style="padding-left:15px;">3.2 Syarat dan Ketentuan untuk Pembaruan Otomatis:</div>
                    <div style="padding-left:40px;">Diperbaharui  secara otomatis sesuai dengan klausul 3.4.b, Syarat dan Ketentuan yang sama akan berlaku, termasuk setiap perubahan terhadap Syarat dan Ketentuan ini yang telah dikeluarkan  sesuai dengan klausul 12.4 hingga tanggal pembaruan.</div>
                    <br/>
                    <div>4.	Aktivasi  Layanan</div>
                    <div style="padding-left:15px;">Layanan akan diaktivasikan sesuai dengan persyaratan yang ditetapkan dalam pasal 4 ini atau bagian lain dari Syarat dan Ketentuan ini.</div>
                    <div style="padding-left:20px;">4.1 Layanan yang ditawarkan tergantung pada ketersediaan layanan GBU di area tempat PELANGGAN.</div>
                    <div style="padding-left:17px;">
                        <table>
                            <tr>
                                <td valign="top">4.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Untuk  memastikan bahwa Layanan GBU tersedia dan berkualitas, survey harus dilakukan oleh   GBU sebelum menyediakan Layanan.
                                </td>
                            </tr>
                        </table>   
                    </div>
                    <div style="padding-left:20px;">4.3 Jalur akses akan dipasang untuk PELANGGAN oleh GBU.</div>
                    <div style="padding-left:20px;">4.4 PELANGGAN harus memiliki perangkat agar dapat menerima Layanan.</div>
                    <div style="padding-left:17px;">
                        <table>
                            <tr>
                                <td valign="top">4.5</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Perangkat PELANGGAN yang digunakan atau dipasang oleh PELANGGAN sehubungan dengan Layanan harus:
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:48px;">a. Secara teknis kompatibel dengan Layanan dan tidak membahayakan jaringan GBU atau jaringan lain;</div>
                    <div style="padding-left:48px;">b. terhubung dan digunakan sesuai dengan instruksi, standar dan hukum yang relevan.</div>
                    <div style="padding-left:17px;">
                        <table>
                            <tr>
                                <td valign="top">4.6</td>
                                <td style="padding-left:5px; text-align:justify;">
                                    Layanan akan diaktivsi dan efektif setelah layanan dan fasilitas GBU siap dioperasikan dan dikonfirmasi dengan Berita Acara Aktivasi oleh para pihak.
                                </td>
                            </tr>
                        </table>    
                    </div>
                    <br/>
                    <div>5. Persiapan dan Akes di lokasi PELANGGAN</div>
                	<div style="padding-left:15px;">5.1	PELANGGAN setuju untuk menyiapkan tempat dan memberikan GBU akses ke tempat tersebut.</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">5.2</td>
                                <td style="text-align:justify;">
                                    PELANGGAN wajib, bilamana disyaratkan  oleh GBU, memastikan bahwa personil yang berwenang dari GBU dizinkan untuk memusuki setiap tempat milik PELANGGAN pada saat yang ditentukan oleh GBU dan tetap berada di tempat tersebut untuk periode yang mungkin diperlukan untuk tujuan pemeriksaan, perbaikan, atau pengujian apa pun yang relevan dengan ketentuan Layanan.
                                </td>
                            </tr>
                        </table>  
                    </div>
                    <br/>
                    <div>6.	Penyalahgunaan Layanan</div>
                	<div style="padding-left:15px;">6.1 Melakukan perubahan terhadap perangkat dan/atau konfigurasi Layanan tanpa sepengetahuan GBU,</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">6.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Memindahkan Layanan selain di lokasi yang telah di tetapkan sebelumnya dan/atau  memindahkan titik  interkoneksi  tanpa sepengetahuan dan persetujuan tertulis GBU,
                                </td>
                            </tr>
                        </table> 
                	</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">6.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Menggunakan  Layanan  untuk  tindakan-tindakan  yang bertentangan dengan SARA, nilai moral, etika, kesusilaan, kepatutan, serta hukum, hacking dan/atau spamming dan/atau flooding dan/atau spoofing dan/atau hoax dan/atau pemalsuan e-mail dan/atau pelanggaran Hak Atas Kekayaan  Intelektual (HAKI), dalam arti seluas-luasnya.
                                </td>
                            </tr>
                        </table> 
                    </div>
                    <br/>
                    <div>7.	Interupsi Jaringan</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">7.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN memahami bahwa dari waktu ke waktu GBU dapat melakukan pemeliharaan atau pengujian, atau memperbaiki kerusakan jaringan milik GBU, atau mungkin ada pemadaman yang  tidak direncanakan karena alasan apa pun yang dapat menyebabkan gangguan pada Layanan.  GBU akan menggunakan upaya yang  wajar untuk  segera  memperbaiki kesalahan yang terjadi di dalam jaringannya, dan untuk meminimalkan periode pemadaman yang tidak direncanakan. PELANGGAN memahami bahwa GBU dapat mengubah spesifikasi teknis Layanan, dan setiap perubahan  tidak mempengaruhi secara material substansi atau kinerja Layanan. GBU akan berusaha untuk  menjaga stabilitas Layanan atau gangguan seminimal mungkin dan akan memberikan pemberitahuan  terlebih  dahulu  kepada  PELANGGAN  jika dapat dilakukan sasuai  ketentuan dari GBU,
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">7.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dalam hal GBU gagal memenuhi tingkat Layanan (Service Level Agreement)  yang tercantum dalam Formulir Berlangganan ini, sedangkan PELANGGAN telah memenuhi semua kewajibannya yang dinyatakan dalam Formulir Berlangganan ini, maka GBU akan memberikan restitusi kepada PELANGGAN.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">7.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Jumlah  ganti rugi yang diberikan kepada PELANGGAN akan dikompensasi sebagai penyesuaian biaya pada faktur  bulanan berikutnya dengan rumus sebagai berikut
                                </td>
                            </tr>
                        </table>
                    </div>
            		<div style="padding-left:40px;">Restitusi  = (SLA - SLM)*MF</div>
            		<div style="padding-left:40px;">SLM = (a-b)/ a * 100%</div>
            		<div style="padding-left:40px;" >SLA = Tingkat Layanan</div>
            		<div style="padding-left:40px;">SLM = Tingkat Layanan Aktual per bulan</div>
            		<div style="padding-left:40px;">MF = Biaya Bulanan</div>
            		<div style="padding-left:40px;">a = Jam per bulan</div>
            		<div style="padding-left:40px;">b = Waktu downtime per bulan</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">7.4</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Restitusi dapat diberikan jika  PELANGGAN  mengusulkan selambat-lambatnya dalam kurun waktu 3 bulan setelah gangguan.  Dalam hal restitusi diusulkan melebihi dari batas waktu, restitusi tidak dapat diberikan,
                                </td>
                            </tr>
                        </table>
                	</div>
                	<div style="padding-left:12px;">
                	    <table>
                            <tr>
                                <td valign="top">7.5</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Tingkat layanan tidak berlaku untuk peristiwa force majeure sebagaimana ditentukan dalam ayat 9.
                                </td>
                            </tr>
                        </table>
                	</div>
                    <br/>
                    <div>8. Pembatalan Layanan oleh GBU</div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">8.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dengan  mengacu  pada klausul 14.1 di bawah ini, GBU dapat menghentikan Layanan apabila ada tagihan yang belum dibayar dari PELANGGAN, 
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">8.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN tunduk pada penghentian Layanan, tanpa aturan, peraturan atau kebijakan dari otoritas pemerintah yang memiliki yurisdiksi atas Layanan, atau  karena alasan suatu perintah atau keputusan pengadilan atau lainnya, otoritas pemerintah yang memiliki yurisdiksi melarang GBU memberikan Layanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>9.	Pembatalan Berlangganan</div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">9.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Jika PELANGGAN membatalkan berlangganan untuk Layanan sebelum dimulainya pemasangan, GBU dapat menagih Biaya tertentu yang dianggap sesuai oleh GBU untuk menutupi biaya awal yang sudah dikeluarkan tetapi tidak melebihi Biaya Instalasi yang tercantum di dalam Formulir Berlangganan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:12px;">
                        <table>
                            <tr>
                                <td valign="top">9.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Saat pemasangan Layanan (rencana jalur, peralihan, pemrograman, konfigurasi peralatan) telah dimulai sebelum pembatalan, GBU dapat menagih biaya instalasi tetapi tidak melebihi Biaya Instalasi yang tercantum di dalam Formulir Berlangganan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>10. Penghentian oleh PELANGGAN</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">10.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN dapat mengakhiri Kontrak Layanan setelah memberikan pemberitahuan tertulis selambat-lambatnya tiga puluh (30) hari kalender kepada GBU.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">10.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dalam hal kontrak Layanan dihentikan sebelum akhir jangka waktu minimum, PELANGGAN harus membayar biaya berlangganan untuk sisa bulan dari jangka waktu minimum 1 (satu) tahun.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>11. Tanggung jawab PELANGGAN</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN harus membayar kepada GBU biaya berlangganan tepat waktu sebagaimana ditentukan dalam tagihan bulanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN harus bertanggung jawab atas kehilangan atau kerusakan, dengan atau tanpa sepengetahuan atau izin mereka, terhadap perangkat apa pun di tempat mereka yang dimiliki atau disediakan / dipasang oleh GBU.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN akan membayar kepada GBU biaya perbaikan perangkat tersebut dan harus memberikan pernyataan secara tertulis untuk tidak merusak atau menyalahgunakan perangkat di kemudian hari.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.4</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN setuju untuk mematuhi semua hukum, aturan, dan peraturan yang berlaku sehubungan dengan Layanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.5</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN setuju untuk memberi tahu GBU jika pindah tempat kedudukannya dan apabila ada perubahan informasi alamat, detail kontak dan / atau nomor telepon.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">11.6</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN sepenuhnya bertanggung jawab atas data yang diambil, disimpan, atau dikirim melalui Layanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>12. Tanggung jawab GBU</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">12.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU berkewajiban melakukan pengujian awal pada fisik jaringan untuk memastikan bahwa Layanan yang diberikan kepada tempat PELANGGAN dapat diaktivasi.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">12.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU berkewajiban menjaga kualitas Layanan sesuai dengan Service Level Agreement yang tercantum di dalam Formulir Berlangganan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">12.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU berkewajiban untuk menghentikan atau membatasi Layanan ketika diharuskan oleh kondisi di luar kendalinya, atau ketika Layanan digunakan melanggar ketentuan-ketentuan Syarat dan Ketentuan ini, kebijakan dan prosedur GBU atau hukum.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">12.4</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU berkewajiban untuk mengubah parameter Layanan yang dianggap diperlukan untuk memenuhi peningkatan, penyempurnaan atau perluasan teknologi.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">12.5</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU dapat mengubah Syarat dan Ketentuan ini sebagaimana dianggap perlu PELANGGAN akan diberikan pemberitahuan tentang setiap perubahan pada Syarat dan Ketentuan ini.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>13. Batasan Liabilitas GBU</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">13.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Kewajiban. Layanan disediakan sebagaimana adanya. Sejauh yang diizinkan oleh hukum, GBU tidak bertanggung jawab kepada PELANGGAN atas kehilangan atau kerusakan baik langsung, tidak langsung atau konsekuensial, yang dihasilkan dari penyediaan Layanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">13.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Ganti rugi. PELANGGAN tidak dapat menuntut GBU dari dan terhadap setiap kerugian, kewajiban, termasuk, tanpa batasan biaya dan biaya pengacara yang diakibatkan dari klaim atau tuntutan pihak ketiga (termasuk, tanpa batasan, untuk cedera atau kematian) yang disebabkan oleh atau timbulnya dari kelalaian atau kesalahan yang disengaja dan pelanggaran PELANGGAN, staf, karyawan, mitra, dan afiliasinya.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>14. Penagihan</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">14.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    GBU akan memberikan tagihan bulanan kepada PELANGGAN, termasuk biaya layanan lain yang digunakan PELANGGAN, bersama dengan tunggakan dan biaya sebelumnya jika ada.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">14.2</td>

                                <td style="padding-left:5px;  text-align:justify;">
                                    Biaya berlangganan bulanan akan ditagihkan diawal (advance payment).
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">14.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    PELANGGAN setuju untuk membayar semua tagihan layanan dalam batas waktu yang ditentukan sesuai tagihan yang dikeluarkan oleh GBU menggunakan salah satu metode
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>15. Force Majeure</div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">15.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Yang dimaksud Keadaan Kahar dalam perjanjian ini adalah kejadian-kejadian di luar kekuasaan  Para Pihak yang mengakibatkan terhentinya atau tertundanya pelaksanaan perjanjian ini seperti  gempa bumi, banjir, kebakaran, tanah longsor, pemogokan umum, huru-hara, perang, pemberontakan, dan lain-lain yang menyebabkan salah satu Pihak tidak dapat  memenuhi kewajibannya.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">15.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dalam hal Keadaan Kahar seperti dimaksud ayat 15.1 Pasal  ini menimpa salah satu Pihak, maka  Pihak yang terkena Keadaan Kahar  wajib  memberitahukan  kepada  Pihak  lainnya  dalam waktu selambat-lambatnya 7 (tujuh)  hari kalender  sejak mulai terkena Keadaan Kahar yang dibenarkan  oleh yang berwenang.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">15.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Semua kerugian dan biaya yang diderita oleh salah satu pihak sebagai akibat terjadinya Keadaan  Kahar bukan merupakun tanggung jawab pihak yang lain.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>16 Penyelesaian Perselisihan</div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">16.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Apabila terjadi perselisihan terkait dengan kontrak ini, Para Pihak setuju untuk menyelesaikan perselisihan melalui musyawarah untuk mufakat.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">16.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dalam hal sengketa tidak dapat di selesaikan melalui musyawarah, Badan Arbitrase Nasional Indonesia (BANI) diminta untuk menyelesaikan sengketa oleh para arbiternya sesuai dengan  aturan prosedural BANI pada tingkat pertama dan terakhir.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">16.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Selama perselisihan masih dalam penyelesaian, Para Pihak tetap melaksanakan hak dan kewajiban masing-musing sesuai yang diatur dalam Perjanjian ini.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">16.4</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Pelaksanaan Syarat dan Ketentuan Kontrak Layanan ini tunduk dan diatur berdasarkan  hukum  Negara Republik Indonesia, termasuk peraturan serta kebijakan pemerintah lain nya mengenai telekomunikasi yang berlaku di Indonesia.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>17. Kerahasiaan</div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">17.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Para pihak harus mematuhi untuk menjaga kerahasiaan semua data, informasi, atau dokumen  dalam bentuk apa pun yang diperoleh dalam pelaksanaan Kontrak Layanan ini.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">17.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Dokumen dalam bentuk data, laporan, dan informasi lain yang diterima oleh  Para  Pihak  milik  Para Pihak dan  tidak  akan disampaikan  kepada  pihak  lain baik secara lisan maupun tertulis tanpa persetujuan dari pihak lain untuk  masa berlaku Kontrak Layanan serta setelah pengakhiran Kontrak Layanan.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div>18. Penutup</div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">18.1</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Pengakhiran Layanan ini sesuai dengan ketentuan yang termuat di dalamnya dapat dilakukan  tanpa  harus didasarkan pada surat perintah pengadilan dan Para Pihak dengan ini sepakat untuk  mengesampingkan  keberlakuan Pasal 1266 dan 1267 dari  Kitab Undang-Undang Hukum   Perdata sejauh mengenai kewajiban untuk mendapatkan persetujuan dari pengadilan untuk   melakukan  pengakhiran  terhadup  Layanan ini.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">18.2</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Formulir Berlangganan dan Lampiran Syarat dan Ketentuan ini adalah bagian yang tidak terpisahkan dari Kontrak Layanan dan memiliki kekuatan hukum yang sama.
                                </td>
                            </tr>
                        </table>
                    </div>
                	<div style="padding-left:20px;">
                        <table>
                            <tr>
                                <td valign="top">18.3</td>
                                <td style="padding-left:5px;  text-align:justify;">
                                    Formulir Berlangganan dibuat dalam 2 (dua) rangkap asli masing-masing memiliki isi dan susunan kata yang sama  dan memiliki penegakan  hukum yang sama ketika  ditandatangani oleh kedua belah pihak.
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
				<?php
				if($no < 4){
				?>
				<div style="height:170px;"></div>
				<?php } ?>
                <div style="font-weight:bold; margin-top:15px;">
                    E. Your Authorization
                </div>
                <div style="margin-top:5px;">
                    <table style="width:100%;">
                    <tr style="width:100%;">
                        <td style="width:50%;">
                            <table style="width:80%;">
                                <!--
								<tr>
                                    <td>Company/Institution</td>
                                    <td width="10" align="center">:</td>
                                    <td><?php echo $row->subc_company_name; ?></td>
                                </tr>
								-->
                                <tr>
                                    <td></td>
                                    <td width="10" align="center"></td>
                                    <td valign="bottom" align="center" style="padding-top:55px;">
                                        <div style="color:#cccccc">(TTD)</div>
                                        ...................................................................................
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td width="10" align="center">:</td>
                                    <td><?php echo $row->subc_customer_name; ?></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td width="10" align="center">:</td>
                                    <td><?php echo substr($row->subc_date, 8, 2).'/'.substr($row->subc_date, 5, 2).'/'.substr($row->subc_date, 0, 4); ?></td>
                                </tr>
                            </table>
                        </td>
                        <td style="width:50%;">
                            <table style="width:80%;">
                                <tr>
                                    <td>Company</td>
                                    <td width="10" align="center">:</td>
                                    <td>PT. Gading Bhakti Utama</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td width="10" align="center"></td>
                                    <td valign="bottom" align="center" style="padding-top:55px;">
                                        <div style="color:#cccccc">(TTD)</div>
                                        ...................................................................................
                                    </td>
                                </tr>
								<!--
                                <tr>
                                    <td colspan="3" valign="bottom" align="center" style="padding-top:10px;">
                                        <img src="<?php echo url('source/assets/mat/ttd.jpg'); ?>" height="80">
                                    </td>
                                </tr>
								-->
                                <tr>
                                    <td>Name</td>
                                    <td width="10" align="center">:</td>
                                    <td>Dendin Syihabudin</td>
                                </tr>
                                <tr>
                                    <td>Title/Position</td>
                                    <td width="10" align="center">:</td>
                                    <td>Direktur</td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td width="10" align="center">:</td>
                                    <td><?php echo substr($row->subc_date, 8, 2).'/'.substr($row->subc_date, 5, 2).'/'.substr($row->subc_date, 0, 4); ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                </div>
            </td>
        </tr> 
    </table>
    <?php } ?>
    </div>
    <?php } ?>
</body>
</html>
<script> function iprint(ptarget) { ptarget.focus(); ptarget.print(); } iprint();</script>
<script type="text/javascript">window.print();</script>
