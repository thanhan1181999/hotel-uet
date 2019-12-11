<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function getQrCode()
    {
        $storeSlug='MOMOE3HD20191208-storeid01';
        $amount=0;
        $billId = 'billid01';

        echo hash_hmac('SHA256', "storeSlug=$storeSlug&amount=$amount&billId=$billId", 'cJVXM3eI02jZTZiah2acBeG3EISyUMnf');
        $qrCode = QrCode::size(250)->generate('https://test-payment.momo.vn/pay/store/MOMOE3HD20191208-storeid01?a=0&b=billid01&s=e2f8e04f0d04518722044665d4ddbd6610dfa5904bea385c0c8e06fb8ddc7f6a');
        return view('page.qrCode',compact('qrCode'));
    }

}
