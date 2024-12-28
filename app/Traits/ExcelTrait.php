<?php

namespace App\Traits;

use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

trait ExcelTrait
{
    public function exportExcel($exportClass, string $saveAs) 
    {
        return Excel::download($exportClass, $saveAs.'.xlsx');
    }
}
