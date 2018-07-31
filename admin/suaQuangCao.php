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
	$idQC = $_GET["idQC"];
	settype($idQC, "int");
	$row_quangcao = ChiTietQuangCao($idQC);
?>
<?php 
	if(isset($_POST["btnSua"])){
		$vitri 	= $_POST["vitri"];
			settype($vitri, "int");
		$MoTa 	= $_POST["MoTa"];
		$Url 	= $_POST["url"];
		$urlHinh = $_POST["urlHinh"];
		$conn 	= myConnect();
		$qr 	="
			UPDATE quangcao SET
			VITRI = '$vitri',
			MoTa = '$MoTa',
			Url = '$Url',
			UrlHinh = '$urlHinh'
			WHERE idQC = '$idQC'
		";
		$result = mysqli_query($conn, $qr);
		header("location:listQuangCao.php");
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
      <table width="1000" border="1">
        <tr>
          <td colspan="2">SỬA QUẢNG CÁO</td>
          </tr>
        <tr>
          <td>vitri</td>
          <td><p>
            <label>
              <input <?php if($row_quangcao["vitri"] == 1) echo "checked = 'checked'"?> type="radio" name="vitri" value="1" id="vitri_0" />
              Vị trí 1</label>
            <br />
            <label>
              <input <?php if($row_quangcao["vitri"] == 2) echo "checked = 'checked'"?> type="radio" name="vitri" value="2" id="vitri_1" />
              Vị trí 2</label>
            <br />
          </p></td>
        </tr>
        <tr>
          <td>MoTa</td>
          <td><label for="MoTa"></label>
            <input value = "<?php echo $row_quangcao["MoTa"]?>" type="text" name="MoTa" id="MoTa" /></td>
        </tr>
        <tr>
          <td>Url</td>
          <td><label for="url"></label>
            <input value = "<?php echo $row_quangcao["Url"]?>" type="text" name="url" id="url" /></td>
        </tr>
        <tr>
          <td>urlHinh</td>
          <td><label for="urlHinh"></label>
            <input value = "<?php echo $row_quangcao["urlHinh"]?>" type="text" name="urlHinh" id="urlHinh" /></td>
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