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
        }

        public function semuaPendaftar()
        {
            $semuaPendaftar = $this->PendaftaranSiswa_model->selectAll()->result();
            $spreadsheet = new SpreadSheet(); 
            $spreadsheet ->setActiveSheetIndex(0)
                         ->setCellValue('A1', 'No')
                         ->setCellValue('B1', 'Nama')
                         ->setCellValue('C1', 'L/P')
                         ->setCellValue('D1', 'Alamat')
                         ->setCellValue('E1', 'Tanggal Daftar')
                         ->setCellValue('F1', 'Status');

            $kolom = 2;
            $nomor = 1;

            foreach ($semuaPendaftar as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A'.$kolom, $nomor)
                            ->setCellValue('B'.$kolom, $data->nama)
                            ->setCellValue('C'.$kolom, $data->jk)
                            ->setCellValue('D'.$kolom, $data->alamat)
                            ->setCellValue('E'.$kolom, $data->tgl_daftar)
                            ->setCellValue('F'.$kolom, $data->status);

                $kolom++;
                $nomor++;
            }
            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data pendaftar SDN Polehan 5.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
                         
        }
    }
    

?>