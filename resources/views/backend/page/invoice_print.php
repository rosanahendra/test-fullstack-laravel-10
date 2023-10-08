<html>
<head>
    <?php
    $name = 'Template';
    if($ID){
        $query = DB::select("select a.invo_code as invo_code, b.memb_name as memb_name, b.memb_company_name as memb_company_name from invoice a, member b where a.memb_code = b.memb_code and a.invo_id = '$ID'");
        foreach($query as $row){
            $name = $row->memb_name.' '.str_replace('/','',$row->invo_code);
            if($row->memb_company_name){
                $name = $row->memb_company_name.' '.str_replace('/','',$row->invo_code);
            }
        }
    }
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo 'Invoice '.$name; ?></title>
    <style>
        td, th{
            font-family:calibri;
        }
        @media print {
            @page { margin: 0.2cm 0.5cm 0.3cm 0.5cm; }
        }
    </style>
    <style type="text/css" media="print">
        @page { size: portrait; }
    </style>
    <?php
    $angka = array("-01-", "-02-", "-03-", "-04-", "-05-", "-06-", "-07-", "-08-", "-09-", "-10-", "-11-", "-12-");     
    $huruf = array(" Januari ", " Februari ", " Maret ", " April ", " Mei ", " Juni ", " Juli ", " Agustus ", " September ", " Oktober ", " November ", " Desember ");
    $huruf2 = array(" Jan ", " Feb ", " Mar ", " Apr ", " Mei ", " Jun ", " Jul ", " Agu ", " Sep ", " Okt ", " Nov ", " Des ");
    ?>
</head>
<body>
    <?php 
    $date = date('Y-m-d H:i:s');
    DB::select("update invoice set invo_print_date = '$date' where invo_id = '$ID' and invo_print_date = '0000-00-00 00:00:00'");
    $query = DB::select("select * from invoice where invo_id = '$ID'");
    foreach($query as $row){
    ?>
    <table style="font-family:Verdana, Arial, Helvetica, sans-serif;">
        <td colspan="3" align="left">
            <img src="<?php echo url('assets/image/logogading.png'); ?>">
        </td>
        <tr>
            <td colspan="3" align="center">
                <div style="margin-top:-100px;">
                    <table style="width:100%;">
                        <td valign="top" align="center" valign="middle">
                            <div style="font-size:25px; font-weight:bold;">PT. GADING BHAKTI UTAMA</div>
                            <div style="font-size:15px; font-weight:bold;">Telecomunication & Infrastructure Provider</div></div>
                            <?php
                            if(!$tipe){
                            ?>
                            <div style="font-size:23px; font-weight:bold; margin-top:20px;">PERFORMA INVOICE</div>
                            <?php } else { ?>
                            <div style="font-size:23px; font-weight:bold; margin-top:20px;">INVOICE</div>
                            <?php } ?>
                        </td>
                    </table>
                </div>
            </td>    
        </tr>
        <tr>
            <td colspan="3"><div style="margin-top:-15px; font-weight:bold;">___________________________________________________________________________________________________</div></td>
        </tr>  
        <tr>
            <td colspan="3">
                <?php 
                $type = '';
                $subc_name_billing = '';
                $subc_position_billing = '';
                $subc_discount = 0;
                $pos = '';
                $query2 = DB::select("select * from subcription where subc_code = '$row->subc_code'");
                foreach($query2 as $row2){
                    $type = $row2->subc_tax_type;
                    $subc_name_billing = $row2->subc_name_billing;
                    $subc_position_billing = $row2->subc_position_billing;
                    $subc_discount = $row2->subc_discount;
                    $pos = ' '.$row2->subc_postal_code;
					$memb_name = '';
					$query3 = DB::select("select memb_name from member where memb_code = '$row2->memb_code'");
					foreach($query3 as $row3){
						$memb_name = $row3->memb_name;
					}
                ?>
                <table style="width:100%;">
                    <tr>
                        <td style="width:40%;" align="left" valign="top">
                            <div>
                                <div>Kepada Yth,</div>
								<div style="margin-top:5px;">
									<table>
										<tr>
											<td>ID Pelanggan</td>
											<td width="10" align="center">:</td>
											<td><?php echo $row2->memb_code; ?></td>
										</tr>
										<tr>
											<td>Nama Pelanggan</td>
											<td width="10" align="center">:</td>
											<td><?php echo $memb_name; ?></td>
										</tr>
									</table>
								</div>
                                <div>
                                    <?php 
                                    /*
                                    $prov_name = '';
                                    $query3 = DB::select("select prov_name from province where prov_id = '$row2->subc_province'");
                                    foreach($query3 as $row3){
                                        $prov_name = ', '.$row3->prov_name;
                                    }
                                    
                                    $city_name = '';
                                    $query3 = DB::select("select city_name from city where city_id = '$row2->subc_city'");
                                    foreach($query3 as $row3){
                                        $city_name = ' - '.$row3->city_name;
                                    }
                                    
                                    $keca_name = '';
                                    $query3 = DB::select("select keca_name from kecamatan where keca_id = '$row2->subc_kecamatan'");
                                    foreach($query3 as $row3){
                                        $keca_name = $row3->keca_name;
                                    }
                                    
                                    echo $keca_name.$city_name.$prov_name.$pos;
                                    */
                                    ?>
                                </div>
                            </div>
                        </td>
                        <td style="width:20%;"></td>
                        <td style="width:40%;" align="right" valign="top">
                            <div>
                                <table>
                                    <tr>
                                        <td align="left">
                                            <div style="font-weight:bold;">
                                                Tanggal :
                                            </div>
                                            <?php if($row->invo_date){ echo substr($row->invo_date, 8, 2).'-'.str_replace($angka, $huruf2, '-'.substr($row->invo_date, 5, 2).'-').'-'.substr($row->invo_date, 0, 4); } else { echo '-'; } ?>
                                            <div style="font-weight:bold; margin-top:10px;">
                                                No. Invoice :
                                            </div>
                                            <?php
                                            if(!$tipe){
                                            ?>
                                            <div><?php echo str_replace('/', '', $row->invo_code); ?></div>
                                            <?php } else { ?>
                                            <div><?php echo str_replace('/', '', $row->invo_code2); ?></div>
                                            <?php } ?>
                                            <div style="font-weight:bold; margin-top:10px;">
                                                No. SF Ref.
                                            </div>
                                            <div><?php echo $row->subc_code; ?></div>    
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>    
                </table>    
                <?php } ?>
            </td>
        </tr> 
        <!--
        <tr>
            <td style="padding-top:10px;">
                <div style="font-weight:bold; margin-top:7px;">
                    Up 
                </div>
                <div>
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td width="10" align="center">:</td>
                            <td><?php echo $subc_name_billing; ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td width="10" align="center">:</td>
                            <td><?php echo $subc_position_billing; ?></td>
                        </tr>
                    </table>
                </div>
            </td>
            <td>
            </td>
            <td>
                <div style="font-weight:bold; margin-top:7px; padding-right:20px;" align="right">
                </div>
            </td>
        </tr>  
        -->
        <tr>
            <td colspan="3">
                <table style="width:99%;">
                    <tr>
                        <td style="width:88%;" valign="top">
                            <div>
                                <table style="width:100%;" border="1" cellpadding="0" cellspacing="0">
                                    <tr style="font-weight:bold;">
                                        <td style="width:5%; height:45px;" align="center">No.</td>
                                        <td style="width:35%;" align="center">Item</td>
                                        <td style="width:5%;" align="center">Qty</td>
                                        <td style="width:15%;" align="center">Unit</td>
                                        <td style="width:20%;" align="center">Harga</td>
                                    </tr>
                                    <?php 
                                    $i = 1;
                                    $inde_qty = 0;
                                    $inde_subtotal = 0;
                                    $inde_total = 0;
									$inta_total = 0;
                                    $query3 = DB::select("select inde_id, inde_num_periode, prod_code, prde_id, inde_qty, inde_subtotal, inde_total from invoice_detail where invo_code = '$row->invo_code' order by inde_total desc");
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
                                    ?>
                                    <tr>
                                        <td align="center"><?php echo $i; ?></td>
                                        <td style="padding-left:5px; padding-right:5px;"><?php echo $prod; ?></td>
                                        <td align="center"><?php if($row3->inde_num_periode > 0){ $inde_qty = $inde_qty + $row3->inde_qty; echo $row3->inde_qty; } else { echo '-'; } ?></td>
                                        <td align="center"><?php echo $unit; ?></td>
                                        <td align="right" style="padding-left:5px; padding-right:5px;">Rp. <?php $subharga_ori = $row3->inde_subtotal * (100/111); $inde_subtotal = $inde_subtotal + $subharga_ori; $harga_ori = $row3->inde_total * (100/111); $inde_total = $inde_total + $harga_ori; if($row3->inde_subtotal){ echo str_replace(',', '.', number_format($subharga_ori)); } else { echo 0; } ?></td>
                                    </tr>
                                    <?php $i++; } ?>
									
                                    <tr style="font-weight:bold;">
                                        <td style="padding-left:5px; padding-right:5px;" colspan="4" align="right">Sub. Total </td>
                                        <td align="right" style="padding-left:5px; padding-right:5px;">Rp. <?php if($inde_subtotal){ echo str_replace(',', '.', number_format($inde_subtotal)); } else { echo 0; } ?></td>
                                    </tr>
                                    <tr style="font-weight:bold;">
                                        <td style="padding-left:5px; padding-right:5px;" colspan="4" align="right">Discount </td>
                                        <td align="right" style="padding-left:5px; padding-right:5px;">Rp. <?php if($subc_discount){ $inde_total = $inde_total - $subc_discount; echo str_replace(',', '.', number_format($subc_discount)); } else { echo 0; } ?></td>
                                    </tr>
									<?php
									$query5 = DB::select("select tax_name, tax_value from tax where tax_type = 'Pajak Customer'");
                                    foreach($query5 as $row5){
									    $inta_total = (($row5->tax_value / 100) * $subharga_ori);
									}
									?>
                                    <tr style="font-weight:bold;">
                                        <td style="padding-left:5px; padding-right:5px;" align="right" colspan="4"><?php echo $row5->tax_name; ?> </td>
                                        <td align="right" style="padding-left:5px; padding-right:5px;">Rp. <?php if($inta_total){ echo str_replace(',', '.', number_format($inta_total)); } else { echo 0; } ?></td>
                                    </tr>
                                    <tr style="font-weight:bold;">
                                        <td style="padding-left:5px; padding-right:5px;" align="right" colspan="4">Total </td>
                                        <td align="right" style="padding-left:5px; padding-right:5px;">Rp. <?php $subharga_ori = $subharga_ori + ($subharga_ori * 0.11); if($inde_total){ echo str_replace(',', '.', number_format($inde_total)); } else { echo 0; } ?></td>
                                    </tr>
                                </table>   
                            </div>
                            <?php 
                            $aend = '';
                            $bend = '';
                            $query3 = DB::select("select subc_address_floor_A, subc_address_floor_B from subcription where subc_code = '$row->subc_code'");
                            foreach($query3 as $row3){
                                $aend = $row3->subc_address_floor_A;
                                $bend = $row3->subc_address_floor_B;
                            }
                            if($aend <> '' or $aend <> ''){
                            ?>
                            <div style="margin-top:15px; font-weight:bold;">Alamat Site</div>
                            <div>
                                <table>
                                    <?php 
                                    if($aend){
                                    ?>
                                    <tr>
                                        <td width="40" valign="top">A End</td>
                                        <td width="10" valign="top" align="center">:</td>
                                        <td><?php echo $aend; ?></td>
                                    </tr>
                                    <?php 
                                    } 
                                    if($bend){
                                    ?>
                                    <tr>
                                        <td width="40" valign="top">B End</td>
                                        <td width="10" valign="top" align="center">:</td>
                                        <td><?php echo $bend; ?></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <?php } ?>
                        </td>
                        <td style="width:20%; padding-left:5px; padding-right:5px;" align="right" valign="top">
                            <table border="1" cellpadding="0" cellspacing="0" width="190">
                                <tr>
                                    <td align="center" style="padding-top:7px; padding-bottom:7px;">
                                        <div style="font-weight:bold;">Tanggal Cetak</div>
                                        <div style="margin-top:15px;"><?php echo substr($row->invo_print_date, 8, 2).'/'.substr($row->invo_print_date, 5, 2).'/'.substr($row->invo_print_date, 0, 4); ?></div>
                                    </td>
                                </tr>
                                <!--
                                <tr>
                                    <td align="center" style="padding-top:7px; padding-bottom:7px;">
                                        <div style="font-weight:bold;">Nomor Customer</div>
                                        <div style="margin-top:15px;"><?php echo $row->memb_code; ?></div>
                                    </td>
                                </tr>
                                -->
								<!--
                                <tr>
                                    <td align="center" style="padding-top:7px; padding-bottom:7px;">
                                        <div style="font-weight:bold;">NPWP Pelanggan</div>
                                        <div style="margin-top:15px;">
                                            <?php 
                                            $query3 = DB::select("select memb_company_npwp_number from member where memb_code = '$row->memb_code'");
                                            foreach($query3 as $row3){
                                                echo $row3->memb_company_npwp_number; 
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
								-->
                                <tr>
                                    <td align="center" style="padding-top:7px; padding-bottom:7px;">
                                        <div style="font-weight:bold;">Periode Penggunaan</div>
                                        <div style="margin-top:15px;">
                                            <?php 
                                            if($row->invo_periode1 == $row->invo_periode2){
                                                echo $row->invo_periode1.' '.$row->invo_years; 
                                            } else {
                                                $row->invo_periode1.' s.d. '.$row->invo_periode2.' '.$row->invo_years;
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding-top:7px; padding-bottom:7px;">
                                        <div style="font-weight:bold;">Tanggal Jatuh Tempo</div>
                                        <div style="margin-top:15px;">
                                            <?php 
                                            $tagi = $row->invo_last_date_payment;
                                            echo substr($tagi, 8, 2).'/'.substr($tagi, 5, 2).'/'.substr($tagi, 0, 4); 
                                            ?>
                                        </div>
                                    </td>
                                </tr>
								<!--
                                <tr>
                                    <td align="center" style="padding-top:7px; padding-bottom:7px;">
                                        <div style="font-weight:bold;">Batas Akhir Pembayaran</div>
                                        <div style="margin-top:15px;"><?php echo substr($row->invo_last_date_payment, 8, 2).'/'.substr($row->invo_last_date_payment, 5, 2).'/'.substr($row->invo_last_date_payment, 0, 4); ?></div>
                                    </td>
                                </tr>
								-->
                            </table>    
                        </td>
                    </tr>   
                    <tr>
                        <td colspan="2">
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr> 
        <tr>
            <td colspan="3">
                <div style="font-weight:bold; margin-top:7px;">
                    <?php echo $row->invo_payment; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table style="width:100%;">
                    <tr>
                        <td style="width:60%;" align="left">
                            <div style="border:1px solid #333333; border-radius:10px; padding:20px;">
                                <div>Pembayaran mohon di transfer ke :</div>
								<?php
								$k = 1;
								$query4 = DB::select("select * from account_bank");
								$count = $query4->num_rows();
                                foreach($query4 as $row4){
								?>
								<div style="font-weight:bold; margin-top:10px;">
                                    <?php  
                                        echo $row4->acba_name; 
                                    ?>
                                </div>
                                <div style="font-weight:bold;">
                                    <?php 
                                    $query3 = DB::select("select bank_name from bank where bank_id = '$row4->bank_id'");
                                    foreach($query3 as $row3){
                                        echo $row3->bank_name; 
                                    }
                                    ?>
                                </div>
                                <div style="font-weight:bold;">
                                    A/C : <?php  echo $row4->acba_number; ?>
                                </div>
								<?php 
								if($count <> $k){
									echo '<div style="margin-left:15%; margin-top:10px;">~atau~</div>';
								}
								$k++;
								} ?>
                                <!--
								<div style="font-weight:bold;">
                                </div>
                                <div style="font-weight:bold;">
                                    <?php 
                                    $query3 = DB::select("select bank_name from bank where bank_id = '$row->bank_id'");
                                    foreach($query3 as $row3){
                                        echo $row3->bank_name; 
                                    }
                                    ?>
                                </div>
                                <div style="font-weight:bold;">
                                    A/C :
                                </div>
								-->
                            </div>
                            <?php
                            if(!$tipe){
                            ?>
							<!--
                            <div style="margin-top:15px; font-weight:bold;">
                                <i>
                                Invoice dan Faktur Pajak akan Kami kirimkan setelah pembayaran Kami terima.
                                </i>
                            </div>
							-->
                            <?php } ?>
                        </td>
                        <td style="width:40%;" align="center">
						
                            <!--
							<center>
                                <div style="margin-top:30px;">-->
                                    <!--<div style="font-weight:bold;">PT. GADING BHAKTI UTAMA</div>
                                    <div style="margin-top:60px; text-decoration:underline;">Maizir Abdul Kadir</div>-->
                                    <!--<div>Bandung, <?php echo str_replace($angka, $huruf, date("d-m-Y", strtotime(substr($row->invo_date, 0, 11)))); ?></div>
                                    <div style="margin-top:75px;">
                                        <div style="font-weight:bold; text-decoration:underline;">Dendin Syihabudin</div>
                                        <center>Direktur</center>
                                    </div>
                                </div>
                            </center>-->
                        </td>
                    </tr>
                </table>
                <div style="margin-top:30px;">
                    <center>
                    <div style="font-weight:bold; font-size:18px;">PT. GADING BHAKTI UTAMA</div>
                    <div>Ruko Gading Regensi A1 – 10 Soekarno Hatta Bandung, Jawa Barat</div>
                    <div>gadingbhaktiutama.com</div>
                    </center>
                </div>
            </td>
        </tr> 
    </table>
    <?php } ?>
</body>
</html>

<script type="text/javascript">window.print();</script>
