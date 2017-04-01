<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
<link href="./CourseSystem.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="MenumContainer" id="MyMenum">
<ul class="Menum1"><p width="10%" align="center">RNA splicing</p> <hr width="80%" size="2" align="center" color="#ff7000">
<p>
Welcome to use this software to check the difference of RNA splicing isoforms, enjoy!
</p>
</ul>
<ul class="Menum2"><a href="#" ><p width="10%" align="center">Introduction & Help</p> </a><hr width="80%" size="2" align="center" color="#ff7000">
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
            <div class="notice"></div>
            <form method="post" action="#">
                <div class="formlabel">Enter a keyword to find a Gene</div>
                <div class="forminfos">
                    <input name="genesearch" value="" type="text">
                    <input name="submit" value="search" type="submit">
                </div>
            </form>
        </div>
                   <?php require "./result.txt";?>
<div id="footer"> 
   <text_area>
   </div>
</div>

</body>
</html>
