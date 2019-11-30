<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Booking;
use App\Feedback;
use App\Room;
use App\RoomType;
use Session;
use DB;
use Illuminate\Routing\UrlGenerator;

class publicPage extends Controller
{
    public function about(){
    	return view('page.about');
    }
    public function login() {
    	return view('page.login');
	}
	public function booking(Request $request) {
        if (Session::has('login')) {
            $id_ac=$request->session()->get('id_ac');
        }
        $account = Account::find($id_ac);
        $room_type = RoomType::All();
    	return view('page.booking')->with(['account'=>$account,'room_type'=>$room_type]);
	}
	public function register() {
    	return view('page.register');
	}
	public function index() {
    	return view('page.index');
	}
	public function blog() {
    	return view('page.blog');
	}
	public function room() {
    	return view('page.room');
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
        if (Session::has('login')) {
            $id_ac=$request->session()->get('id_ac');
        }

        $room_type = $request->input('room_type');
        $check_in_date = $request->input('check_in_date');
        $room_no_of_type = Room::where('id_room_type','=',$room_type)->where('is_rental','=',0)->first();
        $room_no_of_type = json_decode(json_encode($room_no_of_type),1);//chuyen ve dang array

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

        $room = Room::where('room_no','=',$booking->room_no)
                    ->update(['is_rental'=>1]);
        return redirect()->back();
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
}

