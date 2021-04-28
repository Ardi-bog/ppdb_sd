<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <title>Profile <?php echo $data_sekolah[0]->nama_sekolah?></title>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" href="<?php echo base_url("assets/img/logo.png")?>">
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url("assets/css/main.css")?>'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url("assets/css/grid.css")?>'>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Poppins:200,400,500,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
</head>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: .4s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>
<body>
    <div id="app">
        <section class="main-container">
            <div class="wrapper">
                <header class="header">
                    <div class="header-school-info">
                        <img src="http://localhost/sdn-polehan-5/AdminPendaftaran/<?php echo $data_sekolah[0]->logo_sekolah?>" class="header-logo">
                        <p><?php echo $data_sekolah[0]->nama_sekolah?></p>
                    </div>

                    <ul class="header-menu">
                        <li class="header-menu-list active"><a href="#">Beranda</a></li>
                        <li class="header-menu-list"><a href="#Prestasi">Prestasi</a></li>
                        <li class="header-menu-list"><a href="#Visi">Visi & Misi</a></li>
                        <li class="header-menu-list"><a href="#Kegiatan">Kegiatan</a></li>
                        <li class="header-menu-list"><a href="#Informasi">Informasi</a></li>
                    </ul>
                </header>
                <?php

        
                ?>
                <div class="main-slider col-12">
                    <transition name="fade" mode="out-in">
                        <img :src="'http://localhost/sdn-polehan-5/AdminPendaftaran/'+mainSlider" :key="mainSlider" class="main-slider-img">
                    </transition>
                    <div class="slider-options">
                        <a v-on:click="prevSlider()"><i class="fas fa-angle-left"></i></a>
                        <p><span>{{ mainSliderIndex + 1 }}</span>/{{ mainSliderImg.length }}</p>
                        <a v-on:click="nextSlider()"><i class="fas fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="main-bottom col-12">
                    <div class="left-area col-4">
                        <h1>Pendaftaran</h1>
                        <p><?php echo $data_sekolah[0]->deskripsi?></p>
                        <a href="http://localhost/sdn-polehan-5/Pendaftaran/">Daftar</a>
                    </div>
                    <div class="right-area col-8">
                        <div class="img-bg-black">
                            <transition name="fade" mode="out-in">
                                <img :src="'http://localhost/sdn-polehan-5/AdminPendaftaran/'+subMainSlider(1)" v-on:click="changeIntoIndex(subMainSliderIndex(1))" style="transition-delay: 0.06s" :key="subMainSlider(1)" class="main-mini-img">
                            </transition>
                        </div>
                        <div class="img-bg-black">
                            <transition name="fade" mode="out-in">
                                <img :src="'http://localhost/sdn-polehan-5/AdminPendaftaran/'+subMainSlider(2)"  v-on:click="changeIntoIndex(subMainSliderIndex(2))" style="transition-delay: 0.12s" :key="subMainSlider(2)" class="main-mini-img">
                            </transition>
                        </div>
                        <div class="img-bg-black">
                            <transition name="fade" mode="out-in">
                                <img :src="'http://localhost/sdn-polehan-5/AdminPendaftaran/'+subMainSlider(3)"  v-on:click="changeIntoIndex(subMainSliderIndex(3))" style="transition-delay: 0.18s" :key="subMainSlider(3)" class="main-mini-img">
                            </transition>
                        </div>
                    </div>
                </div>

                <div style="clear: both;"></div>
            </div>
        </section>

        <section class="prestasi-container" id="Prestasi"> 
            <div class="wrapper">
                <div class="title">
                    <p>informasi</p>
                    <h1>Prestasi Sekolah</h1>
                    <hr>
                </div>
                
                <?php
                
                    if(!empty($prestasi)){
                        ?>
                        
                        <div class="slider">
                            <div class="slider-img-container col-5">
                                <transition name="fade" mode="out-in">
                                    <img :src="'http://localhost/sdn-polehan-5/AdminPendaftaran/'+sliderImg[0].Data[sliderImg[0].Index].gambar" :key="sliderImg[0].Data[sliderImg[0].Index].gambar" class="slider-img">
                                </transition>
                                <div class="slider-options">
                                    <a v-on:click="prevAnotherSlider(0)"><i class="fas fa-angle-left"></i></a>
                                    <p><span>{{ sliderImg[0].Index + 1 }}</span>/{{ sliderImg[0].Data.length }}</p>
                                    <a v-on:click="nextAnotherSlider(0)"><i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="slider-text col-7">
                                <transition name="fade" mode="out-in">
                                    <div :key="sliderImg[0].Data[sliderImg[0].Index]" >
                                        <p class="slider-date">{{ sliderImg[0].Data[sliderImg[0].Index].tgl }}</p>
                                        <h1 class="slider-title">{{ sliderImg[0].Data[sliderImg[0].Index].nama }}</h1>
                                        <p class="slider-desc">{{ sliderImg[0].Data[sliderImg[0].Index].deskripsi }}</p>
                                    </div>
                                </transition>
                            </div>
                            <div style="clear: both;"></div>
                        </div>

                        <?php
                    }

                ?>
            </div>
        </section>

        <section class="visi-container" id="Visi"> 
            <div class="wrapper">
                <p class="visi-title">Tujuan<br>Pendidikan Dasar</p>
                <p class="visi-content"><?php echo $data_sekolah[0]->tujuan?></p>

                <p class="visi-title">Visi</p>
                <p class="visi-content"><?php echo $data_sekolah[0]->visi?></p>

                <p class="visi-title">Misi</p>
                <p class="visi-content"><?php echo $data_sekolah[0]->misi?></p>
            </div>
        </section>

        <section class="prestasi-container" id="Kegiatan"> 
            <div class="wrapper">
                <div class="title">
                    <p>informasi</p>
                    <h1>Kegiatan Sekolah</h1>
                    <hr>
                </div>

                <?php 

                    if (!empty($kegiatan)) {
                        ?>
                        
                        <div class="slider">
                            <div class="slider-img-container col-5">
                                <transition name="fade" mode="out-in">
                                    <img :src="'http://localhost/sdn-polehan-5/AdminPendaftaran/'+sliderImg[1].Data[sliderImg[1].Index].gambar" :key="sliderImg[1].Data[sliderImg[1].Index].gambar" class="slider-img">
                                </transition> 
                                <div class="slider-options">
                                    <a v-on:click="prevAnotherSlider(1)"><i class="fas fa-angle-left"></i></a>
                                    <p><span>{{ sliderImg[1].Index + 1 }}</span>/{{ sliderImg[1].Data.length }}</p>
                                    <a v-on:click="nextAnotherSlider(1)"><i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="slider-text col-7">
                                <transition name="fade" mode="out-in">
                                    <div :key="sliderImg[1].Data[sliderImg[1].Index]" >
                                        <p class="slider-date">{{ sliderImg[1].Data[sliderImg[1].Index].Date }}</p> 
                                        <h1 class="slider-title">{{ sliderImg[1].Data[sliderImg[1].Index].judul }}</h1>
                                        <p class="slider-desc">{{ sliderImg[1].Data[sliderImg[1].Index].deskripsi }}</p>
                                    </div>
                                </transition>
                            </div>
                            <div style="clear: both;"></div>
                        </div>

                        <?php
                    }

                ?>

            </div>
        </section>

        <section class="visi-container" style="overflow: auto"> 
            <div class="left-wrapper flex-center">
                <div class="left-content col-3">
                    <p class="title-main">Fasilitas yang disediakan</p>
                    <p class="desc-main"><?php echo $data_sekolah[0]->deskripsi_fasilitas?></p>
                </div>
                <div class="col-9">
                    <div class="right-content fasilitas-box-container">
                    <?php
                        foreach ($fasilitas as $data) {
                            ?>
                            <div class="fasilitas-box">
                                <h1><?php echo $data->fasilitas?></h1>
                                <p><?php echo $data->deskripsi?></p>
                            </div>
                            <?php
                            }
                    ?>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
        </section>

        <section class="prestasi-container"> 
            <div class="wrapper">
                <div class="title">
                    <p>informasi</p>
                    <h1>Ekstrakulikuler Sekolah</h1>
                    <hr>
                </div>
                <?php 
                    if(!empty($ekstrakurikuler)){
                        ?>
                        
                        <div class="slider">
                            <div class="slider-img-container col-5">
                                <transition name="fade" mode="out-in">
                                    <img :src="'http://localhost/sdn-polehan-5/AdminPendaftaran/'+sliderImg[2].Data[sliderImg[2].Index].gambar" :key="sliderImg[2].Data[sliderImg[2].Index].gambar" class="slider-img">
                                </transition>
                                <div class="slider-options">
                                    <a v-on:click="prevAnotherSlider(2)"><i class="fas fa-angle-left"></i></a>
                                    <p><span>{{ sliderImg[2].Index + 1 }}</span>/{{ sliderImg[2].Data.length }}</p>
                                    <a v-on:click="nextAnotherSlider(2)"><i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="slider-text col-7">
                                <transition name="fade" mode="out-in">
                                    <div :key="sliderImg[2].Data[sliderImg[2].Index]">
                                        <!-- <p class="slider-date">{{ sliderImg[2].Data[sliderImg[2].Index].Date }}</p> -->
                                        <h1 class="slider-title">{{ sliderImg[2].Data[sliderImg[2].Index].judul }}</h1>
                                        <p class="slider-desc">{{ sliderImg[2].Data[sliderImg[2].Index].deskripsi }}</p>
                                    </div>
                                </transition>
                            </div>
                            <div style="clear: both;"></div>
                        </div>

                        <?php
                    }
                ?>
            </div>
        </section>

        <section class="visi-container jumlah-siswa-container"> 
            <div class="left-wrapper flex-center">
                <div class="left-content col-3">
                    <p class="title-main">Jumlah Siswa dan Siswi</p>
                    <p class="desc-main"><?php echo $data_sekolah[0]->deskripsi_jumlahsiswa?></p>
                </div>
                <div class="right-content jumlah-box-container col-9">
                    <!-- <div class="jumlah-box">
                        <p class="title-main"><?php echo $jumlah_pendaftar?></p>
                        <p class="desc-main">Jumlah Pendaftar</p>
                    </div> -->
                    <div class="jumlah-box">
                        <p class="title-main"><?php echo $data_sekolah[0]->jumlah_siswa?></p>
                        <p class="desc-main">Jumlah Seluruh Siswa</p>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
        </section>

        <section class="guru-container"> 
            <div class="guru-wrapper flex-center">
                <div class="left-content col-3">
                    <p class="title-main">Daftar Pendidik</p>
                    <p class="desc-main"><?php echo $data_sekolah[0]->deskripsi_pendidik?></p>
                </div>
                <div class="right-content col-9">
                    <?php
                        foreach ($daftar_pendidik as $data) {
                            ?>
                            <div class="guru-box">
                                <img src="http://localhost/sdn-polehan-5/AdminPendaftaran/<?php echo $data->gambar?>" class="guru-img">
                                <div class="guru-overlay">
                                    <p class="title-main"><?php echo $data->nama_gelar?></p>
                                    <p class="desc-main"><?php echo $data->mapel?></p>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
                <div style="clear: both;"></div>
            </div>
        </section>

        <section class="visi-container" id="Informasi"> 
            <div class="wrapper">
                <div class="title">
                    <p class="color-white">informasi</p>
                    <h1 class="color-white">Alamat Sekolah</h1>
                    <hr>
                </div>

                <iframe  id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.088496594771!2d112.64443921451105!3d-7.989797481894018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6286d0c99ab09%3A0xb05809f00cfdb68e!2sSekolah%20Dasar%20Negeri%20Polehan%205!5e0!3m2!1sid!2sid!4v1575639726421!5m2!1sid!2sid" frameborder="0" allowfullscreen=""></iframe>

                <div class="alamat-container">
                    <div>
                        <p class="title-main">Email</p>
                        <p class="desc-main"><?php echo $data_sekolah[0]->email?></p>
                    </div>
                    <div>
                        <p class="title-main">Alamat</p>
                        <p class="desc-main"><?php echo $data_sekolah[0]->alamat?></p>
                    </div>
                    <div>
                        <p class="title-main">No Telp</p>
                        <p class="desc-main"><?php echo $data_sekolah[0]->no_telp?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="prestasi-container" id="kritiksaran"> 
            <div class="wrapper">
                <div class="title">
                    <h1>Kritik & Saran</h1>
                </div>
                
                <div class="kritik-container">
                    <form class="kritik-form" action=<?php echo base_url('welcome/addKritikSaran#kritiksaran')?> method="post" encytype="multipart/form-data">
                        <p class="kritik-title">Email</p>
                        <input type="text" class="kritik-input" placeholder="emailkamu@email.com" name="email">
                        <br><br><br>
                        <p class="kritik-title">Kritik dan saran</p>
                        <textarea class="kritik-input-area" placeholder="Kritik dan saran anda disini..." name="kritik_saran"></textarea>
                        <button class="kritik-submit">Komentar</button>
                    </form>

                    <div class="kritik-value-container">
                        <?php 
                            foreach($list_kritiksaran as $list_kritiksaran):?>
                            <div class="kritik-value-box">
                                <p class="kritik-value-email"><?php echo $list_kritiksaran->email?></p>
                                <p class="kritik-value-koment"><?php echo $list_kritiksaran->kritik_saran?></p>
                            </div>
                        <?php endforeach;?>
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
                            if(!empty($prestasi_limit_3)){
                                foreach ($prestasi_limit_3 as $data) {
                                    ?><p class="footer-content-value"><?php echo $data->nama;?></p><?php
                                }
                            }
                            
                        ?>
                    </div>
                    <div class="footer-content">
                        <p class="footer-content-title">Kegiatan</p>
                        <?php 
                            if (!empty($kegiatan_limit_3)) {
                                foreach ($kegiatan_limit_3 as $data) {
                                    ?><p class="footer-content-value"><?php echo $data->judul;?></p><?php   
                                }
                            }
                            
                        ?>
                    </div>
                    <div class="footer-content">
                        <p class="footer-content-title">Ekstrakulikuler</p>
                        <?php 
                            if(!empty($ekstra_limit_3)){
                                foreach ($ekstra_limit_3 as $data) {
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
    </div>
</body>
<?php 
    foreach ($gambar_sekolah as $key => $value) {
        $gambar_sekolah2[] = $value['url'];
    }?>
<script>var eskul = '<?php echo json_encode($ekstrakurikuler)?>'</script>
<script>var prestasi = '<?php echo json_encode($prestasi)?>'</script>
<script>var kegiatan = '<?php echo json_encode($kegiatan)?>'</script>
<script>var gambar_sekolah = '<?php echo json_encode($gambar_sekolah2)?>'</script>
<script>console.log(gambar_sekolah);
</script>
<script src="<?php echo base_url("assets/js/main.js")?>"></script>

</html>