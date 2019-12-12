<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Booking;
use App\BookingRoom;
use App\Feedback;
use App\Room;
use App\RoomType;
use Session;
use DB;
use URL;
use Illuminate\Routing\UrlGenerator;

class publicPage extends Controller
{

    public function about(){
    	return view('page.about');
    }
    public function login() {

    	return view('page.login');
	}
	public function booking(Request $request,$id_room_type=null) {
        if (Session::has('login')) {
            $id_ac=$request->session()->get('id_ac');
        }
        $account = Account::find($id_ac);
        $room_type = RoomType::All();
        $id_selected = $id_room_type;
    	return view('page.booking')->with(['account'=>$account,'room_type'=>$room_type,'id_selected'=>$id_selected]);
	}
	public function register() {
    	return view('page.register');
	}
	public function index() {
        $time_now=date("Y-m-d", time());// lay thoi gian hien tai
        $booking = Booking::where('check_out_date','<',$time_now)->get();
        foreach ($booking as $value) {
            $room = Room::where('room_no','=',$value->room_no)->first();
            $room->so_booking = $room->so_booking-1;
            $room->save();
            $value->delete();
        }

        $room_type = RoomType::All();
        $room_type = json_decode(json_encode($room_type),1);
    	return view('page.index')->with(['room_type'=>$room_type]);
	}
	// public function blog() {
 //    	return view('page.blog');
	// }
	public function room() {
        $room_type = RoomType::paginate(4);
    	return view('page.room')->with('room_type', $room_type);
	}
    public function uploadFile($file)
    {
        $path='';
        $allowedfileExtension=['jpg','png'];//giới hạn chấp nhận file này
        $extension = $file->getClientOriginalExtension();// lấy đuôi của file
        $check=in_array($extension,$allowedfileExtension); // check xem đúng kiểu file k
        if (!$check) {
            return back();
        }
        else{
            $path = $file->storeAs('upload',$file->getClientOriginalName());// di chuyển file đến mục storage/app/upload
            $path = str_replace("public","",url('').'storage/app/'.$path);
            return $path;
        }
    }
    public function dangki(Request $req){
        $path='';
        if ($req->hasFile('avatar')) {
            $file = $req->avatar; // lấy các giá trị của file về
            $path = $this->uploadFile($file);
        }
        else
        {
            echo 'khong co file';
        }

         $this->validate($req,
            [
                'email'=>'required|email|unique:account,email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);

        // $account = new Account(Input::all());
        $account = new Account();
        $account->name = $req->input('name');
        $account->phone = $req->input('phone');
        $account->email = $req->input('email');
        $account->password = $req->input('password');
        $account->address = $req->input('address');
        $account->gender = $req->input('gender');
        $account->avatar = $path;
        $account->save();
        Session::flush();
        return redirect('login')->with('thanhcong','Tạo tài khoản thành công');
    }
    public function postbooking(Request $request)
    {
        $time_now=date("Y-m-d", time());// lay thoi gian hien tai

        if (Session::has('login')) {
            $id_ac=$request->session()->get('id_ac');
        }

        $room_type = $request->input('room_type');
        $check_in_date = $request->input('check_in_date');
        $check_out_date = $request->input('check_out_date');
        $room_no_of_type = Booking::where('room_type','=',$room_type)->where('check_out_date','>',$time_now)->where('check_out_date','<',$check_in_date)->first();
        $room_no_of_type = json_decode(json_encode($room_no_of_type),1);//chuyen ve dang array

        if ($room_no_of_type) {

        }
        else{
             $room_no_of_type = Booking::where('room_type','=',$room_type)->where('check_out_date','>',$time_now)->where('check_in_date','>',$check_out_date)->first();
             if ($room_no_of_type) {

            }
            else
            {
                $room_no_of_type =Room::where('id_room_type','=',$room_type)->where('so_booking','=',0)->first();
                if ($room_no_of_type) {
                }
                else{
                    return redirect()->back()->with('thatbai','Loại phòng này không còn phòng trống');
                }
            }
        }


        $booking = new Booking();
        $booking->id_ac = $id_ac;
        $booking->name = $request->input('name');
        $booking->phone = $request->input('phone');
        $booking->email = $request->input('email');
        $booking->address = $request->input('address');
        $booking->room_type = $request->input('room_type');// viet trigger de nhap so phong vao csdl tu động điền room_type
        $booking->so_nguoi = $request->input('so_nguoi');
        $booking->check_in_date = $request->input('check_in_date');
        $booking->check_in_time = $request->input('check_in_time');
        $booking->check_out_date = $request->input('check_out_date');
        $booking->room_no = $room_no_of_type['room_no'];
        $booking->save();

        $room = Room::where('room_no','=',$booking->room_no)->first();
        $room->so_booking = $room->so_booking+1;
        $room->save();

        $room_type_ = RoomType::find($room_type);
        $amount = $room_type_->price;

        session(['cost_id' => $booking->id_bk]);
        return view('page.thanh_toan')->with(['amount'=>$amount]);
    }
    public function postFeedback(Request $request)
    {
        $feedback = new Feedback();
        $feedback->name = $request->input('name');
        $feedback->email = $request->input('email');
        $feedback->phone = $request->input('phone');
        $feedback->message = $request->input('message');
        $feedback->save();
        return redirect()->back();
    }
    public function singleRoom($id_room_type)
    {

        $single_room = RoomType::find($id_room_type);
        $single_room = json_decode(json_encode($single_room),1);
        $room = array();
        array_push( $room,rand(2,$room_type = RoomType::count()-2));
        array_push( $room,rand(1,$room[0]-1));
        array_push( $room,rand($room[0]+1,RoomType::count()-1));
        $room_type = RoomType::where('id_room_type','=',$room[0])->orwhere('id_room_type','=',$room[1])->orwhere('id_room_type','=',$room[2])->get();
        $room_type = json_decode(json_encode($room_type),1);
        return view('page.single-room')->with(['single_room'=>$single_room,'room_type'=>$room_type]);
    }
    public function creatPay(Request $request)
    {

        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "1EX1SQNP"; //Mã website tại VNPAY
        $vnp_HashSecret = "YOJSYYPXDIQEVMZTQNRXCITWDWZGRPUF"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://hotel-uet.herokuapp.com/return-vnpay";
        $vnp_TxnRef = date('YmdHis'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount =  $request->input('amount')*2000000;
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

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
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
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        // echo '<pre>';
        // var_dump($inputData);
        // echo '</pre>';
        // echo $vnp_Url;
        // die();
        return redirect($vnp_Url);
    }
    public function returnVNPay(Request $request)
    {
        if($request->vnp_ResponseCode == "00") {
            $booking = Booking::where('id_bk','=',Session::get('cost_id'))->update(['thanhtoan'=>true]);
            return redirect()->back()->with('success' ,'Đã thanh toán phí dịch vụ');
        }
        return redirect()->back()->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
    }
    // public function suggestRoom(Request $request)
    // {
    //     $check_in_date = $request->input('check_in_date');
    //     $check_out_date = $request->input('check_out_date');
    //     $room_type_id = $request->input('room_type_id')
    //     // $time_now=date("Y-m-d", time());
    //     // $room_type_trong = Booking::where('check_out_date','>',$time_now)->where('check_out_date','<',$check_in_date)->orWhere('check_in_date','>',$check_out_date)->get();
    //     $room_no_of_type = Booking::where('room_type','=',$room_type_id)->where('check_out_date','>',$time_now)->where('check_out_date','<',$check_in_date)->first();
    //     if ($room_no_of_type) {
    //         $room_type = RoomType::find($room_type_id);
    //         return view('page.room')->with(['room_type'=>$room_type]);
    //     }
    //     else{
    //          $room_no_of_type = Booking::where('room_type','=',$room_type_id)->where('check_out_date','>',$time_now)->where('check_in_date','>',$check_out_date)->first();
    //          if ($room_no_of_type) {
    //             $room_type = RoomType::find($room_type_id);
    //             return view('page.room')->with(['room_type'=>$room_type]);
    //         }
    //         else
    //         {
    //             $room_no_of_type =Room::where('id_room_type','=',$room_type_id)->where('so_booking','=',0)->first();
    //             if ($room_no_of_type) {
    //                 $room_type = RoomType::find($room_type_id);
    //                 return view('page.room')->with(['room_type'=>$room_type]);
    //             }
    //             else{
    //                 $room_type = RoomType::paginate(4);
    //                 return view('page.room')->with(['khongco'=>'Loại phòng này không còn phòng trống. Qúy khách vui lòng lựa chọn loại phòng khác!','room_type'=>$room_type]);
    //             }
    //         }
    //     }
    // }
}

