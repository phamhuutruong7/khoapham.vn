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
      <table width="1000" border="1">
        <tr>
          <td colspan="7">DANH SÁCH QUẢNG CÁO</td>
          </tr>
        
        <tr>
          <td>idQC</td>
          <td>vitri</td>
          <td>MoTa</td>
          <td>Url</td>
          <td>urlHinh</td>
          <td>SoLanClick</td>
          <td><a href="themQuangCao.php">Thêm</a></td>
        </tr>
        <?php 
			$quangcao = DanhSachQuangCao();
			while($row_quangcao = mysqli_fetch_array($quangcao)){
				ob_start();
		?>
        <tr>
          <td>{idQC}</td>
          <td>{vitri}</td>
          <td>{MoTa}</td>
          <td>{Url}</td>
          <td>{urlHinh}</td>
          <td>{SoLanClick}</td>
          <td><a href="suaQuangCao.php?idQC={idQC}">Sửa</a> - <a onclick = "return confirm('Bạn có chắc muốn xóa không?')"href="xoaQuangCao.php?idQC={idQC}">Xóa</a></td>
        </tr>
        <?php
        		$s	= ob_get_clean();
				$s 	= str_replace("{idQC}", $row_quangcao["idQC"], $s);
				$s 	= str_replace("{vitri}", $row_quangcao["vitri"], $s);
				$s 	= str_replace("{MoTa}", $row_quangcao["MoTa"], $s);
				$s 	= str_replace("{Url}", $row_quangcao["Url"], $s);
				$s 	= str_replace("{urlHinh}", $row_quangcao["urlHinh"], $s);
				$s 	= str_replace("{SoLanClick}", $row_quangcao["SoLanClick"], $s);
				echo $s;
			}
		?>
      </table>
    </form></td>
  </tr>
</table>


</body>
</html>