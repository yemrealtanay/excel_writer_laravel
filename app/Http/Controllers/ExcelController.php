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

    public function getTest()
    {
        $sourceFilePath = '/excel/parametre.xlsx';

        if (!Storage::disk('public')->exists($sourceFilePath)) {
            return response()->json(['error' => 'Dosya bulunamadı'], 404);
        }

        $fullPath = Storage::disk('public')->path($sourceFilePath);

        return response()->download($fullPath);
    }
    public function create(Request $request)
    {
        $excel_file_name = '/excel/' . $this->data['urunAdi'] . Carbon::now()->format('YmdHis') . '.xlsx';

        $sourceFilePath = '/excel/parametre.xlsx';
        $copyFilePath = $excel_file_name;

        dd($excel_file_name);

        if (!Storage::disk('public')->exists($sourceFilePath)) {
            return response()->json(['error' => 'Kaynak dosya bulunamadı'], 404);
        }

        // Dosyayı kopyala
        Storage::disk('public')->copy($sourceFilePath, $copyFilePath);

        die();

        $fullCopyPath = Storage::disk('public')->path($copyFilePath);
        $spreadsheet = IOFactory::load($fullCopyPath);
        $this->sheet = $spreadsheet->getSheetByName('parametre');

        // Excel verilerini doldur
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
        $writer->save($fullCopyPath);

        return response()->download($fullCopyPath)->deleteFileAfterSend(true);
    }

}
