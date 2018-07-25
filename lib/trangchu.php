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
?>