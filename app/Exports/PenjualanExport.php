<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PenjualanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $penjualan = DB::table('pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_user')
            ->join('distributor', 'users.id', '=', 'distributor.users_id')
            ->join('count_manager', 'count_manager.id', '=', 'distributor.count_manager_id')
            ->where(DB::raw("DATE_FORMAT(pemesanan.created_at, '%Y-%m')"), '=', '2023-11')
            ->where('status', 'lunas')
            ->groupBy('distributor.id')
            ->select('count_manager.nama_cm', 'distributor.kode_distributor', 'users.full_name', 'distributor.area', DB::raw('SUM(harga) as jumlah_harga'))
            ->get();

        // Add total row
        $total_penjualan = DB::table('pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_user')
            ->join('distributor', 'users.id', '=', 'distributor.users_id')
            ->join('count_manager', 'count_manager.id', '=', 'distributor.count_manager_id')
            ->where(DB::raw("DATE_FORMAT(pemesanan.created_at, '%Y-%m')"), '=', '2023-11')
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
            ['COUNT MANAGER', 'KODE DISTRIBUTOR', 'DISTRIBUTOR', 'AREA', 'TOTAL PEMBELIAN'],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal('center');

        // Merge cells and center the text for the total row
        $sheet->mergeCells('A4:D4');
        $sheet->getStyle('A4')->getAlignment()->setHorizontal('center');
    }
}
