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
	
	function TinTheoLoaiTin_PhanTrang($idLT, $from, $sotin1trang){
		$conn  	= myConnect();
		$qr		= "
			SELECT * FROM tin
			WHERE idLT = $idLT
			ORDER BY idTin DESC
			LIMIT $from, $sotin1trang
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
		
	function ChiTietTin($idTin){
		$conn	= myConnect();
		$qr 	= "
			SELECT * FROM tin
			WHERE idTin = $idTin
		";
		$result = mysqli_query($conn, $qr);
		return $result;
	}
	
	function TinCungLoaiTin($idTin, $idLT){
		$conn 	= myConnect();
		$qr		= "
			SELECT * FROM tin
			WHERE idTin <> $idTin 
			AND idLT = $idLT
			ORDER BY RAND()
			LIMIT 0,3
		";
		$result = mysqli_query($conn, $qr);
		return $result;
	}
		
	function CapNhatSoLanXemTin($idTin){
		$conn	= myConnect();
		$qr 	= "
			UPDATE tin
			SET SoLanXem = SoLanXem + 1
			WHERE idTin = $idTin;
		";
		$result = mysqli_query($conn, $qr);
	}	
	
	function TimKiem($tukhoa){
		$conn	= myConnect();
		$qr 	= "
			SELECT * FROM tin
			WHERE TieuDe REGEXP '$tukhoa'
			ORDER BY idTin DESC
		";
		$result = mysqli_query($conn, $qr);
		return $result;
	}
		
?>













