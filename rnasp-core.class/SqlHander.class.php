<?php
require (dirname(__FILE__)."/config.php");
class sqlhander{

	var $mysql_link=NULL;

function debug(){

if($this->mysql_link)
	echo "NULL is true";
else{
	echo "NULL is  not true";
}

}
private function getSqlLink(){
	if ($this->mysql_link){
		
		//var_dump($this->mysql_link);
		return $this->mysql_link;
	}
	else{
		//work on sae;		
		//$this->mysql_link=mysql_connect(MYSQL_HOST.":3307",MYSQL_USER,MYSQL_PSSWD);		
		

		//this functin works on han's server machine
		$this->mysql_link = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PSSWD, MYSQL_database);
		return $this->mysql_link;
	    }
			    }


public function closeSqlLink(){
//works on han's machine
//$sqlLink.close();
if($this->mysql_link){
mysqli_close($this->mysql_link);
}

}

public function runSQL($query_str,$key_word=""){
	
/*works on sae
	//$mysqli=$this->getSqlLink();		
	$mysqli= mysql_connect(MYSQL_HOST.":3307",MYSQL_USER,MYSQL_PSSWD);
	mysql_select_db("app_genedit",$mysqli);
	$result = mysql_query( $query_str );
*/


	//works on han's machine;
	$mysqli=$this->getSqlLink();
	//echo var_dump($mysqli);	
	$result = $mysqli->query($query_str);
		if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "<BR>";
        $message .= 'Whole query: ' . $query_str;
        die($message);
        }
	else{
		
		//works on han's machine		
		//if($row = $result->fetch_assoc()){
		//return var_dump ($row);
		//}
		
		//work on sae;		
		//return var_dump(mysql_fetch_array($result));
			$return_str="";
			$record_um=1;
			if($key_word=="file"){return 200;}
			while ($row = $result->fetch_array()) {
				//return var_dump($row);
				$return_str.=$this->getStand_str($row,$record_um,$key_word);
				//$return_str.=$row[0];
				$record_um+=1;	       				
				 }
		return array($return_str,$record_um-1);
   		//mysql_free_result($result);
		}
	}

function getStand_str($result_arry,$record_um,$key_word){
//$return_str="";
//echo "you are here";
$temp_str="";
$tr_class = $record_um % 2==1?"even":"odd";
$temp_str="<tr class= '$tr_class' />";
$temp_str.="<td class='cellPage'>$record_um</td>";
//$herf="http://mobilemooc.sinaapp.com";
$temp_str.="<td class='cellStableId'>$result_arry[1]</td>";
if(!$key_word==""){
	$cellSymbol=str_replace($key_word,"<span class='found'>$key_word</span>",$result_arry[2]);
	$gen_des=str_replace($key_word,"<span class='found'>$key_word</span>",$result_arry[3]);
}else{
	$cellSymbol=$result_arry[2];
	$gen_des=$result_arry[3];
}
$herf="http://prosplicer.mbc.nctu.edu.tw/dlist.php?type=1&Query_text=$result_arry[2]";
$temp_str.="<td class='cellSymbol'><a class='searchResultTitle' href=$herf>$cellSymbol</a><br></td>";
$temp_str.="<td>$gen_des<br></td>";
$temp_str.="<td class='cellExonNumber'>$result_arry[4]</td>";
$temp_str.="<td class='cellCoord'>$result_arry[5]</td></tr>";
//foreach ($result_arry as $result_str) {
  //  $return_str.=$result_str;
	
//}

//return $return_str;
return $temp_str;

}


















}

?>
