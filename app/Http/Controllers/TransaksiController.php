<?php
namespace App\Http\Controllers;
use App\Helper\Util;
use App\Model\Transaction;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class TransaksiController extends PwlBaseController{
    public function index(){
        $transaksi = Transaction::all();
        $data = [
            'transaksi' => $transaksi
        ];
        return view('contenct.transaksi.list', $data);
    }
    public function exportExcel($trxNumber){
        $transaksi = Transaction::getByNoTransaksi($trxNumber);
        $itemTransaksi = Transaction::getItemTransaksi($trxNumber);
        $fileName = "Data Transaksi ($trxNumber).xlsx";
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', "Data Transaksi $trxNumber");
        $sheet->setCellValue('A3', "No");
        $sheet->setCellValue('B3', "Nama Barang");
        $sheet->setCellValue('C3', "Kode Barang");
        $sheet->setCellValue('D3', "Harga Barang");
        $sheet->setCellValue('E3', "Jumlah Barang");
        $sheet->setCellValue('F3', "Subtotal");
        $baris = 4;
        $No = 1;
        foreach ($itemTransaksi as $it) {
            $totalItem = $it->price * $it->amount;
            $sheet->setCellValue('A' . $baris, $No++);
            $sheet->setCellValue('B' . $baris, $it->name);
            $sheet->setCellValue('C' . $baris, $it->code);
            $sheet->setCellValue('D' . $baris, Util::rupiah($it->price));
            $sheet->setCellValue('E' . $baris, $it->amount);
            $sheet->setCellValue('F' . $baris, Util::rupiah($totalItem));
            $baris++;
        }
        $sheet->mergeCells('A1:F1');
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');}
    public function exportPdf($trxNumber){
        $fileName = "Data Transaksi $trxNumber.pdf";
        $document = new Mpdf();
        $itemTransaksi = Transaction::getItemTransaksi($trxNumber);
        $data = [
            'trxNumber' => $trxNumber,
            'itemTransaksi' => $itemTransaksi
        ];
        $document->WriteHTML(view('pdf.laporan_transaksi', $data));
        $document->Output($fileName,Destination::INLINE);
    }
}



