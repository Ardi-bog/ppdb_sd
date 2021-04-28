<!-- TODO: kondisi jika data kosong -->
<div class="content wh-sidebar">
    <h1>Detail Data Siswa - <?php echo $detail_pendaftar->nama?></h1>
    <div>
        <div class="detail-filter">
            <a href="<?php echo base_url()?>Pendaftaran" title="Kembali ke halaman kelola pendaftaran">
                <i class="fas fa-angle-left"></i><p style="display: inline-block; margin-left: 12px; font-family: 'Poppins', sans-serif;">Kembali</p>
            </a>
            <a href="<?php echo base_url()?>Export_data/detailPendaftar/<?php echo $detail_pendaftar->id_pendaftaran?>" title="Cetak Data">
                <i class="fas fa-print"></i>
            </a>

            <a href="" title="Sinkronkan Data">
                <i class="fas fa-sync"></i>
            </a>
        </div>
        <div style="clear: both;"></div>
    </div>

    <table class="box">  
        <thead class="collapsible active">
            <tr>
                <th colspan="3">Data Siswa</th>
            </tr>
        </thead>
        <tbody class="table-content">
            <tr>
                <td>no akta kelahiran</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->no_akta)){
                           echo "$detail_pendaftar->no_akta";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>NIK</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->nik)){
                           echo "$detail_pendaftar->nik";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>nama lengkap</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->nama)){
                           echo "$detail_pendaftar->nama";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>jenis kelamin</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->jk)){
                           echo "$detail_pendaftar->jk";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>tempat, tanggal lahir</td>
                <td> : </td>
                <td><?php echo $detail_pendaftar->tempat_lahir?>, <?php echo date('d F Y', strtotime($detail_pendaftar->tanggal_lahir))?></td>
            </tr>
            <tr>
                <td>agama</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->agama)){
                           echo "$detail_pendaftar->agama";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td colspan="3"><p style="margin: 4px; text-align: end">dibuat pada : <?php echo date('d F Y', strtotime($detail_pendaftar->tgl_daftar))?></p></td>
            </tr>
        </tbody>
    </table>

    <table class="box">  
        <thead class="collapsible active">
            <tr>
                <th colspan="3">Alamat Siswa</th>
            </tr>
        </thead>
        <tbody class="table-content">
            <tr>
                <td>alamat</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->alamat)){
                           echo "$detail_pendaftar->alamat";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>provinsi</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->provinsi)){
                           echo "$detail_pendaftar->provinsi";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>kota/kabupaten</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->kota_kabupaten)){
                           echo "$detail_pendaftar->kota_kabupaten";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>kecamatan</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->kecamatan)){
                           echo "$detail_pendaftar->kecamatan";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>desa/kelurahan</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->desa_kelurahan)){
                           echo "$detail_pendaftar->desa_kelurahan";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>RT / RW</td>
                <td> : </td>
                <td><?php echo $detail_pendaftar->rt?> / <?php echo $detail_pendaftar->rw?></td>
            </tr>
            <tr>
                <td>kode pos</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->kode_pos)){
                           echo "$detail_pendaftar->kode_pos";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td colspan="3"><p style="margin: 4px; text-align: end">dibuat pada : <?php echo date('d F Y', strtotime($detail_pendaftar->tgl_daftar))?></p></td>
            </tr>
        </tbody>
    </table>

    <table class="box">  
        <thead class="collapsible active">
            <tr>
                <th colspan="3">Data Ayah</th>
            </tr>
        </thead>
        <tbody class="table-content">
            <tr>
                <td>NIK</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->nik_ayah)){
                           echo "$detail_pendaftar->nik_ayah";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>nama lengkap</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->nama_ayah)){
                           echo "$detail_pendaftar->nama_ayah";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>pendidikan terakhir</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->pemdidikan_ayah)){
                           echo "$detail_pendaftar->pendidikan_ayah";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>pekerjaan</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->pekerjaan_ayah)){
                           echo "$detail_pendaftar->pekerjaan_ayah";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>penghasilan</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->penghasilan_ayah)){
                           echo "$detail_pendaftar->penghasilan_ayah";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>No HP</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->no_hp_ayah)){
                           echo "$detail_pendaftar->no_hp_ayah";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>alamat</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->alamat_ayah)){
                           echo "$detail_pendaftar->alamat_ayah";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td colspan="3"><p style="margin: 4px; text-align: end">dibuat pada : <?php echo date('d F Y', strtotime($detail_pendaftar->tgl_daftar))?></p></td>
            </tr>
        </tbody>
    </table>

    <table class="box">  
        <thead class="collapsible active">
            <tr>
                <th colspan="3">Data Ibu</th>
            </tr>
        </thead>
        <tbody class="table-content">
            <tr>
                <td>NIK</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->nik_ibu)){
                           echo "$detail_pendaftar->nik_ibu";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>nama lengkap</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->nama_ibu)){
                           echo "$detail_pendaftar->nama_ibu";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>pendidikan terakhir</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->pendidikan_ibu)){
                           echo "$detail_pendaftar->pendidikan_ibu";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>pekerjaan</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->pekerjaan_ibu)){
                           echo "$detail_pendaftar->pekerjaan_ibu";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>penghasilan</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->penghasilan_ibu)){
                           echo "$detail_pendaftar->penghasilan_ibu";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>No HP</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->no_hp_ibu)){
                           echo "$detail_pendaftar->no_hp_ibu";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>alamat</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->alamat_ibu)){
                           echo "$detail_pendaftar->alamat_ibu";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td colspan="3"><p style="margin: 4px; text-align: end">dibuat pada : <?php echo date('d F Y', strtotime($detail_pendaftar->tgl_daftar))?></p></td>
            </tr>
        </tbody>
    </table>

    <table class="box">  
        <thead class="collapsible active">
            <tr>
                <th colspan="3">Data Wali</th>
            </tr>
        </thead>
        <tbody class="table-content">
            <tr>
                <td>NIK</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->nik_wali)){
                           echo "$detail_pendaftar->nik_wali";     
                         }echo "-"?>
                </td>
            </tr>
            <tr>
                <td>nama lengkap</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->nama_wali)){
                           echo "$detail_pendaftar->nama_wali";     
                         }echo "-"?>
                </td>
            </tr>
            <tr>
                <td>pendidikan terakhir</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->pendidikan_wali)){
                           echo "$detail_pendaftar->pendidikan_wali";     
                         }echo "-"?>
                </td>
            </tr>
            <tr>
                <td>pekerjaan</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->pekerjaan_wali)){
                           echo "$detail_pendaftar->pekerjaan_wali";     
                         }echo "-"?>
                </td>
            </tr>
            <tr>
                <td>penghasilan</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->penghasilan_wali)){
                           echo "$detail_pendaftar->penghasilan_wali";     
                         }echo "-"?>
                </td>
            </tr>
            <tr>
                <td>No HP</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->no_hp_wali)){
                           echo "$detail_pendaftar->no_hp_wali";     
                         }echo "-"?>
                </td>
            </tr>
            <tr>
                <td>alamat</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->alamat_wali)){
                           echo "$detail_pendaftar->alamat_wali";     
                         }echo "-"?>
                </td>
            </tr>
            <tr>
                <td colspan="3"><p style="margin: 4px; text-align: end">dibuat pada : <?php echo date('d F Y', strtotime($detail_pendaftar->tgl_daftar))?></p></td>
            </tr>
        </tbody>
    </table>

    <table class="box">  
        <thead class="collapsible active">
            <tr>
                <th colspan="3">Data Kartu Perlindungan Sosial</th>
            </tr>
        </thead>
        <tbody class="table-content">
            <tr>
                <td>menerima KPS</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->status_kps)){
                           echo "$detail_pendaftar->status_kps";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>no KPS</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->no_kps)){
                           echo "$detail_pendaftar->no_kps";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td colspan="3"><p style="margin: 4px; text-align: end">dibuat pada : <?php echo date('d F Y', strtotime($detail_pendaftar->tgl_daftar))?></p></td>
            </tr>
        </tbody>
    </table>

    <table class="box">  
        <thead class="collapsible active">
            <tr>
                <th colspan="3">Data Kartu Indonesia Pintar</th>
            </tr>
        </thead>
        <tbody class="table-content">
            <tr>
                <td>menerima KIP</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->status_kip)){
                           echo "$detail_pendaftar->status_kip";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>no KIP</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->no_kip)){
                           echo "$detail_pendaftar->no_kip";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td colspan="3"><p style="margin: 4px; text-align: end">dibuat pada : <?php echo date('d F Y', strtotime($detail_pendaftar->tgl_daftar))?></p></td>
            </tr>
        </tbody>
    </table>

    <table class="box">  
        <thead class="collapsible active">
            <tr>
                <th colspan="3">Data Tambahan</th>
            </tr>
        </thead>
        <tbody class="table-content">
            <tr>
                <td>jenis tinggal</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->jenis_tinggal)){
                           echo "$detail_pendaftar->jenis_tinggal";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>berkebutuhan khusus</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->berkebutuhan_khusus)){
                           echo "$detail_pendaftar->berkebutuhan_khusus";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>sekolah asal</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->sekolah_asal)){
                           echo "$detail_pendaftar->sekolah_asal";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>anak ke</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->anak_ke)){
                           echo "$detail_pendaftar->anak_ke";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>jumlah saudara kandung</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->jumlah_saudara)){
                           echo "$detail_pendaftar->jumlah_saudara";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>alat transportasi</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->transportasi)){
                           echo "$detail_pendaftar->transportasi";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td>jarak rumah kesekolah</td>
                <td> : </td>
                <td>
                    <?php 
                        if(!empty($detail_pendaftar->jarak_rumah)){
                           echo "$detail_pendaftar->jarak_rumah";     
                         }else{echo "-";}?>
                </td>
            </tr>
            <tr>
                <td colspan="3"><p style="margin: 4px; text-align: end">dibuat pada : <?php echo date('d F Y', strtotime($detail_pendaftar->tgl_daftar))?></p></td>
            </tr>
        </tbody>
    </table>
</div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight != '0px'){
      content.style.maxHeight = '0px';
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

</script>