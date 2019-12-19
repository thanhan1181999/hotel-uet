<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feedback;
use App\room_type;
use App\service_room;
use App\quyenloi_room;
use App\blog;
use App\room;
use App\account_roomtype;

class adminController extends Controller
{
    //
    function showQuanLy() {
    	return view('admin.layouts.index');
    }
    #feedback
    function feedback() {
    	$feedback=feedback::all();
    	return view('admin.feedback',['feedback'=>$feedback]);
    }
    function delete_feedback(Request $request) {
    	$feedback=feedback::find($request->id);
    	$feedback->delete();
        session()->put('notice','Đã xóa feedback');
        session()->put('levelNotice','normal');
        return redirect()->back();
    }
    #room_type
    function room_type() {
    	$room_type=room_type::all();
    	return view('admin.room_type.show',['room_type'=>$room_type]);
    }
    function xoa_room_type(Request $request) {
        $room_type=room_type::find($request->id);
        if($room_type->room->count()==0) {
            $room_type->delete();
            session()->put('notice','Thể loại phòng này đã xóa');
            session()->put('levelNotice','normal');            
        } else {
            session()->put('notice','Loại phòng này vẫn có phòng, không được phép xóa');
            session()->put('levelNotice','danger');            
        }
        return redirect()->back();
    }
    function getsua_room_type(Request $request) {
        $room_type=room_type::find($request->id);
        return view('admin.room_type.sua',['room_type'=>$room_type]);
    }
    function postsua_room_type(Request $request) {
        $this->validate($request,[
            'name'=>'required'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên loại phòng',
        ]);
        $room_type=room_type::find($request->id_room_type);
        $room_type->name=$request->name;
        $room_type->price=$request->price;
        $room_type->unitPrice=$request->unitPrice;
        $room_type->title=$request->title;
        $room_type->description=$request->description;
        $room_type->area=$request->area;
        $room_type->unitArea=$request->unitArea;
        $room_type->so_ngay=$request->so_ngay;
        $room_type->save();
        session()->put('notice','Sửa thành công');
        session()->put('levelNotice','normal');
        return redirect()->back();
    }
    function getthem_room_type() {
        return view('admin.room_type.them');
    }
    function postthem_room_type(Request $request) {
        $room_type=new room_type;
        $room_type->name=$request->name;
        $room_type->price=$request->price;
        $room_type->unitPrice=$request->unitPrice;
        $room_type->title=$request->title;
        $room_type->description=$request->description;
        $room_type->area=$request->area;
        $room_type->unitArea=$request->unitArea;
        $room_type->so_ngay=$request->so_ngay;
        $room_type->save();
        session()->put('notice','Thêm thành công');
        session()->put('levelNotice','normal');
        return redirect('admin/quanly/room_type');
    }
    #blog
    function blog() {
        $blog=blog::all();
        return view('admin.blog.show',['blog'=>$blog]);
    }
    function xoa_blog(Request $request) {
        $blog=blog::find($request->id);
        $blog->delete();
        session()->put('notice','Xóa blog thành công');
        session()->put('levelNotice','normal');                    
        return redirect()->back();
    }
    function getsua_blog(Request $request) {
        $blog=blog::find($request->id);
        return view('admin.blog.sua',['blog'=>$blog]);
    }
    function postsua_blog(Request $request) {
        #sẽ có phần validate
        $blog=blog::find($request->id_blog);
        $blog->title=$request->title;
        $blog->text1=$request->text1;
        $blog->text2=$request->text2;
        $blog->date=$request->date;
        $blog->author=$request->author;
        if($request->hasFile('image')) { 
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if(strtolower($duoi) != 'png' && strtolower($duoi) != 'jpg' && strtolower($duoi) != 'jpeg'){
                session()->put('notice','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
                session()->put('levelNotice','danger');
                return redirect()->back();
            }
            #tạo tên file để tránh trùng lặp lưu trữ
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4).'_'.$name;
            while(file_exists('images/blog/'.$Hinh)) {
                $Hinh = str_random(4).'_'.$name;
            }
            $file->move('images/blog',$Hinh);
            // unlink('images/blog/'.$blog->image);
            $blog->image=$Hinh;
        }
        $blog->save();
        session()->put('notice','Sửa thành công');
        session()->put('levelNotice','normal');
        return redirect()->back();
    }
    function getthem_blog() {
        return view('admin.blog.them');
    }
    function postthem_blog(Request $request) {
        $this->validate($request,[
            'image'=>'required',
            'title'=>'required'
        ],
        [
            'image.required'=>'Bạn chưa chọn hình ảnh',
            'title.required'=>'Bạn chưa nhập tiêu đề'
        ]);
        $blog=new blog;
        $blog->title=$request->title;
        $blog->text1=$request->text1;
        $blog->text2=$request->text2;
        $blog->date=$request->date;
        $blog->author=$request->author;
        if($request->hasFile('image')) { 
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if(strtolower($duoi) != 'png' && strtolower($duoi) != 'jpg' && strtolower($duoi) != 'jpeg'){
                session()->put('notice','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
                session()->put('levelNotice','danger');
                return redirect()->back();
            }
            #tạo tên file để tránh trùng lặp lưu trữ
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4).'_'.$name;
            while(file_exists('images/blog/'.$Hinh)) {
                $Hinh = str_random(4).'_'.$name;
            }
            $file->move('images/blog',$Hinh);
            // unlink('images/blog/'.$blog->image);
            $blog->image=$Hinh;
        }
        echo $blog->image;
        $blog->save();
        session()->put('notice','Thêm thành công');
        session()->put('levelNotice','normal');
        return redirect()->back();
    }
    #room
    function room() {
        $room_type=room_type::all();
        return view('admin.room.show',['room_type'=>$room_type]);
    }
    function xoa_room(Request $request) {
        $room=room::find($request->id);
        $room->delete();
        session()->put('notice','Xóa thành công');
        session()->put('levelNotice','normal');
        return redirect()->back();
    }
    function getsua_room(Request $request) {
        $room=room::find($request->id);
        $room_type=room_type::all();
        return view('admin.room.sua',['room'=>$room,'room_type'=>$room_type]);
    }
    function postsua_room(Request $request) {
        $so_phong=$request->so_phong;
        $id_room_type=$request->room_type;
        $checkRoom=room::where('so_phong',$so_phong)->where('id_room_type',$id_room_type)->count();
        if($checkRoom!=0) {
            session()->put('notice','Phòng đã tồn tại');
            session()->put('levelNotice','danger');            
        } else {
            $room=room::find($request->id_room);
            $room->so_phong=$so_phong;
            $room->id_room_type=$id_room_type;
            $room->save();
            session()->put('notice','Sửa thành công');
            session()->put('levelNotice','normal');
        }
        return redirect()->back();
    }
    function getthem_room(Request $request) {
        $room_type=room_type::all();
        return view('admin.room.them',['room_type'=>$room_type]);
    }
    function postthem_room(Request $request) {
        $so_phong=$request->so_phong;
        $id_room_type=$request->room_type;
        $checkRoom=room::where('so_phong',$so_phong)->where('id_room_type',$id_room_type)->count();
        if($checkRoom!=0) {
            session()->put('notice','Phòng đã tồn tại');
            session()->put('levelNotice','danger');            
        } else {
            $room=new room;
            $room->so_phong=$so_phong;
            $room->id_room_type=$id_room_type;
            $room->save();
            session()->put('notice','Thêm thành công');
            session()->put('levelNotice','normal');
        }
        return redirect()->back();
    }
    #booking_details
    function booking_details() {
        $account_roomtype=account_roomtype::all();
        return view('admin.booking_details.show',['account_roomtype'=>$account_roomtype]);
    }
    function delete_booked(Request $request) {
        $account_roomtype=account_roomtype::find($request->id);
        if($account_roomtype->status==0) {
            $account_roomtype->delete();
            session()->put('notice','Đã hủy phòng');
            session()->put('levelNotice','normal');            
            return redirect()->back();
        }
        session()->put('notice','Không được hủy phòng đã thanh toán');
        session()->put('levelNotice','danger');            
    }
    #check_in tại hotel
    function check_ỉn_room(Request $request) {
        $account_roomtype=account_roomtype::find($request->id);
        if($account_roomtype->status==0) {
            session()->put('notice','Khách hàng chưa thanh toán');
            session()->put('levelNotice','danger');
            return redirect()->back();            
        }
        if($account_roomtype->check_checkin==1) {
            session()->put('notice','Khách hàng đã check in');
            session()->put('levelNotice','danger');            
            return redirect()->back();
        }
        $datenow=date_create(date('Y-m-d'));
        $datenow=date_format($datenow,"Y-m-d");
        if($account_roomtype->check_in > $datenow) {
            session()->put('notice','Chưa đến ngày check_in');
            session()->put('levelNotice','danger');            
            return redirect()->back();            
        }
        $room=room::where('id_room_type',$account_roomtype->id_room_type)->skip(0)->take($account_roomtype->so_phong)->get();
        foreach($room as $r) {
            $r->id_account_roomtype=$account_roomtype->id;
            $r->save();
        }
        $account_roomtype->check_checkin=1;
        $account_roomtype->save();
        session()->put('notice','Khách hàng đã check in');
        session()->put('levelNotice','normal');            
        return redirect()->back();
    }
    function check_out_room(Request $request) {
        $datenow=date_create(date('Y-m-d'));
        $datenow=date_format($datenow,"Y-m-d");
        $account_roomtype=account_roomtype::find($request->id);
        if($account_roomtype->status==0) {
            session()->put('notice','Khách hàng chưa thanh toán');
            session()->put('levelNotice','danger');
            return redirect()->back();            
        }
        if($account_roomtype->check_out < $datenow) {
            session()->put('notice','Chưa đến ngày check_out');
            session()->put('levelNotice','danger');            
            return redirect()->back();                        
        }
        $account_roomtype->delete();
        session()->put('notice','Check out thành công');
        session()->put('levelNotice','normal');            
        return redirect()->back();                        
    }
}