<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class AdminImportController extends Controller
{

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }
    public function userImport(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        $excel = new Excel;
        $data = $excel->import(new UsersImport, $request->file('file'));
        dd($data);
        return response()->json(['status' => true, 'msg' => 'Student Data Importated Successfully']);
    }
}
