<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use Prophecy\Exception\Exception;

class BarcodeController extends Controller
{
    //
    public function createCode(Request $request)
    {
        $data = $request->data;
        $user_id = $request->user_id;
        $time = date("Y-m-d_H-i-s");
        $filePath =  '/public/qr_code/'.$time.'.png'; //It is server's local path, so it is not https
        $qrcode = new BaconQrCodeGenerator();
        try {
            if (!file_exists("/public/qr_code")){
                mkdir("/public/qr_code", 0777);
            }
            $qrcode->format('png')
                ->size(400)
                ->color(255,0,255)
                //->backgroundColor(255,255,0)
                //->margin(100)
                ->errorCorrection('H')
                ->generate($data, $filePath);
//            $sqldata = serialize($qrcode);
        }catch(Exception $e){
            echo "error";
        }
    }


}
