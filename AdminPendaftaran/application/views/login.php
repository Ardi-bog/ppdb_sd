<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pendaftaran SDN Polehan 5</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="icon" href="<?php echo base_url('assets/img/logo.png'); ?>">
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url('assets/css/main.css'); ?>'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url('assets/css/grid.css'); ?>'>

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Poppins:200,400,500,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
</head>
<body>
    <div id="container">
        <div class="login-dialog-container" id="login_modal">
            <div class="login-dialog">
                <form class="login-form" action="<?php echo base_url('Login/aksi_login'); ?>" method="post">
                    <div>
                        <h1 class="title">Masuk Akun Admin</h1>
                        <!-- kek ono if nok kene -->
                        <?php if ($this->session->flashdata('message_name')):?>
                        <div style="background-color: rgba(255,0,0, 0.2); border-radius: 12px; padding: 12px 20px; margin-bottom: 20px;">
                            <h3 style="margin: 0; color: #be2623; font-family: 'Lora', serif; font-size: 16px; font-weight: 700; text-align: left;">Error</h3>
                            <p style="margin: 0; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 400; color: #000000; margin-top: 4px"><?= $this->session->flashdata('message_name')?></p>
                        </div>
                        <?php endif; ?>
                        <!-- sampek kene tok -->
                        <p class="login-title">Username</p>
                        <input type="text" name="username" id="password" class="login-input" placeholder="nama_anda">
                        <br><br>

                        <p class="login-title">Password</p>
                        <input type="password" name="password" id="password" class="login-input" placeholder="********">
                    </div>

                    <div>
                        <button class="login-submit" type="submit">Masuk</button>
                    </div>
                </form>
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
</body>
<style>
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
}
</style>
</html>