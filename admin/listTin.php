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
    <td><table width="700" border="1">
      <tr>
        <td colspan="5">DANH SÁCH TIN</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><p>&nbsp;</p></td>
        <td><a href="themTin.php">Thêm</a></td>
        </tr>
      
      <?php 
	  	$tin = DanhSachTin();
		while($row_tin = mysqli_fetch_array($tin)){
			ob_start();
	  ?>
      <tr>
        <td>idTin:{idTin} <br />
{Ngay}</td>
        <td><a href="suaTin.php?idTin={idTin}">{TieuDe} </a><br />
       	  <img style="float:left; margin-right:5px;" src="../upload/tintuc/{urlHinh}" alt="" width="150" height="103"  />{TomTat}</td>
        <td>{TenTL}-{Ten}</td>
        <td><p>Số lần xem {SoLanXem}-</p>
          <p>{TinNoiBat}-{AnHien}</p></td>
        <td><a href="suaTin.php?idTin={idTin}">Sửa</a> - <a href="xoaTin.php?idTin={idTin}">Xóa</a></td>
        </tr>
       <?php 
			$s 	= ob_get_clean();
			$s 	= str_replace("{idTin}", $row_tin["idTin"], $s);
			$s 	= str_replace("{Ngay}", $row_tin["Ngay"], $s);
			$s 	= str_replace("{TieuDe}", $row_tin["TieuDe"], $s);
			$s 	= str_replace("{TomTat}", $row_tin["TomTat"], $s);
			$s 	= str_replace("{urlHinh}", $row_tin["urlHinh"], $s);
			$s 	= str_replace("{TenTL}", $row_tin["TenTL"], $s);
			$s 	= str_replace("{Ten}", $row_tin["Ten"], $s);
			$s 	= str_replace("{SoLanXem}", $row_tin["SoLanXem"], $s);
			$s 	= str_replace("{TinNoiBat}", $row_tin["TinNoiBat"], $s);
			$s 	= str_replace("{AnHien}", $row_tin["AnHien"], $s);
			
			echo $s;
		}
	   ?> 
        
    </table></td>
  </tr>
</table>


</body>
</html>