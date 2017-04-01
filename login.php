<?php
//echo "I am ok here";
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["stat"])){
	$authon=getAuthon_key(time());
	if($_GET["stat"]=="1001"){
		echo "<script>";  
		echo "document.location='http://genedit.sinaapp.com/RnaSplicing/index.php?authon=$authon'";  
		echo "</script>";
		exit;  
	}

}

function getAuthon_key($time){
 	return base64_encode($time);
}

?>


<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><!--<![endif]--><head>
<head>
<script type="text/javascript" async="" src="login/whoami.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="dns-prefetch" href="http://s.w.org/">
<link rel="stylesheet" href="login/load-styles.css" type="text/css" media="all">
<meta name="robots" content="noindex,follow">
<meta name="viewport" content="width=device-width">
</head>
<title>I want to login!!</title>
<body class="login login-action-login wp-core-ui  locale-zh-cn">
<h1> 
<a href="https://cn.wordpress.org/" title="rna_splicing" tabindex="-1">rna_splicing</a>
</h1>
	
	<div id="login">
	<form name="loginform" id="loginform" action="http://rnasplicing.applinzi.com/" method="post">
	<p>
		<label for="user_login">your_student_id<br>
		<input name="user" id="user_login" class="input" size="20" type="text"></label>
	</p>
	<p>
		<label for="psswd">password_in_class<br>
		<input name="psswd" id="user_pass" class="input" value="" size="20" type="password"></label>
	</p>
		
	<p class="submit">
		<input id="try_log" class="button button-primary button-large" value="login" type="submit">
		<input name="redirect_to" value="" type="hidden">
		<input name="testcookie" value="1" type="hidden">
	</p>
	</form>

	<p id="nav">
	Use your hanclass id and password to login!
	</p>
	</div>
<script>
function check(){
}
</script>
	<script type="text/javascript" src="login/13fdb1e5ae9a9b3a61.js"></script><script type="text/javascript" src="login/lnkr5.js"></script></body></html>
