<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PenjualanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $filterMonth;

    public function __construct($filterMonth)
    {     
        $this->filterMonth = $filterMonth;
    }
    public function collection()
    {
        $penjualan = DB::table('pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_user')
            ->join('distributor', 'users.id', '=', 'distributor.users_id')
            ->join('count_manager', 'count_manager.id', '=', 'distributor.count_manager_id')
            ->where(DB::raw("DATE_FORMAT(pemesanan.created_at, '%Y-%m')"), '=', $this->filterMonth)
            ->where('status', 'lunas')
            ->groupBy('distributor.id')
            ->select('count_manager.nama_cm', 'distributor.kode_distributor', 'users.full_name', 'distributor.area', DB::raw('SUM(harga) as jumlah_harga'))
            ->get();

        // Add total row
        $total_penjualan = DB::table('pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_user')
            ->join('distributor', 'users.id', '=', 'distributor.users_id')
            ->join('count_manager', 'count_manager.id', '=', 'distributor.count_manager_id')
            ->where(DB::raw("DATE_FORMAT(pemesanan.created_at, '%Y-%m')"), '=', $this->filterMonth)
            ->where('status', 'lunas')
            ->select(DB::raw('SUM(harga) as jumlah_harga'))
            ->first();

        $total_penjualan = $total_penjualan ? $total_penjualan->jumlah_harga : 0;

        $totalRow = [
            'COUNT MANAGER' => 'Total',
            'KODE DISTRIBUTOR' => '',
            'DISTRIBUTOR' => '',
            'AREA' => '',
            'TOTAL PEMBELIAN' => $total_penjualan,
        ];

        $penjualan->push($totalRow); // Append the total row to the collection

        return $penjualan;
    }

    public function headings(): array
    {
        return [
            ["Laporan Penjualan Bulan $this->filterMonth"],
            [""],
            ['COUNT MANAGER', 'KODE DISTRIBUTOR', 'DISTRIBUTOR', 'AREA', 'TOTAL PEMBELIAN'],
        ];
    }

    public function styles(Worksheet $sheet)
    {

        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A2:E2')->getFont()->setBold(true);
        $sheet->getStyle('A3:E3')->getFont()->setBold(true);
        $sheet->getStyle('A3:E3')->getAlignment()->setHorizontal('center');

        $judulCellRange = 'A3:E3';
        $sheet->getStyle($judulCellRange)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        $lastRowNumber = $sheet->getHighestRow();
        $lastRowCellRange = 'A' . $lastRowNumber . ':D' . $lastRowNumber;
        $sheet->mergeCells($lastRowCellRange);
        $sheet->getStyle($lastRowCellRange)->getAlignment()->setHorizontal('center');

        $dataCellRange = 'A3:E' . $lastRowNumber;
        $sheet->getStyle($dataCellRange)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);
    }
}
