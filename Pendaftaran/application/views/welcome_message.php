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
        <section class="main-content">
            <div class="left-content col-5">
                <div>
                    <h1>Pendaftaran Siswa</h1>
                    <h2>SDN Polehan 5</h2>
                    <p><?php echo $data_sekolah[0]->deskripsi?></p>
                    <a class="btn-masuk" id="login_btn">Masuk</a>
                    <a href="<?php echo base_url('Daftar'); ?>" class="btn-daftar">Daftarkan Diri</a>
                </div>
            </div>
            <div class="right-content col-7">
                <img src="<?php echo base_url('assets/img/img1.jpg'); ?>" class="main-image">
                <div class="main-image-overlay">
                    <img src="<?php echo base_url('assets/img/logo.png'); ?>" class="main-overlay-image">
                </div>
            </div>
            <div style="clear: both;"></div>
        </section>

        <section class="tatacara-content">
            <div class="wrapper">
                <div class="title">
                    <h1>Tata Cara dan Persyaratan Pendaftaran</h1>
                    <hr>
                </div>

                <div class="tatacara-container">
                    <div class="left-content">
                        <div class="title">
                            <h1>Tata Cara Pendaftaran</h1>
                        </div>
                        <ol>
                        <?php echo $info_pendaftaran[0]->tata_cara_pendaftaran?>
                        </ol>
                    </div>
                    <div class="right-content">
                        <div class="title">
                            <h1>Persyaratan Pendaftaran</h1>
                        </div>
                        <ol>
                        <?php echo $info_pendaftaran[0]->persyaratan_pendaftaran?>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="wrapper">
                <div class="title">
                    <h1>Profil  SDN Polehan 5</h1>
                    <hr>
                </div>

                <div class="footer-content-container">
                    <div class="footer-content">
                        <p class="footer-content-title">Prestasi</p>
                        <?php 
                            if(!empty($prestasi)){
                                foreach ($prestasi as $data) {
                                    ?><p class="footer-content-value"><?php echo $data->nama;?></p><?php
                                }
                            }
                            
                        ?>
                    </div>
                    <div class="footer-content">
                        <p class="footer-content-title">Kegiatan</p>
                        <?php 
                            if (!empty($kegiatan)) {
                                foreach ($kegiatan as $data) {
                                    ?><p class="footer-content-value"><?php echo $data->judul;?></p><?php   
                                }
                            }
                            
                        ?>
                    </div>
                    <div class="footer-content">
                        <p class="footer-content-title">Ekstrakulikuler</p>
                        <?php 
                            if(!empty($ekstrakurikuler)){
                                foreach ($ekstrakurikuler as $data) {
                                    ?><p class="footer-content-value"><?php echo $data->judul;?></p><?php
                                }
                            }
                            
                        ?>
                    </div>
                    <div class="footer-content">
                        <p class="footer-content-title">Informasi Sekolah</p>
                        <p class="footer-content-value">Tujuan, Visi & Misi</p>
                        <p class="footer-content-value">Daftar Pendidik</p>
                        <p class="footer-content-value">Alamat Sekolah</p>
                    </div>
                </div>

                <hr class="footer-split">

                <div class="footer-small">
                    <p>Copyright©2020</p>
                    <p>Di buat oleh RPL SMKN 4 Malang</p>
                </div>
            </div>
        </footer>

        <div class="login-dialog-container" id="login_modal">
            <div class="login-dialog">
                <i class="fas fa-times login_close"></i>
                <div style="clear: both;"></div>
                <form class="login-form" action="<?php echo base_url('Login/aksi_login'); ?>" method="post">
                    <div>
                        <h1 class="title">Masuk Akun Pendaftaran</h1>
                        <p class="login-title">Nama Pengguna</p>
                        <input type="text" name="username" id="username" class="login-input" placeholder="Nama Anda">
                        <br><br>

                        <p class="login-title">PIN</p>
                        <input type="text" name="password" id="password" class="login-input" placeholder="Pin Anda">
                    </div>

                    <p class="alert-title" id="alert" name="alert"></p>
                    <div>
                        <button class="login-submit" type="submit" id="clearMsg">Masuk</button>
                        <p class="login-info" id="datalogin"><a href="<?php echo base_url('Daftar'); ?>">Daftar</a> jika tidak mempunyai akun.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.4.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
        
	$(document).ready(function(){
	
        var modal = document.getElementById("login_modal");
        var btn = document.getElementById("login_btn");
        var span = document.getElementsByClassName("login_close")[0];

        btn.onclick = function() {
            modal.style.zIndex = 100;
            modal.style.visibility = "visible";
            modal.style.opacity = 1;
        }

        span.onclick = function() {
            modal.style.opacity = 0;
            setTimeout(() => {
                modal.style.visibility = "hidden";
            }, 200)
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.opacity = 0;
                setTimeout(() => {
                    modal.style.visibility = "hidden";
                }, 200)
            }
        }
    });
    
</script>
</html>