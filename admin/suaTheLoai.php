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
<?php
$idTL = $_GET["idTL"];
	settype($idTL, "int");
$row_theloai =ChiTietTheLoai($idTL);
?>

<?php 
	if(isset($_POST["btnSua"])){
		$TenTL = $_POST["TenTL"];
		$TenTL_KhongDau = changeTitle($TenTL);
		$ThuTu = $_POST["ThuTu"];
			settype($ThuTu, "int");
		$AnHien = $_POST["AnHien"];
			settype($AnHien, "int");	
		
		$conn	= myConnect();
		$qr 	= "UPDATE theloai SET
					TenTL ='$TenTL',
					TenTL_KhongDau = '$TenTL_KhongDau',
					ThuTu = '$ThuTu',
					AnHien= '$AnHien'
					WHERE idTL ='$idTL'
		";
		$result = mysqli_query($conn, $qr);
		header("location:listTheLoai.php");
		echo $result;
	}
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
    <td><form id="form1" name="form1" method="post" action="">
      <table width="500" border="1">
        <tr>
          <td colspan="2">SỬA THỂ LOẠI</td>
          </tr>
        <tr>
          <td>TenTL</td>
          <td><label for="TenTL"></label>
            <input value="<?php echo $row_theloai["TenTL"]?>" name="TenTL" id="TenTL" /></td>
        </tr>
        <tr>
          <td>ThuTu</td>
          <td><label for="ThuTu"></label>
            <input value="<?php echo $row_theloai["ThuTu"]?>" name="ThuTu" id="ThuTu" /></td>
        </tr>
        <tr>
          <td>AnHien</td>
          <td><p>
            <label>
                <input <?php if ($row_theloai["AnHien"] == 1) echo "checked='checked'"?>type="radio" name="AnHien" value="1" id="AnHien_0" />
                Hiện</label>
              <br />
              <label>
                <input <?php if ($row_theloai["AnHien"] == 0) echo "checked='checked'"?>type="radio" name="AnHien" value="0" id="AnHien_1" />
                Ẩn</label>
              <br />
          </p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btnSua" id="btnSua" value="Sửa" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>


</body>
</html>