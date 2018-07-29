<?php
	ob_start();
	session_start();
	echo $_SESSION["idGroup"];
	if(!isset($_SESSION["idUser"]) || $_SESSION["idGroup"] != 1){
		header("location:../index.php");
	}
	
	require "../lib/dbCon.php";
	require "../lib/quantri.php";
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="layout.css"/>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td id= "hangTieuDe"><p>TRANG QUẢN TRỊ
     <div style="width: 200px; float: right">
    	<div>Chào anh/chị <?php echo $_SESSION["HoTen"]?></div>
    </div>
    </p></td>
   
  </tr>
  <tr>
    <td id="hang2"><?php require "menu.php";?></td>
  </tr>
  <tr>
    <td><table width="600" border="1">
      <tr>
        <td colspan="6" align="center"><h2>DANH SÁCH THỂ LOẠI</h2></td>
        </tr>
      <tr>
        <td>idTL</td>
        <td>TenTL</td>
        <td>TenTL_KhongDau</td>
        <td>ThuTu</td>
        <td>AnHien</td>
        <td><a href="themTheLoai.php">Thêm</a></td>
      </tr>
      <?php 
	  	$theloai = DanhSachTheLoai();
		while($row_theloai = mysqli_fetch_array($theloai)){
	  		ob_start();
		
	  ?>
      <tr>
        <td>{idTL}</td>
        <td>{TenTL}</td>
        <td>{TenTL_KhongDau}</td>
        <td>{ThuTu}</td>
        <td>{AnHien}</td>
        <td><a href="suaTheLoai.php?idTL={idTL}">Sửa</a>-
        	<a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="xoaTheLoai.php?idTL={idTL}">Xóa</a></td>
      </tr>
      <?php 
			$s = ob_get_clean();
			$s = str_replace("{idTL}",$row_theloai["idTL"],$s);	
			$s = str_replace("{TenTL}",$row_theloai["TenTL"],$s);	
			$s = str_replace("{TenTL_KhongDau}",$row_theloai["TenTL_KhongDau"],$s);	
			$s = str_replace("{ThuTu}",$row_theloai["ThuTu"],$s);	
			$s = str_replace("{AnHien}",$row_theloai["AnHien"],$s);	
			echo $s;
		}
	  ?>
      
    </table></td>
  </tr>
</table>


</body>
</html>