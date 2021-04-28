<?php
header('Content-type:application/vnd-ms-excel');
header('Content-Disposition:attachment; filename=Laporan Naratel.xls');

?>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>
<body>

	<table border="1">
		<tr>
			 <th>No</th>    
			 <th>Kode Pelanggan</th>
                <th>Nama</th>
				  <th>Alamat</th>
				  <th>Telepon</th>				
				  <th>Email</th>
				  <th>Produk</th>
				  <th>Kelurahan</th>
				  <th>Bts</th>
				  
				 
		</tr>
		<?php 
		// koneksi database
		$connect = mysqli_connect("localhost","sdnpolehan5sch_db_sdn","sdnpolehan5nakula","sdnpolehan5sch_db_sdn");

		// menampilkan data pegawai
		$data = mysqli_query($connect,"SELECT * FROM pendaftaran");
		$no = 1;
		while($anyar = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $anyar['kode_pelanggan'];?></td>
                              <td><?php echo $anyar['id_pendaftaran'];?></td>
                              <td><?php echo $anyar['no_akta'];?></td>
                              <td><?php echo $anyar['nik'];?></td>
                              <td><?php echo $anyar['nama'];?></td>
                              <td><?php echo $anyar['jk'];?></td>
                              <td><?php echo $anyar['tempat_lahir'];?></td>
                              <td><?php echo $anyar['tanggal_lahir'];?></td>
                              
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>