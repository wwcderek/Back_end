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
        $now = strtotime(date('Y-m-d H:i:s'));
        $record = Barcode::where('value', '=', $data)->first();
        if(count($record) > 0) {
            $remain_time = $now - strtotime($record->expired_time);
            if($remain_time>0) {
                switch ($record->scan_count){
                    case 0:
                        $extented_time = date('Y-m-d H:i:s', strtotime($record->expired_time.'+120 minutes'));
                        Barcode::where('value', $data)
                            ->update(['scan_count' => 1, 'expired_time' => $extented_time]);
                        return json_encode(true);
                    case 1:
                        $duration = ($now - strtotime($record->updated_at))/60;
                        Barcode::where('value', $data)
                            ->update(['scan_count' => 2]);
                        return $duration;
                    case 2:
                        return json_encode(false);
                    default:
                        return json_encode(false);
                }
            }
            return json_encode(false);
        }
        return json_encode(false);
    }

    public function test()
    {
        $now = strtotime(date('Y-m-d H:i:s'));
        //$time2 = date('Y-m-d H:i:s', strtotime($now .'+120 minutes'));
        $time2 =   strtotime(date('Y-m-d H:i:s', strtotime('now +6 minutes')));
        $seconds_diff = $time2 - $now;
        $time = ($seconds_diff/60);
//        return $seconds_diff;
        return $time;
    }


}
