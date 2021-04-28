<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pendaftaran SDN Polehan 5</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="icon" href="<?php echo base_url('assets/img/logo.png'); ?>">
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url('assets/css/register-main.css'); ?>'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url('assets/css/grid.css'); ?>'>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Poppins:200,400,500,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
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
    <div id="app" class="main-content">
        <div class="side-bar">
            <h1 class="title">Pendaftaran</h1>

            <ul>
                <li v-for="(vi, index) in view" v-bind:class="getProgress(index)" v-on:click="goToIndex(index)">
                    <a>{{ viewName[index] }}</a>
                </li>
            </ul>
        </div>
        <form class="form-handle">
            <div v-show="currectViewIndex == 0" class="form-content">
                <p class="register-title">Nomor Akta Kelahiran Siswa</p>
                <input type="text" name="no_akta" id="no_akta" v-model="daftar.Akta" class="register-input" placeholder="123456789">

                <p class="register-title">NIK Siswa</p>
                <input type="text" name="nik" id="nik" v-model="daftar.NIK" class="register-input" placeholder="123456789">

                <p class="register-title">Nama Lengkap Siswa</p>
                <input type="text" name="nama" id="nama" v-model="daftar.NamaLengkap" class="register-input" placeholder="Abdul Budi">

                <p class="register-title">Jenis Kelamin</p>
                <div>
                    <label class="container">Laki-laki
                        <input type="radio" name="jk" id="jk" v-model="daftar.Gender" value="Laki-laki">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Perempuan
                        <input type="radio" name="jk" id="jk" v-model="daftar.Gender" value="Perempuan">
                        <span class="checkmark"></span>
                    </label>
                </div>

                <div>
                    <div class="col-5" style="padding-right: 20px;">
                        <p class="register-title">Tempat Lahir</p>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" v-model="daftar.TempatLahir" class="register-input" placeholder="Malang">
                    </div>
                    <div class="col-7">
                        <p class="register-title">Tanggal Lahir</p>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" v-model="daftar.TanggalLahir" class="register-input" placeholder="01 Januari 2010">
                    </div>
                    <div style="clear: both;"></div>
                </div>
                
                <p class="register-title">Agama</p>
                <div style="width:100%;">
                    <select name="agama" id="agama" v-model="daftar.Agama" class="custom-dropdown">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghuchu">Konghuchu</option>
                    </select>
                </div>
            </div>

            <div v-show="currectViewIndex == 1" class="form-content">
                <p class="register-title">Alamat Siswa</p>
                <input type="text" name="alamat" id="alamat" v-model="daftar.AlamatSiswa" class="register-input" placeholder="Jl Angrek No 1">

                <div>
                    <div class="col-5" style="padding-right: 20px;">
                        <p class="register-title">Provinsi</p>
                        <input name="provinsi" id="provinsi" type="text" v-model="daftar.Provinsi" class="register-input" placeholder="Jawa Timur">
                    </div>
                    <div class="col-7">
                        <p class="register-title">Kota/Kabupaten</p>
                        <input name="kota_kabupaten" id="kota_kabupaten" type="text" v-model="daftar.Kota" class="register-input" placeholder="Malang">
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div>
                    <div class="col-5" style="padding-right: 20px;">
                        <p class="register-title">Kecamatan</p>
                        <input type="text" name="kecamatan" id="kecamatan" v-model="daftar.Kecamatan" class="register-input" placeholder="Blimbing">
                    </div>
                    <div class="col-7">
                        <p class="register-title">Desa/Kelurahan</p>
                        <input type="text" name="desa_keluarahan" id="desa_kelurahan" v-model="daftar.Kelurahan" class="register-input" placeholder="Polehan">
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div>
                    <div class="col-5" style="padding-right: 20px;">
                        <p class="register-title">RT</p>
                        <input type="number" name="rt" id="rt" v-model="daftar.RT" class="register-input" placeholder="10">
                    </div>
                    <div class="col-7">
                        <p class="register-title">RW</p>
                        <input type="number" name="rw" id="rw" v-model="daftar.RW" class="register-input" placeholder="1">
                    </div>
                    <div style="clear: both;"></div>
                </div>
                
                <p class="register-title">Kode Pos</p>
                <input type="text" name="kode_pos" id="kode_pos" v-model="daftar.KodePos" class="register-input" placeholder="123456">
            </div>

            <div v-show="currectViewIndex == 2" class="form-content">
                <p class="register-title">NIK Ayah</p>
                <input type="text" name="nik_ayah" id="nik_ayah" v-model="daftar.NIKAyah" class="register-input" placeholder="123456789">

                <p class="register-title">Nama Lengkap Ayah</p>
                <input type="text" name="nama_ayah" id="nama_ayah" v-model="daftar.NamaLengkapAyah" class="register-input" placeholder="Abdul Budi">

                <p class="register-title">Pendidikan Terakhir Ayah</p>
                <div style="width:100%;">
                    <select name="pendidikan_ayah" id="pendidikan_ayah" v-model="daftar.PendidikanTerakhirAyah" class="custom-dropdown">
                        <option value="SD/Sederajat">SD/Sederajat</option>
                        <option value="SMP/Sederajat">SMP/Sederajat</option>
                        <option value="SMA/Sederajat">SMA/Sederajat</option>
                        <option value="D1/D2/D3">D1/D2/D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
                
                <p class="register-title">Pekerjaan Ayah</p>
                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" v-model="daftar.pekerjaanAyah" class="register-input" placeholder="PNS">

                <p class="register-title">Penghasilan Ayah</p>
                <div style="width:100%;">
                    <select name="penghasilan_ayah" id="penghasilan_ayah" v-model="daftar.PenghasilanAyah" class="custom-dropdown">
                        <option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
                        <option value="Rp. 500,000 - Rp. 999,999">Rp. 500,000 - Rp. 999,999</option>
                        <option value="Rp. 1,000,000 - Rp. 1,999,999">Rp. 1,000,000 - Rp. 1,999,999</option>
                        <option value="Rp. 2,000,000 - Rp. 3,999,999">Rp. 2,000,000 - Rp. 3,999,999</option>
                        <option value="Lebih Dari Rp. 4,000,000">Lebih Dari Rp. 4,000,000</option>
                    </select>
                </div>

                <p class="register-title">No HP Ayah</p>
                <input type="text" name="no_hp_ayah" id="no_hp_ayah" v-model="daftar.NoHPAyah" class="register-input" placeholder="080123456789">

                <p class="register-title">Alamat Ayah</p>
                <input type="text" name="alamat_ayah" id="alamat_ayah" v-model="daftar.AlamatAyah" class="register-input" placeholder="Jl Angrek No 1">
            </div>

            <div v-show="currectViewIndex == 3" class="form-content">
                <p class="register-title">NIK Ibu</p>
                <input type="text" name="nik_ibu" id="nik_ibu" v-model="daftar.NIKIbu" class="register-input" placeholder="123456789">

                <p class="register-title">Nama Lengkap Ibu</p>
                <input type="text" name="nama_ibu" id="nama_ibu" v-model="daftar.NamaLengkapIbu" class="register-input" placeholder="Abdul Budi">

                <p class="register-title">Pendidikan Terakhir Ibu</p>
                <div style="width:100%;">
                    <select name="pendidikan_ibu" id="pendidikan_ibu" v-model="daftar.PendidikanTerakhirIbu" class="custom-dropdown">
                        <option value="SD/Sederajat">SD/Sederajat</option>
                        <option value="SMP/Sederajat">SMP/Sederajat</option>
                        <option value="SMA/Sederajat">SMA/Sederajat</option>
                        <option value="D1/D2/D3">D1/D2/D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
                
                <p class="register-title">Pekerjaan Ibu</p>
                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" v-model="daftar.pekerjaanIbu" class="register-input" placeholder="PNS">

                <p class="register-title">Penghasilan Ibu</p>
                <div style="width:100%;">
                    <select name="penghasilan_ibu" id="penghasilan_ibu" v-model="daftar.PenghasilanIbu" class="custom-dropdown">
                        <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                        <option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
                        <option value="Rp. 500,000 - Rp. 999,999">Rp. 500,000 - Rp. 999,999</option>
                        <option value="Rp. 1,000,000 - Rp. 1,999,999">Rp. 1,000,000 - Rp. 1,999,999</option>
                        <option value="Rp. 2,000,000 - Rp. 3,999,999">Rp. 2,000,000 - Rp. 3,999,999</option>
                        <option value="Lebih Dari Rp. 4,000,000">Lebih Dari Rp. 4,000,000</option>
                    </select>
                </div>

                <p class="register-title">No HP Ibu</p>
                <input type="text" name="no_hp_ibu" id="no_hp_ibu" v-model="daftar.NoHPIbu" class="register-input" placeholder="080123456789">

                <p class="register-title">Alamat Ibu</p>
                <input type="text" name="alamat_ibu" id="alamat_ibu" v-model="daftar.AlamatIbu" class="register-input" placeholder="Jl Angrek No 1">
            </div>

            <div v-show="currectViewIndex == 4" class="form-content">
                <p class="register-title">NIK Wali</p>
                <input type="text" name="nik_wali" id="nik_wali" v-model="daftar.NIKWali" class="register-input" placeholder="123456789">

                <p class="register-title">Nama Lengkap Wali</p>
                <input type="text" name="nama_wali" id="nama_wali" v-model="daftar.NamaLengkapWali" class="register-input" placeholder="Abdul Budi">

                <p class="register-title">Pendidikan Terakhir Wali</p>
                <div style="width:100%;">
                    <select name="pendidikan_wali" id="pendidikan_wali" v-model="daftar.PendidikanTerakhirWali" class="custom-dropdown">
                        <option value="SD/Sederajat">SD/Sederajat</option>
                        <option value="SMP/Sederajat">SMP/Sederajat</option>
                        <option value="SMA/Sederajat">SMA/Sederajat</option>
                        <option value="D1/D2/D3">D1/D2/D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
                
                <p class="register-title">Pekerjaan Wali</p>
                <input type="text" name="pekerjaan_wali" id="pekerjaan_wali" v-model="daftar.pekerjaanWali" class="register-input" placeholder="PNS">

                <p class="register-title">Penghasilan Wali</p>
                <div style="width:100%;">
                    <select name="penghasilan_wali" id="penghasilan_wali" v-model="daftar.PenghasilanWali" class="custom-dropdown">
                        <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                        <option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
                        <option value="Rp. 500,000 - Rp. 999,999">Rp. 500,000 - Rp. 999,999</option>
                        <option value="Rp. 1,000,000 - Rp. 1,999,999">Rp. 1,000,000 - Rp. 1,999,999</option>
                        <option value="Rp. 2,000,000 - Rp. 3,999,999">Rp. 2,000,000 - Rp. 3,999,999</option>
                        <option value="Lebih Dari Rp. 4,000,000">Lebih Dari Rp. 4,000,000</option>
                    </select>
                </div>

                <p class="register-title">No HP Wali</p>
                <input type="text" name="no_hp_wali" id="no_hp_wali" v-model="daftar.NoHPWali" class="register-input" placeholder="080123456789">

                <p class="register-title">Alamat Wali</p>
                <input type="text" name="alamat_wali" id="alamat_wali" v-model="daftar.AlamatWali" class="register-input" placeholder="Jl Angrek No 1">
            </div>

            <div v-show="currectViewIndex == 5" class="form-content">
                <p class="register-title">Menerima KPS</p>
                <div>
                    <label class="container">Menerima
                        <input type="radio" name="status_kps" id="status_kps" v-model="daftar.MenerimaKPS" value="Menerima" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Tidak Menerima
                        <input type="radio" name="status_kps" id="status_kps" v-model="daftar.MenerimaKPS" value="Tidak Menerima">
                        <span class="checkmark"></span>
                    </label>
                </div>
                
                <p class="register-title">No KPS (Jika Menerima)</p>
                <input :readonly="daftar.MenerimaKPS == 'Tidak Menerima'" type="text" name="no_kps" id="no_kps" v-model="daftar.NoKPS" class="register-input" placeholder="123456789">

            </div>

            <div v-show="currectViewIndex == 6" class="form-content">
                <p class="register-title">Menerima KIP</p>
                <div>
                    <label class="container">Menerima
                        <input name="status_kip" id="status_kip" type="radio" v-model="daftar.MenerimaKIP" value="Menerima" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Tidak Menerima
                        <input name="status_kip" id="status_kip" type="radio" v-model="daftar.MenerimaKIP" value="Tidak Menerima">
                        <span class="checkmark"></span>
                    </label>
                </div>
                
                <p class="register-title">No KIP (Jika Menerima)</p>
                <input :readonly="daftar.MenerimaKIP == 'Tidak Menerima'" type="text" name="no_kip" id="no_kip" v-model="daftar.NoKIP" class="register-input" placeholder="123456789">

            </div>

            <div v-show="currectViewIndex == 7" class="form-content">                
                <p class="register-title">Jenis Tinggal</p>
                <div>
                    <label class="container">Bersama Orang Tua
                        <input type="radio" name="jenis_tinggal" id="jenis_tinggal" v-model="daftar.JenisTinggal" value="Bersama Orang Tua" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Wali
                        <input type="radio" name="jenis_tinggal" id="jenis_tinggal" v-model="daftar.JenisTinggal" value="Wali">
                        <span class="checkmark"></span>
                    </label>
                </div>

                <p class="register-title">Berkebutuhan Khusus (opsional)</p>
                <input type="text" name="berkebutuhan_khusus" id="berkebutuhan_khusus" v-model="daftar.BerkebutuhanKhusus" class="register-input" placeholder="Isi Jika Ada">

                <p class="register-title">Sekolah Asal</p>
                <input type="text" name="sekolah_asal" id="sekolah_asal" v-model="daftar.SekolahAsal" class="register-input" placeholder="TK Satu Nusa">

                <p class="register-title">Anak Ke</p>
                <input type="number" name="anak_ke" id="anak_ke" v-model="daftar.AnakKe" class="register-input" placeholder="1">

                <p class="register-title">Jumlah Saudara Kandung</p>
                <input type="number" name="jumlah_saudara" id="jumlah_saudara" v-model="daftar.JumlahSaudaraKandung" class="register-input" placeholder="2">

                <p class="register-title">Alat Transportasi</p>
                <div style="width:100%;">
                    <select name="transportasi" id="transportasi" v-model="daftar.AlatTransportasi" class="custom-dropdown">
                        <option value="Jalan kaki">Jalan kaki</option>
                        <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
                        <option value="Angkutan umum">Angkutan umum</option>
                    </select>
                </div>

                <p class="register-title">Jarak Rumah Ke sekolah(KM)</p>
                <input type="number" name="jarak_rumah" id="jarak_rumah" v-model="daftar.JarakRumahKesekolah" class="register-input" placeholder="1">
                
            </div>

            <div v-show="currectViewIndex == 8" class="form-content">
                <p class="register-title">Data Siswa :</p>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <td>no akta kelahiran</td>
                            <td> : </td>
                            <td>{{ daftar.Akta ? daftar.Akta : '-' }}</td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td> : </td>
                            <td>{{ daftar.NIK ? daftar.NIK : '-' }}</td>
                        </tr>
                        <tr>
                            <td>nama lengkap</td>
                            <td> : </td>
                            <td>{{ daftar.NamaLengkap ? daftar.NamaLengkap : '-' }}</td>
                        </tr>
                        <tr>
                            <td>jenis kelamin</td>
                            <td> : </td>
                            <td>{{ daftar.Gender ? daftar.Gender : '-' }}</td>
                        </tr>
                        <tr>
                            <td>tempat, tanggal lahir</td>
                            <td> : </td>
                            <td>{{ daftar.TempatLahir ? daftar.TempatLahir : '-' }}, {{ daftar.TanggalLahir ? daftar.TanggalLahir : '-' }}</td>
                        </tr>
                        <tr>
                            <td>agama</td>
                            <td> : </td>
                            <td>{{ daftar.Agama ? daftar.Agama : '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <p class="register-title">Alamat Siswa :</p>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <td>alamat</td>
                            <td> : </td>
                            <td>{{ daftar.AlamatSiswa ? daftar.AlamatSiswa : '-' }}</td>
                        </tr>
                        <tr>
                            <td>provinsi</td>
                            <td> : </td>
                            <td>{{ daftar.Provinsi ? daftar.Provinsi : '-' }}</td>
                        </tr>
                        <tr>
                            <td>kota/kabupaten</td>
                            <td> : </td>
                            <td>{{ daftar.Kota ? daftar.Kota : '-' }}</td>
                        </tr>
                        <tr>
                            <td>kecamatan</td>
                            <td> : </td>
                            <td>{{ daftar.Kecamatan ? daftar.Kecamatan : '-' }}</td>
                        </tr>
                        <tr>
                            <td>desa/kelurahan</td>
                            <td> : </td>
                            <td>{{ daftar.Kelurahan ? daftar.Kelurahan : '-' }}</td>
                        </tr>
                        <tr>
                            <td>RT / RW</td>
                            <td> : </td>
                            <td>{{ daftar.RT ? daftar.RT : '-' }} / {{ daftar.RW ? daftar.RW : '-' }}</td>
                        </tr>
                        <tr>
                            <td>kode pos</td>
                            <td> : </td>
                            <td>{{ daftar.KodePos ? daftar.KodePos : '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <p class="register-title">Data Ayah :</p>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <td>NIK</td>
                            <td> : </td>
                            <td>{{ daftar.NIKAyah ? daftar.NIKAyah : '-' }}</td>
                        </tr>
                        <tr>
                            <td>nama lengkap</td>
                            <td> : </td>
                            <td>{{ daftar.NamaLengkapAyah ? daftar.NamaLengkapAyah : '-' }}</td>
                        </tr>
                        <tr>
                            <td>pendidikan terakhir</td>
                            <td> : </td>
                            <td>{{ daftar.PendidikanTerakhirAyah ? daftar.PendidikanTerakhirAyah : '-' }}</td>
                        </tr>
                        <tr>
                            <td>pekerjaan</td>
                            <td> : </td>
                            <td>{{ daftar.pekerjaanAyah ? daftar.pekerjaanAyah : '-' }}</td>
                        </tr>
                        <tr>
                            <td>penghasilan</td>
                            <td> : </td>
                            <td>{{ daftar.PenghasilanAyah ? daftar.PenghasilanAyah : '-' }}</td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td> : </td>
                            <td>{{ daftar.NoHPAyah ? daftar.NoHPAyah : '-' }}</td>
                        </tr>
                        <tr>
                            <td>alamat</td>
                            <td> : </td>
                            <td>{{ daftar.AlamatAyah ? daftar.AlamatAyah : '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <p class="register-title">Data Ibu :</p>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <td>NIK</td>
                            <td> : </td>
                            <td>{{ daftar.NIKIbu ? daftar.NIKIbu : '-' }}</td>
                        </tr>
                        <tr>
                            <td>nama lengkap</td>
                            <td> : </td>
                            <td>{{ daftar.NamaLengkapIbu ? daftar.NamaLengkapIbu : '-' }}</td>
                        </tr>
                        <tr>
                            <td>pendidikan terakhir</td>
                            <td> : </td>
                            <td>{{ daftar.PendidikanTerakhirIbu ? daftar.PendidikanTerakhirIbu : '-' }}</td>
                        </tr>
                        <tr>
                            <td>pekerjaan</td>
                            <td> : </td>
                            <td>{{ daftar.pekerjaanIbu ? daftar.pekerjaanIbu : '-' }}</td>
                        </tr>
                        <tr>
                            <td>penghasilan</td>
                            <td> : </td>
                            <td>{{ daftar.PenghasilanIbu ? daftar.PenghasilanIbu : '-' }}</td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td> : </td>
                            <td>{{ daftar.NoHPIbu ? daftar.NoHPIbu : '-' }}</td>
                        </tr>
                        <tr>
                            <td>alamat</td>
                            <td> : </td>
                            <td>{{ daftar.AlamatIbu ? daftar.AlamatIbu : '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <p class="register-title">Data Wali (Opsional) :</p>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <td>NIK</td>
                            <td> : </td>
                            <td>{{ daftar.NIKWali ? daftar.NIKWali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>nama lengkap</td>
                            <td> : </td>
                            <td>{{ daftar.NamaLengkapWali ? daftar.NamaLengkapWali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>pendidikan terakhir</td>
                            <td> : </td>
                            <td>{{ daftar.PendidikanTerakhirWali ? daftar.PendidikanTerakhirWali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>pekerjaan</td>
                            <td> : </td>
                            <td>{{ daftar.pekerjaanWali ? daftar.pekerjaanWali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>penghasilan</td>
                            <td> : </td>
                            <td>{{ daftar.PenghasilanWali ? daftar.PenghasilanWali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td> : </td>
                            <td>{{ daftar.NoHPWali ? daftar.NoHPWali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>alamat</td>
                            <td> : </td>
                            <td>{{ daftar.AlamatWali ? daftar.AlamatWali : '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <p class="register-title">Kartu Perlindungan Sosial :</p>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <td>menerima KPS</td>
                            <td> : </td>
                            <td>{{ daftar.MenerimaKPS ? daftar.MenerimaKPS : '-' }}</td>
                        </tr>
                        <tr>
                            <td>no KPS</td>
                            <td> : </td>
                            <td>{{ daftar.NoKPS ? daftar.NoKPS : '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <p class="register-title">Kartu Indonesia Pintar :</p>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <td>menerima KIP</td>
                            <td> : </td>
                            <td>{{ daftar.MenerimaKIP ? daftar.MenerimaKIP : '-' }}</td>
                        </tr>
                        <tr>
                            <td>no KIP</td>
                            <td> : </td>
                            <td>{{ daftar.NoKIP ? daftar.NoKIP : '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <p class="register-title">Data Tambahan :</p>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <td>jenis tinggal</td>
                            <td> : </td>
                            <td>{{ daftar.JenisTinggal ? daftar.JenisTinggal : '-' }}</td>
                        </tr>
                        <tr>
                            <td>berkebutuhan khusus</td>
                            <td> : </td>
                            <td>{{ daftar.BerkebutuhanKhusus ? daftar.BerkebutuhanKhusus : '-' }}</td>
                        </tr>
                        <tr>
                            <td>sekolah asal</td>
                            <td> : </td>
                            <td>{{ daftar.SekolahAsal ? daftar.SekolahAsal : '-' }}</td>
                        </tr>
                        <tr>
                            <td>anak ke</td>
                            <td> : </td>
                            <td>{{ daftar.AnakKe ? daftar.AnakKe : '-' }}</td>
                        </tr>
                        <tr>
                            <td>jumlah saudara kandung</td>
                            <td> : </td>
                            <td>{{ daftar.JumlahSaudaraKandung ? daftar.JumlahSaudaraKandung : '-' }}</td>
                        </tr>
                        <tr>
                            <td>alat transportasi</td>
                            <td> : </td>
                            <td>{{ daftar.AlatTransportasi ? daftar.AlatTransportasi : '-' }}</td>
                        </tr>
                        <tr>
                            <td>jarak rumah kesekolah</td>
                            <td> : </td>
                            <td>{{ daftar.JarakRumahKesekolah ? daftar.JarakRumahKesekolah : '-' }}</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>

            <div v-show="currectViewIndex == 9" class="form-content">
                <p class="register-title" name="usernama" id="usernama">Nama Pengguna</p>
                <input type="text" class="register-input" id="username" name="username" placeholder="Nama" readonly>

                <p class="register-title">PIN</p>
                <input type="text" class="register-input" id="password" name="password" placeholder="PIN" value="<?php echo random_string('numeric',8);?>" readonly>
            </div>

            <div class="form-button">
                <a v-if="currectView != 'selesai'" v-on:click="prev()" class="kembali">Kembali</a>
                <div>
                    <a v-if="currectView == 'cekUlang'" v-on:click="begin()" class="lewati">Cek Ulang</a>
                    <a v-on:click="next()" type="button" id="btn_simpan" class="lanjutkan">{{ currectViewString }}</a>
                </div>
            </div>
        </form>
    </div>
</body>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.4.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
$(document).ready(function(){

    // if($('#status_kps').val("Menerima")){
    //     $('#no_kps').val("Menerima");
    // }else if($('#status_kps').val("Tidak Menerima")){
    //     $('#no_kps').val("Tdk Menerima");
    // }

    var app = new Vue({
    el: '#app',
    data: {
        daftar: { Gender: 'Laki-laki', Domisili: 'WNI', Agama: 'Islam', PendidikanTerakhirAyah: 'SD/Sederajat', PenghasilanAyah: 'Kurang dari Rp. 500,000', PendidikanTerakhirIbu: 'SD/Sederajat', PenghasilanIbu: 'Tidak Berpenghasilan', PendidikanTerakhirWali: 'SD/Sederajat', PenghasilanWali: 'Tidak Berpenghasilan',  MenerimaKPS: 'Tidak Menerima', MenerimaKIP: 'Tidak Menerima', JenisTinggal: 'Bersama Orang Tua', AlatTransportasi: 'Jalan kaki'},
        currectView: 'dataSiswa',
        currectViewIndex: 0,
        view: ['dataSiswa', 'alamatSiswa', 'dataAyah', 'dataIbu', 'dataWali', 'kartuPerlindunganSosial', 'kartuIndonesiaPintar', 'dataTambahan', 'cekUlang', 'selesai'],
        viewName: ['Data Siswa', 'Alamat Siswa', 'Data Ayah', 'Data Ibu', 'Data Wali (Opsional)', 'Kartu Perlindungan Sosial', 'Kartu Indonesia Pintar', 'Data Tambahan', 'Cek Ulang', 'Pengambilan PIN'],
        done: false
    },
    computed: {
        currectViewString: function () {
            if (this.viewName[this.currectViewIndex + 1]) {
                return 'Lanjutkan - ' + this.viewName[this.currectViewIndex + 1];
            } else {
                return 'Selesai';
            }
        },
        formValidation: function () {
            var status = true;

            //Data Siswa
            if (!this.daftar.Akta) {
                status = false;
            }
            if (!this.daftar.NIK) {
                status = false;
            }
            if (!this.daftar.NamaLengkap) {
                status = false;
            }
            if (!this.daftar.Gender) {
                status = false;
            }
            if (!this.daftar.TempatLahir) {
                status = false;
            }
            if (!this.daftar.Agama) {
                status = false;
            }

            //Alamat Siswa
            if (!this.daftar.AlamatSiswa) {
                status = false;
            }
            if (!this.daftar.Provinsi) {
                status = false;
            }
            if (!this.daftar.Kota) {
                status = false;
            }
            if (!this.daftar.Kecamatan) {
                status = false;
            }
            if (!this.daftar.Kelurahan) {
                status = false;
            }
            if (!this.daftar.RT) {
                status = false;
            }
            if (!this.daftar.RW) {
                status = false;
            }

            //Data Ayah
            if (!this.daftar.NIKAyah) {
                status = false;
            }
            if (!this.daftar.NamaLengkapAyah) {
                status = false;
            }
            if (!this.daftar.PendidikanTerakhirAyah) {
                status = false;
            }
            if (!this.daftar.pekerjaanAyah) {
                status = false;
            }
            if (!this.daftar.PenghasilanAyah) {
                status = false;
            }
            if (!this.daftar.NoHPAyah) {
                status = false;
            }
            if (!this.daftar.AlamatAyah) {
                status = false;
            }

            //Data Ibu
            if (!this.daftar.NIKIbu) {
                status = false;
            }
            if (!this.daftar.NamaLengkapIbu) {
                status = false;
            }
            if (!this.daftar.PendidikanTerakhirIbu) {
                status = false;
            }
            if (!this.daftar.pekerjaanIbu) {
                status = false;
            }
            if (!this.daftar.PenghasilanIbu) {
                status = false;
            }
            if (!this.daftar.NoHPIbu) {
                status = false;
            }
            if (!this.daftar.AlamatIbu) {
                status = false;
            }

            //Data Tambahan
            if (!this.daftar.JenisTinggal) {
                status = false;
            }
            if (!this.daftar.SekolahAsal) {
                status = false;
            }
            if (!this.daftar.AnakKe) {
                status = false;
            }
            if (!this.daftar.JumlahSaudaraKandung) {
                status = false;
            }
            if (!this.daftar.AlatTransportasi) {
                status = false;
            }
            if (!this.daftar.JarakRumahKesekolah) {
                status = false;
            }

            return status;
        }
    },
    methods: {
        getProgress: function (value) {
            return  { active: this.currectViewIndex == value };
        },
        goToIndex: function (index) {
            if (!this.done && index != this.view.length - 1) {
                this.currectViewIndex = index;
                this.currectView = this.view[this.currectViewIndex];
            }
        },
        next: function () {
            if (this.currectViewIndex < this.view.length - 1) {
                if (this.currectViewIndex == this.view.length - 2) {
                    if (this.formValidation) {
                        var ask = window.confirm("Apakah anda yakin dengan data yang anda masukkan?");
                        if (ask) {
                            this.currectViewIndex++;
                            this.currectView = this.view[this.currectViewIndex];
                            this.done = true;

                            var str = $('#nama').val();
                            var replace = str.split(' ').join('');
                            $('#username').val(replace);

                            var no_akta=$('#no_akta').val();
                            var nik=$('#nik').val();
                            var nama=$('#nama').val();
                            var jk=$('input[name=jk]:checked').val();
                            var tempat_lahir=$('#tempat_lahir').val();
                            var tanggal_lahir=$('#tanggal_lahir').val();
                            var agama=$('#agama').val();
                            var alamat=$('#alamat').val();
                            var provinsi=$('#provinsi').val();
                            var kota_kabupaten=$('#kota_kabupaten').val();
                            var kecamatan=$('#kecamatan').val();
                            var desa_kelurahan=$('#desa_kelurahan').val();
                            var rt=$('#rt').val();
                            var rw=$('#rw').val();
                            var kode_pos=$('#kode_pos').val();
                            var nik_ayah=$('#nik_ayah').val();
                            var nama_ayah=$('#nama_ayah').val();
                            var pendidikan_ayah=$('#pendidikan_ayah').val();
                            var pekerjaan_ayah=$('#pekerjaan_ayah').val();
                            var penghasilan_ayah=$('#penghasilan_ayah').val();
                            var no_hp_ayah=$('#no_hp_ayah').val();
                            var alamat_ayah=$('#alamat_ayah').val();
                            var nik_ibu=$('#nik_ibu').val();
                            var nama_ibu=$('#nama_ibu').val();
                            var pendidikan_ibu=$('#pendidikan_ibu').val();
                            var pekerjaan_ibu=$('#pekerjaan_ibu').val();
                            var penghasilan_ibu=$('#penghasilan_ibu').val();
                            var no_hp_ibu=$('#no_hp_ibu').val();
                            var alamat_ibu=$('#alamat_ibu').val();
                            var nik_wali=$('#nik_wali').val();
                            var nama_wali=$('#nama_wali').val();
                            var pendidikan_wali=$('#pendidikan_wali').val();
                            var pekerjaan_wali=$('#pekerjaan_wali').val();
                            var penghasilan_wali=$('#penghasilan_wali').val();
                            var no_hp_wali=$('#no_hp_wali').val();
                            var alamat_wali=$('#alamat_wali').val();
                            var status_kps=$('input[name=status_kps]:checked').val();
                            var no_kps=$('#no_kps').val();
                            var status_kip=$('input[name=status_kip]:checked').val();
                            var no_kip=$('#no_kip').val();
                            var jenis_tinggal=$('input[name=jenis_tinggal]:checked').val();
                            var berkebutuhan_khusus=$('#berkebutuhan_khusus').val();
                            var sekolah_asal=$('#sekolah_asal').val();
                            var anak_ke=$('#anak_ke').val();
                            var jumlah_saudara=$('#jumlah_saudara').val();
                            var transportasi=$('#transportasi').val();
                            var jarak_rumah=$('#jarak_rumah').val();
                            var username=$('#username').val();
                            var password=$('#password').val();
                            
                            $.ajax({
                                type : "POST",
                                url  : "<?php echo base_url('Daftar/addData')?>",
                                dataType : "JSON",
                                data : {no_akta:no_akta, nik:nik, nama:nama, jk:jk, tempat_lahir:tempat_lahir, tanggal_lahir:tanggal_lahir, agama:agama, alamat:alamat, provinsi:provinsi, kota_kabupaten:kota_kabupaten, kecamatan:kecamatan, desa_kelurahan:desa_kelurahan, rt:rt, rw:rw, kode_pos:kode_pos, nik_ayah:nik_ayah, nama_ayah:nama_ayah, pendidikan_ayah:pendidikan_ayah, pekerjaan_ayah:pekerjaan_ayah, penghasilan_ayah:penghasilan_ayah, no_hp_ayah:no_hp_ayah, alamat_ayah:alamat_ayah, nik_ibu:nik_ibu, nama_ibu:nama_ibu, pendidikan_ibu:pendidikan_ibu, pekerjaan_ibu:pekerjaan_ibu, penghasilan_ibu:penghasilan_ibu, no_hp_ibu:no_hp_ibu, alamat_ibu:alamat_ibu, nik_wali:nik_wali, nama_wali:nama_wali, pendidikan_wali:pendidikan_wali, pekerjaan_wali:pekerjaan_wali, penghasilan_wali:penghasilan_wali, no_hp_wali:no_hp_wali, alamat_wali:alamat_wali, status_kps:status_kps, no_kps:no_kps, status_kip:status_kip, no_kip:no_kip, jenis_tinggal:jenis_tinggal, berkebutuhan_khusus:berkebutuhan_khusus, sekolah_asal:sekolah_asal, anak_ke:anak_ke, jumlah_saudara:jumlah_saudara, transportasi:transportasi, jarak_rumah:jarak_rumah, username:username, password:password},
                                success: function(data){
                                    $('[name="no_akta"]').val("");
                                    $('[name="nik"]').val("");
                                    $('[name="nama"]').val("");
                                    $('[name="jk"]').val("");
                                    $('[name="tempat_lahir"]').val("");
                                    $('[name="tanggal_lahir"]').val("");
                                    $('[name="agama"]').val("");
                                    $('[name="alamat"]').val("");
                                    $('[name="provinsi"]').val("");
                                    $('[name="kota_kabupaten"]').val("");
                                    $('[name="kecamatan"]').val("");
                                    $('[name="desa_kelurahan"]').val("");
                                    $('[name="rt"]').val("");
                                    $('[name="rw"]').val("");
                                    $('[name="kode_pos"]').val("");
                                    $('[name="nik_ayah"]').val("");
                                    $('[name="nama_ayah"]').val("");
                                    $('[name="pendidikan_ayah"]').val("");
                                    $('[name="pekerjaan_ayah"]').val("");
                                    $('[name="penghasilan_ayah"]').val("");
                                    $('[name="no_hp_ayah"]').val("");
                                    $('[name="alamat_ayah"]').val("");
                                    $('[name="nik_ibu"]').val("");
                                    $('[name="nama_ibu"]').val("");
                                    $('[name="pendidikan_ibu"]').val("");
                                    $('[name="pekerjaan_ibu"]').val("");
                                    $('[name="penghasilan_ibu"]').val("");
                                    $('[name="no_hp_ibu"]').val("");
                                    $('[name="alamat_ibu"]').val("");
                                    $('[name="nik_wali"]').val("");
                                    $('[name="nama_wali"]').val("");
                                    $('[name="pendidikan_wali"]').val("");
                                    $('[name="pekerjaan_wali"]').val("");
                                    $('[name="penghasilan_wali"]').val("");
                                    $('[name="no_hp_wali"]').val("");
                                    $('[name="alamat_wali"]').val("");
                                    $('[name="status_kps"]').val("");
                                    $('[name="no_kps"]').val("");
                                    $('[name="status_kip"]').val("");
                                    $('[name="no_kip"]').val("");
                                    $('[name="jenis_tinggal"]').val("");
                                    $('[name="berkebutuhan_khusus"]').val("");
                                    $('[name="sekolah_asal"]').val("");
                                    $('[name="anak_ke"]').val("");
                                    $('[name="jumlah_saudara"]').val("");
                                    $('[name="transportasi"]').val("");
                                    $('[name="jarak_rumah"]').val("");
                                }
                                });
                                return false;
                         }
                    } else {
                        window.alert("Data kurang lengkap, silahkan cek ulang seluruh data!");
                    }
                } else {
                    this.currectViewIndex++;
                    this.currectView = this.view[this.currectViewIndex];
                }
            } else {
                window.location.href = "http://localhost/sdn-polehan-5/Pendaftaran/";
            }
        },
        prev: function () {
            if (this.currectViewIndex > 0) {
                this.currectViewIndex--;
                this.currectView = this.view[this.currectViewIndex];
            } else {
                var ask = window.confirm("Apakah anda yakin ingin keluar dari pendaftaran?");
                if (ask) {
                    window.location.href = "http://localhost/sdn-polehan-5/Pendaftaran/";
                }
            }
        },
        begin: function () {
            this.currectViewIndex = 0;
            this.currectView = this.view[this.currectViewIndex];
        },
    }
})
});

</script>
</html>