<?php
namespace App\Imports;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;

class XltImport implements IReadFilter
{
    public function readCell($column, $row, $worksheetName = '')
    {
        // Permite la lectura de todas las celdas
        return true;
    }
}

