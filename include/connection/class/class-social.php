<?php
class clRootSocial{
public function fnQueryWithWhere($QUERY, $ARRAY){
	global $dbconnect;
	$sqlQuery = $dbconnect->prepare($QUERY);
	try{
		$sqlQuery->execute($ARRAY);
		return $sqlQuery;
	}catch(PDOExceptoin $e){
	echo 'Insertion failed. Please try again.';
	}
}

public function fnQueryWithoutWhere($QUERY){
	global $dbconnect;
	$sqlQuery = $dbconnect->prepare($QUERY);
	try{
		$sqlQuery->execute();
		return $sqlQuery;
	
	
	}catch(PDOExceptoin $e){
	echo 'Insertion failed. Please try again.';
	}
}
	
public function random_string(){
	$character_set_array = array();
	$character_set_array[] = array('count' => 4, 'characters' => 'abcdefghijklmnopqrstuvwxyz');
	$character_set_array[] = array('count' => 4, 'characters' => '0123456789');
	$temp_array = array();
	foreach ($character_set_array as $character_set) {
		for ($i = 0; $i < $character_set['count']; $i++) {
			$temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
		}
	}
	shuffle($temp_array);
	return implode('', $temp_array);
}

function uniqueFile($dir, $imageName)
{
  $dotpos= strpos($imageName,".");
  $ext= substr($imageName,$dotpos+1);
  $fileName= substr($imageName,0,$dotpos);
  $count= 1;
  while(file_exists($dir.$imageName)){
   $imageName=$fileName.$count.".".$ext;
   	$count++;
  }
 return $imageName;
 }
}


?>