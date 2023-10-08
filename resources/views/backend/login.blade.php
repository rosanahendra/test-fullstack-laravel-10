<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Login Email</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset('backend/css/main/app.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('backend/css/pages/auth.css'); ?>">
    <link rel="shortcut icon" href="<?php echo asset('backend/images/logo/favicon.svg'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo asset('backend/images/logo/favicon.png'); ?>" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Nunito:wght@200&display=swap" rel="stylesheet">
</head>

<style>
@media (min-width: 1001px){
    #img-login{
        width:50%;
        margin-top:22%;
    }
}

@media (max-width: 1000px){
    #img-login{
        width:75%;
        margin-top:20%;
    }
}

@media (max-width: 766px){
    #img-left{
        display:none;
    }
}

.info_alert{
    font-size:13px;
    color:#ff0000;
    font-weight:normal;
    margin-top:7px;
}

#auth #auth-right{
    background-color: #B1DFFB !important;
}
</style>

<body style="font-family: 'Lato', sans-serif; font-weight:1000 !important;">
    <div id="auth">
        
        <div class="row h-100" style="background-color:#EFFAFF;">
            <div class="col-lg-6 col-md-5 col-sm-5 col-sm-12 text-center" id="img-left" style="background-color: #B1DFFB;">
                <div style="background-color: #B1DFFB; padding-top:20%; font-size:25px;">
                    TEST API LARAVEL 10
                </div>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-7 col-sm-12" style="background-color:#EFFAFF; padding-top:4%;">
                <div id="auth-left">
                    <div style="background-color:#ffffff; padding:20px; -moz-box-shadow: 10px #ccc; -webkit-box-shadow: 10px #ccc; box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
                        <center>
                            <h4 class="auth-title" style="font-size: 20px;  margin-top:10px;">LOGIN PENGGUNA DENGAN EMAIL</h4>
                        </center>
                        @csrf
                        <div class="form-group mb-4">
                            <input type="text" class="form-control" id="memb_email" name="memb_email" placeholder="Email">
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" class="form-control" id="memb_password" name="memb_password" placeholder="Password">
                            <div style="float:right; font-weight:normal; margin-top:5px; color:#0E70B1;">
                                Reset Password
                            </div>
                        </div>
                        <!--
                        <div class="form-group mb-4">
                            <table>
                                <tr>
                                    <td><input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault"></td>
                                    <td style="font-weight:normal;">Remember password</td>
                                </tr>
                            </table>
                        </div>
                        -->
                        <div style="margin-top: -30px;">
                            <div id="button_save">
                                <input type="submit" value="Login" name="save" onclick="login_user()" class="btn btn-primary btn-blockshadow-lg mt-5" style="width:100%; background-color:#57B5E0;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function login_user() {
        var memb_email = $("input[name='memb_email']").val();
        var memb_password = $("input[name='memb_password']").val();
        //alert(memb_email+' '+memb_password);
        var loading = document.getElementById('button_save');
        loading.innerHTML = '<div id="button_save"><input type="submit" value="Login" name="save" disabled class="btn btn-primary btn-blockshadow-lg mt-5" style="width:100%; background-color:#57B5E0;" /></div>';  
        $.ajax({
            url: "<?= url('login_user_api'); ?>",
            method: "POST",
            data: {
                '_token': '<?= csrf_token() ?>',
                'email': memb_email,
                'password': memb_password,
            },
            success: function(response) {
                var response = JSON.parse(response);
                var status = response.info.status;
                var message = response.info.message;
                //alert(status+' '+message);
                if(status == true){
                    document.getElementById('button_save').innerHTML = '<div id="button_save"><input type="submit" value="Login" name="save" onclick="login_user()" class="btn btn-primary btn-blockshadow-lg mt-5" style="width:100%; background-color:#57B5E0;" /></div>';
                    window.location.href = "<?= url('task'); ?>";
                } else {
                    document.getElementById('button_save').innerHTML = '<div id="button_save"><input type="submit" value="Login" name="save" onclick="login_user()" class="btn btn-primary btn-blockshadow-lg mt-5" style="width:100%; background-color:#57B5E0;" /><div class="info_alert">'+message+'</div></div>';
                }
            }
        });
    }
</script>
</html>
