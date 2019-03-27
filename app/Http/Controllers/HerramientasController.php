<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


class HerramientasController extends Controller
{

    public function dobladorDeTubos(Request $request) {
        $data;
        if ($request->espesor && $request->tubo) {
            $spreadsheet = IOFactory::load('excel/tubos.xlsx');
            $spreadsheet = $spreadsheet->getActiveSheet();
            $spreadsheet->setCellValue('B13', $request->tubo);
            $spreadsheet->setCellValue('B14', $request->espesor);

            if($request->longitud_1 && $request->angulo_1) {
                $spreadsheet->setCellValue('C17', $request->longitud_1)->setCellValue('D17', $request->angulo_1);
                $data[] = [
                    'desarrollo' => round($spreadsheet->getCell('G17')->getCalculatedValue(), 3),
                    'tramo' => round($spreadsheet->getCell('F17')->getCalculatedValue(), 2)
                ];
            }

            if($request->longitud_2 && $request->angulo_2) {
                $spreadsheet->setCellValue('C18', $request->longitud_2)->setCellValue('D18', $request->angulo_2);
                $data[] = [
                    'desarrollo' => round($spreadsheet->getCell('G18')->getCalculatedValue(), 3),
                    'tramo' => round($spreadsheet->getCell('F18')->getCalculatedValue(),2)
                ];
            }

            if($request->longitud_3 && $request->angulo_3) {
                $spreadsheet->setCellValue('C19', $request->longitud_3)->setCellValue('D19', $request->angulo_3);
                $data[] = [
                    'desarrollo' => round($spreadsheet->getCell('G19')->getCalculatedValue(), 3),
                    'tramo' => round($spreadsheet->getCell('F19')->getCalculatedValue(), 2)
                ];
            }

            if($request->longitud_4 && $request->angulo_4) {
                $spreadsheet->setCellValue('C20', $request->longitud_4)->setCellValue('D20', $request->angulo_4);
                $data[] = [
                    'desarrollo' => round($spreadsheet->getCell('G20')->getCalculatedValue(), 3),
                    'tramo' => round($spreadsheet->getCell('F20')->getCalculatedValue(), 2)
                ];
            }

            if($request->longitud_5 && $request->angulo_5) {
                $spreadsheet->setCellValue('C21', $request->longitud_5)->setCellValue('D21', $request->angulo_5);
                $data[] = [
                    'desarrollo' => round($spreadsheet->getCell('G21')->getCalculatedValue(), 3),
                    'tramo' => round($spreadsheet->getCell('F21')->getCalculatedValue(), 2)
                ];
            }

            $data[5] = round($spreadsheet->getCell('J26')->getCalculatedValue(), 1);
        }


        return view('page.herramientas.dobladorDeTubos', compact('data'));
    }

    public function calculadoraCv() {
        return view('page.herramientas.calculadoraCv');
    }
}

