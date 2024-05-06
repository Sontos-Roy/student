<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'nid' => $row['nid'],
            'registration_no' => $row['registration_no'],
            'phone' => $row['phone'],
            'session' => $row['session'],
        ]);
    }
}
