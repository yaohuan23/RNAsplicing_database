<?php
require (dirname(__FILE__)."/rnasp-core.class/Authon.class.php");
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["authon"])){
	//debug the authon_factory;
	//$authon_obj -> debug();
	$my_authon_obj=new Authon();	
	$authon_str=$_GET["authon"];
	//echo $authon_str;
	if(!check_authon($authon_str,$my_authon_obj)){
		echo "<script>alert('you are not a member of hanclass,contact yaohaun23@yahoo.com')</script>";
		exit;  
	}

}
else{
	echo "<script>alert('you are not a member of hanclass,contact yaohaun23@yahoo.com')</script>";
	exit;  
}

function check_authon($authon,$my_authon_obj){
//$my_authon_obj=new Authon();
//$my_authon_obj->debug();
//echo $authon."authon";
$authon_value=$my_authon_obj-> get_value($authon);
//echo time()."time";
//echo $authon_value."myvalue";
if((time()-$authon_value)<5){
	return true;
}
return false;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RNA SPLICING</title>
<meta name="keywords" content="introduce" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/coda-slider.css" type="text/css" charset="utf-8" />

<script src="js/jquery-1.2.6.js" type="text/javascript"></script>
<script src="js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>

<div id="slider">
	<div id="templatemo_wrapper">
        
        <div id="templatemo_main">
        	<div id="templatemo_sidebar">
				<div class="tuxiang"></div>
                <div id="menu">
                    <ul class="navigation">
                    <li><a href="#home" class="selected">INTRODUCTION</a></li>
                    <li><a href="#blog">APPS</a></li>
                    <li><a href="#contactus" class="last">CONTACT_US</a></li>
                    </ul>
                </div>
            </div> <!-- end of sidebar -->
            
            <div id="templatemo_content">
            	<div class="scroll">
	        		<div class="scrollContainer">
                    
                    <div class="panel" id="home">
                       <div id="history">
			<h2>WHAT IS RNA SPLICING</h2>
			<ol>	
					<div class="employer">A specific Gene may hava many isoforms.RNA splicing is one of the most commom case to Bio-diversity and gene-regulation</div>
                	</ol>
		</div>
                    </div>
                    <!-- end of home -->
                    <div class="panel" id="blog">
                        <div class="post_box">
                            <h2><a href="http://genedit.sinaapp.com/RnaSplicing/Myhtml/Mycourses/Mycourses.php">RNA SPLICING APP</a></h2>
                            <img src="images/templatemo_image_03.jpg" class="image_wrapper" alt="Image 3" />
                            <p><span class="cat">RNA SPLICING</span></p>
                        </div>                       
                    </div> <!-- end of gallery -->
                    
                    <div class="panel" id="contactus">
                    	<h2>Contact_us</h2>
                        <p>You can contact us through</p>
                        <h5>Email</h5>
                        yaohuan23@yahoo.com <br/>
						<br/>
                        <h5>Phone</h5>
                        18362960965<br/>
						<br/>
                         <h5>contact face to face</h5>
                        BIG of CAS, BeiJing<br/>
						
                    </div> <!-- end of contact us -->
                    
                    </div> <!-- end scrollContainer -->
				</div>
            </div> <!-- end of content -->
        </div> <!-- end of main -->
		</div>       
    </div> <!-- end of wrapper -->
</div> <!-- end of slider -->

</body>
</html>
