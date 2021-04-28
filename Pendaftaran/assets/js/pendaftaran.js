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
                            html += '<tr>'+
                                        '<td>'+no+'</td>'+
                                        '<td>'+data.data[i].nama+'</td>'+
                                        '<td>'+data.data[i].jk+'</td>'+
                                        '<td>'+data.data[i].alamat+'</td>'+
                                        '<td>'+data.data[i].tgl_daftar+'</td>'+
                                    '</tr>';
                            no++;
                            
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
                console.log('success update');
                console.log(data.last_query);
                
            }else{
                console.log('failed to update');
                
            }
        }
    })
        
}