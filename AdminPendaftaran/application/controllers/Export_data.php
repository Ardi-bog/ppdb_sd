<?php defined('BASEPATH') or exit ('No direct script access allowed');

    require('./application/third_party/phpoffice/vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\SpreadSheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    class Export_data extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('PendaftaranSiswa_model');
            $this->load->model('KritikSaran_model');
        }

        public function semuaPendaftar()
        {
            $semuaPendaftar = $this->PendaftaranSiswa_model->selectAll()->result();
            $spreadsheet = new SpreadSheet(); 
            
            $spreadsheet ->setActiveSheetIndex(0)
                         ->setCellValue('A5', 'No')
                         ->setCellValue('B5', 'No Akta')
                         ->setCellValue('C5', 'NIK')
                         ->setCellValue('D5', 'Nama')
                         ->setCellValue('E5', 'L/P')
                         ->setCellValue('F5', 'Tempat Lahir')
                         ->setCellValue('G5', 'Tanggal Lahir')
                         ->setCellValue('H5', 'Agama')
                         ->setCellValue('I5', 'Tanggal Daftar')
                         ->setCellValue('J5', 'Alamat')
                         ->setCellValue('K5', 'Status')
                         ->setCellValue('L5', 'Provinsi')
                         ->setCellValue('M5', 'Kota/Kabupaten')
                         ->setCellValue('N5', 'Kecamatan')
                         ->setCellValue('O5', 'Desa/Keluruhan')
                         ->setCellValue('P5', 'RT')
                         ->setCellValue('Q5', 'RW')
                         ->setCellValue('R5', 'Kode Pos')
                         ->setCellValue('S5', 'NIK Ayah')
                         ->setCellValue('T5', 'Nama Ayah')
                         ->setCellValue('U5', 'Pendidikan Ayah')
                         ->setCellValue('V5', 'Pekerjaan Ayah')
                         ->setCellValue('W5', 'Penghasilan Ayah')
                         ->setCellValue('X5', 'No HP Ayah')
                         ->setCellValue('Y5', 'Alamat Ayah')
                         ->setCellValue('Z5', 'NIK Ibu')
                         ->setCellValue('AA5', 'Nama Ibu')
                         ->setCellValue('AB5', 'Pendidikan Ibu')
                         ->setCellValue('AC5', 'Pekerjaan Ibu')
                         ->setCellValue('AD5', 'Penghasilan Ibu')
                         ->setCellValue('AE5', 'No HP Ibu')
                         ->setCellValue('AF5', 'Alamat Ibu')
                         ->setCellValue('AG5', 'NIK Wali')
                         ->setCellValue('AH5', 'Nama Wali')
                         ->setCellValue('AI5', 'Pendidikan Wali')
                         ->setCellValue('AJ5', 'Pekerjaan Wali')
                         ->setCellValue('AK5', 'Penghasilan Wali')
                         ->setCellValue('AL5', 'No HP Wali')
                         ->setCellValue('AM5', 'Alamat Wali')
                         ->setCellValue('AN5', 'Status KPS')
                         ->setCellValue('AO5', 'Nomor KPS')
                         ->setCellValue('AP5', 'Status KIP')
                         ->setCellValue('AQ5', 'Nomor KIP')
                         ->setCellValue('AR5', 'Jenis Tinggal')
                         ->setCellValue('AS5', 'Berkebutuhan Khusus')
                         ->setCellValue('AT5', 'Sekolah Asal')
                         ->setCellValue('AU5', 'Anak ke')
                         ->setCellValue('AV5', 'Jumlah Saudara')
                         ->setCellValue('AW5', 'Transportasi')
                         ->setCellValue('AX5', 'Jarak Rumah')
                         ->setCellValue('AY5', 'Username');
            
            $spreadsheet->getActiveSheet()->mergeCells('B2:E3');
            $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setSize('16');
            $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->setCellValue('B2', 'Daftar Pendaftar SDN Polehan 5');

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(7);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(17);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AF')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AG')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('AH')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AI')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AJ')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AK')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AL')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AM')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AN')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AO')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AP')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AQ')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AR')->setWidth(30);
            $spreadsheet->getActiveSheet()->getColumnDimension('AS')->setWidth(30);
            $spreadsheet->getActiveSheet()->getColumnDimension('AT')->setWidth(30);
            $spreadsheet->getActiveSheet()->getColumnDimension('AU')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('AV')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AW')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AX')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AY')->setWidth(30);

            $kolom = 6;
            $nomor = 1;

            foreach ($semuaPendaftar as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A'.$kolom, $nomor)
                            ->setCellValue('B'.$kolom, $data->no_akta)
                            ->setCellValue('C'.$kolom, $data->nik)
                            ->setCellValue('D'.$kolom, $data->nama)
                            ->setCellValue('E'.$kolom, $data->jk)
                            ->setCellValue('F'.$kolom, $data->tempat_lahir)
                            ->setCellValue('G'.$kolom, $data->tanggal_lahir)
                            ->setCellValue('H'.$kolom, $data->agama)
                            ->setCellValue('I'.$kolom, date('d F Y', strtotime( $data->tgl_daftar)))
                            ->setCellValue('J'.$kolom, $data->alamat)
                            ->setCellValue('K'.$kolom, $data->status)
                            ->setCellValue('L'.$kolom, $data->provinsi)
                            ->setCellValue('M'.$kolom, $data->kota_kabupaten)
                            ->setCellValue('N'.$kolom, $data->kecamatan)
                            ->setCellValue('O'.$kolom, $data->desa_kelurahan)
                            ->setCellValue('P'.$kolom, $data->rt)
                            ->setCellValue('Q'.$kolom, $data->rw)
                            ->setCellValue('R'.$kolom, $data->kode_pos)
                            ->setCellValue('S'.$kolom, $data->nik_ayah)
                            ->setCellValue('T'.$kolom, $data->nama_ayah)
                            ->setCellValue('U'.$kolom, $data->pendidikan_ayah)
                            ->setCellValue('V'.$kolom, $data->pekerjaan_ayah)
                            ->setCellValue('W'.$kolom, $data->penghasilan_ayah)
                            ->setCellValue('X'.$kolom, $data->no_hp_ayah)
                            ->setCellValue('Y'.$kolom, $data->alamat_ayah)
                            ->setCellValue('Z'.$kolom, $data->nik_ibu)
                            ->setCellValue('AA'.$kolom, $data->nama_ibu)
                            ->setCellValue('AB'.$kolom, $data->pendidikan_ibu)
                            ->setCellValue('AC'.$kolom, $data->pekerjaan_ibu)
                            ->setCellValue('AD'.$kolom, $data->penghasilan_ibu)
                            ->setCellValue('AE'.$kolom, $data->no_hp_ibu)
                            ->setCellValue('AF'.$kolom, $data->alamat_ibu)
                            ->setCellValue('AG'.$kolom, $data->nik_wali)
                            ->setCellValue('AH'.$kolom, $data->nama_wali)
                            ->setCellValue('AI'.$kolom, $data->pendidikan_wali)
                            ->setCellValue('AJ'.$kolom, $data->pekerjaan_wali)
                            ->setCellValue('AK'.$kolom, $data->penghasilan_wali)
                            ->setCellValue('AL'.$kolom, $data->no_hp_wali)
                            ->setCellValue('AM'.$kolom, $data->alamat_wali)
                            ->setCellValue('AN'.$kolom, $data->status_kps)
                            ->setCellValue('AO'.$kolom, $data->no_kps)
                            ->setCellValue('AP'.$kolom, $data->status_kip)
                            ->setCellValue('AQ'.$kolom, $data->no_kip)
                            ->setCellValue('AR'.$kolom, $data->jenis_tinggal)
                            ->setCellValue('AS'.$kolom, $data->berkebutuhan_khusus)
                            ->setCellValue('AT'.$kolom, $data->sekolah_asal)
                            ->setCellValue('AU'.$kolom, $data->anak_ke)
                            ->setCellValue('AV'.$kolom, $data->jumlah_saudara)
                            ->setCellValue('AW'.$kolom, $data->transportasi)
                            ->setCellValue('AX'.$kolom, $data->jarak_rumah)
                            ->setCellValue('AY'.$kolom, $data->username);

                $kolom++;
                $nomor++;
            }

            $styeArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    ],
                ],
            ];       

            $kolom = $kolom - 1;

            $spreadsheet->getActiveSheet()->getStyle('A5:AY'.$kolom)->applyFromArray($styeArray);

            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data pendaftar SDN Polehan 5.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
                         
        }

        public function semuaPendaftarDiterima()
        {
            $semuaPendaftar = $this->PendaftaranSiswa_model->selectSiswaTerdaftar()->result();
            $spreadsheet = new SpreadSheet(); 
            
            $spreadsheet ->setActiveSheetIndex(0)
            ->setCellValue('A5', 'No')
            ->setCellValue('B5', 'No Akta')
            ->setCellValue('C5', 'NIK')
            ->setCellValue('D5', 'Nama')
            ->setCellValue('E5', 'L/P')
            ->setCellValue('F5', 'Tempat Lahir')
            ->setCellValue('G5', 'Tanggal Lahir')
            ->setCellValue('H5', 'Agama')
            ->setCellValue('I5', 'Tanggal Daftar')
            ->setCellValue('J5', 'Alamat')
            ->setCellValue('K5', 'Status')
            ->setCellValue('L5', 'Provinsi')
            ->setCellValue('M5', 'Kota/Kabupaten')
            ->setCellValue('N5', 'Kecamatan')
            ->setCellValue('O5', 'Desa/Keluruhan')
            ->setCellValue('P5', 'RT')
            ->setCellValue('Q5', 'RW')
            ->setCellValue('R5', 'Kode Pos')
            ->setCellValue('S5', 'NIK Ayah')
            ->setCellValue('T5', 'Nama Ayah')
            ->setCellValue('U5', 'Pendidikan Ayah')
            ->setCellValue('V5', 'Pekerjaan Ayah')
            ->setCellValue('W5', 'Penghasilan Ayah')
            ->setCellValue('X5', 'No HP Ayah')
            ->setCellValue('Y5', 'Alamat Ayah')
            ->setCellValue('Z5', 'NIK Ibu')
            ->setCellValue('AA5', 'Nama Ibu')
            ->setCellValue('AB5', 'Pendidikan Ibu')
            ->setCellValue('AC5', 'Pekerjaan Ibu')
            ->setCellValue('AD5', 'Penghasilan Ibu')
            ->setCellValue('AE5', 'No HP Ibu')
            ->setCellValue('AF5', 'Alamat Ibu')
            ->setCellValue('AG5', 'NIK Wali')
            ->setCellValue('AH5', 'Nama Wali')
            ->setCellValue('AI5', 'Pendidikan Wali')
            ->setCellValue('AJ5', 'Pekerjaan Wali')
            ->setCellValue('AK5', 'Penghasilan Wali')
            ->setCellValue('AL5', 'No HP Wali')
            ->setCellValue('AM5', 'Alamat Wali')
            ->setCellValue('AN5', 'Status KPS')
            ->setCellValue('AO5', 'Nomor KPS')
            ->setCellValue('AP5', 'Status KIP')
            ->setCellValue('AQ5', 'Nomor KIP')
            ->setCellValue('AR5', 'Jenis Tinggal')
            ->setCellValue('AS5', 'Berkebutuhan Khusus')
            ->setCellValue('AT5', 'Sekolah Asal')
            ->setCellValue('AU5', 'Anak ke')
            ->setCellValue('AV5', 'Jumlah Saudara')
            ->setCellValue('AW5', 'Transportasi')
            ->setCellValue('AX5', 'Jarak Rumah')
            ->setCellValue('AY5', 'Username');
            
            $spreadsheet->getActiveSheet()->mergeCells('B2:E3');
            $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setSize('16');
            $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->setCellValue('B2', 'Daftar Pendaftar SDN Polehan 5');

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(7);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(17);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AF')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AG')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('AH')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AI')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AJ')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AK')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AL')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AM')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AN')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AO')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AP')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AQ')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AR')->setWidth(30);
            $spreadsheet->getActiveSheet()->getColumnDimension('AS')->setWidth(30);
            $spreadsheet->getActiveSheet()->getColumnDimension('AT')->setWidth(30);
            $spreadsheet->getActiveSheet()->getColumnDimension('AU')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('AV')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AW')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AX')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AY')->setWidth(30);

            $kolom = 6;
            $nomor = 1;

            foreach ($semuaPendaftar as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$kolom, $nomor)
                ->setCellValue('B'.$kolom, $data->no_akta)
                ->setCellValue('C'.$kolom, $data->nik)
                ->setCellValue('D'.$kolom, $data->nama)
                ->setCellValue('E'.$kolom, $data->jk)
                ->setCellValue('F'.$kolom, $data->tempat_lahir)
                ->setCellValue('G'.$kolom, $data->tanggal_lahir)
                ->setCellValue('H'.$kolom, $data->agama)
                ->setCellValue('I'.$kolom, date('d F Y', strtotime( $data->tgl_daftar)))
                ->setCellValue('J'.$kolom, $data->alamat)
                ->setCellValue('K'.$kolom, $data->status)
                ->setCellValue('L'.$kolom, $data->provinsi)
                ->setCellValue('M'.$kolom, $data->kota_kabupaten)
                ->setCellValue('N'.$kolom, $data->kecamatan)
                ->setCellValue('O'.$kolom, $data->desa_kelurahan)
                ->setCellValue('P'.$kolom, $data->rt)
                ->setCellValue('Q'.$kolom, $data->rw)
                ->setCellValue('R'.$kolom, $data->kode_pos)
                ->setCellValue('S'.$kolom, $data->nik_ayah)
                ->setCellValue('T'.$kolom, $data->nama_ayah)
                ->setCellValue('U'.$kolom, $data->pendidikan_ayah)
                ->setCellValue('V'.$kolom, $data->pekerjaan_ayah)
                ->setCellValue('W'.$kolom, $data->penghasilan_ayah)
                ->setCellValue('X'.$kolom, $data->no_hp_ayah)
                ->setCellValue('Y'.$kolom, $data->alamat_ayah)
                ->setCellValue('Z'.$kolom, $data->nik_ibu)
                ->setCellValue('AA'.$kolom, $data->nama_ibu)
                ->setCellValue('AB'.$kolom, $data->pendidikan_ibu)
                ->setCellValue('AC'.$kolom, $data->pekerjaan_ibu)
                ->setCellValue('AD'.$kolom, $data->penghasilan_ibu)
                ->setCellValue('AE'.$kolom, $data->no_hp_ibu)
                ->setCellValue('AF'.$kolom, $data->alamat_ibu)
                ->setCellValue('AG'.$kolom, $data->nik_wali)
                ->setCellValue('AH'.$kolom, $data->nama_wali)
                ->setCellValue('AI'.$kolom, $data->pendidikan_wali)
                ->setCellValue('AJ'.$kolom, $data->pekerjaan_wali)
                ->setCellValue('AK'.$kolom, $data->penghasilan_wali)
                ->setCellValue('AL'.$kolom, $data->no_hp_wali)
                ->setCellValue('AM'.$kolom, $data->alamat_wali)
                ->setCellValue('AN'.$kolom, $data->status_kps)
                ->setCellValue('AO'.$kolom, $data->no_kps)
                ->setCellValue('AP'.$kolom, $data->status_kip)
                ->setCellValue('AQ'.$kolom, $data->no_kip)
                ->setCellValue('AR'.$kolom, $data->jenis_tinggal)
                ->setCellValue('AS'.$kolom, $data->berkebutuhan_khusus)
                ->setCellValue('AT'.$kolom, $data->sekolah_asal)
                ->setCellValue('AU'.$kolom, $data->anak_ke)
                ->setCellValue('AV'.$kolom, $data->jumlah_saudara)
                ->setCellValue('AW'.$kolom, $data->transportasi)
                ->setCellValue('AX'.$kolom, $data->jarak_rumah)
                ->setCellValue('AY'.$kolom, $data->username);

                $kolom++;
                $nomor++;
            }

            $styeArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    ],
                ],
            ];       

            $kolom = $kolom - 1;

            $spreadsheet->getActiveSheet()->getStyle('A5:AY'.$kolom)->applyFromArray($styeArray);

            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data pendaftar SDN Polehan 5.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
                         
        }

        public function semuaPendaftarTidakDiterima()
        {
            $semuaPendaftar = $this->PendaftaranSiswa_model->selectSiswaTidakTerdaftar()->result();
            $spreadsheet = new SpreadSheet(); 
            
            $spreadsheet ->setActiveSheetIndex(0)
            ->setCellValue('A5', 'No')
            ->setCellValue('B5', 'No Akta')
            ->setCellValue('C5', 'NIK')
            ->setCellValue('D5', 'Nama')
            ->setCellValue('E5', 'L/P')
            ->setCellValue('F5', 'Tempat Lahir')
            ->setCellValue('G5', 'Tanggal Lahir')
            ->setCellValue('H5', 'Agama')
            ->setCellValue('I5', 'Tanggal Daftar')
            ->setCellValue('J5', 'Alamat')
            ->setCellValue('K5', 'Status')
            ->setCellValue('L5', 'Provinsi')
            ->setCellValue('M5', 'Kota/Kabupaten')
            ->setCellValue('N5', 'Kecamatan')
            ->setCellValue('O5', 'Desa/Keluruhan')
            ->setCellValue('P5', 'RT')
            ->setCellValue('Q5', 'RW')
            ->setCellValue('R5', 'Kode Pos')
            ->setCellValue('S5', 'NIK Ayah')
            ->setCellValue('T5', 'Nama Ayah')
            ->setCellValue('U5', 'Pendidikan Ayah')
            ->setCellValue('V5', 'Pekerjaan Ayah')
            ->setCellValue('W5', 'Penghasilan Ayah')
            ->setCellValue('X5', 'No HP Ayah')
            ->setCellValue('Y5', 'Alamat Ayah')
            ->setCellValue('Z5', 'NIK Ibu')
            ->setCellValue('AA5', 'Nama Ibu')
            ->setCellValue('AB5', 'Pendidikan Ibu')
            ->setCellValue('AC5', 'Pekerjaan Ibu')
            ->setCellValue('AD5', 'Penghasilan Ibu')
            ->setCellValue('AE5', 'No HP Ibu')
            ->setCellValue('AF5', 'Alamat Ibu')
            ->setCellValue('AG5', 'NIK Wali')
            ->setCellValue('AH5', 'Nama Wali')
            ->setCellValue('AI5', 'Pendidikan Wali')
            ->setCellValue('AJ5', 'Pekerjaan Wali')
            ->setCellValue('AK5', 'Penghasilan Wali')
            ->setCellValue('AL5', 'No HP Wali')
            ->setCellValue('AM5', 'Alamat Wali')
            ->setCellValue('AN5', 'Status KPS')
            ->setCellValue('AO5', 'Nomor KPS')
            ->setCellValue('AP5', 'Status KIP')
            ->setCellValue('AQ5', 'Nomor KIP')
            ->setCellValue('AR5', 'Jenis Tinggal')
            ->setCellValue('AS5', 'Berkebutuhan Khusus')
            ->setCellValue('AT5', 'Sekolah Asal')
            ->setCellValue('AU5', 'Anak ke')
            ->setCellValue('AV5', 'Jumlah Saudara')
            ->setCellValue('AW5', 'Transportasi')
            ->setCellValue('AX5', 'Jarak Rumah')
            ->setCellValue('AY5', 'Username');
            
            $spreadsheet->getActiveSheet()->mergeCells('B2:E3');
            $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setSize('16');
            $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->setCellValue('B2', 'Daftar Pendaftar SDN Polehan 5');

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(7);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(17);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AF')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AG')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('AH')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AI')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AJ')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AK')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AL')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AM')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('AN')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AO')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AP')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AQ')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AR')->setWidth(30);
            $spreadsheet->getActiveSheet()->getColumnDimension('AS')->setWidth(30);
            $spreadsheet->getActiveSheet()->getColumnDimension('AT')->setWidth(30);
            $spreadsheet->getActiveSheet()->getColumnDimension('AU')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('AV')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AW')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AX')->setWidth(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('AY')->setWidth(30);

            $kolom = 6;
            $nomor = 1;

            foreach ($semuaPendaftar as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$kolom, $nomor)
                ->setCellValue('B'.$kolom, $data->no_akta)
                ->setCellValue('C'.$kolom, $data->nik)
                ->setCellValue('D'.$kolom, $data->nama)
                ->setCellValue('E'.$kolom, $data->jk)
                ->setCellValue('F'.$kolom, $data->tempat_lahir)
                ->setCellValue('G'.$kolom, $data->tanggal_lahir)
                ->setCellValue('H'.$kolom, $data->agama)
                ->setCellValue('I'.$kolom, date('d F Y', strtotime( $data->tgl_daftar)))
                ->setCellValue('J'.$kolom, $data->alamat)
                ->setCellValue('K'.$kolom, $data->status)
                ->setCellValue('L'.$kolom, $data->provinsi)
                ->setCellValue('M'.$kolom, $data->kota_kabupaten)
                ->setCellValue('N'.$kolom, $data->kecamatan)
                ->setCellValue('O'.$kolom, $data->desa_kelurahan)
                ->setCellValue('P'.$kolom, $data->rt)
                ->setCellValue('Q'.$kolom, $data->rw)
                ->setCellValue('R'.$kolom, $data->kode_pos)
                ->setCellValue('S'.$kolom, $data->nik_ayah)
                ->setCellValue('T'.$kolom, $data->nama_ayah)
                ->setCellValue('U'.$kolom, $data->pendidikan_ayah)
                ->setCellValue('V'.$kolom, $data->pekerjaan_ayah)
                ->setCellValue('W'.$kolom, $data->penghasilan_ayah)
                ->setCellValue('X'.$kolom, $data->no_hp_ayah)
                ->setCellValue('Y'.$kolom, $data->alamat_ayah)
                ->setCellValue('Z'.$kolom, $data->nik_ibu)
                ->setCellValue('AA'.$kolom, $data->nama_ibu)
                ->setCellValue('AB'.$kolom, $data->pendidikan_ibu)
                ->setCellValue('AC'.$kolom, $data->pekerjaan_ibu)
                ->setCellValue('AD'.$kolom, $data->penghasilan_ibu)
                ->setCellValue('AE'.$kolom, $data->no_hp_ibu)
                ->setCellValue('AF'.$kolom, $data->alamat_ibu)
                ->setCellValue('AG'.$kolom, $data->nik_wali)
                ->setCellValue('AH'.$kolom, $data->nama_wali)
                ->setCellValue('AI'.$kolom, $data->pendidikan_wali)
                ->setCellValue('AJ'.$kolom, $data->pekerjaan_wali)
                ->setCellValue('AK'.$kolom, $data->penghasilan_wali)
                ->setCellValue('AL'.$kolom, $data->no_hp_wali)
                ->setCellValue('AM'.$kolom, $data->alamat_wali)
                ->setCellValue('AN'.$kolom, $data->status_kps)
                ->setCellValue('AO'.$kolom, $data->no_kps)
                ->setCellValue('AP'.$kolom, $data->status_kip)
                ->setCellValue('AQ'.$kolom, $data->no_kip)
                ->setCellValue('AR'.$kolom, $data->jenis_tinggal)
                ->setCellValue('AS'.$kolom, $data->berkebutuhan_khusus)
                ->setCellValue('AT'.$kolom, $data->sekolah_asal)
                ->setCellValue('AU'.$kolom, $data->anak_ke)
                ->setCellValue('AV'.$kolom, $data->jumlah_saudara)
                ->setCellValue('AW'.$kolom, $data->transportasi)
                ->setCellValue('AX'.$kolom, $data->jarak_rumah)
                ->setCellValue('AY'.$kolom, $data->username);

                $kolom++;
                $nomor++;
            }

            $styeArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    ],
                ],
            ];       

            $kolom = $kolom - 1;

            $spreadsheet->getActiveSheet()->getStyle('A5:AY'.$kolom)->applyFromArray($styeArray);

            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data pendaftar SDN Polehan 5.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
                         
        }

        public function semuaKritikSaran()
        {
            $semuaKritikSaran = $this->KritikSaran_model->selectAll()->result();
            $spreadsheet = new SpreadSheet();
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A5', 'No')
                        ->setCellValue('B5', 'Email')
                        ->setCellValue('C5', 'Isi')
                        ->setCellValue('D5', 'Tanggal Buat');

            $spreadsheet->getActiveSheet()->mergeCells('B2:C3');
            $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setSize('16');
            $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->setCellValue('B2', 'Kritik Saran SDN Polehan 5');

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(40);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(60);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);


            $kolom = 6;
            $nomor = 1;

            foreach ($semuaKritikSaran as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A'.$kolom, $nomor)
                            ->setCellValue('B'.$kolom, $data->email)
                            ->setCellValue('C'.$kolom, $data->kritik_saran)
                            ->setCellValue('D'.$kolom, date('d F Y', strtotime( $data->tgl_buat)));
            
                $kolom++;
                $nomor++;
            }

            $styeArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    ],
                ],
            ];       

            $kolom = $kolom - 1;

            $spreadsheet->getActiveSheet()->getStyle('A5:D'.$kolom)->applyFromArray($styeArray);

            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data kritik saran SDN Polehan 5.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');

        }

        public function detailPendaftar($id)
        {
            $data = $this->PendaftaranSiswa_model->selectById($id)->row();

            $spreadsheet = new SpreadSheet();
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'Data Siswa')//
                        ->setCellValue('A2', 'No akta kelahiran')
                        ->setCellValue('A3', 'NIK')
                        ->setCellValue('A4', 'Nama Lengkap')
                        ->setCellValue('A5', 'Jenis Kelamin')
                        ->setCellValue('A6', 'Tempat Tanggal Lahir')
                        ->setCellValue('A7', 'Agama')
                        ->setCellValue('A8', 'Alamat Siswa')//
                        ->setCellValue('A9', 'Alamat')
                        ->setCellValue('A10', 'Provinsi')
                        ->setCellValue('A11', 'Kota / Kabupaten')
                        ->setCellValue('A12', 'Kecamatan')
                        ->setCellValue('A13', 'Kelurahan / Dusun')
                        ->setCellValue('A14', 'RT / RW')
                        ->setCellValue('A15', 'Kode Pos')
                        ->setCellValue('A16', 'Data Ayah')//
                        ->setCellValue('A17', 'NIK')
                        ->setCellValue('A18', 'Nama Lengkap')
                        ->setCellValue('A19', 'Pendidikan terakhir')
                        ->setCellValue('A20', 'Pekerjaan')
                        ->setCellValue('A21', 'Penghasilan')
                        ->setCellValue('A22', 'No Handphone')
                        ->setCellValue('A23', 'Alamat')
                        ->setCellValue('A24', 'Data Ibu')//
                        ->setCellValue('A25', 'NIK')
                        ->setCellValue('A26', 'Nama Lengkap')
                        ->setCellValue('A27', 'Pendidikan terakhir')
                        ->setCellValue('A28', 'Pekerjaan')
                        ->setCellValue('A29', 'Penghasilan')
                        ->setCellValue('A30', 'No Handphone')
                        ->setCellValue('A31', 'Alamat')
                        ->setCellValue('A32', 'Data Wali')//
                        ->setCellValue('A33', 'NIK')
                        ->setCellValue('A34', 'Nama Lengkap')
                        ->setCellValue('A35', 'Pendidikan terakhir')
                        ->setCellValue('A36', 'Pekerjaan')
                        ->setCellValue('A37', 'Penghasilan')
                        ->setCellValue('A38', 'No Handphone')
                        ->setCellValue('A39', 'Alamat')
                        ->setCellValue('A40', 'Data Kartu Perlindungan Sosial')//
                        ->setCellValue('A41', 'Menerima KPS')
                        ->setCellValue('A42', 'No KPS')
                        ->setCellValue('A43', 'Data Kartu Indonesia Pintar')//
                        ->setCellValue('A44', 'Menerima KIP')
                        ->setCellValue('A45', 'No KIP')
                        ->setCellValue('A46', 'Data Tambahan')//
                        ->setCellValue('A47', 'Jenis Tinggal')
                        ->setCellValue('A48', 'Berkebutuhan khusus')
                        ->setCellValue('A49', 'Sekolah asal')
                        ->setCellValue('A50', 'Anak ke')
                        ->setCellValue('A51', 'Jumlah saudara kandung')
                        ->setCellValue('A52', 'Alat transportasi')
                        ->setCellValue('A53', 'Jarak rumah ke sekolah');

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(30);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(40);
            $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);                

            $spreadsheet->getActiveSheet()->mergeCells('A1:B1');
            $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

            $spreadsheet->getActiveSheet()->mergeCells('A8:B8');
            $spreadsheet->getActiveSheet()->getStyle('A8')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('A8')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->getStyle('A8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');
            
            $spreadsheet->getActiveSheet()->mergeCells('A16:B16');
            $spreadsheet->getActiveSheet()->getStyle('A16')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A16')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('A16')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->getStyle('A16')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

            $spreadsheet->getActiveSheet()->mergeCells('A24:B24');
            $spreadsheet->getActiveSheet()->getStyle('A24')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A24')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('A24')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->getStyle('A24')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');
            
            $spreadsheet->getActiveSheet()->mergeCells('A32:B32');
            $spreadsheet->getActiveSheet()->getStyle('A32')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A32')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('A32')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->getStyle('A32')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

            $spreadsheet->getActiveSheet()->mergeCells('A40:B40');
            $spreadsheet->getActiveSheet()->getStyle('A40')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A40')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('A40')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->getStyle('A40')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

            $spreadsheet->getActiveSheet()->mergeCells('A43:B43');
            $spreadsheet->getActiveSheet()->getStyle('A43')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A43')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('A43')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->getStyle('A43')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

            $spreadsheet->getActiveSheet()->mergeCells('A46:B46');
            $spreadsheet->getActiveSheet()->getStyle('A46')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A46')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);                
            $spreadsheet->getActiveSheet()->getStyle('A46')->getFont()->setBold(true);
            $spreadsheet->getActiveSheet()->getStyle('A46')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('B2', $data->no_akta)
                        ->setCellValue('B3', $data->nik)
                        ->setCellValue('B4', $data->nama)
                        ->setCellValue('B5', $data->jk)
                        ->setCellValue('B6', $data->tempat_lahir.', '.date('d F Y', strtotime( $data->tanggal_lahir)))
                        ->setCellValue('B7', $data->agama)
                        ->setCellValue('B9', $data->alamat)
                        ->setCellValue('B10', $data->provinsi)
                        ->setCellValue('B11', $data->kota_kabupaten)
                        ->setCellValue('B12', $data->kecamatan)
                        ->setCellValue('B13', $data->desa_kelurahan)
                        ->setCellValue('B14', $data->rt)
                        ->setCellValue('B15', $data->kode_pos)
                        ->setCellValue('B17', $data->nik_ayah)
                        ->setCellValue('B18', $data->nama_ayah)
                        ->setCellValue('B19', $data->pendidikan_ayah)
                        ->setCellValue('B20', $data->pekerjaan_ayah)
                        ->setCellValue('B21', $data->penghasilan_ayah)
                        ->setCellValue('B22', $data->no_hp_ayah)
                        ->setCellValue('B23', $data->alamat_ayah)
                        ->setCellValue('B25', $data->nik_ibu)
                        ->setCellValue('B26', $data->nama_ibu)
                        ->setCellValue('B27', $data->pendidikan_ibu)
                        ->setCellValue('B28', $data->pekerjaan_ibu)
                        ->setCellValue('B29', $data->penghasilan_ibu)
                        ->setCellValue('B30', $data->no_hp_ibu)
                        ->setCellValue('B31', $data->alamat_ibu)
                        ->setCellValue('B33', $data->nik_wali)
                        ->setCellValue('B34', $data->nama_wali)
                        ->setCellValue('B35', $data->pendidikan_wali)
                        ->setCellValue('B36', $data->pekerjaan_wali)
                        ->setCellValue('B37', $data->penghasilan_wali)
                        ->setCellValue('B38', $data->no_hp_wali)
                        ->setCellValue('B39', $data->alamat_wali)
                        ->setCellValue('B41', $data->status_kps)
                        ->setCellValue('B42', $data->no_kps)
                        ->setCellValue('B44', $data->status_kip)
                        ->setCellValue('B45', $data->no_kip)
                        ->setCellValue('B47', $data->jenis_tinggal)
                        ->setCellValue('B48', $data->berkebutuhan_khusus)
                        ->setCellValue('B49', $data->sekolah_asal)
                        ->setCellValue('B50', $data->anak_ke)
                        ->setCellValue('B51', $data->jumlah_saudara)
                        ->setCellValue('B52', $data->transportasi)
                        ->setCellValue('B53', $data->jarak_rumah);

            $styeArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    ],
                ],
            ];       

            $spreadsheet->getActiveSheet()->getStyle('A1:B53')->applyFromArray($styeArray);


            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Detail Pendaftar '.$data->nama.'.xlsx');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');

        }
        
    }
    

?>