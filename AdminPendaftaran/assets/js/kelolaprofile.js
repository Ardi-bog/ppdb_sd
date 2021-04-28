//Edit di form halaman utama
$(document).ready(function() {
    $("#bt_edit_data_sekolah").click(function () {
       console.log('onclick');
       
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
                            console.log("success edit ");
                            
                    }
                }
            })
    });
});
//Prestasi