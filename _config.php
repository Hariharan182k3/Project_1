<?php
	$con=mysqli_connect("localhost","root","","db_material");
	
		$year=["1","2","3"];
		$sem=["1","2","3","4","5","6"];

	
	#get result set
	function resultSet($con,$sql){
		$res=$con->query($sql);
		#return $res->fetch_all(MYSQLI_ASSOC);
		$rows=[];
        while($row=$res->fetch_assoc()){		
        	$rows[]=$row;
        }
        return $rows;
	}
	
	#get single row
	function single($con,$sql){
		$res=$con->query($sql);
		return $res->fetch_assoc();
	}
	#number format
	function format($num,$digit=2){
		$num=round($num,$digit);
		return number_format($num,$digit,".","");
    }
	
	#db to user format
	function date_user_format($date){
		return date("d-m-Y",strtotime($date));
    }
	
	#user to db format
	function date_db_format($date){
		return date("Y-m-d",strtotime($date));
    }

	#get random text
	function randText($randTextLength = 6) {
		$texts = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		$textsLength = strlen($texts);
		$randTxt = "";
		for($i=0;$i<$randTextLength;$i++){
		  $n=rand(0,$textsLength-1);
		  $randTxt .= $texts[$n];
		}
		return $randTxt;
	}
	
	function flash($name='',$msg='',$cate='success'){
		if(!empty($name)){
		  if(!empty($msg)&&empty($_SESSION[$name])){
			$_SESSION[$name]=$name;
			$_SESSION[$name."_msg"]=$msg;
			$_SESSION[$name."_cate"]=$cate;
		  }
		  else if(empty($msg)&&!empty($_SESSION[$name])){ 			
				echo "<div class='alert alert-{$_SESSION[$name."_cate"]} alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button>{$_SESSION[$name."_msg"]}</div>";
			unset($_SESSION[$name]);
			unset($_SESSION[$name."_msg"]);
			unset($_SESSION[$name."_cate"]);
		  }
		}
	  }
	  //loadSelect from Array
	function loadSelectArray($array,$selectedIndex=null)
	{
		$options="<option selected value=''>Select</option>";
	
		foreach($array as $row)
		{
			if($selectedIndex==$row)
			{
				$options.="<option selected value='{$row}'>{$row}</option>";
			}
			else
			{
				$options.="<option value='{$row}'>{$row}</option>";
			}
		}
	
		return $options;
	}
	
	#Load Select Tag
	function loadSelect($con,$sql,$valueMember,$displayMember,$selectedIndex=null)
	{
		$res=$GLOBALS["con"]->query($sql);
		$options="<option value=''>Select</option>";
		if($res->num_rows>0)
		{
			while($row=$res->fetch_assoc())
			{
				if($selectedIndex==$row[$valueMember])
				{
					$options.="<option selected value='{$row[$valueMember]}'>{$row[$displayMember]}</option>";
				}
				else
				{
					$options.="<option value='{$row[$valueMember]}'>{$row[$displayMember]}</option>";
				}
			}
		}
		return $options;
	}

?>