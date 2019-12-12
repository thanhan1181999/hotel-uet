<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function getQrCode()
    {
        $storeSlug='MOMOE3HD20191208-storeid01';
        $amount=1000;
        $billId = 'B001221';
        $secret_key = 'cJVXM3eI02jZTZiah2acBeG3EISyUMnf';
        $signature = "storeSlug=$storeSlug&amount=$amount&billId=$billId";
        echo $signature;
        $signature = hash_hmac('sha256',$signature, $secret_key);
        $qrCode = QrCode::size(250)->generate("https://test-payment.momo.vn/pay/store/$storeSlug");
        echo "https://test-payment.momo.vn/pay/store/$storeSlug?a=1000&b=$billId&s= $signature";
        return view('page.qrCode',compact('qrCode'));
    }

}
