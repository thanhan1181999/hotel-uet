<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Booking;
use App\Feedback;
use App\Room;
use App\RoomType;
use Session;
use Illuminate\Routing\UrlGenerator;

class adminController extends Controller
{
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
    public function quanly($option=null,$id=null){

        if ($option=='feedback') {
            $feedback = Feedback::All();
            $feedback = json_decode(json_encode($feedback),true);
            return view('admin.show_feedback')->with('feedback',$feedback);
        }
        elseif ($option=='delete_feedback') {
            $delete_feedback = Feedback::find($id);
            $delete_feedback->delete();
            return redirect('admin/quanly/feedback');
        }
        elseif ($option=='booking_details') {
            $booking = Booking::All();
            $booking = json_decode(json_encode($booking),true);
            return view('admin.booking_details')->with('booking',$booking);
        }
        elseif ($option=='delete_booking') {
            $delete_booking = Booking::find($id);
            $delete_booking->delete();
            return redirect()->back();
        }

        elseif ($option=='room_type') {
            $room_type = RoomType::All();
            $room_type = json_decode(json_encode($room_type),true);
            return view('admin.show_room_type')->with('room_type',$room_type);
        }
        elseif ($option=='insert_room_type') {
            return view('admin.insert_room_type');
        }
        elseif ($option=='edit_room_type') {
            $edit_room_type = RoomType::find($id);
            return view('admin.edit_room_type')->with('edit_room_type', $edit_room_type);
        }
        elseif ($option=='delete_room_type') {
            $delete_room_type = RoomType::find($id);
            $delete_room_type->delete();
            return redirect('admin/quanly/room_type');
        }
        elseif ($option=='room') {
            $room = Room::All();
            return view('admin.show_room')->with('room',$room);
        }
        elseif ($option=='insert_room') {
            $room_type = RoomType::All();
            return view('admin.insert_room')->with('room_type',$room_type);
        }
        elseif ($option=='edit_room') {
            $room_type = RoomType::All();
            $edit_room = Room::find($id);
            return view('admin.edit_room')->with(['room_type'=>$room_type,'edit_room'=>$edit_room]);
        }
        elseif ($option=='delete_room') {
            $delete_room = Room::find($id);
            $delete_room->delete();
            return redirect('admin/quanly/room');
        }
        else{
            $account = Account::where('type_ac','=',true)
                ->first();
            $account = json_decode(json_encode($account),true);
            return view('admin.update_password')->with(['password'=>$account['password']]);
        }

    }
    public function updateAdPassword(Request $request)
    {
        $account = Account::where('type_ac','=',true)
                                ->update(['password'=>$request->input('update_ad_password')]);
        return redirect()->back();
    }

    public function insertRoomType(Request $request)
    {
        $path='';
        if ($request->hasFile('image_room')) {
            $file = $request->image_room; // lấy các giá trị của file về
            $path = $this->uploadFile($file);
        }
        else
        {
            echo 'khong co file';
        }
        $room_type = new RoomType();
        $room_type->room_type = $request->input('room_type');
        $room_type->image_room = $path;
        $room_type->price = $request->input('price');
        $room_type->trich_dan = $request->input('trich_dan');
        $room_type->save();
        return redirect()->back();
    }
    public function editRoomType(Request $request)
    {
        $path=$request->input('old_image_room');
        if ($request->hasFile('image_room')) {
            $file = $request->image_room; // lấy các giá trị của file về
            $path = $this->uploadFile($file);
        }

        $room_type = RoomType::find($request->input('id_room_type'));
        $room_type->room_type = $request->input('room_type');
        $room_type->image_room = $path;
        $room_type->price = $request->input('price');
        $room_type->trich_dan = $request->input('trich_dan');
        $room_type->save();
        return redirect('admin/quanly/room_type');
    }
    public function insertRoom(Request $request)
    {
        $this->validate($request,
            [
                'room_no'=>'required|unique:room,room_no',
            ],
            [
                'room_no.required'=>'Vui lòng nhập số phòng',
                'room_no.unique'=>'Số phòng đã tồn tại',
            ]);
        $room = new Room();
        $room->room_no = $request->input('room_no');
        $room->id_room_type = $request->input('id_room_type');
        $room->save();
        return redirect()->back();
    }
    public function editRoom(Request $request)
    {
        $room = Room::find($request->input('room_no'));
        $room->id_room_type = $request->input('id_room_type');
        $room->is_rental = $request->input('is_rental');
        $room->save();
        return redirect('admin/quanly/room');
    }
}
