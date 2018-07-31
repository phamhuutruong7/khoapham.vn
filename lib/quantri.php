<?php
//Quan li the loai
function DanhSachTheLoai(){
	$conn 	= myConnect();
	$qr 	="
		SELECT *FROM theloai
		ORDER BY idTL DESC;
	";
	$result = mysqli_query($conn, $qr);
	return $result;
}

function ChiTietTheLoai($idTL){
	$conn 	= myConnect();
	$qr 	= "
		SELECT * FROM theloai
		WHERE idTL = '$idTL';
	";
	$result = mysqli_query($conn, $qr);
	$row = mysqli_fetch_array($result);
	return $row;
	}

//Quan li LoaiTin
function DanhSachLoaiTin(){
	$conn 	= myConnect();
	$qr		= "
		SELECT * FROM loaitin, theloai
		WHERE theloai.idTL = loaitin.idTL
		ORDER BY idLT DESC
	";
	$result = mysqli_query($conn, $qr);
	return $result;
	}
	
function ChiTietLoaiTin($idLT){
	$conn 	= myConnect();
	$qr  	= "
		SELECT * FROM loaitin
		WHERE idLT = '$idLT'
	";
	$query = mysqli_query($conn, $qr);
	$result = mysqli_fetch_array($query);
	return $result;
	}
	
	//Quan tri Tin
	function DanhSachTin(){
		$conn	= myConnect();
		$qr 	= "
			SELECT tin.*, TenTL, Ten 
			FROM tin, theloai, loaitin
			WHERE theloai.idTL = tin.idTL 
			AND tin.idLT = loaitin.idLT
			ORDER BY idTin DESC
			LIMIT 0,20
		";
		$result = mysqli_query($conn, $qr);
		return $result;
		
	}
	function ChiTietTin($idTin){
		$conn 	= myConnect();
		$qr 	= "
			SELECT * FROM tin
			WHERE idTin = '$idTin'
		";
		$query 	= mysqli_query($conn, $qr);
		$result = mysqli_fetch_array($query);
		return $result;
			
	}
	

function stripUnicode($str){
	if(!$str) return false;
	$unicode = array(
		'a'=>'à|á|ả|ã|ạ|ă|ằ|ắ|ẳ|ẵ|ặ|â|ầ|ấ|ẩ|ẫ|ậ',
		'A'=>'À|Á|Ả|Ã|Ạ|Ă|Ằ|Ắ|Ẳ|Ẵ|Ặ|Â|Ầ|Ấ|Ẩ|Ẫ|Ậ',
		'd'=>'đ',
		'D'=>'Đ',
		'e'=>'è|é|ẻ|ẽ|ẹ|ê|ề|ế|ể|ễ|ệ',
		'E'=>'È|É|Ẻ|Ẽ|Ẹ|Ê|Ề|Ế|Ể|Ễ|Ệ',
		'i'=>'ì|í|ỉ|ĩ|ị',
		'I'=>'Ì|Í|Ỉ|Ĩ|Ị',
		'o'=>'ò|ó|ỏ|õ|ọ|ô|ồ|ố|ổ|Ỗ|ộ|ơ|ờ|ớ|ở|ỡ|ợ',
		'O'=>'Ò|Ó|Ỏ|Õ|Ọ|Ô|Ồ|Ố|Ổ|Ỗ|Ộ|Ơ|Ờ|Ớ|Ở|Ỡ|Ợ',
		'u'=>'ù|ú|ủ|ũ|ụ|ư|ừ|ứ|ử|ữ|ự',
		'U'=>'Ù|Ú|Ủ|Ũ|Ụ|Ư|Ừ|Ứ|Ử|Ữ|Ự',
		'y'=>'ỳ|ý|ỷ|ỹ|ỵ',
		'Y'=>'Ỳ|Ý|Ỷ|Ỹ|Ỵ'
	);
	foreach($unicode as $khongdau=>$codau){
		$arr	= explode("|",$codau);
		$str 	= str_replace($arr,$khongdau, $str);
	}
	return $str;
}

function changeTitle($str){
	$str = trim($str);
	if($str=="") return "";
	$str = str_replace('"', '',$str);
	$str = str_replace("'", '',$str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str, MB_CASE_TITLE, 'utf-8');
	
	//MB_CASE_UPPER / MB_CASE_TITLE/ MB_CASE_LOWER
	$str = str_replace(' ', '-', $str);
	return $str;
}



?>