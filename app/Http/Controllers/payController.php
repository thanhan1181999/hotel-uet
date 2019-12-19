<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\account_roomtype;

class payController extends Controller
{
    //
    #đoạn này copy
    function checkInfoPay() {
        if(isset($_GET['id'])){
            $account_roomtype=account_roomtype::find($_GET['id']);
            $room_type=$account_roomtype->room_type;
            session()->put('booking',$account_roomtype);
            session()->put('price',caculatePrice($room_type->price*$account_roomtype->so_phong,$room_type->unitPrice));
        }
    	return view('account.thanhtoan',['price'=>session()->get('price')]);
    }
    function create_pay(Request $request)
    {

        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "1EX1SQNP"; //Mã website tại VNPAY
        $vnp_HashSecret = "YOJSYYPXDIQEVMZTQNRXCITWDWZGRPUF"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        //$vnp_Returnurl = "http://localhost/btl/public/account/return_vnpay";
        $vnp_Returnurl = "http://hotel-uet.herokuapp.com/account/return_vnpay";
        $vnp_TxnRef = date('YmdHis'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount =  session()->get('price')*100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
    function return_vnpay(Request $request)
    {
        if($request->vnp_ResponseCode == "00") {
	        $booking=session()->get('booking');
	        $booking->status=1;
	        $booking->save();
	        #thanh toán thành công mới được lưu vào database
	        session()->put('notice','Bạn đã thanh toán phòng thành công');
	        session()->put('levelNotice','normal');
            session()->put('noticeImportant',true);
            return Redirect::to(session()->pull('url'));
        }
        // session()->forget('booking');
      	session()->put('notice','Lỗi trong quá trình thanh toán dịch vụ');
	    session()->put('levelNotice','danger');
        return Redirect::to(session()->pull('url'));
    }
}
