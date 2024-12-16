<?php

namespace App\Http\Controllers;

use App\Http\Traits\ExcelDataTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelController extends Controller
{
    use ExcelDataTrait;

    public $sheet;
    public array $data;

    public function create(Request $request)
    {
        $this->data = $request->all();
        $excel_file_name = $this->data['urunAdi'] . Carbon::now()->format('YmdHis') . '.xlsx';
        $sourceFilePath = storage_path('app/public/parametre.xlsx');
        $copyFilePath = storage_path('app/public/' . $excel_file_name);

        if (!file_exists($sourceFilePath)) {
            return response()->json(['error' => 'Kaynak dosya bulunamadı'], 404);
        }
        copy($sourceFilePath, $copyFilePath);

        $spreadsheet = IOFactory::load($copyFilePath);
        $this->sheet = $spreadsheet->getSheetByName('parametre');

        $this->genelData();
        $this->siraliYolluklariAyarla();
        $this->sogutucu();
        $this->enjeksiyonHizMesafe();
        $this->tutmaBasinclari();
        $this->malAlma();
        $this->silindirIsilari();
        $this->hotRunner();
        $this->kalipKapama();

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($copyFilePath);

        return response()->download($copyFilePath)->deleteFileAfterSend(true);
    }

}
