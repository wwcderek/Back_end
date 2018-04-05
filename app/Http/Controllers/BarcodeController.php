<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use App\Models\UserDiscount;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use Prophecy\Exception\Exception;
use File;
use DateTime;

class BarcodeController extends Controller
{
    const INVAILD_CODE = 0;
    const DISCOUNT_GIVEN = 1;
    const NO_DISCOUNT = 2;
    const TIME_EXTEND = 3;
    const NUMBER = array(1 => "12345", 3 => "23456", 8 => "34567");
    //
    public function createCode(Request $request)
    {
        if(in_array($request->data, static::NUMBER)) {
            $user_id = $request->user_id;
            $now = date('Y-m-d H:i:s', strtotime('now +5 minutes'));
            $time = date("Y-m-d_H-i-s");
            $url = 'http://101.78.175.101:6780/storage/qr_code/' . $time . '.png';
            $path = storage_path() . '/app/public/qr_code/';
            if (!is_dir($path))     //check whether the directory exist or not
                File::makeDirectory($path, $mode = 0777, true, true);
            $filePath = storage_path() . '/app/public/qr_code/' . $time . '.png'; //It is server's local path, so it is not https
            $qrcode = new BaconQrCodeGenerator();
            do {
                $randomNum = rand(10000, 99999);
                $record = Barcode::where('value', '=', $randomNum)->get();
            } while (count($record) > 0);
            try {
                $qrcode->format('png')
                    ->size(400)
                    ->color(0, 0, 0)
                    ->margin(1)
                    ->errorCorrection('H')
                    ->generate($randomNum, $filePath);

                $barcode = new Barcode();
                $barcode->value = $randomNum;
                $barcode->expired_time = $now;
                $barcode->user_id = $user_id;
                $barcode->path = $url;
                $barcode->scan_count = 0;
                $barcode->film_id = array_search($request->data, static::NUMBER);
                $barcode->save();
                return json_encode($barcode);
            } catch (Exception $e) {
                echo "error";
            }
        }
        return json_encode(false);
    }

    public function scanCode(Request $request)
    {
        $data = $request->data;
        $now = strtotime(date('Y-m-d H:i:s'));
        $record = Barcode::where('value', '=', $data)->first();
        $expired_time = date('Y-m-d H:i:s', strtotime('now +10080 minutes'));
        if(count($record) > 0) {
            $remain_time = strtotime($record->expired_time) - $now;
            if($remain_time>0) {
                switch ($record->scan_count){
                    case 0:
                        $extented_time = date('Y-m-d H:i:s', strtotime($record->expired_time.'+120 minutes'));
                        Barcode::where('value', $data)
                            ->update(['scan_count' => 1, 'expired_time' => $extented_time]);
                        return json_encode(static::TIME_EXTEND);
                    case 1:
                        $duration = ($now - strtotime($record->updated_at))/60;
                        Barcode::where('value', $data)
                            ->update(['scan_count' => 2]);
                        $discount = new UserDiscount();
                        $discount->user_id = $record->user_id;
                        if($duration<=30){
                           $discount->discount_id = 1;
                        }else if($duration>30&&$duration<=60){
                            $discount->discount_id = 2;
                        }else if($duration>60&&$duration<=90){
                            $discount->discount_id = 3;
                        }else{
                            return json_encode(static::NO_DISCOUNT);
                        }
                        $discount->expired_time = $expired_time;
                        $discount->path = $this->createDiscount();
                        $discount->save();
                        return json_encode(static::DISCOUNT_GIVEN);
                    case 2:
                        return json_encode(static::INVAILD_CODE);
                    default:
                        return json_encode(static::INVAILD_CODE);
                }
            }
            return json_encode(static::INVAILD_CODE);
        }
        return json_encode(static::INVAILD_CODE);
    }

    public function getCode(Request $request)
    {
        $now = date('Y-m-d H:i:s');
        $user_id = $request->user_id;
        $barcode = Barcode::where([
            ['user_id', '=', $user_id],
            ['scan_count','<', 2],
            ['expired_time', '>', $now]
        ])->get();
        return json_encode($barcode);

    }


    public function createDiscount()
    {
        $time = date("Y-m-d_H-i-s");
        $url = 'http://101.78.175.101:6780/storage/qr_code/discount_' . $time . '.png';
        $path = storage_path() . '/app/public/qr_code/';
        if (!is_dir($path))     //check whether the directory exist or not
            File::makeDirectory($path, $mode = 0777, true, true);
        $filePath = storage_path() . '/app/public/qr_code/discount_' . $time . '.png'; //It is server's local path, so it is not https
        $qrcode = new BaconQrCodeGenerator();
        $randomNum = rand(1000, 9999);

        try {
            $qrcode->format('png')
                ->size(400)
                ->color(0, 0, 0)
                ->margin(1)
                ->errorCorrection('H')
                ->generate($randomNum, $filePath);

            return $url;
        } catch (Exception $e) {
            echo "error";
        }
    }

    public function checkCode(Request $request)
    {
        $now = strtotime(date('Y-m-d H:i:s'));
        $results = Barcode::where([
            ['user_id', '=',  intval($request->user_id)],
            ['film_id', '=',  intval($request->film_id)],
            ['scan_count', '!=', 0]
        ])->get();

        if(count($results) > 0) {
            foreach ($results as $result) {
                $extented_time = date('Y-m-d H:i:s', strtotime($result->created_at.'+180 minutes'));
                $remain_time = strtotime($extented_time) - $now;
                if($remain_time>0)
                    return json_encode(true);
            }
            return json_encode(false);
        }
        return json_encode(false);
    }



}
