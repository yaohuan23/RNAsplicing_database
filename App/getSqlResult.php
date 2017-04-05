<?php
require (dirname(__FILE__)."/../rnasp-core.class/SqlHander.class.php");
//echo "what is wrong";
//$myobj= new sqlhander();
//$myobj->debug();
echo $myobj->runSQL("show tables");
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["authon"])){
	$my_authon_obj=new Authon();	
	$authon_str=$_POST["authon"];
	if(!check_authon($authon_str,$my_authon_obj)){
		echo "<script>alert('you are not a member of hanclass,contact yaohaun23@yahoo.com')</script>";
		exit;  
	}
if(isset($_POST["mysql_query"])){
$myquery=$_POST["mysql_query"];
do_mysql($myquery);
}


}
else{
	echo "<script>alert('you are not a member of hanclass,contact yaohaun23@yahoo.com')</script>";
	exit;  
}

function check_authon($authon,$my_authon_obj){
$authon_value=$my_authon_obj-> get_value($authon);
if((time()-$authon_value)<5){
	return true;
}
return false;
}

function checkSql($sql_query){

if(preg_match('/^select|^SELECT/',$sql_query) && strlen($sql_query)<200){

return true;
}
}

function do_mysql($sql_query){
if(checkSql($sql_query)){

$mysql= new sqlhander();
return $mysql->runSQL($sql_query);

}
} 
?>
