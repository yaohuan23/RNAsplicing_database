<?php
require (dirname(__FILE__)."/../rnasp-core.class/file.class.php");
require (dirname(__FILE__)."/../rnasp-core.class/Authon.class.php");
require (dirname(__FILE__)."/../rnasp-core.class/SqlHander.class.php");
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
/*else{
	echo "<script>alert('you are not a member of hanclass,contact yaohaun23@yahoo.com')</script>";
	exit;  
}
*/
function check_authon($authon,$my_authon_obj){
//$my_authon_obj=new Authon();
//$my_authon_obj->debug();
//echo $authon."authon";
$authon_value=$my_authon_obj-> get_value($authon);
//echo time()."time";
//echo $authon_value."myvalue";
if((time()-$authon_value)<5000){
	return true;
}
return false;
}
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
<link href="./CourseSystem.css" rel="stylesheet" type="text/css">
</head>
<script>
 function createAjax(){
        var request=false;
         
        //window对象中有XMLHttpRequest存在就是非IE，包括（IE7，IE8）
        if(window.XMLHttpRequest){
            request=new XMLHttpRequest();
 
            if(request.overrideMimeType){
                request.overrideMimeType("text/xml");
            }
         
 
        //window对象中有ActiveXObject属性存在就是IE
        }else if(window.ActiveXObject){
             
            var versions=['Microsoft.XMLHTTP', 'MSXML.XMLHTTP', 'Msxml2.XMLHTTP.7.0','Msxml2.XMLHTTP.6.0','Msxml2.XMLHTTP.5.0', 'Msxml2.XMLHTTP.4.0', 'MSXML2.XMLHTTP.3.0', 'MSXML2.XMLHTTP'];
 
            for(var i=0; i<versions.length; i++){
                    try{
                        request=new ActiveXObject(versions[i]);
 
                        if(request){
                            return request;
                        }
                    }catch(e){
                        request=false;
                    }
            }
        }
        return request;
    }
 
var xmlhttp=createAjax();
</script>
<body>
<div class="MenumContainer" id="MyMenum">
<ul class="Menum1"><p width="10%" align="center">RNA splicing</p> <hr width="80%" size="2" align="center" color="#0085BA">
<p>
Welcome to use this software to check the difference of RNA splicing isoforms, enjoy!
</p>
</ul>
<ul class="Menum2"><a href="#" ><p width="10%" align="center">Introduction & Help</p> </a><hr width="80%" size="2" align="center" color="#0085BA">
<p>
You can select a specific specie and Using a specific gene_id or gene name to search the database.The result will show you the different kinds
o isoforms found until now!
</p>
<div id="footer"> 
   <span class="copyright">powered by<a href="http://mobilemooc.sinaapp.com">clode hero</a></span> 
   </div>
</div>
<div class="InfoContainer">
<div class="selectform">
<div class="selectform">
            <div class="notice"></div>
            <form method="post" action="#">
                <div class="formlabel">Enter a keyword to find a Gene</div>
                <div class="forminfos">
                    <input id="search_str" name="genesearch" value="SMARCAD1" type="text">
                    <input name="submit" value="search" type="submit">
                </div>
            </form>
        </div>
<div class="selectform">
            <div class="notice"></div>
            <form method="post" action="#"enctype="multipart/form-data">
                <div class="formlabel">Inset data into the database by sending a file</div>
                <div class="forminfos">
                    <input id="file_send" name="ldfile" value="" type="file">
                    <input name="submit" value="upload" type="submit">
                </div>
            </form>
        </div>
<?php 

function filesql_create($record_arry,$table){

$file_sql= "insert into Spl_General_Info values($record_arry[0],'$record_arry[1]','$record_arry[2]','$record_arry[3]', $record_arry[4],'$record_arry[5]');";
return $file_sql;
}

if(@is_uploaded_file($_FILES["ldfile"]["tmp_name"])){
	$temp_file= $_FILES['ldfile']['tmp_name'];
	$filehander=new clsFile($temp_file);
	$fp_res=$filehander->open();
	$mysql= new sqlhander();
	$record_num=0;
	while (!feof($fp_res)) {
	$record_num+=1;
	$line_data=$filehander->read_line($fp_res);
	$record_arry=explode("\t",$line_data);
	$arry_lenth=0;
	foreach ($record_arry as $value){
	$arry_lenth+=1;
	//echo $value."yaohuan";
	}
	if($arry_lenth==6){
			//$mysql= new sqlhander();
			//echo filesql_create($record_arry,"Spl_General_Info");
			$result=$mysql->runSQL(filesql_create($record_arry,"Spl_General_Info"),"file");
			if(!$result==200){echo "your file contain invaild words";
			$filehander->close($fp_res);
       			$mysql->closeSqlLink();
			exit;}
			}	
	}
	$filehander->close($fp_res);
	$mysql->closeSqlLink();
	echo "congratulations!you have inserted $record_num record successfully!";
}
elseif (isset ($_POST["genesearch"])){
$search_str=$_POST["genesearch"];
$mysql= new sqlhander();
$result= $mysql->runSQL(sqlCreate($search_str,"Spl_General_Info"),$search_str);
$mysql->closeSqlLink();
//require "./result_start.htm";
echo getResult_start($result[1],$search_str);
echo $result[0];
require "./result_end.htm";

}
elseif ( isset ($_POST["mysql_str"])){
$sql_str=$_POST["mysql_str"];
$mysql= new sqlhander();
$result= $mysql->runSQL($sql_str);
//require "./result_start.htm";
$mysql->closeSqlLink();
echo getResult_start($result[1],$sql_str);
echo $result[0];
require "./result_end.htm";
}else{
	require "./SqlInput.htm";
}
//create the html_txt for showing the result
function getResult_start($result_num,$search_sql){
$return_str="";
$return_str.="<div id='page'>";
$return_str.="<h1>Your sql : $search_sql ($result_num results)</h1>";
$return_str.="<div class='selectform'><div class='alignResultPageTop'><div class='alignResultPageCurrent'>page: 1</div></div><div id='resultSearch'><table class='genesearchresult'><tbody><tr><th>#</th><th>GenoSplice ID</th><th>Gene Symbol</th><th>Gene description</th><th>Number of Exons</th><th>Chr(Strand)</th></tr>";
return $return_str;
}
//create the sql expression for searching the database;
function sqlCreate($search_str,$table){
return "select * from $table where gene_symble='$search_str' or gene_des like '%$search_str%'";

}

?>
</div>
<script>
function getResult()
{
	var xuehao=document.getElementById("xuehao").value;
	var mima=document.getElementById("mima").value
	xmlhttp.open("POST","http://genedit.sinaapp.com/RnaSplicing/App/index.php?authon=MTQ5MTE1MTQwMg==",true);
	var Post_text="mysql_query="+xuehao+"&authon="+mima;
	xmlhttp.send(Post_text);
	xmlhttp.onreadystatechange=function(){
	if(xmlhttp.readyState==4){
            if(xmlhttp.status==200)
            {
		/*var show= document.createElement("textarea");
		show.rows=30;
		show.cols=200;
		show.value=xmlhttp.responseText;
		document.getElementById("table").appendChild(show);	
		*/
		var newhtml=xmlhttp.responseText;
		var doc=window.open().document;
		doc.write(newhtml);
    }
    else
    {
        alert("some thing is wrong there"+xmlhttp.readyState+xmlhttp.status+newhtml);
    }
}

function check_sql(){




}

</script>
</body>
</html>
