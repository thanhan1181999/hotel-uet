<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use DB;
use Session;
use stdClass;
use Redirect;
use App\Account;
use App\Booking;
use App\Feedback;
use App\Room;
use App\RoomType;
use App\Blog;
use Illuminate\Routing\UrlGenerator;

class UserController extends Controller
{
    public function setPassword(Request $request)
    {
        $email=$request['email'];
        $name=$request['name'];
        $phone=$request['phone'];

        $data=DB::table('account')->where('email',$email)->first();
        $data = json_decode(json_encode($data),true);

        if($data['name']==$name && $data['phone']==$phone){
            return view('user.setpassword')->with('email',$email);
        }else{
            $alert = "Not have account suitable";
            return view('page.login')->with('alert',$alert);
        }
    }

    public function putPassword(Request $request)
    {
        $email=$request['email'];
        $password=$request['password'];

        $data = DB::table('account')
            ->where('email', $email)
            ->update(['password' => $password]);

        $data = json_decode(json_encode($data),true);

        if($data==1) $alert = "Change password success !!!";
        else $alert = "Change password not success !!!";

        return view('page.login')->with('alert',$alert);
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
            $path = $file->storeAs('/upload',$file->getClientOriginalName());// di chuyển file đến mục storage/app/upload
            // $path = str_replace("public","",url('').'storage/app/'.$path);
            return $path;
        }
    }
	//user login
     public function login(Request $request){
        // $this->validate($request,
        //     [
        //         'email'=>'required|email'
        //         // 'password'=>'required|min:6|max:20'
        //     ],
        //     [
        //         'email.required'=>'Vui lòng nhập email',
        //         'email.email'=>'Email không đúng định dạng',
        //         // 'password.required'=>'Vui lòng nhập mật khẩu',
        //         // 'password.min'=>'Mật khẩu ít nhất 6 kí tự',
        //         // 'password.max'=>'Mật khẩu không quá 20 kí tự'
        //     ]
        // );
    	$username=$request['username'];
    	$password=$request['password'];
        $data=DB::table('account')->where('email',$username)->first();
        $data = json_decode(json_encode($data),true);
        if($data['password']==$password){
            if ($data['type_ac']==0) {
                if(Session::has('login'))
                    $request->session()->flush();

                    Session::put('login','user');
                    Session::put('id_ac',$data['id_ac']);

                    return Redirect::to(Session::get('old_url'));
            }
            else
            {
                if(Session::has('login'))
                    $request->session()->flush();

                    Session::put('login','admin');
                    return redirect('admin/quanly');
            }

        }else return redirect('login');
    }
    public function showProfileUser(Request $request)
    {
        if (Session::has('login')) {
            $id_ac=$request->session()->get('id_ac');
        }
        $account = Account::find($id_ac);
        return view('user.show_profile')->with('account',$account);
    }
    public function editProfileUser(Request $request)
    {
        $path=$request->input('old_avatar');
        if ($request->hasFile('avatar')) {
            $file = $request->avatar; // lấy các giá trị của file về
            
            $path = '/'.$this->uploadFile($file);
            $file->move('upload',$file->getClientOriginalName());
        }

        $account = Account::find($request->input('id_ac'));
        $account->name = $request->input('name');
        $account->avatar = $path;
        $account->email = $request->input('email');
        $account->password = $request->input('password');
        $account->phone = $request->input('phone');
        $account->address = $request->input('address');
        $account->gender = $request->input('gender');
        $account->save();
        return redirect('user/profile');
    }
    public function showPhongDaBook(Request $request)
    {
        if (Session::has('login')) {
            $id_ac=$request->session()->get('id_ac');
        }
        $booking = Booking::where('id_ac','=',$id_ac)->get();
        return view('user.show_booked')->with('booking',$booking);
    }
    public function deleteBooked($id)
    {
        $booked = Booking::find($id);
        $room = Room::where('room_no','=',$booked->room_no)
                    ->update(['is_rental'=>0]);
        $booked->delete();
        return redirect('user/phong_da_book');
    }

    public function showBlog(Request $request)
    {
        // lấy dữ liệu bài viết random
        $random=array(rand(1,3),rand(4,7),rand(8,10));
        $blogRandom = Blog::where('id', $random[0])->orwhere('id', $random[1])->orwhere('id', $random[2])->get();

        // công việc tìm kiếm
        if( isset(  $_GET['keyword']) ){
            $blog1=DB::table('blog')->select('title','id')->get();
            $kq = array();
            foreach($blog1 as $value){;
                if(strpos( strtolower($value->title) , strtolower($_GET['keyword']) ) ){
                    array_push($kq, $value->id);
                }
            }
            if(sizeof($kq)==0)  $blog = Blog::where('id',0)->paginate(1);
            else if(sizeof($kq)==1)  $blog = Blog::where('id', $kq[0])->paginate(4);
            else $blog = Blog::where('id', $kq[0])->orwhere('id', $kq[1])->paginate(4);
            return view('page.blogtest',['blog'=>$blog,'blogRandom'=>$blogRandom,'search'=>'search']);
        }else
        //công việc đọc 1 bài viết
        if( isset(  $_GET['id']) ){
            $blog = Blog::where('id',$_GET['id'])->paginate(1);
            return view('page.blogtest',['blog'=>$blog,'blogRandom'=>$blogRandom]);
        }
        //công việc xem tổng quát các bài viết qua phân trang
        else{
            $blog=Blog::paginate(4);
            return view('page.blogtest',['blog'=>$blog,'blogRandom'=>$blogRandom]);
        }

    }

}
