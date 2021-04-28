<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">

<div class="content wh-sidebar">
    <h1>Kritik & Saran</h1>
    <form>
        <div class="search">
            <i class="fas fa-search"></i>
            <input type="search" name="search" id="form_cari_kritiksaran" placeholder="Cari email..."> 
            <input type="search" placeholder="Cari email..." style="display:none"> 
        </div>
        <div class="right-form">
            <a href="<?php echo base_url()?>Export_data/semuaKritikSaran" title="Cetak Data">
                <i class="fas fa-print"></i>
            </a>

            <a href="" title="Sinkronkan Data">
                <i class="fas fa-sync"></i>
            </a>
        </div>
        <div style="clear: both;"></div>
    </form>
    <div class="table-box">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Isi</th>
                    <th>Tanggal Membuat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="table_list_kritiksaran">
                <?php 
                    $nomor = 1;
                    foreach ($list_kritiksaran as $data):?>
                    <tr>
                        <td><?php echo $nomor?></td>
                        <td><?php echo $data->email?></td>
                        <td><?php echo substr($data->kritik_saran, 0, 50); if (strlen($data->kritik_saran) > 50) { echo '...'; } ?></td>
                        <td><?php echo date('d F Y', strtotime($data->tgl_buat))?></td>
                        <td>
                            <a data-toggle="modal" data-target="#myModal-<?php echo $data->id?>" class="detail" style="margin-left: 0px">Detail</a>
                        </td>
                        <div id="myModal-<?php echo $data->id?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Detail Kritik Saran</h4>
                                        <a type="button" class="close" data-dismiss="modal">&times;</a>
                                    </div>
                                    <div class="modal-body">
                                        <h2><?php echo $data->email?></h2>
                                        <p><?php echo $data->kritik_saran?></p>
                                        <br><br>
                                        <p><?php echo date('d F Y', strtotime($data->tgl_buat))?></p>
                                        <br>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </tr>
                <?php 
                    $nomor++;
                    endforeach;?>
                <tr>
                    <td colspan="5" class="pagenation">
                        <?php echo $this->pagination->create_links();?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script> var base_url = "<?php echo base_url();?>";</script>
<script src="<?php echo base_url()?>assets/js/kritiksaran.js"></script>
<script>
$(document).on('hidden.bs.modal', function (e) {
    var target = $(e.target);
    target.removeData('bs.modal')
    .find(".clearable-content").html('');
});
</script>
