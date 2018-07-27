<?php
	function TinMoiNhat_MotTin(){
		
		$conn  	= myConnect();
		$qr 	= "
			SELECT * FROM tin 
			ORDER BY idTin DESC
			LIMIT 0,1
		";
		
		$result = mysqli_query($conn, $qr);
		return $result;
		
	}
	
	function TinMoiNhat_BonTin(){
		
		$conn  	= myConnect();
		$qr 	= "
			SELECT * FROM tin 
			ORDER BY idTin DESC
			LIMIT 1,6
		";
		
		$result = mysqli_query($conn, $qr);
		return $result;
		
	}
	
	function TinXemNhieuNhat(){
		$conn 	= myConnect();
		$qr 	= "
			SELECT * FROM tin
			ORDER BY SoLanXem DESC
			LIMIT 0,6
		";
		$result = mysqli_query($conn, $qr);
		return $result;

		}
		
	function TinMoiNhat_TheoLoaiTin_MotTin($idLT){
		$conn 	= myConnect();
		$qr 	= "
			SELECT * FROM tin
			WHERE idLT = $idLT 
			ORDER BY idTin DESC
			LIMIT 0,1
		";
		$result = mysqli_query($conn, $qr);
		return $result;
	}
	
	function TinMoiNhat_TheoLoaiTin_BonTin($idLT){
		$conn 	= myConnect();
		$qr 	= "
			SELECT * FROM tin
			WHERE idLT = $idLT
			ORDER BY idTin DESC
			LIMIT 1,6
		";
		$result = mysqli_query($conn, $qr);
		return $result;
	}
	
	function TenLoaiTin($idLT){
		$conn 	= myConnect();
		$qr 	="
			SELECT Ten
			FROM loaitin
			WHERE idLT = $idLT
		";
		$loaitin = mysqli_query($conn, $qr);
		$row = mysqli_fetch_array($loaitin);
		return $row['Ten'];
	}
		
	function QuangCao($vitri){
		$conn 	= myConnect();
		$qr 	= "
			SELECT * FROM quangcao
			WHERE vitri = $vitri
		";
		$result = mysqli_query($conn, $qr);
		return $result;
	
	}
	
	function DanhSachTheLoai(){
		$conn 	= myConnect();
		$qr		= "
			SELECT * FROM theloai
		";
		$result = mysqli_query($conn, $qr);
		return $result;
	}
		
	function DanhSachLoaiTin_Theo_TheLoai($idTL){
		$conn	= myConnect();
		$qr		="
			SELECT * FROM loaitin
			WHERE idTL = $idTL
		";
		$result = mysqli_query($conn, $qr);	
		return $result;
	}
		
		
	function TinMoi_BenTrai($idTL){
		$conn 	= myConnect();
		$qr 	= "
			SELECT * FROM tin
			WHERE idTL = $idTL
			ORDER BY idTIN DESC
			LIMIT 0,1
		";
		$result = mysqli_query($conn, $qr);
		return $result;
	}
		
	function TinMoi_BenPhai($idTL){
		$conn 	= myConnect();
		$qr 	= "
			SELECT * FROM tin
			WHERE idTL = $idTL
			ORDER BY idTin DESC
			LIMIT 1, 2
		";
		$result = mysqli_query($conn, $qr);
		return $result;
	}
		
	function TinTheoLoaiTin($idLT){
		$conn 	= myConnect();
		$qr		= "
			SELECT * FROM tin
			WHERE idLT = $idLT
			ORDER BY idTin DESC
			
		";
		$result = mysqli_query($conn, $qr);
		return $result;	
	}
		
		
	function breadCrumb($idLT){
		$conn 	= myConnect();
		$qr 	= "
			SELECT TenTL, Ten
			FROM theloai, loaitin
			WHERE theloai.idTL = loaitin.idTL
			AND idLT = $idLT
		";
		$result = mysqli_query($conn, $qr);
		return $result;
	}
		
		
		
?>