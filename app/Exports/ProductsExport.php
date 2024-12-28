<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProductsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public function query()
    {
        return Product::query()->select('name', 'product_category_id', 'description', 'status', 'created_at');
    }

    public function headings(): array
    {
        return [
            'Name',
            'Product Category',
            'Status',
            'Description',
            'Created At'
        ];
    }

    public function map($product): array
    {
        return [
            $product->name,
            $product->product_category->name,
            $product->StatusName,
            $product->description,
            Date::dateTimeFromTimestamp($product->created_at),
        ];
    }

}
