<?php

// tạo 1 array có độ dài quantity, các phần tử trong khoảng min, max, các phần tử không trùng nhau và không có phần tử elementNoExpect (nếu được truyền vào)
function createArrayRandom($quantity,$min,$max,$elementNoExpect='') {
	if($min>$max) return [];
	$array=[];
	while(count($array) != $quantity) {
		$random=rand($min,$max);
		if($random!=$elementNoExpect) {
			array_push($array, $random);
			$array=array_unique($array);
		}
	}
	return $array;
}

// thuật toán tìm số phòng cần thiết cho tất cả các ngày đến và ngày đi, là max - bài toán tương tự Array Manipulation hackerrank #copy
function checkRoom($check_in, $check_out,$so_phong_account_book, $so_ngay_book_permit,$so_phong_hotel) {
    $computation = array_fill(-1, $so_ngay_book_permit+2, 0);

    for ($i=0; $i < count($check_in); $i++) {
    	$computation[$check_in[$i] - 1]+=$so_phong_account_book[$i];
    	$computation[$check_out[$i]]-=$so_phong_account_book[$i];
    }
    $max=$computation[-1];
    for ($i=0; $i <=$so_ngay_book_permit ; $i++) {
		$computation[$i] += $computation[$i - 1];
      	$max = max($max,$computation[$i]);
    }
    return ($max <= $so_phong_hotel);
} 
function caculatePrice($price,$unit) {
	if($unit=='USD') return round($price*20000);#USD
	return round($price);#VNĐ
}
#tính độ lệch ngày $date với hôm nay
function date_diff_now($date) {
	return date_diff(date_create($date),date_create(date('Y-m-d')))->format("%a");
}
?>