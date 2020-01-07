<?php

$today = date("Y-m-d H:i:s");
function getDesc($field,$table,$where,$debug=''){
	include ('connect.php');

		$sql = "SELECT $field FROM $table WHERE $where";
		$query = mysqli_query($conn,$sql) or error(mysqli_error(),__FILE__,__LINE__,$query);
		$row = mysqli_fetch_assoc($query);
		$num = mysqli_num_rows($query);
		if($debug==''){
			if($num > 0){
				return $row["$field"];
			}else{
				return "";
			}
		}else{
			return $sql;
		}
	}

function getCode($str,$text){
	include ('connect.php');
	$sql = "SELECT MAX(id) as mx FROM $str";
	$rs = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($rs);
	if($num==0){
		$code1="0001";
	}else{
	$fet=mysqli_fetch_array($rs);
	$maxid=$fet['mx']+1;
		if(strlen($maxid)==1){
			$code1="000".$maxid;
		}else if(strlen($maxid)==2){
			$code1="00".$maxid;
		}else if(strlen($maxid)==3){
			$code1="0".$maxid;
		}else{
			$code1=$maxid;
		}
	}
	$code2 = $text.$code1;
	return $code2;
}
function DateThai($strDate)
      {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strHour= date("H",strtotime($strDate));
        $strMinute= date("i",strtotime($strDate));
        $strSeconds= date("s",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
      }

?>