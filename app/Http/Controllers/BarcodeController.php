<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use Prophecy\Exception\Exception;
use File;
use DateTime;

class BarcodeController extends Controller
{
    //
    public function createCode(Request $request)
    {
        $data = $request->data;
        $user_id = $request->user_id;
        $now = new DateTime();
//        $now = $now->format('Y-m-d H:i:s');
        $now->modify("+5 minutes");
        $time = date("Y-m-d_H-i-s");
        $path = storage_path().'/app/public/qr_code/';
        if(!is_dir($path))
        File::makeDirectory($path, $mode = 0777, true, true);
        $filePath =  storage_path().'/app/public/qr_code/'.$time.'.png'; //It is server's local path, so it is not https
        $qrcode = new BaconQrCodeGenerator();
        do {
            $randomNum = rand(10000, 99999);
            $record = Barcode::where('value', '=', $randomNum)->get();
        } while(count($record) > 0);
        try {
            $qrcode->format('png')
                ->size(400)
                ->color(51, 187, 255)
                ->margin(1)
                ->errorCorrection('H')
                ->generate($randomNum, $filePath);

            $barcode = new Barcode();
            $barcode->value = $randomNum;
            $barcode->expired_time = $now;
            $barcode->user_id = $user_id;
            $barcode->path = 'http://101.78.175.101:6780/storage/qr_code/'.$time.'.png';
            $barcode->save();
        }catch(Exception $e){
            echo "error";
        }
    }


}
