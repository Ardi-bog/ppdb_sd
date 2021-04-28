<?php
defined('BASEPATH') OR exit('No direct script acess allowed');
if($this->session->userdata('status') != "login"){
    redirect(base_url("login"));
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pendaftaran SDN Polehan 5</title>
    <link rel="icon" href="<?php echo base_url('assets/img/logo.png')?>">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url('assets/css/main2.css')?>'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url('assets/css/grid2.css')?>'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="main-container">
        <div class="menu">
            <div class="circle"></div>
            <ul class="menu-list">
                <a href="<?php echo base_url('Dashboard');?>"> <li class="menu-item <?php if ($page == 'dashboard') { echo 'active'; } ?>"><div></div><i class="fas fa-book-reader"></i></li></a>
                <a href="<?php echo base_url('Pendaftaran');?>"><li class="menu-item <?php if ($page == 'pendaftaran') { echo 'active'; } ?>"><div></div><i class="fas fa-users"></i></li></a>
                <a href="<?php echo base_url('Login/logout');?>"><li class="menu-item-bottom"><div></div><i class="fas fa-sign-out-alt"></i></li></a>
            </ul>
        </div>