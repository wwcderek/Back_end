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
            $barcode->scan_count = 0;
            $barcode->save();
            return json_encode($barcode);
        }catch(Exception $e){
            echo "error";
        }
    }

    public function scanCode(Request $request)
    {
        $data = $request->data;
        $user_id = $request->user_id;
        $record = Barcode::where('value', '=', $data)->first();
        if(count($record) > 0) {
            if($record->scan_count==0) {
                $extented_time = date('Y-m-d H:i:s', strtotime($record->expired_time.'+120 minutes'));
                User::where('value', $data)
                    ->update(['scan_count' => 1, 'expired_time' => $extented_time]);
                return "Success";
            }
            return "Invaild QR Code";
        }
        return "No record";
    }

    public function test()
    {
        $time1 =   strtotime(date('Y-m-d H:i:s', strtotime('now +5 minutes')));
        $now = date('Y-m-d H:i:s', strtotime('now +5 minutes'));
        $new = date('Y-m-d H:i:s', strtotime($now .'+120 minutes'));

//        $time2 =   strtotime(date('Y-m-d H:i:s', strtotime('now +6 minutes')));
//        $seconds_diff = $time2 - $time1;
//        $time = ($seconds_diff/3600);
//        return $seconds_diff;
        return $new;
    }


}
