<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\blog;
use App\room_type;
use App\feedback;

class pageController extends Controller
{
    //
    function getHome() {
    	return view('pages.home');
    }
    function getAbout() {
    	return view('pages.about');
    }
    function getBlog() {
        // $account="def";
        // if(session()->has('account')) $account=session()->pull('account');
    	$blog;
    	$detailBlog = true;
    	//neu an vao bai viet se hien ra bai viet
    	if(isset($_GET['id'])){
    		$blog=blog::where('id',$_GET['id'])->paginate(1);
	    } else {
	    	$detailBlog = false;
	    	// tim blog theo từ - nếu có
	    	if(isset($_GET['keyword'])) {
	    		// biểu thức chính quy tìm kiếm
	    		$blog = blog::where('title','regexp',$_GET['keyword'])->paginate(4);
	    	} else
		    	$blog=blog::paginate(4);
	    }
	    //tạo bài viết random
    	$array=createArrayRandom(3,1,blog::count());
    	$blogRandom=blog::whereIn('id',$array)->get();
    	return view('pages.blog',['blog'=>$blog,'blogRandom'=>$blogRandom,'detailBlog'=>$detailBlog]);
    }
    function getRoom() {
        $room_type="";
        if(session()->has('id_room_type')){
            $id_room_type=session()->pull('id_room_type');
            if(count($id_room_type)==0){
                session()->put('notice','Không có phòng phù hợp với bạn');
                session()->put('levelNotice','danger');
            } else {
                $room_type=room_type::whereIn('id',$id_room_type)->get();
            }
        }
        else
            $room_type=room_type::all();
        if($room_type!="")
            return view('pages.room.room',['room_type'=>$room_type]);
        else return redirect()->back();
    }
    function getDetailRoom($id) {
        $room_type=room_type::find($id);
        //gợi ý phòng random
        $array=createArrayRandom(3,1,room_type::count(),$id);
        $randomRoomType=room_type::whereIn('id',$array)->get();
        return view('pages.room.single_room',['room_type'=>$room_type, 'other_room_type'=>$randomRoomType]);
    }
    function postFeedback(Request $request) {
        $feedback=new feedback;
        $feedback->name=$request->name;
        $feedback->email=$request->email;
        $feedback->phone=$request->phone;
        $feedback->message=$request->message;
        $feedback->save();
        session()->put('notice','Bạn đã thêm phản hồi thành công. Chúng tôi xin cảm ơn bạn');
        session()->put('levelNotice','normal');
        return redirect()->back();
    }
    function suggestRoom() {
        $room_type=room_type::all();
        $id_room_type_can_book=array();
        $check_in_post=$_POST['check_in_date'];
        $check_out_post=$_POST['check_out_date'];
        foreach($room_type as $rt) {
            $so_ngay_book_permit=$rt->so_ngay;
            if($so_ngay_book_permit < date_diff_now($check_out_post)) continue;//check_out vượt quá số ngày dự tính trước
            $account_roomtype=$rt->account_roomtype;//xem có những phòng nào của loại phòng, ai book
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
                array_push($so_phong_account_book, 1);
                $ok=checkRoom($check_in,$check_out,$so_phong_account_book,$so_ngay_book_permit,$rt->room->count());

                if($ok) array_push($id_room_type_can_book, $rt->id);
            } else if($rt->room->count() != 0) {#loại phòng này có phòng không
                array_push($id_room_type_can_book, $rt->id);
            }
        }
        session()->put('id_room_type',$id_room_type_can_book);
        return redirect()->route('room');
    }
}