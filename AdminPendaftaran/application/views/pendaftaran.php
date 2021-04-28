<div class="content wh-sidebar">
    <h1>Daftar Siswa Terdaftar</h1>
    <form>
        <div class="search">
            <i class="fas fa-search"></i>
            <input id="form_cari_siswa" name="search" type="search" placeholder="Cari siswa terdaftar...">
            <input id="p" type="search" placeholder="Cari siswa terdaftar..." style="display:none"> 
        </div>
        <div class="right-form">
            <label class="select">
                <select title="Tahun Pendaftaran">
                    <?php
                        $i = 0;
                        foreach ($tahun_daftar as $data) {
                            ?><option value="<?php echo $tahun_daftar[$i]->tgl_daftar;?>"><?php echo $tahun_daftar[$i]->tgl_daftar;?></option><?php
                            $i++;   
                        }
                    ?>
                </select>
            </label>
            
            <label class="select">
                <select title="Status Pendaftar" id="status_pendaftar">
                    <option value="SEMUA">Semua</option>
                    <option value="DITERIMA">Diterima</option>
                    <option value="PENDING">Tidak</option>
                </select>
            </label>
            
            <a href="<?php echo base_url()?>Export_data/semuaPendaftar" title="Cetak Data" id="export_data_pendaftar">
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
                    <th>Nama</th>
                    <th>L/P</th>
                    <th>Alamat</th>
                    <th>Tanggal Daftar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id='table_list_pendaftar'>
                <?php $no = 1; foreach($list_pendaftarsiswa as $data):?>                    
                    <tr>
                        <td><?php echo $no?></td>
                        <td><?php echo $data->nama?></td>
                        <td><?php echo $data->jk?></td>
                        <td><?php echo $data->alamat?></td>
                        <td><?php echo date('d M y', strtotime($data->tgl_daftar))?></td>
                        <td>
                            <?php if(($data->status == "DITERIMA")){
                                ?><a class="terima">Diterima</a><?php
                                }else{
                                    ?><a href="#" id="updateStatusPendaftar-<?php echo $data->id_pendaftaran?>" onclick=update(this.id) key="<?php echo $data->id_pendaftaran?>" class="terima">Terima</a><?php
                                }
                            ?>
                            
                            <a href="<?php echo base_url()?>Pendaftaran/detail/<?php echo $data->id_pendaftaran?>" class="detail">Detail</a>
                        </td>
                    </tr>
                <?php $no++; endforeach;?>
                <tr>
                    <td colspan="7" class="pagenation">
                    <?php echo $this->pagination->create_links();?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script> var base_url = "<?php echo base_url();?>";</script>
<script src="<?php echo base_url()?>assets/js/pendaftaran.js"></script>