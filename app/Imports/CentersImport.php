<?php
namespace App\Imports;

use App\Models\Center;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CentersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Center([
            'name' => $row['name'],
            'total_seats' => $row['total_seats'],
            'status' => 1
        ]);
    }
}
