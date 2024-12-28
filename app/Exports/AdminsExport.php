<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class AdminsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public function query()
    {
        return User::query()->select('name', 'email', 'type', 'created_at');
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Type',
            'Status',
            'Created At'
        ];
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            $user->type,
            $user->StatusName,
            Date::dateTimeFromTimestamp($user->created_at),
        ];
    }

}
