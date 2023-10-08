<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Test CRUD API Laravel 10</title>

<link rel="stylesheet" href="<?php echo asset('backend/css/main/app.css'); ?>">
<link rel="stylesheet" href="<?php echo asset('backend/css/main/app-dark.css'); ?>">
<link rel="shortcut icon" href="<?php echo asset('backend/images/logo/favicon.svg'); ?>" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo asset('backend/images/logo/favicon.png'); ?>" type="image/png">
    
<link rel="stylesheet" href="<?php echo asset('backend/css/shared/iconly.css'); ?>">
<link rel="stylesheet" href="<?php echo asset('backend/css/flatpickr/flatpickr.min.css'); ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Nunito:wght@200&display=swap" rel="stylesheet">
<script src="<?php echo asset('backend/js/fontawesome.js'); ?>"></script>
<!-- Need: Apexcharts -->
<script src="<?php echo asset('backend/extensions/apexcharts/apexcharts.min.js'); ?>"></script>
<script src="<?php echo asset('backend/js/pages/dashboard.js'); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="<?php echo asset('backend/css/flatpickr/flatpickr.min.js'); ?>"></script>
<style>
    /*.page-heading{*/
    /*    margin-top:60px;*/
    /*}*/
    .icon-search{
        font-size:30px;
    }
    
    .nomor{
        width:7% !important;
        font-size:15px;
    }
    
    @media (min-width: 700px) {
    .table_header_23{
        width:23%;
        font-weight:bold;
        font-size:15px;
    }
    }
    
    @media (max-width: 699px) {
    .table_header_23{
        width:230px;
        font-weight:bold;
        font-size:15px;
    }
    }
    
    @media (min-width: 700px) {
    .table_header_30{
        width:30%;
        font-weight:bold;
        font-size:15px;
    }
    }
    
    @media (max-width: 699px) {
    .table_header_30{
        width:300px;
        font-weight:bold;
        font-size:15px;
    }    
    }
    
    @media (min-width: 700px) {
    .table_header_45{
        width:45%;
        font-weight:bold;
        font-size:15px;
    }
    }
    
    @media (max-width: 699px) {
    .table_header_45{
        width:450px;
        font-weight:bold;
        font-size:15px;
    }
    }
    
    .table_scroll{
        width: 100%;
        overflow-y: auto;
    }
    
    .table_custom{
        margin-top:10px;
        min-width:850px;
    }
    
    .table_custom2{
        margin-top:10px;
        min-width:850px;
    }
    
    .sidebar-link{
        font-size:14px !important;
    }
    
    .no_data{
        color:#ff0000;
        font-size:13px;
    }
    
    .div_table{
        padding-top:15px;
    }
    
    .font-required {
        background-color: #E6E6E6;
        border-radius: 8px;
        color: #666666;
        font-size: 10px;
        font-weight: 600;
        padding: 2px 5px 2px 5px;
        margin-left: 3px;
    }
    
    .card{
        border:1px solid #cccccc;
        border-radius:7px;
    }
    
    .card-header{
        margin-bottom:10px;
    }
    
    .card-title{
        font-size:18px !important;
    }
    
    .info_alert{
        font-size:13px;
        color:#ff0000;
    }
    
    @media (max-width: 380px) {    
    	#messages {
    		position:fixed;
    		right: 1%; 
    		z-index:80; 
    		top:2%; 
    		font-size:14px;
    	    width:250px;
    	    font-weight:normal;
    	}
    }
    
    @media (min-width: 381px) {
    	#messages {
    		position:fixed;
    		right: 3%;
    		z-index:80; 
    		top:10%;
    		font-size:14px;
    	    width:250px;
    	    font-weight:normal;
    	}
    }
    
    #message_box{
        font-size:13px; 
        font-weight:bold; 
        color:#ffffff; 
        width:250px;
        box-shadow: 4px 4px 4px rgba(0,0,0,0.8);
    }
    
    .form-check-input{
        cursor:pointer !important;
    }
    
    td{
        vertical-align: top !important;
    }
    
    label{
        font-weight:bolder;
    }
    
    @media (min-width: 1200px) {
        .header-custom{
            display: none;
        }

        .akun-mobile{
            display: inline;
        }
    }
    
    @media (max-width: 1199px) {
        .page-heading{
            margin-top: 60px !important;
        }

        .header-custom{
            display: run-in;
        }

        .akun-mobile{
            display: none;
        }
    }

    .page-content{
        margin-top:-15px !important;
    }

    .text-muted{
        font-size: 13px !important;
    }

    .card{
        padding:0px;
    }
    
    .btn-delete{
        cursor:pointer;
        font-family: INHERIT;
        font-weight: bold; 
        color:#fff;
        font-size: 12px;
    }
</style>