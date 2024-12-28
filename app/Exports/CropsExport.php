<?php

namespace App\Exports;

use App\Models\Crops;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class CropsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public function query()
    {
        return Crops::query()->select('name', 'description', 'status', 'created_at');
    }

    public function headings(): array
    {
        return [
            'Name',
            'Status',
            'Description',
            'Created At'
        ];
    }

    public function map($product): array
    {
        return [
            $product->name,
            $product->StatusName,
            $product->description,
            Date::dateTimeFromTimestamp($product->created_at),
        ];
    }
}
