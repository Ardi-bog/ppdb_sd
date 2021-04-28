$(document).ready(function() {
   $('#form_cari_kritiksaran').keyup(function() {
       if(event.keyCode == 13){
            var email = $('#form_cari_kritiksaran').val();
            
            $.ajax({
                type: "POST",
                url: base_url+"KritikSaran/searchKritikSaran",
                data: {email:email},
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json; charset=UTF-8");
                    }
                },
                success: function (data) {
                    if(data.status == 'success'){
                        var html = '';
                        var i;
                        for (i = 0; i < data.data.length; i++) {
                            var nomor = i + 1;
                            html += '<tr>'+
                                        '<td>'+nomor+'</td>'+
                                        '<td>'+data.data[i].email+'</td>'+
                                        '<td>'+data.data[i].kritik_saran+'</td>'+
                                        '<td>'+data.data[i].tgl_buat+'</td>'+
                                        '<td>'+
                                            '<a data-toggle="modal" data-target="#myModal-'+data.data[i].id+'" class="detail" style="margin-left: 0px">Detail</a>'+
                                        '</td>'+
                                        '<div id="myModal-'+data.data[i].id+'" class="modal fade" role="dialog">'+
                                            '<div class="modal-dialog">'+
                                                '<!-- Modal content-->'+
                                                '<div class="modal-content">'+
                                                    '<div class="modal-header">'+
                                                        '<h4 class="modal-title">Detail Kritik Saran</h4>'+
                                                        '<a type="button" class="close" data-dismiss="modal">&times;</a>'+
                                                    '</div>'+
                                                    '<div class="modal-body">'+
                                                        '<h2>'+data.data[i].email+'</h2>'+
                                                        '<p>'+data.data[i].kritik_saran+'</p>'+
                                                        '<br><br>'
                                                        '<p>'+data.data[i].tgl_buat+'</p>'+
                                                        '<br>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</tr>'
                        }
                        $('#table_list_kritiksaran').html(html); 
                        
                    }else{
                        var html = '<td colspan="5" rowspan="4">Belum ada data</td>';
                        $('#table_list_kritiksaran').html(html); 
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    
                }
            })
       }
   })
});