<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


class HerramientasController extends Controller
{

    public function dobladorDeTubos() {
        return view('page.herramientas.dobladorDeTubos');
    }

    public function calculadoraCv() {
        return view('page.herramientas.calculadoraCv');
    }
}

/**$spreadsheet = IOFactory::load('excel/tubos.xlsx');

        $spreadsheet = $spreadsheet->getActiveSheet();
        $spreadsheet->setCellValue('B13', '8mm, 10mm');
        $spreadsheet->setCellValue('B14', '2,11mm');
        $spreadsheet->setCellValue('C17', 100)->setCellValue('D17', 45);
        $spreadsheet->setCellValue('C18', 100)->setCellValue('D18', 45);
        dd([
            $spreadsheet->getCell('J26')->getCalculatedValue(),
            $spreadsheet->getCell('F18')->getCalculatedValue(),
            $spreadsheet->getCell('G18')->getCalculatedValue()
            ]);
*/