//Spinner Kategori (semua, diterima, tidak)
$(document).ready(function() {
    $('#status_pendaftar').change(function() {
        var status = $(this).val();
        var exportOption = '';
        if(status == "DITERIMA"){
            exportOption = base_url+"Export_data/semuaPendaftarDiterima";
            $.ajax({
                type: "POST",
                url: base_url+"Pendaftaran/selectSiswaTerdaftar",
                dataType: "json",
                success: function (data) {
                    if(data.status == 'success'){
                        console.log(data.data);
                        
                        var html = '';
                        var i;
                        var no = 1;
                        for (i = 0; i < data.data.length; i++) {
                            if(data.data[i].status == 'DITERIMA'){
                                html += '<tr>'+
                                        '<td>'+no+'</td>'+
                                        '<td>'+data.data[i].nama+'</td>'+
                                        '<td>'+data.data[i].jk+'</td>'+
                                        '<td>'+data.data[i].alamat+'</td>'+
                                        '<td>'+data.data[i].tgl_daftar+'</td>'+
                                        '<td>'+
                                            '<a class="terima">Diterima</a>'+
                                            '<a href="'+base_url+'Pendaftaran/detail/'+data.data[i].id_pendaftaran+'" class="detail">Detail</a>'+
                                        '</td>'+
                                    '</tr>';
                                    no++;
                            }else if (data.data[i].status == 'PENDING') {
                                html += '<tr>'+
                                        '<td>'+no+'</td>'+
                                        '<td>'+data.data[i].nama+'</td>'+
                                        '<td>'+data.data[i].jk+'</td>'+
                                        '<td>'+data.data[i].alamat+'</td>'+
                                        '<td>'+data.data[i].tgl_daftar+'</td>'+
                                        '<td>'+
                                            '<a href="#" class="terima">Terima</a>'+
                                            '<a href="'+base_url+'Pendaftaran/detail/'+data.data[i].id_pendaftaran+'" class="detail">Detail</a>'+
                                        '</td>'+
                                    '</tr>';
                                    no++;
                            }
                        }
                        $('#table_list_pendaftar').html(html);
                    }else{
                        var html = '<td colspan="7" rowspan="4">Belum ada data</td>';
                        $('#table_list_pendaftar').html(html);                        
                    }
                    
                }
            })
            
        }else if(status == "PENDING"){
            exportOption = base_url+"Export_data/semuaPendaftarTidakDiterima";
            $.ajax({
                type: "POST",
                url: base_url+"Pendaftaran/selectSiswaTidakTerdaftar",
                dataType: "json",
                success: function (data) {
                    if(data.status == 'success'){
                        var html = '';
                        var i ;
                        var no = 1;
                        for (i = 0; i < data.data.length; i++) {
                            if(data.data[i].status == 'DITERIMA'){
                                html += '<tr>'+
                                        '<td>'+no+'</td>'+
                                        '<td>'+data.data[i].nama+'</td>'+
                                        '<td>'+data.data[i].jk+'</td>'+
                                        '<td>'+data.data[i].alamat+'</td>'+
                                        '<td>'+data.data[i].tgl_daftar+'</td>'+
                                        '<td>'+
                                            '<a class="terima">Diterima</a>'+
                                            '<a href="'+base_url+'Pendaftaran/detail/'+data.data[i].id_pendaftaran+'" class="detail">Detail</a>'+
                                        '</td>'+
                                    '</tr>';
                                    no++;
                            }else if (data.data[i].status == 'PENDING') {
                                html += '<tr>'+
                                        '<td>'+no+'</td>'+
                                        '<td>'+data.data[i].nama+'</td>'+
                                        '<td>'+data.data[i].jk+'</td>'+
                                        '<td>'+data.data[i].alamat+'</td>'+
                                        '<td>'+data.data[i].tgl_daftar+'</td>'+
                                        '<td>'+
                                            '<a href="#" id="updateStatusPendaftar-'+data.data[i].id_pendaftaran+'" onclick=update(this.id) key="'+data.data[i].id_pendaftaran+'" class="terima">Terima</a>'+
                                            '<a href="'+base_url+'Pendaftaran/detail/'+data.data[i].id_pendaftaran+'" class="detail">Detail</a>'+
                                        '</td>'+
                                    '</tr>';
                                    no++;
                            }
                        }
                        $('#table_list_pendaftar').html(html);
                    }else{
                        var html = '<td colspan="7" rowspan="4">Belum ada data</td>';
                        $('#table_list_pendaftar').html(html);                        
                    }
                    
                }
            })
            
        }else if(status == "SEMUA"){
            exportOption = base_url+"Export_data/semuaPendaftar";
            $.ajax({
                type: "POST",
                url: base_url+"Pendaftaran/selectAll",
                dataType: "json",
                success: function (data) {
                    if(data.status == 'success'){
                        var html = '';
                        var i ;
                        var no = 1;
                        for (i = 0; i < data.data.length; i++) {
                            if(data.data[i].status == 'DITERIMA'){
                                html += '<tr>'+
                                        '<td>'+no+'</td>'+
                                        '<td>'+data.data[i].nama+'</td>'+
                                        '<td>'+data.data[i].jk+'</td>'+
                                        '<td>'+data.data[i].alamat+'</td>'+
                                        '<td>'+data.data[i].tgl_daftar+'</td>'+
                                        '<td>'+
                                            '<a class="terima">Diterima</a>'+
                                            '<a href="'+base_url+'Pendaftaran/detail/'+data.data[i].id_pendaftaran+'" class="detail">Detail</a>'+
                                        '</td>'+
                                    '</tr>';
                                    no++;
                            }else if (data.data[i].status == 'PENDING') {
                                html += '<tr>'+
                                        '<td>'+no+'</td>'+
                                        '<td>'+data.data[i].nama+'</td>'+
                                        '<td>'+data.data[i].jk+'</td>'+
                                        '<td>'+data.data[i].alamat+'</td>'+
                                        '<td>'+data.data[i].tgl_daftar+'</td>'+
                                        '<td>'+
                                            '<a href="#" id="updateStatusPendaftar-'+data.data[i].id_pendaftaran+'" onclick=update(this.id) key="'+data.data[i].id_pendaftaran+'" class="terima">Terima</a>'+
                                            '<a href="'+base_url+'Pendaftaran/detail/'+data.data[i].id_pendaftaran+'" class="detail">Detail</a>'+
                                        '</td>'+
                                    '</tr>';
                                    no++;
                            }   
                        }
                        $('#table_list_pendaftar').html(html);
                    }else{
                        var html = '<td colspan="7" rowspan="4">Belum ada data</td>';
                        $('#table_list_pendaftar').html(html);                        
                    }
                    
                }
            })
        }
        $('#export_data_pendaftar').attr("href", exportOption);
        
    });
});

$(document).ready(function() {
    $('#form_cari_siswa').keyup(function() {
        if(event.keyCode == 13){
            var keyword = $('#form_cari_siswa').val();
            
            $.ajax({
                type: "POST",
                url: base_url+"Pendaftaran/searchSiswa",
                data: {keyword:keyword},
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json; charset=UTF-8");
                    }
                },
                success: function(data) {
                    if (data.status == 'success') {
                        console.log(data.message);
                        console.log(data.last_query);
                        console.log(data.keyword);
                        
                        var html = '';
                        var i;
                        var no = 1;
                        for (i = 0; i < data.data.length; i++) {
                            if(data.data[i].status == 'DITERIMA'){
                                html += '<tr>'+
                                        '<td>'+no+'</td>'+
                                        '<td>'+data.data[i].nama+'</td>'+
                                        '<td>'+data.data[i].jk+'</td>'+
                                        '<td>'+data.data[i].alamat+'</td>'+
                                        '<td>'+data.data[i].tgl_daftar+'</td>'+
                                        '<td>'+
                                            '<a class="terima">Diterima</a>'+
                                            '<a href="'+base_url+'Pendaftaran/detail/'+data.data[i].id_pendaftaran+'" class="detail">Detail</a>'+
                                        '</td>'+
                                    '</tr>';
                                    no++;
                            }else if (data.data[i].status == 'PENDING') {
                                html += '<tr>'+
                                        '<td>'+no+'</td>'+
                                        '<td>'+data.data[i].nama+'</td>'+
                                        '<td>'+data.data[i].jk+'</td>'+
                                        '<td>'+data.data[i].alamat+'</td>'+
                                        '<td>'+data.data[i].tgl_daftar+'</td>'+
                                        '<td>'+
                                            '<a href="#" id="updateStatusPendaftar-'+data.data[i].id_pendaftaran+'" onclick=update(this.id) key="'+data.data[i].id_pendaftaran+'" class="terima">Terima</a>'+
                                            '<a href="'+base_url+'Pendaftaran/detail/'+data.data[i].id_pendaftaran+'" class="detail">Detail</a>'+
                                        '</td>'+
                                    '</tr>';
                                    no++;
                            }
                            
                        }
                        $('#table_list_pendaftar').html(html);             
                    } else{
                        var html = '<td colspan="7" rowspan="4">Belum ada data</td>';
                        $('#table_list_pendaftar').html(html);        
                    }
                }
            })
        }
    })
});


function update(key) {
    var arraId = key.split('-');
    var id = arraId[1];
    console.log("id : "+id);
    
    $.ajax({
        type: "POST",
        url: base_url+"Pendaftaran/updateStatusPendaftar",
        data: {id_pendaftaran:id},
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType){
                e.overrideMimeType("application/json; charset=UTF-8");
            }
        },
        success: function (data) {
            if(data.status == 'success'){
                window.location.replace(base_url+"Pendaftaran"); 
            }else{
                console.log('failed to update');
                
            }
        }
    })
        
}