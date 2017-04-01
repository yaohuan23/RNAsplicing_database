<?php

class Authon{

var $my_authon="";
var $my_authon_time=0;
public function debug(){
//echo "this class works well";
}

public function get_authon(){
if(strlen($this->my_authon)>1 && (time() - $this->my_authon_time)<5){
return $this->my_authon;
}
else{
return $this->authon_create();
}
}

public function get_value($authon){
return $this->sec_out($authon);
}

private function authon_create(){
$this->my_authon=base64_encode(time());
$this->my_authon_time=time();
return $this->my_authon;
}

private function sec_out($authon_str){
//echo "yaohuan23";
return base64_decode($authon_str);
}



}
?>
