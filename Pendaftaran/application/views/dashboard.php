<div class="content">
    <h1>Dashboard</h1>
    <div class="main-grid">
        <div class="right-grid">
            <img src="assets/img/img6.png">
        </div>
    </div>

    <div class="box wrapper">
        <p class="title">Informasi Pendaftaran</p>
        <p><?php echo $info_pendaftaran[0]->info?></p>
    </div>
</div>
<div class="side-bar">
    <h1><?php echo $data_sekolah[0]->nama_sekolah?></h1>
    <img src="assets/img/logo.png">

    <p class="desc"><?php echo $data_sekolah[0]->deskripsi?></p>

    <div class="bottom">
        <hr>
        <div class="detail">
            <i class="fas fa-map-marker-alt"></i><p><?php echo $data_sekolah[0]->alamat?></p>
        </div>
        <div class="detail">
            <i class="fas fa-phone"></i><p><?php echo $data_sekolah[0]->no_telp?></p>
        </div>
        <div class="detail">
            <i class="fas fa-envelope"></i><p><?php echo $data_sekolah[0]->email?></p>
        </div>
    </div>
</div>