<div class="content">
    <h1>Dashboard</h1>
    <div class="main-grid">
        <div class="left-grid">
            <h3>Jumlah Pendaftar Pada Hari Ini</h3>
            <h1><?php echo $jumlah_pendaftar_date?></h1><p>siswa</p>
        </div>
        <div class="right-grid">
            <div>
                <h3>Jumlah Pendaftar</h3>
                <div class="text-container">
                    <h1><?php echo $jumlah_pendaftar?></h1><p>siswa</p>
                </div>
            </div>
            <img src="assets/img/img6.png">
        </div>
    </div>
    <h2>Daftar Siswa Terdaftar</h2>
    <div class="table-box dashboard">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach($list_pendaftarsiswa as $data):?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data->nama?></td>
                        <td><?php echo $data->alamat?></td>
                        <td><?php echo $data->tgl_daftar?></td>
                    </tr>
                <?php $no++; endforeach;?>
                <tr>
                    <td colspan="5" class="pagenation">
                        <a href="<?php echo base_url()?>Pendaftaran" class="active">Show More</a>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="side-bar">
    <h1><?php echo $data_sekolah[0]->nama_sekolah?></h1>
    <img src="<?php echo $data_sekolah[0]->logo_sekolah?>">

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