<?php
// header("Content-Security-Policy: default-src 'self' 'unsafe-inline' https://fonts.googleapis.com  https://cdnjs.cloudflare.com https://code.jquery.com  https://cdn.datatables.net https://cdn.jsdelivr.net  ; object-src 'none'; img-src 'self' data:; font-src 'self' https://fonts.gstatic.com https://cdnjs.cloudflare.com https://fonts.googleapis.com data:");
header("X-Frame-Options: SAMEORIGIN");
header('X-Content-Type-Options: nosniff');
header("Referrer-Policy: strict-origin-when-cross-origin");
header("Permissions-Policy: microphone=(), camera=()");
header("strict-transport-security: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    @yield('header')
    @yield('style')
</head>
<body style="font-family: 'Lato', sans-serif;">
    <div id="messages"></div>
    <div id="app">
        <div id="sidebar" class="active">
            @yield('menu')
        </div>
        <nav class="header-custom" style="padding:15px 15px 15px 15px; z-index:50; background-color:#ffffff; padding-bottom:10px; position: fixed; width:100%;">
            <div>
                <a href="#" class="burger-btn d-block d-xl-none" style="width:65px;">
                    <div style="border:1px solid #cccccc; padding:5px; border-radius:5px; background-color:#ffffff;">
                        <font style="font-size:18px; font-weight:bold; margin-left:5px;">Menu</font>
                    </div>
                </a>
            </div>
            <div style="float: right; margin-top:-42px; padding-right:40px;">
                <div class="navbar-collapse" id="navbarSupportedContent" style="position: absolute;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <font class="fa-regular fa-user" style="font-size: 18px;"></font> <font style="font-size: 20px; font-weight: bolder;"><?php echo strtoupper(substr(session('name'), 0, 1)); ?></font>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="border: 1px solid #cccccc;">
                                <li>
                                    <center>
                                    <a class="dropdown-item">
                                        <table>
                                            <tr>
                                                <td>
                                                    <i class="fa-solid fa-user-tie"></i>    
                                                </td>
                                                <td style="padding-left: 6px; font-weight: bolder;">
                                                    <?php echo session('name'); ?>      
                                                </td>
                                            </tr>
                                        </table>
                                        <div style="font-size: 11px; font-weight: bolder;">
                                            ~<?php echo session('user_role_name'); ?>   ~    
                                        </div> 
                                    </a>
                                    </center>
                                </li>
                                <li><center><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal_profile" onclick="data_form_profile('<?php echo session('memb_id'); ?>')" style="font-size: 13px; font-weight: bolder; cursor:pointer;"><i class="fas fa-fw fa-pencil"></i> Edit Profil</a></center></li>
                                <li><center><a class="dropdown-item" href="<?= url('logout') ?>" style="font-size: 13px; font-weight: bolder;"><i class="fa-solid fa-power-off"></i> Logout</a></center></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="main">
            <div class="page-heading">
                <h5><i class="fa-solid fa-<?php echo $icon; ?>"></i> <?php echo $title; ?></h5>
                <div style="float: right; margin-top:-42px; padding-right:180px;" class="akun-mobile">
                    <div class="navbar-collapse" id="navbarSupportedContent" style="position: absolute;">
                        <table>
                            <tr>
                                <td>
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <font class="fa-regular fa-user" style="font-size: 18px;"></font> <font style="font-size: 20px; font-weight: bolder;"><?php echo strtoupper(substr(session('name'), 0, 1)); ?></font>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="border: 1px solid #cccccc;">
                                                <li>
                                                    <center>
                                                    <a class="dropdown-item">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <i class="fa-solid fa-user-tie"></i>    
                                                                </td>
                                                                <td style="padding-left: 6px; font-weight: bolder;">
                                                                    <?php echo session('name'); ?>      
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <div style="font-size: 11px; font-weight: bolder;">
                                                            ~<?php echo session('user_role_name'); ?>   ~    
                                                        </div> 
                                                    </a>
                                                    </center>
                                                </li>
                                                <li><center><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal_profile" onclick="data_form_profile('<?php echo session('memb_id'); ?>')" style="font-size: 13px; font-weight: bolder; cursor:pointer;"><i class="fas fa-fw fa-pencil"></i> Edit Profil</a></center></li>
                                                <li><center><a class="dropdown-item" href="<?= url('logout') ?>" style="font-size: 13px; font-weight: bolder;"><i class="fa-solid fa-power-off"></i> Logout</a></center></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <font id="title_modal_profile"></font>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form_profile" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="table_id_profile" id="table_id_profile">
                            <div id="data_form_profile"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                    </div>
                </div>
            </div>

            @yield('content')
            @yield('footer')
        </div>
    </div>
    
</body>

</html>