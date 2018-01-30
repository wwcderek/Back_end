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
        $now = date('Y-m-d H:i:s', strtotime('now +5 minutes'));
        $time = date("Y-m-d_H-i-s");
        $url = 'http://101.78.175.101:6780/storage/qr_code/'.$time.'.png';
        $path = storage_path().'/app/public/qr_code/';
        if(!is_dir($path))     //check whether the directory exist or not
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
            $barcode->path = $url;
            $barcode->save();
            return json_encode($barcode);
        }catch(Exception $e){
            echo "error";
        }
    }

    public function test()
    {
        $time1 =   strtotime(date('Y-m-d H:i:s', strtotime('now +5 minutes')));
        $time2 =   strtotime(date('Y-m-d H:i:s', strtotime('now +6 minutes')));
        $seconds_diff = $time2 - $time1;
        $time = ($seconds_diff/3600);
        return $seconds_diff;
    }


}
