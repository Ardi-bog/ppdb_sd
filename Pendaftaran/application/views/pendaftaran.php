<div class="content wh-sidebar">
    <h1>Daftar Siswa Terdaftar</h1>
    <form>
    <div class="search">
            <i class="fas fa-search"></i>
            <input id="form_cari_siswa" name="search" type="search" placeholder="Cari siswa terdaftar...">
            <input id="p" type="text" placeholder="Cari siswa terdaftar..." style="display:none"> 
        </div>
        <div class="right-form">

            <a href="<?php echo base_url()?>Export_data/semuaPendaftar" title="Cetak Data" id="export_data_pendaftar">
                <i class="fas fa-print"></i>
            </a>

            <a href="" title="Sinkronkan Data">
                <i class="fas fa-sync"></i>
            </a>
        </div>
        <div style="clear: both;"></div>
    </form>
    <table class="box">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>L/P</th>
                <th>Alamat</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody id='table_list_pendaftar'>
            <?php $no = 1; foreach($list_pendaftarsiswa as $data):?>                    
                <tr>
                    <td><?php echo $no?></td>
                    <td><?php echo $data->nama?></td>
                    <td><?php echo $data->jk?></td>
                    <td><?php echo $data->alamat?></td>
                    <td><?php echo $data->tgl_daftar?></td>
                </tr>
            <?php $no++; endforeach;?>
            <!-- <tr>
                <td colspan="7" class="pagenation">
                    <a href="">previous</a>
                    <a href="" class="active">1</a>
                    <a href="">2</a>
                    <a href="">3</a>
                    <a href="">next</a>
                </td>
            </tr> -->
        </tbody>
    </table>
</div>
<script> var base_url = "<?php echo base_url();?>";</script>
<script src="<?php echo base_url()?>assets/js/pendaftaran.js"></script>