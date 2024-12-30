<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait ExcelDataTrait
{

    public function genelData(): void
    {
        $this->sheet->setCellValue('H6', $this->data['urunAdi']);
        $this->sheet->getStyle('H6')->getFont()->setSize(18);

        $this->sheet->setCellValue('H7', $this->data['makina']);
        $this->sheet->getStyle('H7')->getFont()->setSize(18);

        $this->sheet->setCellValue('T7', $this->data['kurutma']);
        $this->sheet->getStyle('T7')->getFont()->setSize(18);

        $this->sheet->setCellValue('AD7', $this->data['cycleTime']);
        $this->sheet->getStyle('AD7')->getFont()->setSize(18);

        $this->sheet->getStyle('AJ7')->getFont()->setSize(18);

        $this->sheet->setCellValue('Y16', $this->data['enjeksiyonSuresi']);
        $this->sheet->getStyle('Y16')->getFont()->setSize(18);

        $this->sheet->setCellValue('Y19', $this->data['sogutmaSuresi']);
        $this->sheet->getStyle('Y19')->getFont()->setSize(18);

        $this->sheet->setCellValue('Y22', $this->data['malAlmaZamani']);
        $this->sheet->getStyle('Y22')->getFont()->setSize(18);

        $this->sheet->setCellValue('N16', $this->data['verilenBasinc']);
        $this->sheet->getStyle('N16')->getFont()->setSize(18);

        $this->sheet->setCellValue('R16', $this->data['gerceklesenBasinc']);
        $this->sheet->getStyle('R16')->getFont()->setSize(18);

        $this->sheet->setCellValue('AM7', $this->data['agirlik']);
        $this->sheet->getStyle('AM7')->getFont()->setSize(18);

        $this->sheet->setCellValue('H8', $this->data['hammadde']);
        $this->sheet->getStyle('H8')->getFont()->setSize(18);

        $this->sheet->setCellValue('AZ7', Carbon::now()->format('Y-m-d'));
        $this->sheet->getStyle('AZ7')->getFont()->setSize(18);

        $this->sheet->setCellValue('AZ8', Carbon::now()->addHours(3)->format('H:i'));
        $this->sheet->getStyle('AZ8')->getFont()->setSize(18);

    }
    public function siraliYolluklariAyarla(): void
    {
        $index = 17;
        foreach ($this->data['kademe1_acma'] as $acma){
            $this->sheet->setCellValue('AI' . $index, $acma);
            $this->sheet->getStyle('AI' . $index)->getFont()->setSize(18);
            $index++;
        }
        $index = 17;
        foreach ($this->data['kademe1_kapama'] as $kapama){
            $this->sheet->setCellValue('AM' . $index, $kapama);
            $this->sheet->getStyle('AM' . $index)->getFont()->setSize(18);
            $index++;
        }
        $index = 17;
        foreach ($this->data['kademe2_acma'] as $acma){
            $this->sheet->setCellValue('AQ' . $index, $acma);
            $this->sheet->getStyle('AQ' . $index)->getFont()->setSize(18);
            $index++;
        }
        $index = 17;
        foreach ($this->data['kademe2_kapama'] as $kapama){
            $this->sheet->setCellValue('AS' . $index, $kapama);
            $this->sheet->getStyle('AS' . $index)->getFont()->setSize(18);
            $index++;
        }
    }

    public function sogutucu(): void
    {

        $this->sheet->setCellValue('AX30', $this->data['sabit_sogutucu']);
        $this->sheet->getStyle('AX30')->getFont()->setSize(18);

        $this->sheet->setCellValue('BB30', $this->data['hareketli_soğutucu']);
        $this->sheet->getStyle('BB30')->getFont()->setSize(18);

    }

    public function enjeksiyonHizMesafe(): void
    {
        $index = 17;

        foreach($this->data['injection_pos'] as $item){
            $this->sheet->setCellValue('AY' . $index, $item);
            $this->sheet->getStyle('AY' . $index)->getFont()->setSize(18);
            $index++;
        }

        $index = 17;
        foreach($this->data['injection_speed'] as $item){
            $this->sheet->setCellValue('BC' . $index, $item);
            $this->sheet->getStyle('BC' . $index)->getFont()->setSize(18);
            $index++;
        }

    }

    public function tutmaBasinclari(): void
    {
        $this->sheet->setCellValue('H15', $this->data['tutmaBaslangici']);
        $this->sheet->getStyle('H15')->getFont()->setSize(18);

        $this->sheet->setCellValue('H25', $this->data['yastikMiktari']);
        $this->sheet->getStyle('H25')->getFont()->setSize(18);

        $this->sheet->setCellValue('C27', $this->data['geriEmisOnce1']);
        $this->sheet->getStyle('C27')->getFont()->setSize(18);

        $this->sheet->setCellValue('H27', $this->data['geriEmisSonra1']);
        $this->sheet->getStyle('H27')->getFont()->setSize(18);

        $this->sheet->setCellValue('C28', $this->data['geriEmisOnce2']);
        $this->sheet->getStyle('C28')->getFont()->setSize(18);

        $this->sheet->setCellValue('H28', $this->data['geriEmisSonra2']);
        $this->sheet->getStyle('H28')->getFont()->setSize(18);

        $index = 19;
        foreach ($this->data['tutma_zaman'] as $item){
            $this->sheet->setCellValue('C' . $index, $item);
            $this->sheet->getStyle('C' . $index)->getFont()->setSize(18);
            $index++;
        }
        $index = 19;
        foreach ($this->data['tutma_basinc'] as $item){
            $this->sheet->setCellValue('H' . $index, $item);
            $this->sheet->getStyle('H' . $index)->getFont()->setSize(18);
            $index++;
        }
    }

    public function malAlma(): void
    {

        $rows = ['F', 'I', 'J', 'N', 'T', 'Z'];
        for ($i = 0; $i < count($rows); $i++){
            if(isset($this->data['hiz'][$i]) && isset($this->data['basinc'][$i]) && isset($this->data['yol'][$i])){
                $this->sheet->setCellValue($rows[$i] . '32', $this->data['hiz'][$i]);
                $this->sheet->getStyle($rows[$i] . '32')->getFont()->setSize(18);
                $this->sheet->setCellValue($rows[$i] . '34', $this->data['basinc'][$i]);
                $this->sheet->getStyle($rows[$i] . '34')->getFont()->setSize(18);
                $this->sheet->setCellValue($rows[$i] . '36', $this->data['yol'][$i]);
                $this->sheet->getStyle($rows[$i] . '36')->getFont()->setSize(18);
            }
        }
    }

    public function silindirIsilari(): void
    {
        $this->sheet->setCellValue('K42', $this->data['silindir_isi_1']);
        $this->sheet->getStyle('K42')->getFont()->setSize(18);

        $this->sheet->setCellValue('P42', $this->data['silindir_isi_2']);
        $this->sheet->getStyle('P42')->getFont()->setSize(18);

        $this->sheet->setCellValue('U42', $this->data['silindir_isi_3']);
        $this->sheet->getStyle('U42')->getFont()->setSize(18);

        $this->sheet->setCellValue('Y42', $this->data['silindir_isi_4']);
        $this->sheet->getStyle('Y42')->getFont()->setSize(18);

        $this->sheet->setCellValue('AE42', $this->data['silindir_isi_5']);
        $this->sheet->getStyle('AE42')->getFont()->setSize(18);

        $this->sheet->setCellValue('AK42', $this->data['silindir_isi_6']);
        $this->sheet->getStyle('AK42')->getFont()->setSize(18);

        $this->sheet->setCellValue('AO42', $this->data['silindir_isi_7']);
        $this->sheet->getStyle('AO42')->getFont()->setSize(18);

        $this->sheet->setCellValue('AQ42', $this->data['silindir_isi_8']);
        $this->sheet->getStyle('AQ42')->getFont()->setSize(18);

        $this->sheet->setCellValue('AV42', $this->data['silindir_isi_9']);
        $this->sheet->getStyle('AV42')->getFont()->setSize(18);

        $this->sheet->setCellValue('AZ42', $this->data['silindir_isi_10']);
        $this->sheet->getStyle('AZ42')->getFont()->setSize(18);

        $this->sheet->setCellValue('BE42', $this->data['silindir_isi_11']);
        $this->sheet->getStyle('BE42')->getFont()->setSize(18);
    }

    public function hotRunner(): void
    {
        $rows = [
            'K', 'P', 'U', 'Y', 'AE', 'AK', 'AO', 'AQ', 'AV', 'AZ', 'BE'
        ];

        $index = 44;
        $hotrunner_index = 0;
        for ($i = 0; $i < count($rows); $i++){
         if(isset($this->data['hotrunner'][$i])){
             $this->sheet->setCellValue($rows[$i] . $index, $this->data['hotrunner'][$hotrunner_index]);
             $this->sheet->getStyle($rows[$i] . $index)->getFont()->setSize(18);
             $hotrunner_index++;
             if($i == count($rows)){
                 $index += 2;
                 $i = 0;
             }
             if($hotrunner_index == 54){
                 break;
             }
         }

        }

    }

    public function kalipKapama(): void
    {
        $this->sheet->setCellValue('T58', $this->data['kalipKapamaKuvveti']);
        $this->sheet->getStyle('T58')->getFont()->setSize(18);

        $rows = [
            'H', 'M', 'T', 'Y', 'AD', 'AJ', 'AO', 'AT'
        ];

        for ($i = 0; $i < count($rows); $i++){
            if(isset($this->data['acma_mesafesi'][$i])){
                $this->sheet->setCellValue($rows[$i] . '62', $this->data['acma_mesafesi'][$i]);
                $this->sheet->getStyle($rows[$i] . '62')->getFont()->setSize(18);
            }
        }

        for ($i = 0; $i < count($rows); $i++){
            if(isset($this->data['acma_hizi'][$i])){
                $this->sheet->setCellValue($rows[$i] . '65', $this->data['acma_hizi'][$i]);
                $this->sheet->getStyle($rows[$i] . '65')->getFont()->setSize(18);
            }
        }
    }

}


