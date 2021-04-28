<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script> var base_url = "<?php echo base_url()?>";</script>
<script src="<?php echo base_url()?>assets/js/kelolaprofile.js"></script>
<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
<div id="app" class="content wh-sidebar">
    <h1>Kelola Halaman Profile</h1>
    <div class="box profile-container">
        <div class="profile-menu-bar">
            <ul class="profile-menu">
                <li :class="(menuActive == 'HalamanUtama') ? 'active' : '' "><div></div><a @click="ChangePage('HalamanUtama')">Halaman Utama</a></li>
                <li :class="(menuActive == 'FasilitasSekolah') ? 'active' : '' "><div></div><a @click="ChangePage('FasilitasSekolah')">Fasilitas Sekolah</a></li>
                <li :class="(menuActive == 'PrestasiSekolah') ? 'active' : '' "><div></div><a @click="ChangePage('PrestasiSekolah')">Prestasi Sekolah</a></li>
                <li :class="(menuActive == 'KegiatanSekolah') ? 'active' : '' "><div></div><a @click="ChangePage('KegiatanSekolah')">Kegiatan Sekolah</a></li>
                <li :class="(menuActive == 'EkstrakulikulerSekolah') ? 'active' : '' "><div></div><a @click="ChangePage('EkstrakulikulerSekolah')">Ekstrakulikuler Sekolah</a></li>
                <li :class="(menuActive == 'DaftarPendidik') ? 'active' : '' "><div></div><a @click="ChangePage('DaftarPendidik')">Daftar Pendidik</a></li>
                <li :class="(menuActive == 'TataCaraPendaftaran') ? 'active' : '' "><div></div><a @click="ChangePage('TataCaraPendaftaran')">Tata Cara Pendaftaran</a></li>
            </ul>
        </div>
        <div class="profile-content">
            <transition name="slider" mode="out-in">
                <component :is="menuActive" keep-alive></component>
            </transition>
        </div>
        <div style="clear:both"></div>
    </div>
</div>

<template id="HalamanUtama">
    <form ref="form" id="form_edit_data_sekolah">
        <a v-if="change" class="save-btn" @click="editDataSekolah">Save Change</a>
        <p class="title" style="margin: 0">Informasi Umum</p>
        <div>
            <div class="img-box-container">
                <p class="subtitle">LOGO SEKOLAH</p>
                <div class="img-display-box-container">
                    <div class="image-container">
                        <div class="img-overlay">
                            <label for="main-photo" class="ubah-overlay" style="cursor: pointer;">ubah</label>
                            <input @change="onMainPhotoChange" id="main-photo" type="file" placeholder="Add profile picture" accept=".jpg, .png"/>
                        </div>
                        <img style="width: calc(100% - 40px); height: calc(100% - 40px); margin: 20px;" :src="MainPhoto">
                    </div>
                </div>
            </div>
            <div class="right-box-container">
                <p class="subtitle">NAMA SEKOLAH</p>
                <input type="text" @change="onChange" value="<?php echo $data_sekolah[0]->nama_sekolah?>" name="nama_sekolah" id="nama_sekolah">

                <p class="subtitle">DESKRIPSI SINGKAT</p>
                <input type="text" @change="onChange"  value="<?php echo $data_sekolah[0]->deskripsi?>" name="deskripsi" id="deskripsi_sekolah">
            </div>
            <div style="clear:both"></div>
        </div>

        <p class="title">Gambar Mengenai Sekolah</p>
        <br>
        <div class="image-group-container">
            <div class="img-display-box-container" v-for="(cac, index) in cache" v-if="!cac.delete">
                <div class="image-container">
                    <input @change="onFileChange($event, index)" :id="'f0' +  index" type="file" placeholder="Add profile picture" accept=".jpg, .png"/>
                    <label v-if="cac.url == ''" :for="'f0' +  index"><i class="fas fa-plus"></i><p>Tambahkan Gambar</p></label>

                    <div class="img-overlay" v-if="cac.url != ''">
                        <label :for="'f0' +  index" class="ubah-overlay">ubah</label>
                        <a @click="deleteFile(index)" class="hapus-overlay">hapus</a>
                    </div>
                    <img :src="cac.url" v-if="cac.url != ''">
                </div>
            </div>
        </div>

        <p class="title">Tujuan, Visi & Misi</p>
        <div class="input-container">
            <p class="subtitle">TUJUAN SEKOLAH</p>
            <textarea name="tujuan" @change="onChange" id="tujuan" rows="3"><?php echo $data_sekolah[0]->tujuan?></textarea>

            <p class="subtitle">VISI SEKOLAH</p>
            <textarea name="visi" @change="onChange" id="visi" rows="3"><?php echo $data_sekolah[0]->visi?></textarea>

            <p class="subtitle">MISI SEKOLAH</p>
            <textarea name="misi" @change="onChange" id="misi" rows="9"><?php echo $data_sekolah[0]->misi?></textarea>
        </div>
        <br>

        <p class="title">Informasi Mengenai Sekolah</p>
        <div class="input-container">
            <p class="subtitle">JUMLAH SELURUH SISWA</p>
            <input type="number" @change="onChange" value="<?php echo $data_sekolah[0]->jumlah_siswa?>" name="jumlah_siswa" id="jumlah_siswa">

            <p class="subtitle">DESKRIPSI SINGKAT TENTANG JUMLAH SISWA</p>
            <textarea type="number" @change="onChange" rows="3" name="desc_siswa" id="desc_siswa"><?php echo $data_sekolah[0]->deskripsi_jumlahsiswa?></textarea>

            <p class="subtitle">EMAIL SEKOLAH</p>
            <input type="text" @change="onChange" value="<?php echo $data_sekolah[0]->email?>" name="email_sekolah" id="email_sekolah">

            <p class="subtitle">NO TELP SEKOLAH</p>
            <input type="text" @change="onChange" value="<?php echo $data_sekolah[0]->no_telp?>" name="no_telp_sekolah" id="no_telp_sekolah">

            <p class="subtitle">ALAMAT SEKOLAH</p>
            <input type="text" @change="onChange" value="<?php echo $data_sekolah[0]->alamat?>" name="alamat_sekolah" id="alamat_sekolah">

            <p class="subtitle">LINK GOOGLE MAPS ALAMAT SEKOLAH</p>
            <input type="text" @change="onChange" value="<?php echo $data_sekolah[0]->google_maps?>" name="google_maps" id="google_maps">
        
        </div>
    </form>
</template>

<template id="FasilitasSekolah">
    <form>
        <a v-if="change" class="save-btn" @click="editFasilitas">Save Change</a>
        <p class="subtitle">DESKRIPSI SINGKAT TENTANG FASILITAS SEKOLAH</p>
        <textarea type="number" @change="onChange" rows="3" name="desc_fasilitas" id="desc_fasilitas" ><?php echo $data_sekolah[0]->deskripsi_fasilitas?></textarea>
        <br><br><br>
        <div v-for="(da, index) in data" v-if="!da.delete" style="margin-bottom: 20px">
            <p class="title" style="margin: 0">Fasilitas Sekolah - {{ index + 1 }}</p>
            <div>
                <div class="input-container">
                    <p class="subtitle">NAMA FASILITAS</p>
                    <input v-model="da.fasilitas" @change="onChange" v-bind:id="'nama_fasilitas'+da.id" type="text">

                    <p class="subtitle">DESKRIPSI SINGKAT</p>
                    <input v-model="da.deskripsi" @change="onChange" v-bind:id="'desk_fasilitas'+da.id" type="text">
                    <a @click="deletePrestasi(index)" class="hapus-btn">hapus</a>
                </div>
                <div style="clear:both"></div>
            </div>
        </div>
        <a class="tambahkan" @click="onNewFile"><i class="fas fa-plus"></i><p>tambahkan<br>fasilitas sekolah</p></a>
    </form>
</template>

<template id="PrestasiSekolah">
    <form>
        <a v-if="change" class="save-btn" @click="editPrestasi">Save Change</a>
        <div v-for="(da, index) in data" v-if="!da.delete" style="margin-bottom: 20px">
            <p class="title" style="margin: 0">Prestasi Sekolah - {{ index + 1 }}</p>
            <div>
                <div class="img-box-container">
                    <p class="subtitle">GAMBAR LOMBA</p>
                    <div class="img-display-box-container">
                        <input @change="onFileChange($event, index)" :id="'ps0' +  da.id" type="file" placeholder="Add profile picture" accept=".jpg, .png"/>
                        <div class="image-container">
                            <div class="img-overlay">
                                <label :for="'ps0' +  da.id" class="ubah-overlay">ubah</label>
                            </div>
                            <img style="object-fit: cover;" :src="da.gambar">
                        </div>
                    </div>
                    <a @click="deleteFile(index)" class="hapus-btn">hapus</a>
                </div>
                <div class="right-box-container">
                    <p class="subtitle">NAMA LOMBA</p>
                    <input v-model="da.nama" @change="onChange" v-bind:id="'nama_prestasi'+da.id" type="text">

                    <p class="subtitle">TANGGAL LOMBA</p>
                    <input v-model="da.tgl" @change="onChange" v-bind:id="'tgl_prestasi'+da.id" type="date">

                    <p class="subtitle">DESKRIPSI SINGKAT</p>
                    <input v-model="da.deskripsi" @change="onChange" v-bind:id="'desk_prestasi'+da.id" type="text">
                </div>
                <div style="clear:both"></div>
            </div>
        </div>
        <a class="tambahkan" @click="onNewFile"><i class="fas fa-plus"></i><p>tambahkan<br>prestasi sekolah</p></a>
    </form>
</template>

<template id="KegiatanSekolah">
    <form>
        <a v-if="change" class="save-btn" @click="editDeskripsiPendidik">Save Change</a>
        <div v-for="(da, index) in data" v-if="!da.delete" style="margin-bottom: 20px">
            <p class="title" style="margin: 0">Kegiatan Sekolah - {{ index + 1 }}</p>
            <div>
                <div class="img-box-container">
                    <p class="subtitle">GAMBAR KEGIATAN</p>
                    <div class="img-display-box-container">
                        <input @change="onFileChange($event, index)" :id="'ks0' +  da.id" type="file" placeholder="Add profile picture" accept=".jpg, .png"/>
                        <div class="image-container">
                            <div class="img-overlay">
                                <label :for="'ks0' +  da.id" class="ubah-overlay">ubah</label>
                            </div>
                            <img style="object-fit: cover;" :src="da.gambar">
                        </div>
                    </div>
                    <a @click="deleteFile(index)" class="hapus-btn">hapus</a>
                </div>
                <div class="right-box-container">
                    <p class="subtitle">NAMA KEGIATAN</p>
                    <input v-model="da.judul" @change="onChange" v-bind:id="'nama_kegiatan'+da.id" type="text">

                    <p class="subtitle">TANGGAL KEGIATAN</p>
                    <input v-model="da.tgl_kegiatan" @change="onChange" v-bind:id="'tgl_kegiatan'+da.id" type="date">

                    <p class="subtitle">DESKRIPSI SINGKAT</p>
                    <input v-model="da.deskripsi" @change="onChange" v-bind:id="'desk_kegiatan'+da.id" type="text">

                </div>
                <div style="clear:both"></div>
            </div>
        </div>
        <a class="tambahkan" @click="onNewFile"><i class="fas fa-plus"></i><p>tambahkan<br>kegiatan sekolah</p></a>
    </form>
</template>

<template id="EkstrakulikulerSekolah">
    <form>
        <a v-if="change" class="save-btn" @click="editDeskripsiEskul">Save Change</a>
        <div v-for="(da, index) in data" v-if="!da.delete" style="margin-bottom: 20px">
            <p class="title" style="margin: 0">Ekstrakulikuler Sekolah - {{ index + 1 }}</p>
            <div>
                <div class="img-box-container">
                    <p class="subtitle">GAMBAR EKSTRAKULIKULER</p>
                    <div class="img-display-box-container">
                        <input @change="onFileChange($event, index)" :id="'es0' +  da.id" type="file" placeholder="Add profile picture" accept=".jpg, .png"/>
                        <div class="image-container">
                            <div class="img-overlay">
                                <label :for="'es0' +  da.id" class="ubah-overlay">ubah</label>
                            </div>
                            <img style="object-fit: cover;" :src="da.gambar">
                        </div>
                    </div>
                    <a @click="deleteFile(index)" class="hapus-btn">hapus</a>
                </div>
                <div class="right-box-container">
                    <p class="subtitle">NAMA EKSTRAKULIKULER</p>
                    <input v-model="da.judul" @change="onChange" v-bind:id="'nama_eskul'+da.id" type="text">

                    <p class="subtitle">TANGGAL EKSTRAKULIKULER</p>
                    <input v-model="da.tgl_eskul" @change="onChange" v-bind:id="'tgl_eskul'+da.id" type="date">

                    <p class="subtitle">DESKRIPSI SINGKAT</p>
                    <input v-model="da.deskripsi" @change="onChange" v-bind:id="'desk_eskul'+da.id" type="text">
                </div>
                <div style="clear:both"></div>
            </div>
        </div>
        <a class="tambahkan" @click="onNewFile"><i class="fas fa-plus"></i><p>tambahkan<br>prestasi sekolah</p></a>
    </form>
</template>

<template id="DaftarPendidik">
    <form>
        <a v-if="change" class="save-btn" @click="editDeskripsiPendidik">Save Change</a>
        <p class="subtitle">DESKRIPSI SINGKAT TENTANG PENDIDIK SEKOLAH</p>
        <textarea type="number" @change="onChange" rows="3" name="desc_siswa" id="desc_siswa"><?php echo $data_sekolah[0]->deskripsi_pendidik?></textarea>
        <br><br><br>
        <div v-for="(da, index) in data" v-if="!da.delete" style="margin-bottom: 20px">
            <p class="title" style="margin: 0">Daftar Pendidik - {{ index + 1 }}</p>
            <div>
                <div class="img-box-container">
                    <p class="subtitle">FOTO PENDIDIK</p>
                    <div class="img-display-box-container">
                        <input @change="onFileChange($event, index)" :id="'dps0' +  da.id" type="file" placeholder="Add profile picture" accept=".jpg, .png"/>
                        <div class="image-container">
                            <div class="img-overlay">
                                <label :for="'dps0' +  da.id" class="ubah-overlay">ubah</label>
                            </div>
                            <img style="object-fit: cover;" :src="da.gambar">
                        </div>
                    </div>
                    <a @click="deleteFile(index)" class="hapus-btn">hapus</a>
                </div>
                <div class="right-box-container">
                    <p class="subtitle">NAMA PENDIDIK</p>
                    <input v-model="da.nama_gelar" @change="onChange" v-bind:id="'nama_pendidik'+da.id" type="text">

                    <p class="subtitle">JABATAN PENDIDIK</p>
                    <input v-model="da.mapel" @change="onChange" v-bind:id="'mapel_pendidik'+da.id" type="text">
                    
                </div>
                <div style="clear:both"></div>
            </div>
        </div>
        <a class="tambahkan" @click="onNewFile"><i class="fas fa-plus"></i><p>tambahkan<br>pendidik sekolah</p></a>
    </form>
</template>

<template id="TataCaraPendaftaran">
    <form>
        <a v-if="change" class="save-btn" @click="editInfoPendaftaran">Save Change</a>

        <p class="subtitle">TATA CARA PENDAFTARAN</p>
        <textarea name="tata" @change="onChange" id="tata_cara_pendaftaran" name="tata_cara_pendaftaran" rows="9"><?php echo $info_pendaftaran[0]->tata_cara_pendaftaran?></textarea>

        <p class="subtitle">PERSYARATAN PENDAFTARAN</p>
        <textarea name="syarat" @change="onChange" id="persyaratan_pendaftaran" name="persyaratan_pendaftaran" rows="9"><?php echo $info_pendaftaran[0]->persyaratan_pendaftaran?></textarea>

        <p class="subtitle">INFORMASI PENDAFTARAN</p>
        <textarea name="info" @change="onChange" id="info" name="info" rows="9"><?php echo $info_pendaftaran[0]->info?></textarea>
    </form>
</template>

<script>
var prestasiarr = JSON.parse('<?php echo json_encode($prestasi)?>');
var kegiatanarr = JSON.parse('<?php echo json_encode($kegiatan)?>');
var eskularr = JSON.parse('<?php echo json_encode($ekstrakurikuler)?>');
var pendidikarr = JSON.parse('<?php echo json_encode($daftar_pendidik)?>');
var fasilitasarr = JSON.parse('<?php echo json_encode($fasilitas)?>');
var gambar_sekolaharr = JSON.parse('<?php echo json_encode($gambar_sekolah)?>');

    // $('#main-photo').on("change", function(){
    //     $('#form_edit_data_sekolah').submit();
    // })

Vue.component('HalamanUtama', {
    template: '#HalamanUtama',
    props: ['data'],
    data: function () {
        return {
            cache: gambar_sekolaharr,
            MainPhoto: '<?php echo $data_sekolah[0]->logo_sekolah?>',
            change: false,
        }
    },
    methods: {
        onChange() {
            this.change = true;
        },
        onFileChange(e, index) {
            if (this.cache[index].url == '') {
                this.cache.push({url: '', delete: false, new: true});
                const file = e.target.files[0];
                this.cache[index].url = URL.createObjectURL(file);
                this.addGambarSekolah(index);
            }else{
                const file = e.target.files[0];
                this.cache[index].url = URL.createObjectURL(file);
                this.editGambarSekolah(index, this.cache[index].id);
            }
        },
        deleteFile(index) {
            // if (this.cache[index].new == true) {
            //     this. cache.splice(index, 1);
            // } else {
            //     this.cache[index].delete = true;
            // } 
            // this.deleteGambarSekolah(this.cache[index].id); 
            if (confirm('Hapus gambar sekolah ?')) {
                this.deleteGambarSekolah(this.cache[index].id); 
            }else{

            }
        },
        onMainPhotoChange(e) {
            const file = e.target.files[0];
            this.MainPhoto = URL.createObjectURL(file);
            this.submit();
        },
        addGambarSekolah(index){
            var self = this;
            gambar = "";
            tipe = "";
            if($('#f0'+index)[0].files.length > 0){
                gambar = $('#f0'+index)[0].files[0];
                var result64 = new FileReader();
                result64.readAsDataURL(gambar);
                result64.onload = function () {
                    gambar = result64.result;
                    tipe = $('#f0'+index)[0].files[0].name;

                    var gambar2 = gambar.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");                    

                    $.ajax({
                        type: "POST",
                        url: base_url+"KelolaProfile/addGambarSekolah",
                        data: {
                            gambar:gambar2,
                            tipe:tipe},
                        dataType: "json",
                        beforeSend: function (e) {
                            if (e && e.overrideMimeType) {
                                e.overrideMimeType("application/json; charset=UTF-8");
                            }
                        },
                        success: function (response) {
                            if (response.status == "success") {
                                $.ajax({
                                    type: "POST",
                                    url: base_url+"KelolaProfile/selectGambarSekolah",
                                    dataType: "json",
                                    beforeSend: function (e) {
                                        if (e && e.overrideMimeType) {
                                            e.overrideMimeType("application/json, charset=UTF-8");
                                        }
                                    },
                                    success: function (response) {
                                        if (response.status == "success") {
                                            gambar_sekolaharr = null;
                                            gambar_sekolaharr = response.data;
                                            self.cache = response.data;
                                        }else{
                                        }
                                    }
                                });   
                            }else{
                                alert('Gagal menambah gambar');
                            }
                        }
                    })    
                    
                }
            }else{
                alert('Gagal mengupload gambar !');
            }
        },
        editGambarSekolah(index, id){
            var self = this;
            gambar = "";
            tipe = "";
            if($('#f0'+index)[0].files.length > 0){
                gambar = $('#f0'+index)[0].files[0];
                var result64 = new FileReader();
                result64.readAsDataURL(gambar);
                result64.onload = function () {
                    gambar = result64.result;
                    tipe = $('#f0'+index)[0].files[0].name;

                    var gambar2 = gambar.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");                    

                    $.ajax({
                        type: "POST",
                        url: base_url+"KelolaProfile/editGambarSekolah",
                        data: {
                            id:id,
                            gambar:gambar2,
                            tipe:tipe},
                        dataType: "json",
                        beforeSend: function (e) {
                            if (e && e.overrideMimeType) {
                                e.overrideMimeType("application/json; charset=UTF-8");
                            }
                        },
                        success: function (response) {
                            if (response.status == "success") {
                                $.ajax({
                                    type: "POST",
                                    url: base_url+"KelolaProfile/selectGambarSekolah",
                                    dataType: "json",
                                    beforeSend: function (e) {
                                        if (e && e.overrideMimeType) {
                                            e.overrideMimeType("application/json, charset=UTF-8");
                                        }
                                    },
                                    success: function (response) {
                                        if (response.status == "success") {
                                            gambar_sekolaharr = null;
                                            gambar_sekolaharr = response.data;
                                            self.cache = response.data;
                                        }else{
                                        }
                                    }
                                });   
                            }else{
                                alert(response.message);
                            }
                        }
                    })    
                    
                }
            }else{
                alert('Gagal mengedit gambar !');
            }
        },
        deleteGambarSekolah(id){
            var self = this;
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/deleteGambarSekolah",
                data: {id:id},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json; charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == 'success') {
                        $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectGambarSekolah",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    alert("Hapus gambar sekolah berhasil");
                                    gambar_sekolaharr = null;
                                    gambar_sekolaharr = response.data;
                                    self.cache = response.data;
                                }else{
                                }
                            }
                        });   
                    }else{
                        alert("Gagal menghapus gambar sekolah");
                    }
                }
            })
        },
        editDataSekolah(){
            var nama_sekolah = $('#nama_sekolah').val();
            var deskripsi = $('#deskripsi_sekolah').val();
            var email = $('#email_sekolah').val();
            var no_telp = $('#no_telp_sekolah').val();
            var alamat = $('#alamat_sekolah').val();
            var tujuan = $('#tujuan').val();
            var visi = $('#visi').val();
            var misi = $('#misi').val();
            var jumlah_siswa = $('#jumlah_siswa').val();
            var desc_siswa = $('#desc_siswa').val();
            var google_maps = $('#google_maps').val();
           
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/editDataSekolah",
                data: {
                        nama_sekolah : nama_sekolah,
                        deskripsi : deskripsi,
                        email : email,
                        no_telp : no_telp,
                        alamat : alamat,
                        tujuan : tujuan,
                        visi : visi,
                        misi : misi,
                        jumlah_siswa : jumlah_siswa,
                        deskripsi_jumlahsiswa: desc_siswa,
                        google_maps : google_maps 
                    },
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType){
                        e.overrideMimeType("application/json; charset=UTF-8");
                    }
                },
                success: function(callback) {
                    if(callback.status == "success"){
                            alert('Edit data sekolah berhasil');
                            window.location.replace(base_url+"KelolaProfile");
                            
                    }
                }
            })
        },
        submit() {
            var nama_sekolah = $('#nama_sekolah').val();
			var deskripsi = $('#deskripsi_sekolah').val();
			var email = $('#email_sekolah').val();
			var no_telp = $('#no_telp_sekolah').val();
			var alamat = $('#alamat_sekolah').val();
			var tujuan = $('#tujuan').val();
			var visi = $('#visi').val();
			var misi = $('#misi').val();
			var jumlah_siswa = $('#jumlah_siswa').val();
			var google_maps = $('#google_maps').val();
            var gambar = "";
            var tipe = "";

            if($('#main-photo')[0].files.length > 0){
                gambar = $('#main-photo')[0].files[0];
                var result64 = new FileReader();
                result64.readAsDataURL(gambar);
                result64.onload = function () {
                    gambar = result64.result;
                    tipe = $('#main-photo')[0].files[0].name;
                    var gambar2 = gambar.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");
                    
                    $.ajax({
                        type: "POST",
                        url: base_url+"KelolaProfile/editLogoSekolah",
                        data: {
                            nama_sekolah : nama_sekolah,
                            deskripsi : deskripsi,
                            email : email,
                            no_telp : no_telp,
                            alamat : alamat,
                            tujuan : tujuan,
                            visi : visi,
                            misi : misi,
                            jumlah_siswa : jumlah_siswa,
                            google_maps : google_maps,
                            gambar:gambar2,
                            tipe:tipe
                        },
                        dataType: "json",
                        beforeSend: function(e) {
                            if(e && e.overrideMimeType){
                                e.overrideMimeType("application/json; charset=UTF-8");
                            }
                        },
                        success: function(callback) {
                            if(callback.status == "success"){
                                   alert('Edit logo sekolah berhasil');
                                   window.location.replace(base_url+"KelolaProfile");
                            }
                        }
                    })       
                    
                }
            }
        }
    }
})

Vue.component('PrestasiSekolah', {
    template: '#PrestasiSekolah',
    data: function () {
        return {
            data: prestasiarr,
            change: false
        }
    },
    methods: {
        onChange() {
            this.change = true;
        },
        onFileChange(e, index) {
            const file = e.target.files[0];
            this.data[index].gambar = URL.createObjectURL(file);
            this.editGambarPrestasi(this.data[index].id);
        },
        onNewFile() {
            this.data.push({
                    gambar:'./assets/img/no_images.png', 
                    nama: 'nama prestasi',
                    tgl: '2020-01-01',
                    deskripsi: 'deskripsi prestasi',
                    delete: false, 
                    new: true
            });
            this.addPrestasi();
        },
        deleteFile(index) {
            // if (this.data[index].new == true) {
            //     this. data.splice(index, 1);
            // } else {
            //     this.data[index].delete = true;
            // }
            if (confirm('Hapus prestasi '+this.data[index].nama+' ?')) {
                this.deletePrestasi(+this.data[index].id);
            }else{

            }
            
        },
        addPrestasi(){
            var self = this;
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/addPrestasi",
                data: {nama:"Nama prestasi",tgl:"2020-01-01", deskripsi:"deskripsi prestasi", gambar:'./assets/img/no_images.png'},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json, charset=UTF-8");
                    }
                },
                success: function (response) {
                    if(response.status == "success"){
                        $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectPrestasi",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    prestasiarr = null;
                                    prestasiarr = response.data;
                                    self.data = response.data;
                                }else{
                                }
                            }
                        });   
                    }
                }
            })
        },
        editPrestasi(){
            var self = this;
            for (index = 0; index < this.data.length; index++) {
                id = (this.data[index].id);    

                var nama_prestasi = $('#nama_prestasi'+id).val();
                var tgl_prestasi = $('#tgl_prestasi'+id).val();
                var desk_prestasi = $('#desk_prestasi'+id).val();
                
                $.ajax({
                    type: "POST",
                    url: base_url+"KelolaProfile/editFormPrestasi",
                    data: {
                        id:id,
                        nama:nama_prestasi,
                        tgl:tgl_prestasi,
                        deskripsi:desk_prestasi
                    },
                    dataType: "json",
                    beforeSend: function (e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json; charset=UTF-8");
                        }
                    },
                    success: function (response) {
                        if (response.status == "success") {

                        }else{
                            
                        }
                    }
                })
            }
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/selectPrestasi",
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json, charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        prestasiarr = null;
                        prestasiarr = response.data;
                        self.data = response.data;
                    }else{
                    }
                }
            });   
            alert('Berhasil mengedit prestasi !');
        },
        editGambarPrestasi(id){
            var self = this;
            gambar = "";
            tipe = "";
            if($('#ps0'+id)[0].files.length > 0){
                gambar = $('#ps0'+id)[0].files[0];
                var result64 = new FileReader();
                result64.readAsDataURL(gambar);
                result64.onload = function () {
                    gambar = result64.result;
                    tipe = $('#ps0'+id)[0].files[0].name;

                    var nama_prestasi = $('#nama_prestasi'+id).val();
                    var tgl_prestasi = $('#tgl_prestasi'+id).val();
                    var desk_prestasi = $('#desk_prestasi'+id).val();
                    var gambar2 = gambar.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");
                    
                    $.ajax({
                        type: "POST",
                        url: base_url+"KelolaProfile/editPrestasi",
                        data: {
                            id:id,
                            nama:nama_prestasi,
                            tgl:tgl_prestasi,
                            deskripsi:desk_prestasi,
                            gambar:gambar2,
                            tipe:tipe
                        },
                        dataType: "json",
                        beforeSend: function (e) {
                            if (e && e.overrideMimeType) {
                                e.overrideMimeType("application/json; charset=UTF-8");
                            }
                        },
                        success: function (response) {
                            if (response.status == "success") {
                                alert('Berhasil mengedit prestasi !');
                                $.ajax({
                                    type: "POST",
                                    url: base_url+"KelolaProfile/selectPrestasi",
                                    dataType: "json",
                                    beforeSend: function (e) {
                                        if (e && e.overrideMimeType) {
                                            e.overrideMimeType("application/json, charset=UTF-8");
                                        }
                                    },
                                    success: function (response) {
                                        if (response.status == "success") {
                                            prestasiarr = null;
                                            prestasiarr = response.data;
                                            self.data = response.data;
                                        }else{
                                        }
                                    }
                                });   
                            }else{
                                alert(response.message);
                            }
                        }
                    })    
                    
                }
            }else{
                alert('Gagal mengupload gambar !');
            }
        },
        deletePrestasi(id){
            var self = this;
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/deletePrestasi",
                data: {id:id},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json; charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectPrestasi",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    prestasiarr = null;
                                    prestasiarr = response.data;
                                    self.data = response.data;
                                }else{
                                }
                            }
                        });   
                    }else{
                        alert('Gagal menghapus prestasi');
                    }
                }
            })
            
        }
    }
})

Vue.component('FasilitasSekolah', {
    template: '#FasilitasSekolah',
    data: function () {
        return {
            data: fasilitasarr,
            change: false,
        }
    },
    methods: {
        onChange() {
            this.change = true;
        },
        onNewFile() {
            this.data.push({ 
                    fasilitas: 'nama fasilitas',
                    deskripsi: 'deskripsi fasilitas',
                    delete: false, 
                    new: true
            });
            this.addFasilitas();
        },
        deletePrestasi(index) {
            // if (this.data[index].new == true) {
            //     this. data.splice(index, 1);
            // } else {
            //     this.data[index].delete = true;
            // }
            if (confirm('Hapus prestasi '+this.data[index].fasilitas+' ?')) {
                this.deleteFasilitas(+this.data[index].id);
            }else{

            }
            
        },
        addFasilitas(){
            var self = this;
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/addFasilitas",
                data: {fasilitas:"Nama Fasilitas",deskripsi:"Deskripsi Fasilitas"},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json, charset=UTF-8");
                    }
                },
                success: function (response) {
                    if(response.status == "success"){
                        $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectFasilitas",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    fasilitasarr = null;
                                    fasilitasarr = response.data;
                                    self.data = response.data;
                                }else{
                                }
                            }
                        });
                    }
                }
            })
        },
        editFasilitas(){
            var self = this;
            for (index = 0; index < this.data.length; index++) {
                id = (this.data[index].id);    

                var nama_fasilitas = $('#nama_fasilitas'+id).val();
                var desk_fasilitas = $('#desk_fasilitas'+id).val();
                $.ajax({
                    type: "POST",
                    url: base_url+"KelolaProfile/editFasilitas",
                    data: {
                            id:id,
                            fasilitas:nama_fasilitas,
                            deskripsi:desk_fasilitas,
                        },
                    dataType: "json",
                    beforeSend: function (e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json; charset=UTF-8");
                        }
                    },
                    success: function (response) {
                        if (response.status == "success") {
                            // alert('Berhasil mengedit fasilitas !');
                            // window.location.replace(base_url+"KelolaProfile");                  
                            console.log(response.status);
                            
                        }else{
                            console.log(response.status);
                            
                        }
                    }
                })   
            };
            var desk_fasilitas = $('#desc_fasilitas').val();
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/editDeskripsiFasilitas",
                data: {
                        desc_fasilitas:desk_fasilitas,
                    },
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json; charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        
                    }else{
                        
                    }
                }
            });                     
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/selectFasilitas",
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json, charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        fasilitasarr = null;
                        fasilitasarr = response.data;
                        self.data = response.data;
                    }else{
                    }
                }
            });
            alert("Berhasil edit fasilitas");
        },
        deleteFasilitas(id){
            var self = this;
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/deleteFasilitas",
                data: {id:id},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json; charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectFasilitas",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    fasilitasarr = null;
                                    fasilitasarr = response.data;
                                    self.data = response.data;
                                }else{
                                }
                            }
                        });   
                    }else{
                        alert('Gagal menghapus fasilitas');
                    }
                }
            })
            
        }
    }
})

Vue.component('KegiatanSekolah', {
    template: '#KegiatanSekolah',
    data: function () {
        return {
            data: kegiatanarr,
            change: false,
        }
    },
    methods: {
        onChange() {
            this.change = true;
        },
        onFileChange(e, index) {
            const file = e.target.files[0];
            this.data[index].gambar = URL.createObjectURL(file);
            this.editGambarKegiatan(this.data[index].id);
        },
        onNewFile() {
            this.data.push({
                    gambar: './assets/img/no_images.png', 
                    judul: 'nama kegiatan',
                    tgl_kegiatan: '2020-01-01',
                    deskripsi: 'deskripsi kegiatan',
                    delete: false, 
                    new: true
            });
            this.addKegiatan();
        },
        deleteFile(index) {
            // if (this.data[index].new == true) {
            //     this. data.splice(index, 1);
            // } else {
            //     this.data[index].delete = true;
            // }  
            if (confirm('Hapus prestasi '+this.data[index].judul+' ?')) {
                this.deleteKegiatan(+this.data[index].id);
            }else{

            }
            
        },
        addKegiatan(){
            var self = this;
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/addKegiatan",
                data: {judul:"Nama kegiatan", deskripsi:"deskripsi kegiatan",gambar:'./assets/img/no_images.png', tgl_kegiatan:"2020-01-01"},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json; charset=UTF-8");
                    }
                },
                success: function (response) {
                    if(response.status == "success"){
                        $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectKegiatan",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    kegiatanarr = null;
                                    kegiatanarr = response.data;
                                    self.data = response.data;
                                }else{
                                }
                            }
                        });
                        
                    }
                }
            })
        },
        editDeskripsiPendidik(){
            var self = this;
            for (index = 0; index < this.data.length; index++) {
                id = (this.data[index].id);    

                var nama_kegiatan = $('#nama_kegiatan'+id).val();
                var tgl_kegiatan = $('#tgl_kegiatan'+id).val();
                var desk_kegiatan = $('#desk_kegiatan'+id).val();
                $.ajax({
                    type: "POST",
                    url: base_url+"KelolaProfile/editDeskripsiKegiatan",
                    data: {
                            id:id,
                            judul:nama_kegiatan,
                            tgl:tgl_kegiatan,
                            deskripsi:desk_kegiatan,
                        },
                    dataType: "json",
                    beforeSend: function (e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json; charset=UTF-8");
                        }
                    },
                    success: function (response) {
                        if (response.status == "success") {             
                            console.log(response.status);
                            
                        }else{
                            console.log(response.status);
                            
                        }
                    }
                })   
            };
            alert('Berhasil edit kegiatan');
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/selectKegiatan",
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json, charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        kegiatanarr = null;
                        kegiatanarr = response.data;
                        self.data = response.data;
                    }else{
                    }
                }
            });          
        },
        editGambarKegiatan(id){
            var self = this;
            gambar = "";
            tipe = "";
            if($('#ks0'+id)[0].files.length > 0){
                gambar = $('#ks0'+id)[0].files[0];
                var result64 = new FileReader();
                result64.readAsDataURL(gambar);
                result64.onload = function () {
                    gambar = result64.result;
                    tipe = $('#ks0'+id)[0].files[0].name;

                    var nama_kegiatan = $('#nama_kegiatan'+id).val();
                    var tgl_kegiatan = $('#tgl_kegiatan'+id).val();
                    var desk_kegiatan = $('#desk_kegiatan'+id).val();
                    var gambar2 = gambar.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");

                    $.ajax({
                        type: "POST",
                        url: base_url+"KelolaProfile/editKegiatan",
                        data: {
                            id:id,
                            judul:nama_kegiatan,
                            tgl_kegiatan:tgl_kegiatan,
                            deskripsi:desk_kegiatan,
                            gambar:gambar2,
                            tipe:tipe},
                        dataType: "json",
                        beforeSend: function (e) {
                            if (e && e.overrideMimeType) {
                                e.overrideMimeType("application/json; charset=UTF-8");
                            }
                        },
                        success: function (response) {
                            if (response.status == "success") {
                                $.ajax({
                                    type: "POST",
                                    url: base_url+"KelolaProfile/selectKegiatan",
                                    dataType: "json",
                                    beforeSend: function (e) {
                                        if (e && e.overrideMimeType) {
                                            e.overrideMimeType("application/json, charset=UTF-8");
                                        }
                                    },
                                    success: function (response) {
                                        if (response.status == "success") {
                                            kegiatanarr = null;
                                            kegiatanarr = response.data;
                                            self.data = response.data;
                                        }else{
                                        }
                                    }
                                });
                            }else{
                                alert(response.message);
                            }
                        }
                    })    
                    
                }
            }else{
                alert('Gagal mengupload gambar !');
            }
        },
        deleteKegiatan(id){
            var self = this;
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/deleteKegiatan",
                data: {id:id},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json, charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectKegiatan",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    kegiatanarr = null;
                                    kegiatanarr = response.data;
                                    self.data = response.data;
                                }else{
                                }
                            }
                        });  
                    }else{
                        alert('Gagal menghapus prestasi');
                    }
                }
            })
            
        }
    }
})

Vue.component('EkstrakulikulerSekolah', {
    template: '#EkstrakulikulerSekolah',
    data: function () {
        return {
            data: eskularr,
            change: false,
        }
    },
    methods: {
        onChange() {
            this.change = true;
        },
        onFileChange(e, index) {
            const file = e.target.files[0];
            this.data[index].gambar = URL.createObjectURL(file);
            this.editGambarEskul(this.data[index].id);
        },
        onNewFile() {
            this.data.push({
                    gambar: './assets/img/no_images.png', 
                    judul: 'Nama eskul',
                    tgl_eskul: '2020-20-20',
                    deskripsi: 'Deskripsi Eskul',
                    delete: false, 
                    new: true
            });
            this.addEskul();
        },
        deleteFile(index) {
            // if (this.data[index].new == true) {
            //     this. data.splice(index, 1);
            // } else {
            //     this.data[index].delete = true;
            // }  
            if (confirm('Hapus eskul '+this.data[index].judul+' ?')) {
                this.deleteEskul(+this.data[index].id);
            }else{

            }
        },
        addEskul(){
            var self = this;
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/addEkskul",
                data: {judul:"Nama eskul",  deskripsi:"deskripsi eskul",gambar:'./assets/img/no_images.png',tgl_eskul:"2020-01-01"},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json; charset=UTF-8");
                    }
                },
                success: function (response) {
                    if(response.status == "success"){
                        $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectEskul",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    eskularr = null;
                                    eskularr = response.data;
                                    self.data = response.data;
                                }else{
                                }
                            }
                        })
                        
                    }else{
                        alert("Gagal menambah eskul");
                        
                    }
                }
            })
        },
        editDeskripsiEskul(){
            var self = this;
            for (index = 0; index < this.data.length; index++) {
                id = (this.data[index].id);    

                var nama_eskul = $('#nama_eskul'+id).val();
                var tgl_eskul = $('#tgl_eskul'+id).val();
                var desk_eskul = $('#desk_eskul'+id).val();
                var tgl_eskul = $('#tgl_eskul'+id).val();
                $.ajax({
                    type: "POST",
                    url: base_url+"KelolaProfile/editDesrkripsiEskul",
                    data: {
                            id:id,
                            judul:nama_eskul,
                            tgl_eskul:tgl_eskul,
                            deskripsi:desk_eskul,
                        },
                    dataType: "json",
                    beforeSend: function (e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json; charset=UTF-8");
                        }
                    },
                    success: function (response) {
                        if (response.status == "success") {                 
                            console.log(response.status);
                        }else{
                            console.log(response.status);
                            
                        }
                    }
                })   
            };
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/selectEskul",
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json, charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        eskularr = null;
                        eskularr = response.data;
                        self.data = response.data;
                    }else{
                    }
                }
            });
            alert('Edit ekstrakurikuler berhasil');            
        },
        editGambarEskul(id){
            var self = this;
            gambar = "";
            tipe = "";
            if($('#es0'+id)[0].files.length > 0){
                gambar = $('#es0'+id)[0].files[0];
                var result64 = new FileReader();
                result64.readAsDataURL(gambar);
                result64.onload = function () {
                    gambar = result64.result;
                    tipe = $('#es0'+id)[0].files[0].name;

                    var nama_eskul = $('#nama_eskul'+id).val();
                    var tgl_eskul = $('#tgl_eskul'+id).val();
                    var desk_eskul = $('#desk_eskul'+id).val();
                    var gambar2 = gambar.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");
                    
                    $.ajax({
                        type: "POST",
                        url: base_url+"KelolaProfile/editEkskul",
                        data: {
                            id:id,
                            judul:nama_eskul,
                            tgl:tgl_eskul,
                            deskripsi:desk_eskul,
                            gambar:gambar2,
                            tipe:tipe},
                        dataType: "json",
                        beforeSend: function (e) {
                            if (e && e.overrideMimeType) {
                                e.overrideMimeType("application/json; charset=UTF-8");
                            }
                        },
                        success: function (response) {
                            if (response.status == "success") {
                                $.ajax({
                                    type: "POST",
                                    url: base_url+"KelolaProfile/selectEskul",
                                    dataType: "json",
                                    beforeSend: function (e) {
                                        if (e && e.overrideMimeType) {
                                            e.overrideMimeType("application/json, charset=UTF-8");
                                        }
                                    },
                                    success: function (response) {
                                        if (response.status == "success") {
                                            eskularr = null;
                                            eskularr = response.data;
                                            self.data = response.data;
                                            
                                        }else{
                                        }
                                    }
                                })
                            }else{
                                alert(response.message);
                            }
                        }
                    })    
                    
                }
            }else{
                alert('Gagal mengupload gambar !');
            }
        },
        deleteEskul(id){
            var self = this;
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/deleteEkskul",
                data: {id:id},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json, charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectEskul",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    eskularr = null;
                                    eskularr = response.data;
                                    self.data = response.data;
                                }else{
                                }
                            }
                        })
                    }else{
                        alert('Gagal menghapus eskul');
                    }
                }
            })
        }
    }
})

Vue.component('DaftarPendidik', {
    template: '#DaftarPendidik',
    data: function () {
        return {
            data: pendidikarr,
            change: false,
            // data: [
            //     {
            //         url: '<?php echo base_url("assets/img/img2.jpg")?>',
            //         namaPendidik: 'SDN Polehan 5',
            //         jabatanPendidik: 'Sekolah',
            //         delete: false,
            //         new: false
            //     },
            // ],
        }
    },
    methods: {
        onChange() {
            this.change = true;
        },
        onFileChange(e, index) {
            const file = e.target.files[0];
            this.data[index].gambar = URL.createObjectURL(file);
            this.editGambarPendidik(this.data[index].id);
        },
        onNewFile() {
            this.data.push({
                    gambar: base_url+'/assets/img/no_images.png', 
                    nama_gelar: 'Nama Gelar Guru',
                    mapel: 'Mata Pelajaran',
                    delete: false, 
                    new: true
            });
            this.addPendidik();
        },
        deleteFile(index) {
            // if (this.data[index].new == true) {
            //     this. data.splice(index, 1);
            // } else {
            //     this.data[index].delete = true;
            // } 
            if (confirm('Hapus pendidik '+this.data[index].nama_gelar+' ?')) {
                this.deletePendidik(+this.data[index].id);
            }else{

            }
        },
        addPendidik(){
            var self = this;
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/addPendidik",
                data: {nip:"001",  nama_gelar:"Nama Gelar Guru",jk: "Laki - laki", mapel: "Mata Pelajaran",gambar:'./assets/img/no_images.png'},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json; charset=UTF-8");
                    }
                },
                success: function (response) {
                    if(response.status == "success"){
                        $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectPendidik",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    pendidikarr = null;
                                    pendidikarr = response.data
                                    
                                    self.data = response.data;
                                }else{
                                }
                            }
                        })
                        
                    }
                }
            })
        },
        editDeskripsiPendidik(){
            var self = this;
            for (index = 0; index < this.data.length; index++) {
                id = (this.data[index].id);    

                var nama_pendidik = $('#nama_pendidik'+id).val();
                var mapel_pendidik = $('#mapel_pendidik'+id).val();
                $.ajax({
                    type: "POST",
                    url: base_url+"KelolaProfile/editDeskripsiPendidik",
                    data: {
                            id:id,
                            nama_gelar:nama_pendidik,
                            mapel:mapel_pendidik,
                        },
                    dataType: "json",
                    beforeSend: function (e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json; charset=UTF-8");
                        }
                    },
                    success: function (response) {
                        if (response.status == "success") {
                            $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectPendidik",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    pendidikarr = null;
                                    pendidikarr = response.data
                                    
                                    self.data = response.data;
                                }else{
                                }
                            }
                        })
                            
                        }else{

                        }
                    }
                })   
            };
            var desc_siswa = $('#desc_siswa').val();
            console.log(desc_siswa);
            
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/editDeskripsiDaftarPendidik",
                data: {
                        desc_pendidik:desc_siswa,
                    },
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json; charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        
                    }else{
                        
                    }
                }
            });
            alert('Berhasil update pendidik');                  
        },
        editGambarPendidik(id){
            var self = this;
            gambar = "";
            tipe = "";
            if($('#dps0'+id)[0].files.length > 0){
                gambar = $('#dps0'+id)[0].files[0];
                var result64 = new FileReader();
                result64.readAsDataURL(gambar);
                result64.onload = function () {
                    gambar = result64.result;
                    tipe = $('#dps0'+id)[0].files[0].name;

                    var nama_pendidik = $('#nama_pendidik'+id).val();
                    var mapel_pendidik = $('#mapel_pendidik'+id).val();
                    var gambar2 = gambar.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");
                    
                    $.ajax({
                        type: "POST",
                        url: base_url+"KelolaProfile/editPendidik",
                        data: {
                            id:id,
                            nama_gelar:nama_pendidik,
                            mapel:mapel_pendidik,
                            gambar:gambar2,
                            tipe:tipe},
                        dataType: "json",
                        beforeSend: function (e) {
                            if (e && e.overrideMimeType) {
                                e.overrideMimeType("application/json; charset=UTF-8");
                            }
                        },
                        success: function (response) {
                            if (response.status == "success") {
                                alert('Berhasil mengedit pendidik !');
                                $.ajax({
                                    type: "POST",
                                    url: base_url+"KelolaProfile/selectPendidik",
                                    dataType: "json",
                                    beforeSend: function (e) {
                                        if (e && e.overrideMimeType) {
                                            e.overrideMimeType("application/json, charset=UTF-8");
                                        }
                                    },
                                    success: function (response) {
                                        if (response.status == "success") {
                                            pendidikarr = null;
                                            pendidikarr = response.data
                                            
                                            self.data = response.data;
                                        }else{
                                        }
                                    }
                                })
                                
                            }else{
                                alert(response.message);
                            }
                        }
                    })    
                    
                }
            }else{
                alert('Gagal mengupload gambar !');
            }
        },
        deletePendidik(id){
            var self = this;
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/deletePendidik",
                data: {id:id},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json, charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        alert('Berhasil menghapus pendidik !');
                        // window.location.replace(base_url+"KelolaProfile");   
                        $.ajax({
                            type: "POST",
                            url: base_url+"KelolaProfile/selectPendidik",
                            dataType: "json",
                            beforeSend: function (e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json, charset=UTF-8");
                                }
                            },
                            success: function (response) {
                                if (response.status == "success") {
                                    pendidikarr = null;
                                    pendidikarr = response.data
                                    
                                    self.data = response.data;
                                }else{
                                }
                            }
                        })
                    }else{
                        alert('Gagal mengambil data');
                    }
                }
            })
            
        }
    }
})

Vue.component('TataCaraPendaftaran', {
    template: '#TataCaraPendaftaran',
    data: function () {
        return {
            change: false,
        }
    },
    methods: {
        onChange() {
            this.change = true;
        },
        editInfoPendaftaran(){
            var tata_cara_pendaftaran = $('#tata_cara_pendaftaran').val();
            var persyaratan_pendaftaran = $('#persyaratan_pendaftaran').val();
            var info = $('#info').val();
            $.ajax({
                type: "POST",
                url: base_url+"KelolaProfile/editInfoPendaftaran",
                data: {id:'1', 
                    tata_cara_pendaftaran:tata_cara_pendaftaran,
                    persyaratan_pendaftaran:persyaratan_pendaftaran, 
                    info:info
                    },
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json, charset=UTF-8");
                    }
                },
                success: function (response) {
                    if (response.status == "success") {
                        alert('Edit Info Pendaftaran Sukses');
                    }else{
                    }
                }
            })
        }
    }
})

var vo = new Vue({
  el: '#app',
    name: 'app',
    data: {
        menuActive: 'HalamanUtama',
    },
    // computed: {
    //     slidersLenght: function() {
    //         return Object.keys(this.slider.page).length;
    //     },
    // },
    methods: {
        ChangePage(destination) {
            this.menuActive = destination;
        },
    }
});
</script>