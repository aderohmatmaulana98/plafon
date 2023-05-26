<?php

namespace App\Exports;


use App\Models\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenjualanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penjualan::all();
    }

    public function headings(): array
    {
        return [
            'Count Manager',
            'Kode Distributor',
            'Distributor',
            'Area',
            'Total Pembelian',
            'Total',
            '%',
            'Retur',
        ];
    }
}
