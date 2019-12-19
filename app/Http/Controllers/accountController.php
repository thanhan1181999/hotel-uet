<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room_type;
use App\account_roomtype;
use App\account;

class accountController extends Controller
{
    //
    function showProfile() {
        if(session()->has('account'))
            return view('profile');
        return redirect()->back();
    }
    function showBooked() {
        $account=session()->get('account');
        $account_roomtype=account_roomtype::all()->where('id_account',$account->id);
        return view('account.booked',['account_roomtype'=>$account_roomtype]);
    }
    function deletebooked(Request $request) {
        $account_roomtype=account_roomtype::find($request->id);
        $account_roomtype->delete();
        session()->put('notice','Đã hủy đặt phòng');
        session()->put('levelNotice','normal');
        return redirect()->back();
    }
    function editProfile(Request $request) {
        if(session()->has('account')){
            $account=session()->get('account');
            $account->address=$request->address;
            $account->phone=$request->phone;
            $account->gender=$request->gender;
            $account->save();
            session()->put('notice','Đã sửa thông tin thành công');
            session()->put('levelNotice','normal');
            return redirect()->route('profile');
        }
        return redirect()->back();
    }
    function booking(Request $request) {
    	$check_in_post=$request->check_in_date;
        $check_out_post=$request->check_out_date;
        $so_phong_book=$request->so_phong;
        $id_room_type=$request->id_room_type;
        $room_type=room_type::find($id_room_type);
        $so_ngay_book_permit=$room_type->so_ngay;
        $ok_book=true;
        if($so_ngay_book_permit < date_diff_now($check_out_post)) $ok_book=false;//check_out vượt quá số ngày dự tính trước
        else {
	        $account_roomtype=$room_type->account_roomtype;//xem có những phòng nào của loại phòng, ai book
	        if(sizeof($account_roomtype)!=0) {
	            $check_in=array();
	            $check_out=array();
	            $so_phong_account_book=array();
	            // lấy thời gian đi, đến và số phòng trong csdl
	            foreach ($account_roomtype as $art) {
	                array_push($check_in, date_diff_now($art->check_in));
	                array_push($check_out, date_diff_now($art->check_out));
	                array_push($so_phong_account_book, $art->so_phong);
	            }
	            // thêm thời gian mới vào rồi kiếm tra xem đủ phòng không
	            array_push($check_in, date_diff_now($check_in_post));
	            array_push($check_out, date_diff_now($check_out_post));
	            array_push($so_phong_account_book, $so_phong_book);
	            $ok_book=checkRoom($check_in,$check_out,$so_phong_account_book,$so_ngay_book_permit,$room_type->room->count());
	        } else if($room_type->room->count() == 0) {#loại phòng này có phòng không
	            $ok_book=false;
	        }
        }
        if(!$ok_book) {
        	session()->put('notice','Không có phòng phù hợp với bạn');
            session()->put('levelNotice','danger');
            return redirect()->back();
        } else {
        	session()->put('url',url()->previous());
        	$account_roomtype=new account_roomtype;
        	$account_roomtype->id_account=session()->get('account')->id;
        	$account_roomtype->id_room_type=$room_type->id;
        	$account_roomtype->check_in=$check_in_post;
        	$account_roomtype->check_out=$check_out_post;
        	$account_roomtype->so_phong=$so_phong_book;
            $account_roomtype->save();
        	$price=caculatePrice($room_type->price*$so_phong_book,$room_type->unitPrice);
        	session()->put('booking',$account_roomtype);
        	session()->put('price',$price);
        	return redirect('account/thanhtoan');
        }
    }
}
